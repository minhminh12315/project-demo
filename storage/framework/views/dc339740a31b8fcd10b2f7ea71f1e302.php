<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/admin/index.css')); ?>">


</head>

<body>
        <div class="row">
                <div class="col-2">
                        <sidebar>

                                <logo>
                                        <a href="<?php echo e(route('home.index')); ?>">Logo</a>
                                </logo>
                                <user class="d-flex">
                                        <img src="<?php echo e(asset('assets/image/anhDepTrai.jpg')); ?>" alt="avatar">
                                        <div><?php echo e($name); ?></div>
                                </user>
                                <ul>
                                        <li><a href="<?php echo e(route('home.index')); ?>">Go Page</a></li>
                                        <li><a href="<?php echo e(route('admin.index')); ?>">Product</a></li>
                                        <li><a href="<?php echo e(route('addnew')); ?>">Add new</a></li>
                                </ul>
                        </sidebar>
                </div><?php /**PATH C:\Users\m1nggg\Desktop\project-demo\resources\views/admin/layouts/sidebar.blade.php ENDPATH**/ ?>