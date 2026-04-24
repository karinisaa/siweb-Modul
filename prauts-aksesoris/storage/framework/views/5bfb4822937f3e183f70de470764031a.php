<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'AksesorisShop'); ?></title>
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
</head>
<body>

<nav class="navbar">
    <a href="<?php echo e(auth()->check() && auth()->user()->isAdmin() ? route('admin.products.index') : route('home')); ?>"
       class="brand">🌸 AksesorisShop</a>

    <div class="nav-links">
        <?php if(auth()->guard()->check()): ?>
            <?php if(!auth()->user()->isAdmin()): ?>
                <a href="<?php echo e(route('home')); ?>">🏠 Produk</a>
                <a href="<?php echo e(route('cart.index')); ?>">
                    🛒 Keranjang
                    <?php $cartCount = count(session()->get('cart', [])); ?>
                    <?php if($cartCount > 0): ?>
                        <span class="badge" style="font-size:0.65rem; padding:2px 7px; margin-left:3px;"><?php echo e($cartCount); ?></span>
                    <?php endif; ?>
                </a>
            <?php else: ?>
                <a href="<?php echo e(route('admin.products.index')); ?>">📦 Kelola Produk</a>
                <a href="<?php echo e(route('admin.products.create')); ?>">➕ Tambah</a>
            <?php endif; ?>

            <span class="user-info">Hi, <?php echo e(auth()->user()->name); ?></span>

            <form action="<?php echo e(route('logout')); ?>" method="POST" class="logout-form">
                <?php echo csrf_field(); ?>
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        <?php endif; ?>
    </div>
</nav>

<div class="container">
    <?php if(session('success')): ?>
        <div class="alert alert-success">✅ <?php echo e(session('success')); ?></div>
    <?php endif; ?>
    <?php if(session('error')): ?>
        <div class="alert alert-error">❌ <?php echo e(session('error')); ?></div>
    <?php endif; ?>

    <?php echo $__env->yieldContent('content'); ?>
</div>

<footer style="text-align:center; padding:24px; font-size:0.8rem; color:#B76E79; border-top:1px solid #E0E0E0; margin-top:40px;">
    🌸 AksesorisShop &copy; <?php echo e(date('Y')); ?> — Semua aksesori cantik ada di sini
</footer>

</body>
</html><?php /**PATH C:\laragon\www\ISB 310 - SISTEM INFORMASI BERBASIS WEB\PRAKTIKUM\siweb-Modul\prauts-aksesoris\resources\views/layout/app.blade.php ENDPATH**/ ?>