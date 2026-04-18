<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | Admin Control</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --bg-body: #08080F;
            --sidebar-bg: #0F172A;
            --card-bg: rgba(255, 255, 255, 0.03);
            --accent: #3B82F6;
            --border: rgba(255, 255, 255, 0.08);
            --text-main: #F8FAFC;
            --text-muted: #94A3B8;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Outfit', sans-serif;
        }

        body {
            background-color: var(--bg-body);
            color: var(--text-main);
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 260px;
            background: var(--sidebar-bg);
            border-right: 1px solid var(--border);
            display: flex;
            flex-direction: column;
            position: fixed;
            height: 100vh;
            z-index: 100;
        }

        .sidebar-header {
            padding: 30px 25px;
            display: flex;
            align-items: center;
            gap: 12px;
            border-bottom: 1px solid var(--border);
        }

        .logo-box {
            width: 40px;
            height: 40px;
            background: var(--accent);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            color: #fff;
        }

        .sidebar-header h2 {
            font-size: 1.1rem;
            font-weight: 700;
        }

        .sidebar-menu {
            padding: 20px;
            flex-grow: 1;
            list-style: none;
        }

        .menu-label {
            font-size: 0.75rem;
            text-transform: uppercase;
            color: var(--text-muted);
            letter-spacing: 1px;
            margin: 20px 0 10px 10px;
        }

        .menu-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 15px;
            color: var(--text-muted);
            text-decoration: none;
            border-radius: 12px;
            transition: 0.3s;
            margin-bottom: 5px;
            font-weight: 500;
        }

        .menu-link:hover, .menu-link.active {
            background: rgba(59, 130, 246, 0.1);
            color: var(--accent);
        }

        .menu-link i {
            width: 20px;
            font-size: 1.1rem;
        }

        .sidebar-footer {
            padding: 20px;
            border-top: 1px solid var(--border);
        }

        .logout-btn {
            width: 100%;
            padding: 12px;
            background: rgba(239, 68, 68, 0.1);
            border: 1px solid rgba(239, 68, 68, 0.2);
            color: #FCA5A5;
            border-radius: 12px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            font-weight: 600;
            transition: 0.3s;
        }

        .logout-btn:hover {
            background: rgba(239, 68, 68, 0.2);
        }

        /* Main Content */
        main {
            flex-grow: 1;
            margin-left: 260px;
            padding: 40px;
            transition: 0.3s;
        }

        .mobile-toggle {
            display: none;
            background: var(--card-bg);
            border: 1px solid var(--border);
            color: #fff;
            padding: 10px;
            border-radius: 8px;
            cursor: pointer;
            z-index: 1000;
        }

        .header-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 40px;
            gap: 15px;
        }

        .header-title h1 {
            font-size: 1.8rem;
            font-weight: 700;
        }

        .header-title p {
            color: var(--text-muted);
            font-size: 0.95rem;
        }

        /* Responsive Tables */
        .table-container {
            width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            margin-top: 20px;
        }

        /* Tables */
        table {
            min-width: 800px; /* Force minimum width to allow scrolling instead of squeezing */
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 12px;
            margin-top: -12px;
        }

        th {
            text-align: left;
            padding: 15px 20px;
            color: var(--text-muted);
            font-size: 0.85rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        td {
            padding: 20px;
            background: rgba(255, 255, 255, 0.02);
            border-top: 1px solid var(--border);
            border-bottom: 1px solid var(--border);
            font-size: 0.95rem;
        }

        td:first-child {
            border-left: 1px solid var(--border);
            border-radius: 15px 0 0 15px;
        }

        td:last-child {
            border-right: 1px solid var(--border);
            border-radius: 0 15px 15px 0;
        }

        .status-badge {
            padding: 6px 14px;
            border-radius: 8px;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .status-pending { background: rgba(245, 158, 11, 0.1); color: #F59E0B; }
        .status-approved { background: rgba(34, 197, 94, 0.1); color: #22C55E; }
        .status-rejected { background: rgba(239, 68, 68, 0.1); color: #EF4444; }

        .pfp {
            width: 40px;
            height: 40px;
            background: var(--accent);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            color: #fff;
        }

        .sidebar-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 99;
            display: none;
        }

        .sidebar-overlay.active {
            display: block;
        }

        @media (max-width: 992px) {
            .sidebar { transform: translateX(-100%); transition: 0.4s cubic-bezier(0.4, 0, 0.2, 1); }
            .sidebar.active { transform: translateX(0); }
            main { margin-left: 0; padding: 15px; padding-top: 80px; width: 100%; overflow-x: hidden; }
            .mobile-toggle { display: block; position: fixed; top: 20px; left: 20px; box-shadow: 0 4px 12px rgba(0,0,0,0.4); }
            .header-top { flex-direction: column; align-items: flex-start; gap: 20px; }
            .admin-profile { width: 100%; justify-content: space-between; padding: 15px; background: var(--card-bg); border-radius: 15px; }
            .header-title h1 { font-size: 1.5rem; }
        }
    </style>
    @yield('styles')
</head>
<body>

    <div class="sidebar-overlay" id="overlay" onclick="toggleSidebar()"></div>

    <button class="mobile-toggle" onclick="toggleSidebar()">
        <i class="fas fa-bars"></i>
    </button>

    <aside class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <h2>WPCS Admin</h2>
        </div>

        <nav class="sidebar-menu">
            <div class="menu-label">Main Console</div>
            <a href="{{ route('admin.dashboard') }}" class="menu-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fas fa-chart-line"></i> Dashboard
            </a>
            
            <div class="menu-label">Financial Management</div>
            <a href="{{ route('admin.deposits') }}" class="menu-link {{ request()->routeIs('admin.deposits') ? 'active' : '' }}">
                <i class="fas fa-arrow-down-long"></i> Deposits
            </a>
            <a href="{{ route('admin.withdrawals') }}" class="menu-link {{ request()->routeIs('admin.withdrawals') ? 'active' : '' }}">
                <i class="fas fa-arrow-up-long"></i> Withdrawals
            </a>

            <div class="menu-label">User Management</div>
            <a href="{{ route('admin.users') }}" class="menu-link {{ request()->routeIs('admin.users') ? 'active' : '' }}">
                <i class="fas fa-users"></i> Users List
            </a>
            <a href="{{ route('admin.settings') }}" class="menu-link {{ request()->routeIs('admin.settings') ? 'active' : '' }}">
                <i class="fas fa-gear"></i> Settings
            </a>
        </nav>

        <div class="sidebar-footer">
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="logout-btn">
                    <i class="fas fa-power-off"></i> Logout
                </button>
            </form>
        </div>
    </aside>

    <main>
        <div class="header-top">
            <div class="header-title">
                <h1>@yield('title', 'Admin Overview')</h1>
                <p>Manage WPCS Wallet ecosystem</p>
            </div>
            <div class="admin-profile">
                <div class="profile-info">
                    <h4>Admin Shah</h4>
                    <p>Super Admin</p>
                </div>
                <div class="pfp">AS</div>
            </div>
        </div>

        @yield('content')
    </main>

    <script>
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('active');
            document.getElementById('overlay').classList.toggle('active');
        }
    </script>
    @yield('scripts')
</body>
</html>
