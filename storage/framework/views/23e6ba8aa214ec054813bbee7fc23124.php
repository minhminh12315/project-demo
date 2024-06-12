<?php $__env->startSection('content'); ?>

<div class="row container">
    <div class="col-3">
        <sidebar>
            <div class="sidebar-header">
                <h3>My Account</h3>
            </div>
            <div class="sidebar-content">
                <ul class="sidebar-list">
                    <li><a href="<?php echo e(route('user.info')); ?>">Info</a></li>
                    <li><a disabled href="<?php echo e(route('user.orders')); ?>">Orders</a></li>
                </ul>
            </div>
        </sidebar>
    </div>
    <div class="col-9">
        <main>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h1>Orders</h1>
                        <div class="card">
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Order ID</th>
                                            <th scope="col">Total</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $lstOrder; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <th scope="row"><?php echo e($loop->iteration); ?></th>
                                            <td><?php echo e($order->id); ?></td>
                                            <td><?php echo e($order->total); ?></td>
                                            <td><?php echo e($order->status); ?></td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
        </main>
    </div>
</div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\m1nggg\Desktop\project-demo\resources\views/user/orders.blade.php ENDPATH**/ ?>