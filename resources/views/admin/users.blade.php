@extends('admin.layout')

@section('title', 'Registered Users')

@section('styles')
<style>
    .data-card {
        background: var(--card-bg);
        border: 1px solid var(--border);
        border-radius: 20px;
        padding: 25px;
    }

    .edit-balance-form {
        display: flex;
        gap: 10px;
    }

    .balance-input {
        background: rgba(0,0,0,0.2);
        border: 1px solid var(--border);
        border-radius: 8px;
        padding: 5px 10px;
        color: #fff;
        width: 120px;
        font-size: 0.85rem;
    }

    .update-btn {
        background: var(--accent);
        border: none;
        border-radius: 8px;
        padding: 5px 12px;
        color: #fff;
        font-size: 0.75rem;
        font-weight: 600;
        cursor: pointer;
    }

    .alert-success {
        background: rgba(34, 197, 94, 0.1);
        border: 1px solid rgba(34, 197, 94, 0.2);
        color: #22C55E;
        padding: 15px;
        border-radius: 12px;
        margin-bottom: 25px;
    }
</style>
@endsection

@section('content')
    @if(session('success'))
        <div class="alert-success">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
        </div>
    @endif

    <div class="data-card">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
            <h3>User Management</h3>
            <p style="color: var(--text-muted); font-size: 0.9rem;">Total active users: {{ $users->count() }}</p>
        </div>

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>User</th>
                        <th>WhatsApp</th>
                        <th>Joined</th>
                        <th>Balance (PKR)</th>
                        <th>Update Balance</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>
                            <div style="font-weight: 600;">{{ $user->name }}</div>
                            <div style="font-size: 0.75rem; color: var(--text-muted);">{{ $user->email }}</div>
                        </td>
                        <td>{{ $user->whatsapp_number }}</td>
                        <td>{{ $user->created_at->format('M d, Y') }}</td>
                        <td style="font-weight: 700;">{{ number_format($user->balance, 2) }}</td>
                        <td>
                            <form action="{{ route('admin.users.balance', $user->id) }}" method="POST" class="edit-balance-form">
                                @csrf
                                <input type="number" name="balance" value="{{ $user->balance }}" step="0.01" class="balance-input">
                                <button type="submit" class="update-btn">Save</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
