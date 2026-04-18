<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    // Guest Admin Routes
    Route::middleware('guest')->group(function () {
        Route::get('/login', [AdminController::class, 'login'])->name('login');
        Route::post('/login', [AdminController::class, 'authenticate'])->name('authenticate');
    });

    // Protected Admin Routes
    Route::middleware('admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        
        // Users Management
        Route::get('/users', [AdminController::class, 'users'])->name('users');
        Route::post('/users/{user}/balance', [AdminController::class, 'updateUserBalance'])->name('users.balance');
        
        // Deposits & Withdrawals
        Route::get('/deposits', [AdminController::class, 'deposits'])->name('deposits');
        Route::post('/deposits/{deposit}/approve', [AdminController::class, 'approveDeposit'])->name('deposits.approve');
        Route::post('/deposits/{deposit}/reject', [AdminController::class, 'rejectDeposit'])->name('deposits.reject');
        
        Route::get('/withdrawals', [AdminController::class, 'withdrawals'])->name('withdrawals');
        Route::post('/withdrawals/{withdrawal}/approve', [AdminController::class, 'approveWithdrawal'])->name('withdrawals.approve');
        Route::post('/withdrawals/{withdrawal}/reject', [AdminController::class, 'rejectWithdrawal'])->name('withdrawals.reject');
        
        // Settings & Accounts
        Route::get('/settings', [AdminController::class, 'settings'])->name('settings');
        Route::post('/settings', [AdminController::class, 'updateSettings'])->name('settings.update');
        Route::post('/accounts', [AdminController::class, 'storeAccount'])->name('accounts.store');
        Route::delete('/accounts/{account}', [AdminController::class, 'deleteAccount'])->name('accounts.delete');
        
        Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
    });
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

// Protected User Routes
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/transactions/history', [TransactionController::class, 'history'])->name('transactions.history');
    Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
    Route::get('/deposit', [TransactionController::class, 'deposit'])->name('deposit');
    Route::get('/withdraw', [TransactionController::class, 'withdraw'])->name('withdraw');

    // POST routes for manual processing
    Route::post('/deposit', [TransactionController::class, 'storeDeposit'])->name('deposit.store');
    Route::post('/withdraw', [TransactionController::class, 'storeWithdrawal'])->name('withdraw.store');
    
    Route::post('/logout', function (Illuminate\Http\Request $request) {
        Illuminate\Support\Facades\Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    })->name('logout');
});

// Deployment & Maintenance Helpers (Secure)
Route::get('/deploy/{token}/{action}', function ($token, $action) {
    // Check if token matches DEPLOY_TOKEN in .env
    if ($token !== config('app.deploy_token', 'wpcs_deploy_786')) {
        return response()->json(['error' => 'Unauthorized token'], 401);
    }

    try {
        switch ($action) {
            case 'migrate':
                \Illuminate\Support\Facades\Artisan::call('migrate', ['--force' => true]);
                return "Database migrated successfully! <br><pre>" . \Illuminate\Support\Facades\Artisan::output() . "</pre>";
            
            case 'seed':
                \Illuminate\Support\Facades\Artisan::call('db:seed', ['--force' => true]);
                return "Database seeded successfully!";

            case 'clear':
                \Illuminate\Support\Facades\Artisan::call('cache:clear');
                \Illuminate\Support\Facades\Artisan::call('config:clear');
                \Illuminate\Support\Facades\Artisan::call('view:clear');
                \Illuminate\Support\Facades\Artisan::call('route:clear');
                return "All caches cleared successfully!";

            case 'link':
                \Illuminate\Support\Facades\Artisan::call('storage:link');
                return "Storage link created successfully!";

            case 'key':
                \Illuminate\Support\Facades\Artisan::call('key:generate');
                return "Application key generated successfully!";

            default:
                return "Invalid action selected.";
        }
    } catch (\Exception $e) {
        return "Error: " . $e->getMessage();
    }
});
