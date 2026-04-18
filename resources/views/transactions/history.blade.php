@extends('layouts.user')

@section('title', 'Transaction History - WPCS Wallet')

@section('content')
    <div style="padding: 0 20px;">
        <a href="{{ route('dashboard') }}" class="back-btn" style="background: var(--card-bg); border: 1px solid var(--glass-border); width: 40px; height: 40px; border-radius: 10px; display: flex; align-items: center; justify-content: center; color: #fff; text-decoration: none; margin-bottom: 25px;">
            <i class="fas fa-arrow-left"></i>
        </a>

        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
            <h1 style="font-size: 1.5rem; font-weight: 700;">Transaction History</h1>
            <div style="background: var(--card-bg); padding: 5px 12px; border-radius: 20px; border: 1px solid var(--glass-border); font-size: 0.8rem; color: var(--text-secondary);">
                {{ $transactions->count() }} Total
            </div>
        </div>

        <div class="transactions-list">
            @forelse($transactions as $activity)
                @php
                    $isDeposit = $activity instanceof \App\Models\Deposit;
                    $type = $isDeposit ? 'Deposit' : 'Withdrawal';
                    $icon = $isDeposit ? 'fa-plus-circle' : 'fa-arrow-circle-up';
                    $class = $isDeposit ? 'deposit' : 'withdraw';
                    $colorClass = $isDeposit ? 'positive' : 'negative';
                    $symbol = $isDeposit ? '+' : '-';
                @endphp
                <div class="transaction-card" data-aos="fade-up">
                    <div class="tx-icon {{ $class }}" style="width: 45px; height: 45px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 1.1rem; @if($isDeposit) background: rgba(34, 197, 94, 0.1); color: #22C55E; @else background: rgba(239, 68, 68, 0.1); color: #EF4444; @endif">
                        <i class="fas {{ $icon }}"></i>
                    </div>
                    <div class="tx-info" style="flex: 1; margin-left: 15px;">
                        <h4 style="font-size: 0.95rem; margin-bottom: 4px;">{{ $type }} {{ ucfirst($activity->status) }}</h4>
                        <p style="font-size: 0.75rem; color: var(--text-secondary);">
                            {{ $isDeposit ? $activity->method : $activity->bank_name }} • {{ $activity->created_at->format('d M Y, h:i A') }}
                        </p>
                    </div>
                    <div class="tx-amount {{ $colorClass }}" style="text-align: right; @if($isDeposit) color: #22C55E; @else color: #EF4444; @endif">
                        <div style="font-weight: 700;">{{ $symbol }}Rs. {{ number_format($activity->amount, 0) }}</div>
                        <div class="tx-status status-{{ $activity->status }}" style="font-size: 0.7rem; padding: 2px 8px; border-radius: 20px; margin-top: 5px; display: inline-block; @if($activity->status == 'pending') background: rgba(234, 179, 8, 0.1); color: #EAB308; @elseif($activity->status == 'approved') background: rgba(34, 197, 94, 0.1); color: #22C55E; @else background: rgba(239, 68, 68, 0.1); color: #EF4444; @endif">
                            {{ ucfirst($activity->status) }}
                        </div>
                    </div>
                </div>
            @empty
                <div style="text-align: center; padding: 60px 20px; color: var(--text-secondary);">
                    <i class="fas fa-receipt" style="font-size: 3rem; opacity: 0.2; margin-bottom: 20px; display: block;"></i>
                    <p style="font-size: 0.9rem;">No transactions found yet.</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection

@section('styles')
<style>
    .transaction-card {
        background: var(--card-bg);
        border: 1px solid var(--glass-border);
        border-radius: 18px;
        padding: 15px;
        display: flex;
        align-items: center;
        margin-bottom: 15px;
        transition: 0.3s;
    }
</style>
@endsection
