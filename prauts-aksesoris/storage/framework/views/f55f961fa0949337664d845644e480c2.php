
<?php $__env->startSection('title', 'Keranjang Belanja'); ?>

<?php $__env->startSection('content'); ?>
<div class="page-header">
    <div>
        <h1>🛒 Keranjang Belanja</h1>
        <p>Produk yang siap kamu beli</p>
    </div>
    <a href="<?php echo e(route('home')); ?>" class="btn btn-outline">← Lanjut Belanja</a>
</div>

<?php if(empty($cart)): ?>
    <div class="empty-state">
        <div class="icon">🛍️</div>
        <h3>Keranjang masih kosong</h3>
        <p>Yuk, temukan aksesori cantik untuk kamu!</p>
        <a href="<?php echo e(route('home')); ?>" class="btn btn-pink">Belanja Sekarang ✨</a>
    </div>
<?php else: ?>
    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Produk</th>
                    <th>Harga Satuan</th>
                    <th>Jumlah</th>
                    <th>Subtotal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $total = 0; ?>
                <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $subtotal = $item['price'] * $item['quantity']; $total += $subtotal; ?>
                    <tr>
                        <td><?php echo e($loop->iteration); ?></td>
                        <td><strong><?php echo e($item['name']); ?></strong></td>
                        <td>Rp <?php echo e(number_format($item['price'], 0, ',', '.')); ?></td>
                        <td>
                            <span class="badge badge-mint"><?php echo e($item['quantity']); ?></span>
                        </td>
                        <td style="font-weight:700; color:#B76E79;">
                            Rp <?php echo e(number_format($subtotal, 0, ',', '.')); ?>

                        </td>
                        <td>
                            <form action="<?php echo e(route('cart.remove', $id)); ?>" method="POST"
                                  onsubmit="return confirm('Hapus dari keranjang?')">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-danger btn-sm">🗑️ Hapus</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>

    <div class="cart-total">
        <div>
            <div class="total-label">Total Belanja</div>
            <div class="total-amount">Rp <?php echo e(number_format($total, 0, ',', '.')); ?></div>
        </div>
        <a href="<?php echo e(route('home')); ?>" class="btn btn-outline">+ Tambah Produk</a>
    </div>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\ISB 310 - SISTEM INFORMASI BERBASIS WEB\PRAKTIKUM\siweb-Modul\prauts-aksesoris\resources\views/cart/index.blade.php ENDPATH**/ ?>