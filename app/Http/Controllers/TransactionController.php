<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaymentAccount;

use Illuminate\Support\Facades\Auth;
use App\Models\Deposit;
use App\Models\Withdrawal;

class TransactionController extends Controller
{
    public function deposit()
    {
        $accounts = PaymentAccount::where('type', 'deposit')->where('status', true)->get();
        return view('transactions.deposit', compact('accounts'));
    }

    public function withdraw()
    {
        $banks = PaymentAccount::where('type', 'withdraw')->where('status', true)->get();
        return view('transactions.withdraw', compact('banks'));
    }

    public function history()
    {
        $user = Auth::user();
        $deposits = Deposit::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();
        $withdrawals = Withdrawal::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();

        $transactions = $deposits->concat($withdrawals)->sortByDesc('created_at');

        return view('transactions.history', compact('transactions'));
    }

    public function storeDeposit(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:500',
            'method' => 'required|string',
            'screenshot' => 'required|image|mimes:jpeg,png,jpg|max:5120',
        ]);

        $path = null;
        if ($request->hasFile('screenshot')) {
            $path = $request->file('screenshot')->store('deposits', 'public');
        }

        Deposit::create([
            'user_id' => Auth::id(),
            'amount' => $request->amount,
            'method' => $request->method,
            'screenshot' => $path,
            'status' => 'pending',
        ]);

        return back()->with('success', 'Deposit request submitted successfully! Please wait for admin approval.');
    }

    public function storeWithdrawal(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1000',
            'bank_name' => 'required|string',
            'account_title' => 'required|string',
            'account_number' => 'required|string',
        ]);

        if (Auth::user()->balance < $request->amount) {
            return back()->with('error', 'Insufficient balance for this withdrawal request.');
        }

        Withdrawal::create([
            'user_id' => Auth::id(),
            'amount' => $request->amount,
            'bank_name' => $request->bank_name,
            'account_title' => $request->account_title,
            'account_number' => $request->account_number,
            'status' => 'pending',
        ]);

        return back()->with('success', 'Withdrawal request submitted successfully! It will be verified within 2-4 hours.');
    }
}
