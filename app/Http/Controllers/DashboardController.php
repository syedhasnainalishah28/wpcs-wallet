<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Deposit;
use App\Models\Withdrawal;
use App\Models\SiteSetting;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $ticker_news = SiteSetting::where('key', 'ticker_news')->first()?->value ?? 'Welcome to WPCS Wallet';
        
        // Fetch last activity
        $deposits = Deposit::where('user_id', $user->id)->orderBy('created_at', 'desc')->take(5)->get();
        $withdrawals = Withdrawal::where('user_id', $user->id)->orderBy('created_at', 'desc')->take(5)->get();
        
        $recent_activity = $deposits->concat($withdrawals)->sortByDesc('created_at')->take(10);
        
        return view('dashboard', compact('user', 'ticker_news', 'recent_activity'));
    }
}
