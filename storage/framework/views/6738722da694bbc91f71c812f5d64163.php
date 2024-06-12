<?php $__env->startSection('content'); ?>
    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>
    <div class="container">
        <h2>Add new Sub_Category</h2>
        <form action="<?php echo e(route('addnew.subcategory.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <label for="name">Sub_Category Name:</label>
                <input type="text" name="name" id="name" class="text-capitalize form-control" required>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Add Sub_Category</button>
        </form>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\m1nggg\Desktop\project-demo\resources\views/admin/layouts/addnewSubCategory.blade.php ENDPATH**/ ?>