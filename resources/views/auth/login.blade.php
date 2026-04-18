<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | WPCS Wallet</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" crossorigin="anonymous">
    
    <style>
        :root {
            --pri: #6C3FF5;
            --pri-l: #8B63FF;
            --acc: #F5A623;
            --bg: #08080F;
            --card: rgba(16, 16, 42, 0.6);
            --bdr: rgba(255, 255, 255, 0.08);
            --glass: rgba(255, 255, 255, 0.03);
            --t1: #FFFFFF;
            --t2: #A8B0C8;
            --gb: linear-gradient(135deg, #6C3FF5, #8B63FF);
            --ga: linear-gradient(135deg, #F5A623, #FFD166);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Outfit', sans-serif;
        }

        body {
            background: var(--bg);
            color: var(--t1);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
            overflow: hidden;
            position: relative;
        }

        /* Animated Background Orbs */
        .orb {
            position: absolute;
            border-radius: 50%;
            filter: blur(100px);
            opacity: 0.15;
            z-index: 0;
            pointer-events: none;
        }
        .o1 { width: 500px; height: 500px; background: var(--pri); top: -100px; left: -100px; animation: float 10s infinite alternate; }
        .o2 { width: 400px; height: 400px; background: var(--acc); bottom: -100px; right: -100px; animation: float 12s infinite alternate-reverse; }
        
        @keyframes float {
            from { transform: translate(0,0) scale(1); }
            to { transform: translate(30px, 40px) scale(1.1); }
        }

        .auth-card {
            width: 100%;
            max-width: 440px;
            background: var(--card);
            backdrop-filter: blur(25px);
            border: 1px solid var(--bdr);
            border-radius: 30px;
            padding: 60px 40px;
            position: relative;
            z-index: 1;
            box-shadow: 0 40px 100px rgba(0,0,0,0.6);
            animation: slideUp 0.7s cubic-bezier(0.4, 0, 0.2, 1);
        }

        @keyframes slideUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .logo-wrap {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 45px;
        }

        .logo-icon {
            width: 70px;
            height: 70px;
            background: var(--gb);
            border-radius: 20px;
            display: grid;
            place-items: center;
            font-size: 32px;
            color: #fff;
            box-shadow: 0 10px 30px rgba(108, 63, 245, 0.4);
            margin-bottom: 15px;
            transition: 0.4s;
        }
        .logo-wrap:hover .logo-icon { transform: rotate(10deg) scale(1.1); }

        .brand-name {
            font-size: 22px;
            font-weight: 800;
            background: var(--gb);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            letter-spacing: -0.5px;
        }

        h1 {
            font-size: 34px;
            font-weight: 800;
            text-align: center;
            margin-bottom: 8px;
            letter-spacing: -1.5px;
        }

        .subtitle {
            text-align: center;
            color: var(--t2);
            font-size: 15px;
            margin-bottom: 40px;
        }

        .form-group {
            margin-bottom: 20px;
            position: relative;
        }

        .form-group i {
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--pri-l);
            font-size: 18px;
            transition: 0.3s;
        }

        .form-control {
            width: 100%;
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid var(--bdr);
            border-radius: 16px;
            padding: 18px 20px 18px 55px;
            color: #fff;
            font-size: 15px;
            font-weight: 500;
            outline: none;
            transition: 0.3s;
        }

        .form-control:focus {
            background: rgba(255, 255, 255, 0.08);
            border-color: var(--pri);
            box-shadow: 0 0 25px rgba(108, 63, 245, 0.25);
        }

        .form-control:focus + i {
            color: #fff;
            transform: translateY(-50%) scale(1.2);
        }

        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.25);
        }

        .forgot-pass {
            display: block;
            text-align: right;
            margin-top: -10px;
            margin-bottom: 25px;
            font-size: 13px;
            color: var(--t2);
            text-decoration: none;
            font-weight: 600;
            transition: 0.3s;
        }
        .forgot-pass:hover { color: var(--pri-l); }

        .btn-submit {
            width: 100%;
            padding: 18px;
            background: var(--gb);
            border: none;
            border-radius: 16px;
            color: #fff;
            font-size: 17px;
            font-weight: 800;
            cursor: pointer;
            margin-top: 5px;
            box-shadow: 0 10px 30px rgba(108, 63, 245, 0.4);
            transition: 0.4s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
        }

        .btn-submit:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(108, 63, 245, 0.6);
        }

        .auth-footer {
            margin-top: 40px;
            text-align: center;
            color: var(--t2);
            font-size: 15px;
        }

        .auth-footer a {
            color: var(--pri-l);
            text-decoration: none;
            font-weight: 700;
            margin-left: 5px;
            transition: 0.3s;
        }

        .auth-footer a:hover {
            color: #fff;
            text-shadow: 0 0 10px var(--pri-l);
        }

        .back-home {
            position: absolute;
            top: 40px;
            left: 40px;
            color: var(--t2);
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: 0.3s;
            z-index: 10;
        }
        .back-home:hover { color: #fff; transform: translateX(-5px); }

        @media (max-width: 480px) {
            .auth-card { padding: 40px 25px; border-radius: 0; border: none; background: transparent; box-shadow: none; }
            body { background: #08080F; align-items: flex-start; }
            .back-home { top: 20px; left: 20px; }
            .logo-wrap { margin-top: 40px; }
        }
    </style>
</head>
<body>

    <a href="/" class="back-home"><i class="fa-solid fa-arrow-left"></i> Back to Home</a>

    <div class="orb o1"></div>
    <div class="orb o2"></div>

    <div class="auth-card">
        <div class="logo-wrap">
            <div class="logo-icon"><i class="fa-solid fa-wallet"></i></div>
            <span class="brand-name">WPCS Wallet</span>
        </div>

        <h1>Welcome Back</h1>
        <p class="subtitle">Securely sign in to your wallet</p>

        @if($errors->any())
            <div style="background: rgba(239, 68, 68, 0.1); border: 1px solid rgba(239, 68, 68, 0.2); color: #FCA5A5; padding: 15px; border-radius: 12px; margin-bottom: 25px; font-size: 14px;">
                <i class="fa-solid fa-circle-exclamation"></i> {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('login.post') }}" method="POST">
            @csrf
            <div class="form-group">
                <i class="fa-solid fa-envelope"></i>
                <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email Address" required>
            </div>

            <div class="form-group">
                <i class="fa-solid fa-lock"></i>
                <input type="password" class="form-control" name="password" placeholder="Password" required>
            </div>

            <a href="https://wa.me/923047244398" class="forgot-pass">Forgot Password?</a>

            <button type="submit" class="btn-submit">
                Access Wallet <i class="fa-solid fa-fingerprint"></i>
            </button>
        </form>

        <div class="auth-footer">
            New to WPCS? <a href="/register">Create Account</a>
        </div>
    </div>

</body>
</html>
