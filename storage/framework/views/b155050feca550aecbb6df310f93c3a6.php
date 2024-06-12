<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-3">
            <sidebar>
                <div class="category-card p-4">
                    <h3>Categories</h3>
                    <ul class="sidebar-list d-flex flex-column gap-2">

                        <?php $__currentLoopData = $lstCate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="p-1">
                            <a class="h-100 w-100" href="<?php echo e(route('shop.category', ['id' => $cate->id])); ?>"><?php echo e($cate->name); ?></a>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </sidebar>
        </div>
        <div class="col-9">
                <h2><?php if(isset($lstPrd->category)): ?>
                    <?php echo e($lstPrd->$category->name); ?>

                    <?php endif; ?>
                </h2>
            <div class="row g-2 row-cols-md-3 row-cols-sm-2 row-cols-1">
                
                <?php $__currentLoopData = $lstPrd; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col">
                    <div class="card mb-2">
                        <div class="overflow-hidden">
                            <img src="<?php echo e(asset('assets/image/'. $prd->image)); ?>" class="card-img-top" alt="">
                            <a href="<?php echo e(route('product.detail', $prd->name)); ?>" class="btn btn-secondary w-75 btn-seeDetail">See Detail</a>
                        </div>
                        <div class="card-body d-flex flex-column gap-2">
                            <h5 class="card-title ">
                                <?php echo e($prd->name); ?>

                            </h5>
                            <p class="card-text price"><?php echo e($prd->price); ?>$</p>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\m1nggg\Desktop\project-demo\resources\views/user/shop.blade.php ENDPATH**/ ?>