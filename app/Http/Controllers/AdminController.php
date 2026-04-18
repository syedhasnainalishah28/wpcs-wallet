<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Deposit;
use App\Models\Withdrawal;
use App\Models\SiteSetting;
use App\Models\PaymentAccount;

class AdminController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            if (Auth::user()->role === 'admin') {
                $request->session()->regenerate();
                return redirect()->intended('/admin/dashboard');
            }
            
            Auth::logout();
            return back()->withErrors(['email' => 'Unauthorized access. Only admins can log in here.']);
        }

        return back()->withErrors(['email' => 'The provided credentials do not match our records.']);
    }

    public function dashboard()
    {
        $stats = [
            'total_users' => User::count(),
            'pending_deposits' => Deposit::where('status', 'pending')->count(),
            'pending_withdrawals' => Withdrawal::where('status', 'pending')->count(),
            'total_balance' => User::sum('balance'),
        ];
        
        return view('admin.dashboard', compact('stats'));
    }

    public function users()
    {
        $users = User::where('role', 'user')->orderBy('created_at', 'desc')->get();
        return view('admin.users', compact('users'));
    }

    public function updateUserBalance(Request $request, User $user)
    {
        $request->validate(['balance' => 'required|numeric|min:0']);
        $user->update(['balance' => $request->balance]);
        return back()->with('success', 'User balance updated successfully.');
    }

    public function settings()
    {
        $ticker_news = SiteSetting::where('key', 'ticker_news')->first()?->value;
        $deposit_accounts = PaymentAccount::where('type', 'deposit')->get();
        $withdraw_accounts = PaymentAccount::where('type', 'withdraw')->get();
        
        return view('admin.settings', compact('ticker_news', 'deposit_accounts', 'withdraw_accounts'));
    }

    public function updateSettings(Request $request)
    {
        if ($request->has('ticker_news')) {
            SiteSetting::updateOrCreate(['key' => 'ticker_news'], ['value' => $request->ticker_news]);
        }
        
        if ($request->has('admin_email')) {
            $request->validate([
                'admin_name' => 'required',
                'admin_email' => 'required|email|unique:users,email',
                'admin_password' => 'required|min:6',
            ]);
            
            User::create([
                'name' => $request->admin_name,
                'email' => $request->admin_email,
                'password' => \Illuminate\Support\Facades\Hash::make($request->admin_password),
                'role' => 'admin',
            ]);
        }

        return back()->with('success', 'Settings updated successfully.');
    }

    public function storeAccount(Request $request)
    {
        $data = $request->validate([
            'type' => 'required|in:deposit,withdraw',
            'provider' => 'required',
            'account_title' => 'required',
            'account_number' => 'required',
        ]);

        PaymentAccount::create($data);
        return back()->with('success', 'Account added successfully.');
    }

    public function deleteAccount(PaymentAccount $account)
    {
        $account->delete();
        return back()->with('success', 'Account deleted successfully.');
    }

    public function approveDeposit(Deposit $deposit)
    {
        if ($deposit->status === 'pending') {
            $deposit->update(['status' => 'approved']);
            $deposit->user->increment('balance', $deposit->amount);
            return back()->with('success', 'Deposit approved and balance added.');
        }
        return back()->with('error', 'Already processed.');
    }

    public function rejectDeposit(Deposit $deposit)
    {
        $deposit->update(['status' => 'rejected']);
        return back()->with('success', 'Deposit rejected.');
    }

    public function approveWithdrawal(Withdrawal $withdrawal)
    {
        if ($withdrawal->status === 'pending') {
            if ($withdrawal->user->balance >= $withdrawal->amount) {
                $withdrawal->update(['status' => 'approved']);
                $withdrawal->user->decrement('balance', $withdrawal->amount);
                return back()->with('success', 'Withdrawal approved and balance deducted.');
            }
            return back()->with('error', 'Insufficient user balance.');
        }
        return back()->with('error', 'Already processed.');
    }

    public function rejectWithdrawal(Withdrawal $withdrawal)
    {
        $withdrawal->update(['status' => 'rejected']);
        return back()->with('success', 'Withdrawal rejected.');
    }

    public function deposits()
    {
        $deposits = Deposit::with('user')->orderBy('created_at', 'desc')->get();
        return view('admin.deposits', compact('deposits'));
    }

    public function withdrawals()
    {
        $withdrawals = Withdrawal::with('user')->orderBy('created_at', 'desc')->get();
        return view('admin.withdrawals', compact('withdrawals'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/admin/login');
    }
}
