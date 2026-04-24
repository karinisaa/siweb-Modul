
<?php $__env->startSection('title', 'Kelola Produk'); ?>

<?php $__env->startSection('content'); ?>
<div class="page-header">
    <div>
        <h1>Kelola Produk</h1>
        <p>Tambah, edit, atau hapus produk toko</p>
    </div>
    <a href="<?php echo e(route('admin.products.create')); ?>" class="btn btn-pink">+ Tambah Produk</a>
</div>

<?php if($products->isEmpty()): ?>
    <div class="empty-state">
        <div class="icon"></div>
        <h3>Belum ada produk</h3>
        <p>Mulai tambahkan produk sekarang!</p>
        <a href="<?php echo e(route('admin.products.create')); ?>" class="btn btn-pink">Tambah Produk</a>
    </div>
<?php else: ?>
    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($i + 1); ?></td>
                    <td><strong><?php echo e($product->name); ?></strong></td>
                    <td style="color:#B76E79; font-weight:700;">
                        Rp <?php echo e(number_format($product->price, 0, ',', '.')); ?>

                    </td>
                    <td><?php echo e($product->stock); ?></td>
                    <td>
                        <div class="badge-wrap">
                            <?php $__currentLoopData = $product->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <span class="badge"><?php echo e($cat->name); ?></span>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </td>
                    <td>
                        <div class="action-group">
                            <a href="<?php echo e(route('admin.products.edit', $product)); ?>"
                               class="btn btn-navy btn-sm">Edit</a>
                            <form action="<?php echo e(route('admin.products.destroy', $product)); ?>"
                                  method="POST" style="display:inline;"
                                  onsubmit="return confirm('Hapus produk ini?')">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\ISB 310 - SISTEM INFORMASI BERBASIS WEB\PRAKTIKUM\siweb-Modul\prauts-aksesoris\resources\views/admin/index.blade.php ENDPATH**/ ?>