<?php $__env->startSection('info-content'); ?>
<main>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Info</h1>
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Username: <?php echo e($user->name); ?></div>
                        <div class="card-text">Email: <?php echo e($user->email); ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.info', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\m1nggg\Desktop\project-demo\resources\views/user/info_detail.blade.php ENDPATH**/ ?>