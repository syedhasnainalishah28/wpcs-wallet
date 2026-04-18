@extends('layouts.user')

@section('title', 'Deposit - WPCS Wallet')

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

        <h1 class="page-title" style="font-size: 1.5rem; font-weight: 700; margin-bottom: 30px;">Deposit Funds</h1>

        <!-- Admin Accounts -->
        <div class="accounts-info" style="margin-top: 30px;">
            <p style="font-size: 0.8rem; color: #A0A0A0; margin-bottom: 10px;">Transfer to any of these accounts:</p>
            
            @forelse($accounts as $acc)
                <div class="account-card" style="background: var(--card-bg); border: 1px solid var(--glass-border); border-radius: 15px; padding: 15px; margin-bottom: 15px; display: flex; justify-content: space-between; align-items: center;">
                    <div class="acc-details">
                        <h4 style="font-size: 0.9rem; color: var(--accent-gold); margin-bottom: 5px;">{{ $acc->provider }}</h4>
                        <p style="font-size: 0.85rem; color: #fff;">{{ $acc->account_title }} • {{ $acc->account_number }}</p>
                    </div>
                    <button class="copy-btn" onclick="copyText('{{ $acc->account_number }}')" style="background: rgba(255, 255, 255, 0.1); border: none; padding: 8px 12px; border-radius: 8px; color: #fff; font-size: 0.8rem; cursor: pointer;">Copy</button>
                </div>
            @empty
                <p style="text-align: center; color: var(--text-muted); font-size: 0.8rem;">No accounts available.</p>
            @endforelse
        </div>

        <!-- Deposit Form -->
        <form action="{{ route('deposit.store') }}" method="POST" enctype="multipart/form-data" class="deposit-form" style="background: var(--card-bg); border: 1px solid var(--glass-border); border-radius: 20px; padding: 25px; backdrop-filter: blur(10px);">
            @csrf
            <div class="form-group" style="margin-bottom: 20px;">
                <label style="display: block; font-size: 0.9rem; color: #A0A0A0; margin-bottom: 8px;">Payment Method</label>
                <select class="form-control" name="method" required style="width: 100%; background: rgba(255, 255, 255, 0.03); border: 1px solid var(--glass-border); border-radius: 12px; padding: 15px; color: #fff; font-size: 1rem; outline: none; appearance: none;">
                    @foreach($accounts->pluck('provider')->unique() as $provider)
                        <option value="{{ $provider }}">{{ $provider }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group" style="margin-bottom: 20px;">
                <label style="display: block; font-size: 0.9rem; color: #A0A0A0; margin-bottom: 8px;">Amount (PKR)</label>
                <input type="number" name="amount" class="form-control" placeholder="Min: 500" required min="500" style="width: 100%; background: rgba(255, 255, 255, 0.03); border: 1px solid var(--glass-border); border-radius: 12px; padding: 15px; color: #fff; font-size: 1rem; outline: none;">
            </div>

            <div class="form-group" style="margin-bottom: 20px;">
                <label style="display: block; font-size: 0.9rem; color: #A0A0A0; margin-bottom: 8px;">Upload Screenshot (Proof)</label>
                <div class="file-upload-wrapper" style="position: relative; width: 100%; height: 150px; border: 2px dashed var(--glass-border); border-radius: 15px; display: flex; flex-direction: column; align-items: center; justify-content: center; cursor: pointer; overflow: hidden;">
                    <i class="fas fa-cloud-upload-alt" id="upload-icon" style="font-size: 2rem; color: var(--accent-purple); margin-bottom: 10px;"></i>
                    <p id="upload-text" style="font-size: 0.8rem; color: #A0A0A0;">Click to upload screenshot</p>
                    <img id="preview-img" src="" style="max-width: 100%; max-height: 100%; display: none; object-fit: contain;">
                    <input type="file" name="screenshot" accept="image/*" required onchange="previewFile(this)" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; opacity: 0; cursor: pointer;">
                </div>
            </div>

            <button type="submit" class="submit-btn shadow-lg" style="width: 100%; padding: 16px; background: linear-gradient(135deg, var(--accent-purple), #6366F1); border: none; border-radius: 15px; color: #fff; font-size: 1rem; font-weight: 600; cursor: pointer; transition: 0.3s; margin-top: 10px; box-shadow: 0 10px 20px rgba(139, 92, 246, 0.3);">Submit Deposit</button>
        </form>
    </div>
@endsection

@section('scripts')
<script>
    function previewFile(input) {
        const file = input.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('preview-img').src = e.target.result;
                document.getElementById('preview-img').style.display = 'block';
                document.getElementById('upload-icon').style.display = 'none';
                document.getElementById('upload-text').style.display = 'none';
            }
            reader.readAsDataURL(file);
        }
    }

    function copyText(text) {
        navigator.clipboard.writeText(text);
        alert('Account number copied!');
    }
</script>
@endsection
