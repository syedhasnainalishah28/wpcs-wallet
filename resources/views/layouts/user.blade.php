<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'WPCS Wallet')</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <!-- AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    
    <style>
        :root {
            --bg-color: #08080F;
            --card-bg: rgba(255, 255, 255, 0.05);
            --accent-purple: #8B5CF6;
            --accent-gold: #FFD700;
            --text-primary: #FFFFFF;
            --text-secondary: #A0A0A0;
            --glass-border: rgba(255, 255, 255, 0.1);
            --bottom-nav-height: 70px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Outfit', sans-serif;
            -webkit-tap-highlight-color: transparent;
        }

        body {
            background-color: var(--bg-color);
            color: var(--text-primary);
            overflow-x: hidden;
            padding-bottom: calc(var(--bottom-nav-height) + 20px);
        }

        /* News Ticker */
        .ticker-container {
            width: 100%;
            background: linear-gradient(90deg, #1A1A2E, #0F3460);
            padding: 8px 0;
            position: fixed;
            top: 0;
            z-index: 1000;
            overflow: hidden;
            border-bottom: 1px solid var(--glass-border);
        }

        .ticker-wrap {
            display: flex;
            white-space: nowrap;
            animation: ticker 25s linear infinite;
        }

        .ticker-item {
            padding: 0 40px;
            color: var(--accent-gold);
            font-size: 0.9rem;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        @keyframes ticker {
            0% { transform: translateX(100%); }
            100% { transform: translateX(-100%); }
        }

        /* Header */
        header {
            padding: 60px 20px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .user-info h2 {
            font-size: 0.9rem;
            color: var(--text-secondary);
            font-weight: 400;
        }

        .user-info p {
            font-size: 1.2rem;
            font-weight: 600;
            background: linear-gradient(to right, #fff, var(--accent-purple));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .menu-btn {
            background: var(--card-bg);
            border: 1px solid var(--glass-border);
            width: 45px;
            height: 45px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 1.2rem;
            cursor: pointer;
            transition: 0.3s;
        }

        .menu-btn:active {
            transform: scale(0.9);
        }

        /* Sidebar drawer */
        .sidebar {
            position: fixed;
            top: 0;
            left: -300px;
            width: 280px;
            height: 100%;
            background: rgba(8, 8, 15, 0.95);
            backdrop-filter: blur(20px);
            z-index: 2000;
            transition: 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            border-right: 1px solid var(--glass-border);
            padding: 40px 20px;
        }

        .sidebar.active {
            left: 0;
        }

        .sidebar-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1999;
            display: none;
        }

        .sidebar-overlay.active {
            display: block;
        }

        .sidebar-header {
            margin-bottom: 40px;
            text-align: center;
        }

        .sidebar-logo {
            width: 80px;
            margin-bottom: 15px;
        }

        .sidebar-menu {
            list-style: none;
        }

        .sidebar-item {
            margin-bottom: 15px;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 15px;
            color: var(--text-secondary);
            text-decoration: none;
            border-radius: 12px;
            transition: 0.3s;
        }

        .sidebar-link:hover, .sidebar-link.active {
            background: var(--card-bg);
            color: #fff;
        }

        .sidebar-link i {
            width: 25px;
            font-size: 1.2rem;
            color: var(--accent-purple);
        }

        /* Balance Card */
        .balance-card {
            margin: 10px 20px;
            background: linear-gradient(135deg, rgba(139, 92, 246, 0.2), rgba(0, 0, 0, 0.6));
            backdrop-filter: blur(10px);
            border: 1px solid var(--glass-border);
            border-radius: 25px;
            padding: 30px;
            position: relative;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3);
        }

        .balance-card::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -20%;
            width: 200px;
            height: 200px;
            background: var(--accent-purple);
            filter: blur(80px);
            opacity: 0.15;
            z-index: 0;
        }

        .card-label {
            color: var(--text-secondary);
            font-size: 0.9rem;
            margin-bottom: 10px;
            position: relative;
            z-index: 1;
        }

        .card-balance {
            font-size: 2.2rem;
            font-weight: 700;
            margin-bottom: 25px;
            position: relative;
            z-index: 1;
        }

        .card-balance span {
            font-size: 1.2rem;
            color: var(--accent-gold);
            margin-right: 5px;
        }

        .card-actions {
            display: flex;
            gap: 15px;
            position: relative;
            z-index: 1;
        }

        .action-btn {
            flex: 1;
            padding: 12px;
            border-radius: 12px;
            border: none;
            font-weight: 600;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn-deposit {
            background: var(--accent-purple);
            color: #fff;
        }

        .btn-withdraw {
            background: var(--card-bg);
            border: 1px solid var(--glass-border);
            color: #fff;
        }

        .action-btn:active {
            transform: scale(0.95);
        }

        /* BP Status Card */
        .status-card {
            margin: 0 20px 25px;
            background: #FFFFFF;
            border-radius: 20px;
            padding: 25px;
            display: flex;
            align-items: flex-start;
            gap: 15px;
            position: relative;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            color: #1E293B;
        }

        .bp-logo-box {
            width: 55px;
            height: 55px;
            background: #f0f9ff;
            border: 1px solid #e0f2fe;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            color: #0ea5e9;
            font-size: 1.3rem;
            flex-shrink: 0;
            font-style: italic;
        }

        .status-info {
            flex: 1;
        }

        .status-line {
            margin-bottom: 12px;
        }

        .status-line:last-child {
            margin-bottom: 0;
        }

        .status-line h4 {
            color: #64748B;
            font-size: 0.85rem;
            font-weight: 500;
            margin-bottom: 2px;
        }

        .status-line p {
            color: #334155;
            font-size: 0.95rem;
            font-weight: 600;
        }

        .wallet-icon-corner {
            position: absolute;
            top: 25px;
            right: 25px;
            color: #d97706;
            font-size: 1.3rem;
            opacity: 0.8;
        }

        /* Quick Shortcuts */
        .section-title {
            margin: 30px 20px 15px;
            font-size: 1.1rem;
            font-weight: 600;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .view-all {
            font-size: 0.8rem;
            color: var(--accent-purple);
            text-decoration: none;
        }

        .shortcuts-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 15px;
            padding: 0 20px;
        }

        .shortcut-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 8px;
            text-decoration: none;
        }

        .icon-box {
            width: 55px;
            height: 55px;
            background: var(--card-bg);
            border: 1px solid var(--glass-border);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            color: #fff;
            transition: 0.3s;
        }

        .shortcut-item:hover .icon-box {
            background: var(--accent-purple);
            transform: translateY(-5px);
        }

        .shortcut-item p {
            font-size: 0.75rem;
            color: var(--text-secondary);
        }

        /* Recent Transactions */
        .transactions-list {
            padding: 0 20px;
        }

        .transaction-card {
            background: var(--card-bg);
            border: 1px solid var(--glass-border);
            border-radius: 18px;
            padding: 15px;
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 12px;
            transition: 0.3s;
        }

        .tx-icon {
            width: 45px;
            height: 45px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
        }

        .tx-icon.deposit { background: rgba(34, 197, 94, 0.1); color: #22C55E; }
        .tx-icon.withdraw { background: rgba(239, 68, 68, 0.1); color: #EF4444; }

        .tx-info {
            flex: 1;
        }

        .tx-info h4 {
            font-size: 0.95rem;
            margin-bottom: 4px;
        }

        .tx-info p {
            font-size: 0.75rem;
            color: var(--text-secondary);
        }

        .tx-amount {
            text-align: right;
        }

        .tx-amount.positive { color: #22C55E; }
        .tx-amount.negative { color: #EF4444; }

        .tx-status {
            font-size: 0.7rem;
            padding: 2px 8px;
            border-radius: 20px;
            margin-top: 5px;
            display: inline-block;
        }

        .status-pending { background: rgba(234, 179, 8, 0.1); color: #EAB308; }
        .status-approved { background: rgba(34, 197, 94, 0.1); color: #22C55E; }
        .status-rejected { background: rgba(239, 68, 68, 0.1); color: #EF4444; }

        /* Bottom Nav */
        .bottom-nav {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            height: var(--bottom-nav-height);
            background: rgba(8, 8, 15, 0.9);
            backdrop-filter: blur(20px);
            border-top: 1px solid var(--glass-border);
            display: flex;
            justify-content: space-around;
            align-items: center;
            z-index: 1000;
            padding: 0 10px;
        }

        .nav-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 5px;
            text-decoration: none;
            color: var(--text-secondary);
            transition: 0.3s;
            position: relative;
        }

        .nav-item.active {
            color: var(--accent-purple);
        }

        .nav-item i {
            font-size: 1.2rem;
        }

        .nav-item p {
            font-size: 0.7rem;
            font-weight: 500;
        }

        .nav-center {
            position: relative;
            top: -25px;
            width: 60px;
            height: 60px;
            background: var(--accent-purple);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            box-shadow: 0 10px 20px rgba(139, 92, 246, 0.4);
            border: 4px solid var(--bg-color);
        }

        .nav-center i {
            font-size: 1.5rem;
        }

        /* Global Form Styles */
        select, option {
            background-color: #1A1A2E !important;
            color: #fff !important;
        }

        select:focus {
            outline: none;
            border-color: var(--accent-purple);
        }

        @yield('styles')
    </style>
</head>
<body>

    @php
        $ticker_news = \App\Models\SiteSetting::where('key', 'ticker_news')->first()?->value ?? 'Welcome to WPCS Wallet - Secure and Reliable';
    @endphp

    <!-- News Ticker -->
    <div class="ticker-container">
        <div class="ticker-wrap">
            <div class="ticker-item"><i class="fas fa-bullhorn"></i> {{ $ticker_news }}</div>
        </div>
    </div>

    <!-- Sidebar Overlay -->
    <div class="sidebar-overlay" id="overlay"></div>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <h3>WPCS Wallet</h3>
        </div>
        <ul class="sidebar-menu">
            <li class="sidebar-item">
                <a href="{{ route('dashboard') }}" class="sidebar-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <i class="fas fa-home"></i> Home
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('transactions.history') }}" class="sidebar-link {{ request()->routeIs('transactions.history') ? 'active' : '' }}">
                    <i class="fas fa-history"></i> Transaction History
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('profile') }}" class="sidebar-link {{ request()->routeIs('profile') ? 'active' : '' }}">
                    <i class="fas fa-user"></i> My Profile
                </a>
            </li>
            <li class="sidebar-item">
                <a href="https://wa.me/923047244398" class="sidebar-link">
                    <i class="fab fa-whatsapp"></i> Support
                </a>
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link">
                    <i class="fas fa-shield-alt"></i> Privacy Policy
                </a>
            </li>
            <li class="sidebar-item">
                <form action="{{ route('logout') }}" method="POST" id="logout-form" style="display: none;">@csrf</form>
                <a href="#" class="sidebar-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </li>
        </ul>
    </div>

    <!-- Header -->
    <header>
        <div class="user-info">
            <h2>Welcome Back,</h2>
            <p>{{ Auth::user()->name }}</p>
        </div>
        <div class="menu-btn" id="menuBtn">
            <i class="fas fa-bars"></i>
        </div>
    </header>

    @yield('content')

    <!-- WhatsApp Floating -->
    <a href="https://wa.me/923047244398" class="floating-whatsapp">
        <i class="fab fa-whatsapp"></i>
    </a>

    <!-- Bottom Navigation -->
    <nav class="bottom-nav">
        <a href="{{ route('dashboard') }}" class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <i class="fas fa-home"></i>
            <p>Home</p>
        </a>
        <a href="https://bpexch.live/" class="nav-item">
            <i class="fas fa-dice"></i>
            <p>Bpexch</p>
        </a>
        <a href="{{ route('deposit') }}" class="nav-center">
            <i class="fas fa-plus"></i>
        </a>
        <a href="{{ route('withdraw') }}" class="nav-item {{ request()->routeIs('withdraw') ? 'active' : '' }}">
            <i class="fas fa-paper-plane"></i>
            <p>Withdraw</p>
        </a>
        <a href="https://wa.me/923047244398" class="nav-item">
            <i class="fab fa-whatsapp"></i>
            <p>Contact</p>
        </a>
    </nav>

    <!-- JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();

        const menuBtn = document.getElementById('menuBtn');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');

        menuBtn.addEventListener('click', () => {
            sidebar.classList.add('active');
            overlay.classList.add('active');
        });

        overlay.addEventListener('click', () => {
            sidebar.classList.remove('active');
            overlay.classList.remove('active');
        });
    </script>
    @yield('scripts')
</body>
</html>
