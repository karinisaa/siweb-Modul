
<?php $__env->startSection('title', 'Tambah Produk'); ?>

<?php $__env->startSection('content'); ?>
<div class="page-header">
    <div>
        <h1>➕ Tambah Produk</h1>
        <p>Isi detail produk baru</p>
    </div>
    <a href="<?php echo e(route('admin.products.index')); ?>" class="btn btn-outline">← Kembali</a>
</div>

<div class="form-card">
    <?php if($errors->any()): ?>
        <div class="alert alert-error"><?php echo e($errors->first()); ?></div>
    <?php endif; ?>

    <form action="<?php echo e(route('admin.products.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>

        <div class="form-group">
            <label>Nama Produk</label>
            <input type="text" name="name" value="<?php echo e(old('name')); ?>"
                   placeholder="Contoh: Gelang Bunga Rose Gold" required>
            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="error-text"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="form-group">
            <label>Deskripsi</label>
            <textarea name="description" placeholder="Deskripsi singkat produk..."><?php echo e(old('description')); ?></textarea>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label>Harga (Rp)</label>
                <input type="number" name="price" value="<?php echo e(old('price')); ?>"
                       placeholder="50000" min="0" required>
                <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="error-text"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="form-group">
                <label>Stok</label>
                <input type="number" name="stock" value="<?php echo e(old('stock', 0)); ?>"
                       placeholder="10" min="0" required>
                <?php $__errorArgs = ['stock'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="error-text"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </div>

        <div class="form-group">
            <label>Kategori <span style="font-weight:400; color:#888;">(bisa pilih lebih dari satu)</span></label>
            <div class="checkbox-group">
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <label class="checkbox-item">
                        <input type="checkbox" name="categories[]" value="<?php echo e($cat->id); ?>"
                               <?php echo e(in_array($cat->id, old('categories', [])) ? 'checked' : ''); ?>>
                        <?php echo e($cat->name); ?>

                    </label>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php if($categories->isEmpty()): ?>
                    <p style="font-size:0.82rem; color:#888;">Belum ada kategori tersedia.</p>
                <?php endif; ?>
            </div>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-pink">💾 Simpan Produk</button>
            <a href="<?php echo e(route('admin.products.index')); ?>" class="btn btn-outline">Batal</a>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\ISB 310 - SISTEM INFORMASI BERBASIS WEB\PRAKTIKUM\siweb-Modul\prauts-aksesoris\resources\views/admin/create.blade.php ENDPATH**/ ?>