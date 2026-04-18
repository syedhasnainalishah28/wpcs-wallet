@extends('layouts.user')

@section('title', 'My Profile - WPCS Wallet')

@section('content')
    <div style="padding: 0 20px;">
        <a href="{{ route('dashboard') }}" class="back-btn" style="background: var(--card-bg); border: 1px solid var(--glass-border); width: 40px; height: 40px; border-radius: 10px; display: flex; align-items: center; justify-content: center; color: #fff; text-decoration: none; margin-bottom: 25px;">
            <i class="fas fa-arrow-left"></i>
        </a>

        <div class="profile-header" data-aos="fade-up" style="text-align: center; margin-bottom: 30px;">
            <div class="profile-avatar" style="width: 100px; height: 100px; background: linear-gradient(135deg, var(--accent-purple), #6366F1); border-radius: 30px; display: flex; align-items: center; justify-content: center; margin: 0 auto 15px; font-size: 2.5rem; color: #fff; box-shadow: 0 15px 35px rgba(139, 92, 246, 0.3); border: 4px solid var(--bg-color);">
                {{ substr(Auth::user()->name, 0, 1) }}
            </div>
            <h1 style="font-size: 1.5rem; font-weight: 700;">{{ Auth::user()->name }}</h1>
            <p style="color: var(--text-secondary); font-size: 0.9rem;">Member since {{ Auth::user()->created_at->format('M Y') }}</p>
        </div>

        <!-- Info Cards -->
        <div class="info-grid" data-aos="fade-up" data-aos-delay="100" style="display: grid; gap: 15px; margin-bottom: 30px;">
            <div class="info-item" style="background: var(--card-bg); border: 1px solid var(--glass-border); border-radius: 18px; padding: 15px; display: flex; align-items: center; gap: 15px;">
                <div style="width: 40px; height: 40px; background: rgba(139, 92, 246, 0.1); border-radius: 10px; display: flex; align-items: center; justify-content: center; color: var(--accent-purple);">
                    <i class="fas fa-envelope"></i>
                </div>
                <div>
                    <p style="font-size: 0.75rem; color: var(--text-secondary);">Email Address</p>
                    <p style="font-size: 0.95rem; font-weight: 500;">{{ Auth::user()->email }}</p>
                </div>
            </div>

            <div class="info-item" style="background: var(--card-bg); border: 1px solid var(--glass-border); border-radius: 18px; padding: 15px; display: flex; align-items: center; gap: 15px;">
                <div style="width: 40px; height: 40px; background: rgba(37, 211, 102, 0.1); border-radius: 10px; display: flex; align-items: center; justify-content: center; color: #25D366;">
                    <i class="fab fa-whatsapp"></i>
                </div>
                <div>
                    <p style="font-size: 0.75rem; color: var(--text-secondary);">WhatsApp Number</p>
                    <p style="font-size: 0.95rem; font-weight: 500;">{{ Auth::user()->whatsapp_number }}</p>
                </div>
            </div>

            <div class="info-item" style="background: var(--card-bg); border: 1px solid var(--glass-border); border-radius: 18px; padding: 15px; display: flex; align-items: center; gap: 15px;">
                <div style="width: 40px; height: 40px; background: rgba(255, 215, 0, 0.1); border-radius: 10px; display: flex; align-items: center; justify-content: center; color: var(--accent-gold);">
                    <i class="fas fa-wallet"></i>
                </div>
                <div>
                    <p style="font-size: 0.75rem; color: var(--text-secondary);">Current Balance</p>
                    <p style="font-size: 0.95rem; font-weight: 600;">Rs. {{ number_format(Auth::user()->balance, 2) }}</p>
                </div>
            </div>
        </div>

        <!-- Logout Section -->
        <div data-aos="fade-up" data-aos-delay="200">
            <button onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="width: 100%; padding: 16px; background: rgba(239, 68, 68, 0.05); border: 1px solid rgba(239, 68, 68, 0.2); border-radius: 15px; color: #EF4444; font-size: 1rem; font-weight: 600; cursor: pointer; transition: 0.3s; display: flex; align-items: center; justify-content: center; gap: 10px;">
                <i class="fas fa-sign-out-alt"></i> Logout Account
            </button>
        </div>
    </div>
@endsection
