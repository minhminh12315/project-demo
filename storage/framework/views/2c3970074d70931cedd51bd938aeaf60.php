<?php $__env->startSection('info-content'); ?>
<main>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h1>Change Password</h1>
                        <div class="card">
                            <div class="card-body">
                                <form action="<?php echo e(route('user.info.update.password')); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input disabled type="text" class="form-control" id="name" name="name" value="<?php echo e($user->name); ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="pasword" class="form-label">Old pasword</label>
                                        <input type="password" class="form-control" id="pasword" name="password">
                                    </div>
                                    <div class="mb-3">
                                        <label for="new_password" class="form-label">New Password</label>
                                        <input type="password" class="form-control" id="new_password" name="new_password">
                                    </div>
                                    <div class="mb-3">
                                        <label for="confirm_password" class="form-label">Confirm Password</label>
                                        <input type="password" class="form-control" id="confirm_password" name="confirm_password">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.info', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\m1nggg\Desktop\project-demo\resources\views/user/info_edit_password.blade.php ENDPATH**/ ?>