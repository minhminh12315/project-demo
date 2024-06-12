<?php echo $__env->make('admin.layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="col-10 right-site">
                        <div class="ps-3">
                                <header >
                                        <nav>
                                                <div>Here is the admin page</div>
                                        </nav>
                                </header>
                        </div>
                        <div class="content-wrapper">
                                <?php echo $__env->yieldContent('content'); ?>
                        </div>
                </div>
        </div>
        <script src="<?php echo e(asset('assets/js/app.js')); ?>"></script>
</body>

</html><?php /**PATH C:\Users\m1nggg\Desktop\project-demo\resources\views/admin/layouts/master.blade.php ENDPATH**/ ?>