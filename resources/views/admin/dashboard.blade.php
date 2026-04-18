@extends('admin.layout')

@section('title', 'Dashboard Overview')

@section('styles')
<style>
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 25px;
        margin-bottom: 40px;
    }

    .stat-card {
        background: var(--card-bg);
        border: 1px solid var(--border);
        border-radius: 20px;
        padding: 25px;
        position: relative;
        overflow: hidden;
    }

    .stat-card i {
        position: absolute;
        right: 20px;
        top: 20px;
        font-size: 2.5rem;
        opacity: 0.1;
        color: var(--accent);
    }

    .stat-label {
        color: var(--text-muted);
        font-size: 0.9rem;
        margin-bottom: 8px;
    }

    .stat-value {
        font-size: 1.8rem;
        font-weight: 700;
        color: var(--text-main);
    }

    .stat-trend {
        font-size: 0.75rem;
        margin-top: 10px;
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .trend-up { color: #22C55E; }
    .trend-down { color: #EF4444; }

    /* Tables */
    .data-card {
        background: var(--card-bg);
        border: 1px solid var(--border);
        border-radius: 20px;
        padding: 25px;
    }

    .card-title {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
    }

    .btn-view {
        font-size: 0.8rem;
        color: var(--accent);
        text-decoration: none;
        font-weight: 600;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th {
        text-align: left;
        font-size: 0.8rem;
        text-transform: uppercase;
        color: var(--text-muted);
        padding-bottom: 15px;
        border-bottom: 1px solid var(--border);
    }

    td {
        padding: 15px 0;
        border-bottom: 1px solid var(--border);
        font-size: 0.9rem;
    }

    .status-badge {
        padding: 4px 10px;
        border-radius: 8px;
        font-size: 0.75rem;
        font-weight: 600;
    }

    .status-pending { background: rgba(234, 179, 8, 0.1); color: #EAB308; }
    .status-approved { background: rgba(34, 197, 94, 0.1); color: #22C55E; }
    .status-rejected { background: rgba(239, 68, 68, 0.1); color: #EF4444; }

    .user-meta {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .user-initials {
        width: 30px;
        height: 30px;
        background: var(--accent);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.7rem;
        font-weight: 700;
    }

    @media (max-width: 1200px) {
        .stats-grid { grid-template-columns: repeat(2, 1fr); }
    }
    @media (max-width: 992px) {
        .stats-grid { grid-template-columns: 1fr; }
        .activity-grid { grid-template-columns: 1fr !important; }
    }
</style>
@endsection

@section('content')
    <!-- Stats Cards -->
    <div class="stats-grid">
        <div class="stat-card">
            <i class="fas fa-users"></i>
            <p class="stat-label">Total Users</p>
            <h2 class="stat-value">{{ number_format($stats['total_users']) }}</h2>
            <div class="stat-trend trend-up">
                <i class="fas fa-arrow-up"></i> 12% from last month
            </div>
        </div>

        <div class="stat-card">
            <i class="fas fa-money-bill-transfer"></i>
            <p class="stat-label">Pending Deposits</p>
            <h2 class="stat-value">{{ number_format($stats['pending_deposits']) }}</h2>
            <div class="stat-trend">
                <span style="color: var(--text-muted)">Awaiting Approval</span>
            </div>
        </div>

        <div class="stat-card">
            <i class="fas fa-paper-plane"></i>
            <p class="stat-label">Pending Withdrawals</p>
            <h2 class="stat-value">{{ number_format($stats['pending_withdrawals']) }}</h2>
            <div class="stat-trend">
                <span style="color: var(--text-muted)">Awaiting Action</span>
            </div>
        </div>

        <div class="stat-card">
            <i class="fas fa-wallet"></i>
            <p class="stat-label">Total Ecosystem Balance</p>
            <h2 class="stat-value">Rs. {{ number_format($stats['total_balance'], 2) }}</h2>
            <div class="stat-trend trend-up">
                <i class="fas fa-arrow-up"></i> 5.2% growth
            </div>
        </div>
    </div>

    <!-- Recent Activity Section -->
    <div class="activity-grid" style="display: grid; grid-template-columns: 2fr 1fr; gap: 25px;">
        <!-- Recent Users -->
        <div class="data-card">
            <div class="card-title">
                <h3>Latest Registered Users</h3>
                <a href="{{ route('admin.users') }}" class="view-all">View List</a>
            </div>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>WhatsApp</th>
                            <th>Joined</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recent_users ?? [] as $user)
                        <tr>
                            <td>
                                <div class="user-meta">
                                    <div class="user-initials">{{ substr($user->name, 0, 2) }}</div>
                                    <span>{{ $user->name }}</span>
                                </div>
                            </td>
                            <td>{{ $user->whatsapp_number }}</td>
                            <td>{{ $user->created_at->format('M d, Y') }}</td>
                            <td><span class="status-badge status-approved">Active</span></td>
                        </tr>
                        @empty
                        <tr><td colspan="4" style="text-align: center;">No users found</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- System Alerts / Shortcuts -->
        <div class="data-card">
            <div class="card-title">
                <h3>Admin Actions</h3>
            </div>
            <div style="display: flex; flex-direction: column; gap: 15px;">
                <button style="width: 100%; padding: 15px; background: var(--accent); border: none; border-radius: 12px; color: #fff; font-weight: 600; cursor: pointer;">
                    Update Ticker News
                </button>
                <button style="width: 100%; padding: 15px; background: rgba(59, 130, 246, 0.1); border: 1px solid var(--border); border-radius: 12px; color: var(--accent); font-weight: 600; cursor: pointer;">
                    Add Admin Account
                </button>
                <div style="margin-top: 15px; padding: 15px; background: rgba(234, 179, 8, 0.05); border: 1px solid rgba(234, 179, 8, 0.1); border-radius: 12px;">
                    <p style="font-size: 0.8rem; color: #EAB308;"><strong>System Alert:</strong> 12 deposits are pending longer than 4 hours.</p>
                </div>
            </div>
        </div>
    </div>

@endsection
