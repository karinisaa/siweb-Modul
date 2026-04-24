<?php $__env->startSection('title', 'Koleksi Aksesoris'); ?>

<?php $__env->startSection('content'); ?>
<div class="hero">
    <h1>✨ Koleksi Aksesoris Terbaru</h1>
    <p>Temukan aksesori cantik pilihan hati kamu 🌸</p>
</div>

<?php if($products->isEmpty()): ?>
    <div class="empty-state">
        <div class="icon">🛍️</div>
        <h3>Belum ada produk tersedia</h3>
        <p>Sabar ya, koleksi baru segera hadir!</p>
    </div>
<?php else: ?>
    <div class="product-grid">
        <?php $emojis = ['💍','📿','💎','👑','🌸','✨','🎀','🌺']; ?>
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="product-card">
            <div class="card-img"><?php echo e($emojis[$i % count($emojis)]); ?></div>
            <div class="card-body">
                <div class="card-title"><?php echo e($product->name); ?></div>
                <?php if($product->description): ?>
                    <div class="card-desc"><?php echo e(Str::limit($product->description, 70)); ?></div>
                <?php endif; ?>
                <div class="card-price">Rp <?php echo e(number_format($product->price, 0, ',', '.')); ?></div>
                <div class="badge-wrap">
                    <?php $__currentLoopData = $product->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <span class="badge"><?php echo e($cat->name); ?></span>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <form action="<?php echo e(route('cart.add', $product->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="btn btn-pink" style="width:100%;">
                        🛒 Tambah ke Keranjang
                    </button>
                </form>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\ISB 310 - SISTEM INFORMASI BERBASIS WEB\PRAKTIKUM\siweb-Modul\prauts-aksesoris\resources\views/home.blade.php ENDPATH**/ ?>