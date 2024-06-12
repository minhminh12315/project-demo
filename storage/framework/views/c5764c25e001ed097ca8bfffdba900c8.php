<?php $__env->startSection('content'); ?>
<section>
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="text-center mt-5 mb-5"> Cart </h1>
            <button id="clearCart" class="btn btn-danger h-50">Clear</button>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Color</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Action</th>
                            <th>Choose</th>
                        </tr>
                    </thead>
                    <tbody id="cart">

                    </tbody>
                </table>
                <div class="text-right mt-5">
                    <h3 id="total"> </h3>
                    <a id="prepareCheckOut" href="<?php echo e(route('home.checkout')); ?>" class="btn btn-primary">Checkout</a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\m1nggg\Desktop\project-demo\resources\views/user/cart.blade.php ENDPATH**/ ?>