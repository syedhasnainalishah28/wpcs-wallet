@extends('layouts.user')

@section('title', 'Dashboard - WPCS Wallet')

@section('content')
    <!-- Balance Card -->
    <div class="balance-card" data-aos="fade-up">
        <p class="card-label">Your Deposit Amount</p>
        <h1 class="card-balance"><span>PKR</span> {{ number_format(Auth::user()->balance, 2) }}</h1>
        <div class="card-actions">
            <button class="action-btn btn-deposit" onclick="window.location.href='/deposit'">
                <i class="fas fa-plus"></i> Deposit
            </button>
            <button class="action-btn btn-withdraw" onclick="window.location.href='/withdraw'">
                <i class="fas fa-arrow-up"></i> Withdraw
            </button>
        </div>
    </div>

    <!-- BP Account Status Card -->
    <div class="status-card" data-aos="fade-up" data-aos-delay="100">
        <div class="bp-logo-box">BP</div>
        <div class="status-info">
            <div class="status-line">
                <h4>Username</h4>
                <p>Available in less than 10 minutes</p>
            </div>
            <div class="status-line">
                <h4>Password</h4>
                <p>Available in less than 10 minutes</p>
            </div>
        </div>
        <i class="fas fa-wallet wallet-icon-corner"></i>
    </div>

    <!-- Quick Shortcuts -->
    <div class="section-title">
        Quick Services
    </div>
    <div class="shortcuts-grid">
        <a href="https://bpexch.live/" class="shortcut-item">
            <div class="icon-box"><i class="fas fa-gamepad"></i></div>
            <p>Bpexch</p>
        </a>
        <a href="/deposit" class="shortcut-item">
            <div class="icon-box"><i class="fas fa-wallet"></i></div>
            <p>Deposit</p>
        </a>
        <a href="/withdraw" class="shortcut-item">
            <div class="icon-box"><i class="fas fa-money-bill-transfer"></i></div>
            <p>Withdraw</p>
        </a>
        <a href="https://wa.me/923047244398" class="shortcut-item">
            <div class="icon-box"><i class="fab fa-whatsapp"></i></div>
            <p>Support</p>
        </a>
    </div>

    <!-- Recent Transactions -->
    <div class="section-title">
        Recent Activity
        <a href="{{ route('transactions.history') }}" class="view-all">See All</a>
    </div>
    <div class="transactions-list">
        @forelse($recent_activity as $activity)
            @php
                $isDeposit = $activity instanceof \App\Models\Deposit;
                $type = $isDeposit ? 'Deposit' : 'Withdrawal';
                $icon = $isDeposit ? 'fa-plus-circle' : 'fa-arrow-circle-up';
                $class = $isDeposit ? 'deposit' : 'withdraw';
                $colorClass = $isDeposit ? 'positive' : 'negative';
                $symbol = $isDeposit ? '+' : '-';
            @endphp
            <div class="transaction-card" data-aos="fade-left">
                <div class="tx-icon {{ $class }}">
                    <i class="fas {{ $icon }}"></i>
                </div>
                <div class="tx-info">
                    <h4>{{ $type }} {{ ucfirst($activity->status) }}</h4>
                    <p>{{ $isDeposit ? $activity->method : $activity->bank_name }} • {{ $activity->created_at->format('d M Y') }}</p>
                </div>
                <div class="tx-amount {{ $colorClass }}">
                    {{ $symbol }}Rs. {{ number_format($activity->amount, 0) }}
                    <div class="tx-status status-{{ $activity->status }}">{{ ucfirst($activity->status) }}</div>
                </div>
            </div>
        @empty
            <div style="text-align: center; padding: 20px; color: var(--text-secondary); font-size: 0.9rem;">
                No recent transactions.
            </div>
        @endforelse
    </div>
@endsection
