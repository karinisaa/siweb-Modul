<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — AksesorisShop</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
</head>
<body>
<div class="auth-wrap">
    <div class="auth-card">
        <div class="auth-logo">
            <div class="icon">🌸</div>
            <h1>AksesorisShop</h1>
            <p>Masuk untuk mulai berbelanja</p>
        </div>

        <?php if($errors->any()): ?>
            <div class="alert alert-error"><?php echo e($errors->first()); ?></div>
        <?php endif; ?>

        <form method="POST" action="/login">
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <label>📧 Email</label>
                <input type="email" name="email" value="<?php echo e(old('email')); ?>"
                       placeholder="contoh@email.com" required autofocus>
                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="error-text"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="form-group">
                <label>🔒 Password</label>
                <input type="password" name="password" placeholder="••••••••" required>
            </div>
            <div class="form-group" style="display:flex; align-items:center; gap:8px;">
                <input type="checkbox" name="remember" id="remember" style="width:auto; accent-color:#FF69B4;">
                <label for="remember" style="margin:0; font-weight:400; font-size:0.85rem;">Ingat saya</label>
            </div>
            <button type="submit" class="btn btn-pink" style="width:100%; padding:12px;">
                Masuk Sekarang
            </button>
        </form>

        <div class="auth-footer">
            Belum punya akun? <a href="/register">Daftar di sini</a>
        </div>

        <div class="demo-box">
            <strong>Akun Demo:</strong>
            Admin: admin@aksesoris.com / password123<br>
            User: user@aksesoris.com / password123
        </div>
    </div>
</div>
</body>
</html><?php /**PATH C:\laragon\www\ISB 310 - SISTEM INFORMASI BERBASIS WEB\PRAKTIKUM\siweb-Modul\prauts-aksesoris\resources\views/auth/login.blade.php ENDPATH**/ ?>