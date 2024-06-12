<?php $__env->startSection('content'); ?>

<div class="row container">
    <div class="col-3">
        <sidebar>
            <div class="sidebar-header">
                <h3>My Account</h3>
            </div>
            <div class="sidebar-content">
                <ul class="sidebar-list">
                    <li><a disabled href="<?php echo e(route('user.info')); ?>">Info</a></li>
                    <li><a href="<?php echo e(route('user.info.edit')); ?>">Account</a></li>
                    <li><a href="<?php echo e(route('user.orders')); ?>">Orders</a></li>
                </ul>
            </div>
        </sidebar>
    </div>
    <div class="col-9">
        <main>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h1>Info</h1>
                        <div class="card">
                            <div class="card-body">
                                <form action="<?php echo e(route('user.info.update')); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="name" name="name" value="<?php echo e($user->name); ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" value="<?php echo e($user->email); ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="pasword" class="form-label">pasword</label>
                                        <input type="password" class="form-control" id="pasword" name="password">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\m1nggg\Desktop\project-demo\resources\views/user/update.blade.php ENDPATH**/ ?>