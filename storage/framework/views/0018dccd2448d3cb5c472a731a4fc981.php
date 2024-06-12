<?php $__env->startSection('content'); ?>
<div class="content-wrapper ">
    <form action="<?php echo e(route('addnew.store')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <label for="name">Product Name: </label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="description">Description: </label>
            <textarea name="description" id="description" class="form-control" required></textarea>
        </div>

        <div class="form-group">
            <label for="price">Price: </label>
            <input type="number" name="price" id="price" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="color">Color: </label>
            <select name="color" id="color" class="form-control" required>
                <?php $__currentLoopData = $lstColor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option class="text-capitalize" value="<?php echo e($color->id); ?>"><?php echo e($color->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <a class="btn btn-success mt-2" href="<?php echo e(route('addnew.color')); ?>">Add new color</a>

        <div class="form-group">
            <label for="size">Size: </label>
            <select name="size" id="size" class="form-control" required>
                <?php $__currentLoopData = $lstSize; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $size): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option class="" value="<?php echo e($size->id); ?>"><?php echo e($size->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <a class="btn btn-success mt-2" href="<?php echo e(route('addnew.size')); ?>">Add new size</a>

        <div class="form-group">
            <label for="quantity">Quantity: </label>
            <input type="number" name="quantity" id="quantity" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="images">Image: </label>
            <input type="file" name="images[]" id="images" class="form-control" multiple required>
        </div>

        <div class="form-group">
            <label for="category">Category: </label>
            <select name="category_id" id="category" class="text-capitalize form-control" required>
                <?php $__currentLoopData = $lstCat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option class="text-capitalize" value="<?php echo e($cat->id); ?>"><?php echo e($cat->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <a class="btn btn-success mt-2" href="<?php echo e(route('addnew.category')); ?>">Add new Category</a>

        <div class="form-group">
            <label for="sub_category">Sub_Category: </label>
            <select name="sub_category_id" id="sub_category" class="text-capitalize form-control" required>
                <?php $__currentLoopData = $lstSubCat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subCat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option class="text-capitalize" value="<?php echo e($subCat->id); ?>"><?php echo e($subCat->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <a class="btn btn-success mt-2" href="<?php echo e(route('addnew.subcategory')); ?>">Add new Category</a>

        <button type="submit" class="btn btn-primary mt-2">Add Product</button>
    </form>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\m1nggg\Desktop\project-demo\resources\views/admin/layouts/addnew.blade.php ENDPATH**/ ?>