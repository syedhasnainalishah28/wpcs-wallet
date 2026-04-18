<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | WPCS Control Panel</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --admin-pri: #1E293B;
            --admin-accent: #3B82F6;
            --bg-dark: #0F172A;
            --text-main: #F8FAFC;
            --text-muted: #94A3B8;
            --glass: rgba(255, 255, 255, 0.03);
            --border: rgba(255, 255, 255, 0.08);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Outfit', sans-serif;
        }

        body {
            background-color: var(--bg-dark);
            background-image: radial-gradient(at 0% 0%, hsla(217,100%,13%,1) 0, transparent 50%), 
                              radial-gradient(at 50% 0%, hsla(217,91%,23%,1) 0, transparent 50%), 
                              radial-gradient(at 100% 0%, hsla(217,100%,13%,1) 0, transparent 50%);
            color: var(--text-main);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .login-container {
            width: 100%;
            max-width: 400px;
            background: var(--glass);
            backdrop-filter: blur(20px);
            border: 1px solid var(--border);
            border-radius: 24px;
            padding: 40px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        }

        .login-header {
            text-align: center;
            margin-bottom: 35px;
        }

        .admin-icon {
            width: 60px;
            height: 60px;
            background: var(--admin-accent);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            color: #fff;
            margin: 0 auto 15px;
            box-shadow: 0 10px 15px -3px rgba(59, 130, 246, 0.4);
        }

        h1 {
            font-size: 1.5rem;
            font-weight: 700;
            letter-spacing: -0.5px;
        }

        p.muted {
            color: var(--text-muted);
            font-size: 0.9rem;
            margin-top: 5px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            font-size: 0.85rem;
            font-weight: 600;
            color: var(--text-muted);
            margin-bottom: 8px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .form-input {
            width: 100%;
            background: rgba(0, 0, 0, 0.2);
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 14px 16px;
            color: #fff;
            font-size: 0.95rem;
            outline: none;
            transition: 0.2s;
        }

        .form-input:focus {
            border-color: var(--admin-accent);
            background: rgba(59, 130, 246, 0.05);
        }

        .login-btn {
            width: 100%;
            padding: 14px;
            background: var(--admin-accent);
            border: none;
            border-radius: 12px;
            color: #fff;
            font-weight: 700;
            font-size: 1rem;
            cursor: pointer;
            transition: 0.3s;
            margin-top: 10px;
        }

        .login-btn:hover {
            background: #2563EB;
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(37, 99, 235, 0.4);
        }

        .error-msg {
            background: rgba(239, 68, 68, 0.1);
            border: 1px solid rgba(239, 68, 68, 0.2);
            color: #FCA5A5;
            padding: 12px;
            border-radius: 10px;
            font-size: 0.85rem;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 25px;
            color: var(--text-muted);
            font-size: 0.85rem;
            text-decoration: none;
            transition: 0.2s;
        }

        .back-link:hover {
            color: var(--text-main);
        }
    </style>
</head>
<body>

    <div class="login-container">
        <div class="login-header">
            <div class="admin-icon">
                <i class="fas fa-shield-halved"></i>
            </div>
            <h1>Admin Panel</h1>
            <p class="muted">WPCS Wallet Control Center</p>
        </div>

        @if($errors->any())
            <div class="error-msg">
                <i class="fas fa-exclamation-circle"></i>
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('admin.authenticate') }}" method="POST">
            @csrf
            <div class="form-group">
                <label class="form-label">Email Address</label>
                <input type="email" name="email" class="form-input" placeholder="admin@wpcs.live" required>
            </div>

            <div class="form-group">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-input" placeholder="••••••••" required>
            </div>

            <button type="submit" class="login-btn">Secure Login</button>
        </form>

        <a href="/" class="back-link">
            <i class="fas fa-arrow-left"></i> Back to Platform
        </a>
    </div>

</body>
</html>
