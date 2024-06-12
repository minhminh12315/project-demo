<?php $__env->startSection('info-content'); ?>
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
                                    <th scope="col">Order ID</th>
                                    <th scope="col">Product Name: </th>
                                    <th scope="col">Quantity: </th>
                                    <th scope="col">Price: </th>
                                    <th scope="col">Total: </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $lstOrder; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $__currentLoopData = $order->orderDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orderDetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($order->id); ?></td>
                                    <td><?php echo e($orderDetail->product->name); ?></td>
                                    <td><?php echo e($orderDetail->quantity); ?></td>
                                    <td><?php echo e($orderDetail->product->price); ?></td>
                                    <td><?php echo e($orderDetail->total); ?></td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td colspan="4" class="text-end">Total: </td>
                                    <td><?php echo e($order->total); ?></td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</main>
<div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.info', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\m1nggg\Desktop\project-demo\resources\views/user/info_orders.blade.php ENDPATH**/ ?>