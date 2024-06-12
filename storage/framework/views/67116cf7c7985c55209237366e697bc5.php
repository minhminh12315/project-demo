<?php $__env->startSection('info-content'); ?>
<main>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h1>Change Username and Email</h1>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.info', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\m1nggg\Desktop\project-demo\resources\views/user/info_edit.blade.php ENDPATH**/ ?>