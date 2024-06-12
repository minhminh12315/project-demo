<?php $__env->startSection('content'); ?>
<div class="content-wrapper ">
<form action="<?php echo e(route('addnew.store')); ?>" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <div class="form-group">
        <label for="name">Title: </label>
        <input type="text" name="name" id="name" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="description">Description: </label>
        <textarea name="description" id="description" class="form-control" required></textarea>
    </div>

    <div class="form-group">
        <label for="images">Image: </label>
        <input type="file" name="images[]" id="images" class="form-control" multiple>
    </div>

    <div class="form-group">
        <label for="category">Category: </label>
        <select name="category_id" id="category" class="text-capitalize form-control" required>
            <?php if($category->count() > 0): ?>
            <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option class="text-capitalize" value="<?php echo e($cat->id); ?>"><?php echo e($cat->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </select>
        <p>If you want to add a new Category, please go to the bottom of the page.</p>
    </div>

    <div>
        <button type="button" class="btn btn-info badge mt-2" id="add_variant">Add Variant</button>
    </div>

    <div id="variants_container"></div>

    <button type="button" class="btn btn-info badge mt-2" id="generate_combinations">Generate Combinations</button>

    <div id="combinations_container"></div>

    <button type="submit" class="btn btn-primary mt-2">Add Product</button>
</form>

    <button class="btn btn-info badge addnew_category mt-4" type="button">Add new Category</button>
    <form id="form_addnew_category">

        <div class="form-group">
            <label for="category_addnew">Category: </label>
            <input type="text" name="category_addnew" id="category_addnew" class="form-control" required>
        </div>
        <label for="parent_id" class="form-label">Parent Category</label>
        <select name="parent_id" id="parent_id">

            <option value="">None</option>
            <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($category->id); ?>" <?php echo e(old('parent_id') == $category->id ? 'selected' : ''); ?>><?php echo e($category->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <button type="button" id="store_category" class="btn btn-primary mt-2">Add Category</button>
        <button type="button" id="cancel_category" class="btn btn-danger mt-2">Cancel</button>
    </form>
</div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\m1nggg\Desktop\project-demo\resources\views/admin/products/addnew.blade.php ENDPATH**/ ?>