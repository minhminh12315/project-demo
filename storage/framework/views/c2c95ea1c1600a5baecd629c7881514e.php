<?php $__env->startSection('content'); ?>
<section class="p-0">
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <?php $__currentLoopData = $newPrd; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $prd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?php echo e($key); ?>" class="<?php echo e($key == 0 ? 'active' : ''); ?>" aria-label="Slide <?php echo e($key); ?>"></button>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div class="carousel-inner">
            <?php $__currentLoopData = $newPrd; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $prd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="carousel-item <?php echo e($key == 0 ? 'active' : ''); ?>" data-bs-interval="<?php echo e($key == 0 ? '2500' : '1500'); ?>">
                <img src="<?php echo e(asset('assets/image/'. $prd->image)); ?>" class="d-block w-100" alt="<?php echo e($prd->name); ?>">
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="container new-collection">
        <h1 class="text-center mt-5 mb-5"> News Collection </h1>
        <div class="row g-2 row-cols-lg-4 row-cols-md-2 row-cols-1">
            <?php $__currentLoopData = $newPrd; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col">
<<<<<<< Updated upstream
                <div class="card mb-2">
                    <div class="overflow-hidden">
                        <?php $__currentLoopData = $prd->productVariants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $variant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <img src="<?php echo e(asset($variant->images[0]->image_path)); ?>" class="card-img-top" alt="">
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <!-- <img src="<?php echo e(asset('assets/image/'. $prd->image)); ?>" class="card-img-top" alt=""> -->
                        <a href="<?php echo e(route('product.detail', $prd->id)); ?>" class="btn btn-secondary w-75 btn-seeDetail">See Detail</a>
                    </div>
                    <div class="card-body d-flex flex-column gap-2">
                        <h5 class="card-title ">
                            <?php echo e($prd->name); ?>

                        </h5>
                        <p class="card-text price"><?php echo e($prd->price); ?>$</p>
                    </div>
=======
                <div class="card mb-2" style="height: 30rem">
                    <a href="<?php echo e(route('product.detail', $prd->id)); ?>">
                        <img src="<?php echo e(asset('assets/image/'. $prd->image)); ?>" class="card-img-top" alt="">

                        <div class="card-body d-flex flex-column gap-2">
                            <h5 class="card-title ">
                                <?php echo e($prd->name); ?>

                            </h5>
                            <p class="card-text price"><?php echo e($prd->price); ?>$</p>
                        </div>
                    </a>
>>>>>>> Stashed changes
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>

    <div class="container best-seller">
        <h1 class="text-center mt-5 mb-5"> Best Seller </h1>
        <div class="row g-2 row-cols-lg-4 row-cols-md-2 row-cols-1">
            <?php $__currentLoopData = $newPrd; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col">
                <div class="card mb-2" style="height: 30rem">
                    <a href="<?php echo e(route('product.detail', $prd->id)); ?>">
                        <img src="<?php echo e(asset('assets/image/'. $prd->image)); ?>" class="card-img-top" alt="">

                        <div class="card-body d-flex flex-column gap-2">
                            <h5 class="card-title ">
                                <?php echo e($prd->name); ?>

                            </h5>
                            <p class="card-text price"><?php echo e($prd->price); ?>$</p>
                        </div>
                    </a>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>

<script>

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\m1nggg\Desktop\project-demo\resources\views/user/index.blade.php ENDPATH**/ ?>