@extends('admin.layout')

@section('title', 'Withdrawal Requests')

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

    .empty-state {
        text-align: center;
        padding: 50px;
        color: var(--text-muted);
    }
</style>
@endsection

@section('content')
    <div class="data-card">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
            <h3>Process Withdrawals</h3>
            <div style="display: flex; gap: 10px;">
                <input type="text" placeholder="Search accounts..." style="background: rgba(0,0,0,0.2); border: 1px solid var(--border); border-radius: 8px; padding: 8px 15px; color: #fff; font-size: 0.85rem; outline: none;">
            </div>
        </div>

        @if($withdrawals->isEmpty())
            <div class="empty-state">
                <i class="fas fa-hand-holding-dollar" style="font-size: 3rem; margin-bottom: 15px; opacity: 0.3;"></i>
                <p>No withdrawal requests found.</p>
            </div>
        @else
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Amount</th>
                        <th>Bank/Wallet</th>
                        <th>Account Details</th>
                        <th>Date Requested</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($withdrawals as $withdrawal)
                    <tr>
                        <td>
                            <div style="font-weight: 600;">{{ $withdrawal->user->name }}</div>
                            <div style="font-size: 0.75rem; color: var(--text-muted);">{{ $withdrawal->user->email }}</div>
                        </td>
                        <td style="font-weight: 700; color: #FCA5A5;">Rs. {{ number_format($withdrawal->amount, 2) }}</td>
                        <td>{{ $withdrawal->bank_name }}</td>
                        <td>
                            <div style="font-size: 0.9rem;">{{ $withdrawal->account_title }}</div>
                            <div style="font-size: 0.8rem; color: var(--accent); font-weight: 600;">{{ $withdrawal->account_number }}</div>
                        </td>
                        <td>{{ $withdrawal->created_at->format('M d, Y H:i') }}</td>
                        <td>
                            <span class="status-badge status-{{ $withdrawal->status }}">
                                {{ ucfirst($withdrawal->status) }}
                            </span>
                        </td>
                        <td>
                            @if($withdrawal->status === 'pending')
                                <div style="display: flex; gap: 8px;">
                                    <form action="{{ route('admin.withdrawals.approve', $withdrawal->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="action-btn btn-approve" title="Approve">
                                            <i class="fas fa-check"></i> Approve
                                        </button>
                                    </form>
                                    <form action="{{ route('admin.withdrawals.reject', $withdrawal->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="action-btn btn-reject" title="Reject">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </form>
                                </div>
                            @else
                                <span style="font-size: 0.75rem; color: var(--text-muted);">Processed</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>
@endsection
