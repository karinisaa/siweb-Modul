<?php
session_start();

if (isset($_SESSION["user"])) {
    header("Location: index.php");
    exit;
}

$error = $_GET['error'] ?? '';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — Cibaduyut Shoes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --bg-start: #f5f8ff;
            --bg-end: #fff7f0;
            --panel: #ffffff;
            --border: #e7ebf6;
            --text: #1d263b;
            --muted: #7d8ca7;
            --accent: #ff9f42;
            --accent-deep: #f57c0f;
            --shadow: rgba(31, 64, 125, 0.12);
            --danger: #d32f2f;
        }

        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        html,
        body {
            min-height: 100%;
            margin: 0;
            font-family: Arial, sans-serif;
            background: radial-gradient(circle at top left, rgba(255,159,66,0.18), transparent 22%),
                        radial-gradient(circle at bottom right, rgba(59,130,246,0.14), transparent 18%),
                        linear-gradient(180deg, var(--bg-start), var(--bg-end));
            color: var(--text);
        }

        body {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }

        .page-wrap {
            width: 100%;
            max-width: 450px;
            position: relative;
        }

        .page-wrap::before,
        .page-wrap::after {
            content: '';
            position: absolute;
            border-radius: 50%;
            opacity: 0.35;
            pointer-events: none;
        }

        .page-wrap::before {
            width: 140px;
            height: 140px;
            background: rgba(255,159,66,0.2);
            top: -40px;
            right: -30px;
        }

        .page-wrap::after {
            width: 100px;
            height: 100px;
            background: rgba(59,130,246,0.18);
            bottom: -35px;
            left: -20px;
        }

        .page-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 1rem;
            font-size: 0.82rem;
            color: var(--accent-deep);
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.14em;
        }

        .login-card {
            position: relative;
            background: var(--panel);
            border-radius: 32px;
            border: 1px solid var(--border);
            padding: 2.2rem;
            box-shadow: 0 28px 60px var(--shadow);
            overflow: hidden;
        }

        .login-card::before {
            content: '';
            position: absolute;
            width: 220px;
            height: 220px;
            border-radius: 50%;
            background: rgba(255,159,66,0.12);
            top: -75px;
            right: -75px;
        }

        .card-top {
            display: grid;
            grid-template-columns: auto 1fr;
            gap: 1rem;
            align-items: center;
            margin-bottom: 1.8rem;
        }

        .logo-circle {
            width: 64px;
            height: 64px;
            border-radius: 22px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(145deg, rgba(255,159,66,0.2), rgba(245,124,28,0.12));
            color: var(--accent-deep);
            font-size: 1.6rem;
            box-shadow: 0 14px 30px rgba(245,124,28,0.12);
        }

        .title-group h1 {
            font-size: 1.65rem;
            line-height: 1.1;
            margin: 0;
        }

        .title-group p {
            margin: 0.4rem 0 0;
            color: var(--muted);
            font-size: 0.95rem;
            line-height: 1.7;
        }

        .alert-login {
            background: rgba(220, 53, 69, 0.12);
            border: 1px solid rgba(220, 53, 69, 0.25);
            border-radius: 18px;
            color: var(--danger);
            padding: 0.94rem 1rem;
            margin-bottom: 1.4rem;
            font-size: 0.93rem;
        }

        .form-group {
            margin-bottom: 1.25rem;
        }

        label {
            display: block;
            margin-bottom: 0.45rem;
            color: var(--muted);
            font-size: 0.78rem;
            font-weight: 700;
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }

        .input-wrap {
            position: relative;
        }

        .input-wrap .input-icon {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #c9d3e6;
            font-size: 1rem;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 1rem 1rem 1rem 3rem;
            border-radius: 18px;
            border: 1px solid var(--border);
            background: #f8fafc;
            color: var(--text);
            font-size: 0.98rem;
            outline: none;
            transition: border-color 0.25s ease, box-shadow 0.25s ease;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            border-color: var(--accent-deep);
            box-shadow: 0 0 0 6px rgba(255,159,66,0.12);
        }

        input::placeholder {
            color: #b8c0d8;
        }

        .remember-row {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-bottom: 1.75rem;
        }

        .remember-row input[type="checkbox"] {
            width: 18px;
            height: 18px;
            accent-color: var(--accent-deep);
            cursor: pointer;
        }

        .remember-row label {
            color: var(--muted);
            font-size: 0.93rem;
            cursor: pointer;
        }

        .btn-login {
            width: 100%;
            border: none;
            border-radius: 18px;
            padding: 1rem;
            background: linear-gradient(135deg, var(--accent), var(--accent-deep));
            color: #ffffff;
            font-size: 1rem;
            font-weight: 700;
            cursor: pointer;
            transition: transform 0.18s ease, box-shadow 0.25s ease;
            box-shadow: 0 18px 30px rgba(245,124,28,0.2);
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 22px 34px rgba(245,124,28,0.24);
        }

        .divider {
            height: 1px;
            background: #f1f4f9;
            margin: 1.6rem 0;
            border-radius: 999px;
        }

        .back-link {
            text-align: center;
            margin-top: 1.5rem;
        }

        .back-link a {
            color: var(--muted);
            text-decoration: none;
            font-size: 0.92rem;
        }

        .back-link a:hover {
            color: var(--accent-deep);
        }

        .demo-hint {
            margin-top: 1.6rem;
            padding: 1rem 1.05rem;
            background: #fdf7ed;
            border: 1px solid rgba(255,159,66,0.18);
            border-radius: 18px;
            color: var(--muted);
            font-size: 0.9rem;
            line-height: 1.65;
        }

        .demo-hint strong {
            color: var(--text);
        }
    </style>
</head>
<body>

    <div class="page-wrap">
        <div class="page-badge">Cibaduyut Shoes • Admin</div>

        <div class="login-card">
            <div class="card-top">
                <div class="logo-circle">👟</div>
                <div class="title-group">
                    <h1>SELAMAT DATANG</h1>
                </div>
            </div>

            <?php if ($error === 'invalid'): ?>
            <div class="alert-login">⚠️ Username atau password salah. Silakan coba lagi.</div>
        <?php elseif ($error === 'empty'): ?>
            <div class="alert-login">⚠️ Username dan password tidak boleh kosong.</div>
        <?php endif; ?>

        <form method="POST" action="controller/proses_login.php">

            <div class="form-group">
                <label for="username">Username</label>
                <div class="input-wrap">
                    <span class="input-icon">👤</span>
                    <input
                        type="text"
                        id="username"
                        name="username"
                        placeholder="Masukkan username"
                        value="<?php echo htmlspecialchars($_COOKIE['username'] ?? ''); ?>"
                        required
                        autocomplete="username"
                    >
                </div>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <div class="input-wrap">
                    <span class="input-icon">🔒</span>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Masukkan password"
                        required
                        autocomplete="current-password"
                    >
                </div>
            </div>

            <div class="remember-row">
                <input type="checkbox" id="remember" name="remember"
                    <?php echo isset($_COOKIE['username']) ? 'checked' : ''; ?>>
                <label for="remember">Ingat saya</label>
            </div>

            <button type="submit" class="btn-login">Login</button>
        </form>

        <div class="back-link">
            <a href="index.php">← Kembali ke Beranda</a>
        </div>

        <div class="divider"></div>

        <div class="demo-hint">
            <strong>Demo akun:</strong><br>
            Username: <strong>admin</strong> / Password: <strong>admin123</strong><br>
            Username: <strong>manager</strong> / Password: <strong>manager123</strong>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>