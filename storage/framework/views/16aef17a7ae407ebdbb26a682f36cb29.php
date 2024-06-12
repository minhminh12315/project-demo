<div class="content-wrapper">
    <div class="content-head">
        <div class="container-fluid">
            <div class="row mb-2">
                Dashboard
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Edit Product</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <?php $__currentLoopData = $lstPrd; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-3">
                                <div class="card mb-2">
                                    <img src="<?php echo e(asset('assets/image/anhDepTrai.jpg
                                    ')); ?>" class="img-fluid"  alt="<?php echo e($product->name); ?>" width="100px" height="100px">
                                    <div class="card-title "><?php echo e($product->name); ?></div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH C:\Users\m1nggg\Desktop\project-demo\resources\views/admin/layouts/content.blade.php ENDPATH**/ ?>