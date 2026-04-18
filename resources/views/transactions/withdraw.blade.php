@extends('layouts.user')

@section('title', 'Withdraw - WPCS Wallet')

@section('content')
    <div style="padding: 0 20px;">
        <a href="/dashboard" class="back-btn" style="background: var(--card-bg); border: 1px solid var(--glass-border); width: 40px; height: 40px; border-radius: 10px; display: flex; align-items: center; justify-content: center; color: #fff; text-decoration: none; margin-bottom: 25px;">
            <i class="fas fa-arrow-left"></i>
        </a>

        @if(session('success'))
            <div style="background: rgba(34, 197, 94, 0.1); border: 1px solid rgba(34, 197, 94, 0.2); color: #22C55E; padding: 15px; border-radius: 12px; margin-bottom: 25px; font-size: 0.9rem;">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div style="background: rgba(239, 68, 68, 0.1); border: 1px solid rgba(239, 68, 68, 0.2); color: #FCA5A5; padding: 15px; border-radius: 12px; margin-bottom: 25px; font-size: 0.9rem;">
                <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
            </div>
        @endif

        <h1 class="page-title" style="font-size: 1.5rem; font-weight: 700; margin-bottom: 30px;">Withdraw Funds</h1>

        <!-- Balance Info -->
        <div style="background: var(--card-bg); border-radius: 15px; padding: 15px; margin-bottom: 20px; border: 1px solid var(--glass-border);">
            <p style="font-size: 0.8rem; color: #A0A0A0;">Available Balance</p>
            <h3 style="font-size: 1.2rem; margin-top: 5px;">PKR {{ number_format(Auth::user()->balance, 2) }}</h3>
        </div>

        <!-- Withdraw Form -->
        <form action="{{ route('withdraw.store') }}" method="POST" class="withdraw-form" style="background: var(--card-bg); border: 1px solid var(--glass-border); border-radius: 20px; padding: 25px; backdrop-filter: blur(10px);">
            @csrf
            <div class="form-group" style="margin-bottom: 20px;">
                <label style="display: block; font-size: 0.9rem; color: #A0A0A0; margin-bottom: 8px;">Amount (PKR)</label>
                <input type="number" name="amount" class="form-control" placeholder="Min: 1000" required min="1000" style="width: 100%; background: rgba(255, 255, 255, 0.03); border: 1px solid var(--glass-border); border-radius: 12px; padding: 15px; color: #fff; font-size: 1rem; outline: none;">
            </div>

            <div class="form-group" style="margin-bottom: 20px;">
                <label style="display: block; font-size: 0.9rem; color: #A0A0A0; margin-bottom: 8px;">Select Bank/Wallet</label>
                <select class="form-control" name="bank_name" required style="width: 100%; background: rgba(255, 255, 255, 0.03); border: 1px solid var(--glass-border); border-radius: 12px; padding: 15px; color: #fff; font-size: 1rem; outline: none; appearance: none;">
                    @forelse($banks as $bank)
                        <option value="{{ $bank->provider }}">{{ $bank->provider }}</option>
                    @empty
                        <option value="">No payout options</option>
                    @endforelse
                </select>
            </div>

            <div class="form-group" style="margin-bottom: 20px;">
                <label style="display: block; font-size: 0.9rem; color: #A0A0A0; margin-bottom: 8px;">Account Title</label>
                <input type="text" name="account_title" class="form-control" placeholder="Account Holder Name" required style="width: 100%; background: rgba(255, 255, 255, 0.03); border: 1px solid var(--glass-border); border-radius: 12px; padding: 15px; color: #fff; font-size: 1rem; outline: none;">
            </div>

            <div class="form-group" style="margin-bottom: 20px;">
                <label style="display: block; font-size: 0.9rem; color: #A0A0A0; margin-bottom: 8px;">Account Number</label>
                <input type="text" name="account_number" class="form-control" placeholder="IBAN or Mobile Number" required style="width: 100%; background: rgba(255, 255, 255, 0.03); border: 1px solid var(--glass-border); border-radius: 12px; padding: 15px; color: #fff; font-size: 1rem; outline: none;">
            </div>

            <button type="submit" class="submit-btn shadow-lg" style="width: 100%; padding: 16px; background: linear-gradient(135deg, #6366F1, var(--accent-purple)); border: none; border-radius: 15px; color: #fff; font-size: 1rem; font-weight: 600; cursor: pointer; transition: 0.3s; margin-top: 10px; box-shadow: 0 10px 20px rgba(139, 92, 246, 0.3);">Request Withdrawal</button>
        </form>

        <div class="warning-box" style="margin-top: 30px; background: rgba(239, 68, 68, 0.05); border: 1px solid rgba(239, 68, 68, 0.2); border-radius: 15px; padding: 15px; display: flex; gap: 15px; align-items: flex-start;">
            <i class="fas fa-exclamation-circle" style="color: #EF4444; font-size: 1.2rem; margin-top: 2px;"></i>
            <p style="font-size: 0.8rem; color: #A0A0A0; line-height: 1.5;">
                Please double check your account details. WPCS Wallet is not responsible for transfers to incorrect account numbers. 
                Withdrawals take <strong>2 to 4 hours</strong> for manual verification.
            </p>
        </div>
    </div>
@endsection
