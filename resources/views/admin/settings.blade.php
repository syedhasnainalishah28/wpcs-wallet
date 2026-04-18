@extends('admin.layout')

@section('title', 'Admin Settings')

@section('styles')
<style>
    .settings-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 25px;
    }

    .settings-card {
        background: var(--card-bg);
        border: 1px solid var(--border);
        border-radius: 20px;
        padding: 25px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-label {
        display: block;
        font-size: 0.85rem;
        font-weight: 600;
        color: var(--text-muted);
        margin-bottom: 8px;
        text-transform: uppercase;
    }

    .form-input {
        width: 100%;
        background: rgba(0,0,0,0.2);
        border: 1px solid var(--border);
        border-radius: 12px;
        padding: 12px;
        color: #fff;
        outline: none;
        transition: 0.2s;
    }

    .form-input:focus {
        border-color: var(--accent);
    }

    .save-btn {
        width: 100%;
        padding: 12px;
        background: var(--accent);
        border: none;
        border-radius: 12px;
        color: #fff;
        font-weight: 600;
        cursor: pointer;
    }

    .account-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 12px;
        background: rgba(255,255,255,0.02);
        border: 1px solid var(--border);
        border-radius: 10px;
        margin-bottom: 10px;
    }

    .del-btn {
        color: #EF4444;
        background: none;
        border: none;
        cursor: pointer;
    }

    .inner-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 15px;
    }

    @media (max-width: 992px) {
        .settings-grid { grid-template-columns: 1fr; }
    }

    @media (max-width: 576px) {
        .inner-grid { grid-template-columns: 1fr; }
    }
</style>
@endsection

@section('content')
    @if(session('success'))
        <div style="background: rgba(34, 197, 94, 0.1); border: 1px solid rgba(34, 197, 94, 0.2); color: #22C55E; padding: 15px; border-radius: 12px; margin-bottom: 25px;">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
        </div>
    @endif

    <div class="settings-grid">
        <!-- Ticker News -->
        <div class="settings-card">
            <h3><i class="fas fa-bullhorn" style="margin-right: 10px; color: var(--accent);"></i> News Ticker Management</h3>
            <p style="color: var(--text-muted); font-size: 0.85rem; margin-bottom: 20px;">Update the scrolling text shown globally on user dashboards.</p>
            
            <form action="{{ route('admin.settings.update') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="form-label">Ticker Text</label>
                    <textarea name="ticker_news" class="form-input" rows="4" placeholder="Enter marquee text...">{{ $ticker_news }}</textarea>
                </div>
                <button type="submit" class="save-btn">Update Ticker</button>
            </form>
        </div>

        <!-- Add Admin -->
        <div class="settings-card">
            <h3><i class="fas fa-user-shield" style="margin-right: 10px; color: var(--accent);"></i> Create New Admin</h3>
            <p style="color: var(--text-muted); font-size: 0.85rem; margin-bottom: 20px;">Grant admin access to a new user account.</p>
            
            <form action="{{ route('admin.settings.update') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="form-label">Name</label>
                    <input type="text" name="admin_name" class="form-input" placeholder="Admin Name" required>
                </div>
                <div class="inner-grid">
                    <div class="form-group">
                        <label class="form-label">Email</label>
                        <input type="email" name="admin_email" class="form-input" placeholder="admin@example.com" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Password</label>
                        <input type="password" name="admin_password" class="form-input" placeholder="••••••••" required>
                    </div>
                </div>
                <button type="submit" class="save-btn">Create Admin account</button>
            </form>
        </div>

        <!-- Payment Accounts (Deposit) -->
        <div class="settings-card">
            <h3><i class="fas fa-arrow-down-long" style="margin-right: 10px; color: #22C55E;"></i> Deposit Accounts</h3>
            <p style="color: var(--text-muted); font-size: 0.85rem; margin-bottom: 20px;">Manage accounts where users will send money.</p>
            
            <div style="margin-bottom: 25px;">
                @foreach($deposit_accounts as $acc)
                    <div class="account-item">
                        <div>
                            <div style="font-weight: 600;">{{ $acc->provider }} - {{ $acc->account_title }}</div>
                            <div style="font-size: 0.75rem; color: var(--text-muted);">{{ $acc->account_number }}</div>
                        </div>
                        <form action="{{ route('admin.accounts.delete', $acc->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="del-btn"><i class="fas fa-trash"></i></button>
                        </form>
                    </div>
                @endforeach
            </div>

            <hr style="border: 0; border-top: 1px solid var(--border); margin: 25px 0;">
            
            <form action="{{ route('admin.accounts.store') }}" method="POST">
                @csrf
                <input type="hidden" name="type" value="deposit">
                <div class="form-group">
                    <label class="form-label">Provider (Bank/E-Wallet Name)</label>
                    <input type="text" name="provider" class="form-input" placeholder="e.g. EasyPaisa, HBL" required>
                </div>
                <div class="inner-grid">
                    <div class="form-group">
                        <label class="form-label">Account Title</label>
                        <input type="text" name="account_title" class="form-input" placeholder="Account Name" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Account Number</label>
                        <input type="text" name="account_number" class="form-input" placeholder="03120000000" required>
                    </div>
                </div>
                <button type="submit" class="save-btn" style="background: rgba(34, 197, 94, 0.1); color: #22C55E; border: 1px solid #22C55E;">Add Deposit Account</button>
            </form>
        </div>

        <!-- Payment Accounts (Withdrawal) -->
        <div class="settings-card">
            <h3><i class="fas fa-arrow-up-long" style="margin-right: 10px; color: #FCA5A5;"></i> Withdrawal Options</h3>
            <p style="color: var(--text-muted); font-size: 0.85rem; margin-bottom: 20px;">Define banks or wallets users can withdraw to.</p>
            
            <div style="margin-bottom: 25px;">
                @foreach($withdraw_accounts as $acc)
                    <div class="account-item">
                        <div>
                            <div style="font-weight: 600;">{{ $acc->provider }}</div>
                        </div>
                        <form action="{{ route('admin.accounts.delete', $acc->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="del-btn"><i class="fas fa-trash"></i></button>
                        </form>
                    </div>
                @endforeach
            </div>

            <hr style="border: 0; border-top: 1px solid var(--border); margin: 25px 0;">
            
            <form action="{{ route('admin.accounts.store') }}" method="POST">
                @csrf
                <input type="hidden" name="type" value="withdraw">
                <input type="hidden" name="account_title" value="Default">
                <input type="hidden" name="account_number" value="N/A">
                <div class="form-group">
                    <label class="form-label">Bank/Wallet Provider Name</label>
                    <input type="text" name="provider" class="form-input" placeholder="e.g. JazzCash" required>
                </div>
                <button type="submit" class="save-btn" style="background: rgba(239, 68, 68, 0.1); color: #FCA5A5; border: 1px solid #FCA5A5;">Add Withdrawal Method</button>
            </form>
        </div>
    </div>
@endsection
