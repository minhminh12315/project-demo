<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/home/index.css')); ?>">
</head>

<body>
    <header>
        <div class="d-flex justify-content-between p-3 align-items-center">
            <div class="logo">
                Logo
            </div>
            <nav>
                <ul class="d-flex gap-5 align-items-center">
                    <li class="d-flex align-items-center"><a href="<?php echo e(route('shop')); ?>">Shop</a></li>
                    <li class="d-flex align-items-center"><a href="#">About</a></li>
                    <li class="d-flex align-items-center"><a href="#">Contact</a></li>
                    <?php echo $user && $user->type == 'admin' ?
                    '<li class="d-flex align-items-center"><a href="'. route('admin.index') .'">Admin</a></li>' :
                    ''; ?>

                </ul>
            </nav>
            <div class="d-flex gap-3 align-items-center">
                <form action="#">
                    <?php echo csrf_field(); ?>
                    <div class="d-flex position-relative">
                        <input type="text" class="home-search" name="search" id="search" placeholder="Search">
                        <label for="search" class="align-items-center">
                            <span class="material-symbols-outlined">
                                search
                            </span>
                        </label>
                    </div>
                </form>
                <?php echo $user ? $user->name . '
                <a href="'. route('logout') .'">
                    Logout
                </a>
                ' :
                '<a href="'. route('login') .'">
                    Login
                </a>'; ?>

                <div>
                    <a href="#">
                        <span class="material-symbols-outlined">
                            shopping_cart
                        </span>
                        <span id="cart-item-count"></span>
                    </a>
                </div>
            </div>
        </div>
    </header>
    <main>
    <div class="card">
            <div class="card-body">
                <div class="card-title"><?php echo e($prd->name); ?></div>
                <img src="<?php echo e(asset('assets/image/'. $prd->image)); ?>" height="350px" alt="">
                <div class="card-text"><?php echo e($prd->price); ?></div>
                <div class="card-text"><?php echo e($prd->description); ?></div>
                <a class="btn btn-primary" href="<?php echo e(route('product.detail', $prd->id)); ?>">Add to card</a>
            </div>
        </div>
    </main>
       
</body>

</html><?php /**PATH C:\Users\m1nggg\Desktop\project-demo\resources\views/home/layouts/product-detail.blade.php ENDPATH**/ ?>