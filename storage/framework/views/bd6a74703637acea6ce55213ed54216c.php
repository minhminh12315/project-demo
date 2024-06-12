<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="container">
    <h1>Products</h1>
    <table class="table table-bordered">
    <thead>
        <tr>
            <th>Product Name</th>
            <th>Description</th>
            <th>Category</th>
            <th>Variants</th>
            <th>Option</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php $__currentLoopData = $product->productVariants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productVariant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $__currentLoopData = $productVariant->subVariants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $subVariant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <?php if($index === 0): ?>
                            <td rowspan="<?php echo e(count($productVariant->subVariants)); ?>"><?php echo e($product->name); ?></td>
                            <td rowspan="<?php echo e(count($productVariant->subVariants)); ?>"><p><?php echo e($product->description); ?></p></td>
                            <td rowspan="<?php echo e(count($productVariant->subVariants)); ?>"><?php echo e($product->category->name); ?></td>
                        <?php endif; ?>
                        <td><?php echo e($subVariant->variantOption->variant->name); ?></td>
                        <td><?php echo e($subVariant->variantOption->name); ?></td>
                        <td><?php echo e($productVariant->quantity); ?></td>
                        <td>$<?php echo e(number_format($productVariant->price, 2)); ?></td>
                        <?php if($index === 0): ?>
                            <td rowspan="<?php echo e(count($productVariant->subVariants)); ?>">
                                <button>Update</button>
                                <button>Delete</button>
                            </td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
    </table>

    <h1>Products</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Description</th>
                <th>Category</th>
                <?php $__currentLoopData = $variants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $var): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <th><?php echo e($var->name); ?></th>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <th>Quantity</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php $__currentLoopData = $product->productVariants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productVariant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td rowspan="<?php echo e(count($productVariant->subVariants)); ?>"><?php echo e($product->name); ?></td>
                <td rowspan="<?php echo e(count($productVariant->subVariants)); ?>"><?php echo e($product->description); ?></td>
                <td rowspan="<?php echo e(count($productVariant->subVariants)); ?>"><?php echo e($product->category->name); ?></td>
                <?php $__currentLoopData = $productVariant->subVariants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $subVariant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($index > 0): ?>
            </tr>
            <tr>
                <?php endif; ?>
                <td>
                    <div><?php echo e($subVariant->variantOption->variant->name); ?>: <?php echo e($subVariant->variantOption->name); ?></div>
                </td>
                <td><?php echo e($productVariant->quantity); ?></td>
                <td>$<?php echo e(number_format($productVariant->price, 2)); ?></td>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <div class="row">
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($product->images->first()): ?>
        <?php echo e($product->name); ?>

        <div>
            <img src="<?php echo e($product->images->first()->path); ?>" class="img-fluid" width="200px" height="100px" alt="">
        </div>
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\m1nggg\Desktop\project-demo\resources\views/admin/index.blade.php ENDPATH**/ ?>