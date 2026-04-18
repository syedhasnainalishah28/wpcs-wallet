@extends('admin.layout')

@section('title', 'Deposit Requests')

@section('styles')
<style>
    .data-card {
        background: var(--card-bg);
        border: 1px solid var(--border);
        border-radius: 20px;
        padding: 25px;
    }

    .action-btn {
        padding: 6px 12px;
        border-radius: 8px;
        border: none;
        font-size: 0.75rem;
        font-weight: 600;
        cursor: pointer;
        transition: 0.2s;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 5px;
    }

    .btn-approve { background: rgba(34, 197, 94, 0.1); color: #22C55E; }
    .btn-approve:hover { background: #22C55E; color: #fff; }

    .btn-reject { background: rgba(239, 68, 68, 0.1); color: #EF4444; }
    .btn-reject:hover { background: #EF4444; color: #fff; }

    .btn-view { background: rgba(59, 130, 246, 0.1); color: #3B82F6; }
    .btn-view:hover { background: #3B82F6; color: #fff; }

    .empty-state {
        text-align: center;
        padding: 50px;
        color: var(--text-muted);
    }

    .preview-modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.8);
        z-index: 2000;
        justify-content: center;
        align-items: center;
        backdrop-filter: blur(10px);
    }

    .preview-content {
        max-width: 90%;
        max-height: 90%;
        position: relative;
    }

    .preview-content img {
        max-width: 100%;
        max-height: 80vh;
        border-radius: 12px;
        box-shadow: 0 0 50px rgba(0,0,0,0.5);
    }

    .close-modal {
        position: absolute;
        top: -40px;
        right: 0;
        color: #fff;
        font-size: 1.5rem;
        cursor: pointer;
    }
</style>
@endsection

@section('content')
    <div class="data-card">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
            <h3>Manage Manual Deposits</h3>
            <div style="display: flex; gap: 10px;">
                <input type="text" placeholder="Search by user or amount..." style="background: rgba(0,0,0,0.2); border: 1px solid var(--border); border-radius: 8px; padding: 8px 15px; color: #fff; font-size: 0.85rem; outline: none;">
            </div>
        </div>

        @if($deposits->isEmpty())
            <div class="empty-state">
                <i class="fas fa-box-open" style="font-size: 3rem; margin-bottom: 15px; opacity: 0.3;"></i>
                <p>No deposit requests found.</p>
            </div>
        @else
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Amount</th>
                        <th>Method</th>
                        <th>Date</th>
                        <th>Proof</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($deposits as $deposit)
                    <tr>
                        <td>
                            <div style="font-weight: 600;">{{ $deposit->user->name }}</div>
                            <div style="font-size: 0.75rem; color: var(--text-muted);">{{ $deposit->user->email }}</div>
                        </td>
                        <td style="font-weight: 700;">Rs. {{ number_format($deposit->amount, 2) }}</td>
                        <td>{{ $deposit->method }}</td>
                        <td>{{ $deposit->created_at->format('M d, Y H:i') }}</td>
                        <td>
                            @if($deposit->screenshot)
                                <button class="action-btn btn-view" onclick="showPreview('{{ asset('storage/' . $deposit->screenshot) }}')">
                                    <i class="fas fa-image"></i> View
                                </button>
                            @else
                                <span style="font-size: 0.75rem; color: var(--text-muted);">No proof</span>
                            @endif
                        </td>
                        <td>
                            <span class="status-badge status-{{ $deposit->status }}">
                                {{ ucfirst($deposit->status) }}
                            </span>
                        </td>
                        <td>
                            @if($deposit->status === 'pending')
                                <div style="display: flex; gap: 8px;">
                                    <form action="{{ route('admin.deposits.approve', $deposit->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="action-btn btn-approve" title="Approve">
                                            <i class="fas fa-check"></i>
                                        </button>
                                    </form>
                                    <form action="{{ route('admin.deposits.reject', $deposit->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="action-btn btn-reject" title="Reject">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </form>
                                </div>
                            @else
                                <span style="font-size: 0.75rem; color: var(--text-muted);">Decided</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>

    <!-- Image Preview Modal -->
    <div class="preview-modal" id="previewModal">
        <div class="preview-content">
            <span class="close-modal" onclick="closePreview()"><i class="fas fa-times"></i></span>
            <img src="" id="previewImg">
            <p style="text-align: center; margin-top: 15px; color: var(--text-muted);">Screenshot Proof</p>
        </div>
    </div>

@endsection

@section('scripts')
<script>
    function showPreview(url) {
        document.getElementById('previewImg').src = url;
        document.getElementById('previewModal').style.display = 'flex';
    }

    function closePreview() {
        document.getElementById('previewModal').style.display = 'none';
    }

    // Close on click outside
    window.onclick = function(event) {
        if (event.target == document.getElementById('previewModal')) {
            closePreview();
        }
    }
</script>
@endsection
