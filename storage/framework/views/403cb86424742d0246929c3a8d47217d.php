<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SHOP MINH</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/home/index.css')); ?>">
</head>

<body>
    <div id="web-container">
        <header class="bg-white home-header position-relative">
            <div class="overlay"></div>
            <div class="container p-2">
                <button class="btn btn-navbarCollapse" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNavbar" aria-controls="collapseNavbar" aria-expanded="false" aria-controls="collapseNavbar">
                    <i class="fa-solid fa-bars fa-xl"></i>
                </button>
                <div class="logo">
                    <a href="<?php echo e(route('home.index')); ?>">Logo</a>
                </div>
                <div class="d-flex gap-3 align-items-center">
                    <form action="#" class="positon-relative">
                        <?php echo csrf_field(); ?>
                        <div class="d-flex position-relative">
                            <input type="text" class="home-search" name="search" id="search" placeholder="Search">
                            <label for="search" class="align-items-center">
                                <span class="material-symbols-outlined search-icon">
                                    search
                                </span>
                            </label>
                        </div>
                    </form>
                    <div class="logInOut-wrapper">
                        <?php if(auth()->guard()->guest()): ?>
                        <div>
                            <a href="<?php echo e(route('login')); ?>">LOGIN</a>
                        </div>
                        <?php endif; ?>
                        <?php if(auth()->guard()->check()): ?>
                        <span class="material-symbols-outlined dropdown-toggle userDropdown" type="button" data-bs-toggle="dropdown" data-bs-target="#userCollapse" aria-expanded="false">
                            person
                        </span>
                        <div class="dropdown-menu dropdown-menu-end mt-2">
                            <div class="d-flex flex-column gap-2 align-items-start ps-4">
                                <a href="<?php echo e(route('user.info')); ?>">INFO</a>
                                <a id="logout" href="<?php echo e(route('logout')); ?>">LOG OUT</a>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div>
                        <a id="go-cart" href="<?php echo e(route('cart.index')); ?>">
                            <span class="material-symbols-outlined position-relative" style="font-size: 1.8rem;">
                                shopping_cart
                                <div class="cart-count-wrapper d-flex justify-content-center align-items-center">
                                    <div id="cart-item-count" style="font-size: 1rem;"></div>
                                </div>
                            </span>

                        </a>
                    </div>
                </div>
                <nav class="d-flex justify-content-center align-items-center p-3 nav-home w-100">
                    <ul class="d-flex gap-5 align-items-center ">
                        <li class="d-flex justify-content-center align-items-center p-1"><a href="<?php echo e(route('home.index')); ?>">Home</a></li>
                        <li class="d-flex justify-content-center align-items-center p-1"><a href="<?php echo e(route('shop')); ?>">Shop</a></li>
                        <li class="d-flex justify-content-center align-items-center p-1"><a href="<?php echo e(route('about')); ?>">About</a></li>
                        <li class="d-flex justify-content-center align-items-center p-1"><a href="<?php echo e(route('contact')); ?>">Contact</a></li>
                        <?php echo $user && $user->type == 'admin' ? '<li class="d-flex align-items-center"><a href="'. route('admin.index') .'">Admin</a></li>' :''; ?>

                    </ul>
                </nav>
            </div>
            <div class="collapse" id="collapseNavbar">
                <div class="d-flex ">
                    <ul class="d-flex flex-column gap-2 align-items-start p-2">
                        <li class="d-flex justify-content-center align-items-center p-1">
                            <?php if(auth()->guard()->guest()): ?>
                            <a href="<?php echo e(route('login')); ?>">LOGIN</a>
                            <?php endif; ?>
                            <?php if(auth()->guard()->check()): ?>
                            <span class="material-symbols-outlined dropdown-toggle userDropdown" type="button" data-bs-toggle="dropdown" data-bs-target="#userCollapse" aria-expanded="false">
                                person
                            </span>
                            <div class="dropdown-menu dropdown-menu-end mt-2">
                                <div class="d-flex flex-column gap-2 align-items-start ps-4">
                                    <a href="<?php echo e(route('user.info')); ?>">INFO</a>
                                    <a id="logout" href="<?php echo e(route('logout')); ?>">LOG OUT</a>
                                </div>
                            </div>
                            <?php endif; ?>
                        </li>
                        <li class="d-flex justify-content-center align-items-center p-1"><a href="<?php echo e(route('home.index')); ?>">Home</a></li>
                        <li class="d-flex justify-content-center align-items-center p-1"><a href="<?php echo e(route('shop')); ?>">Shop</a></li>
                        <li class="d-flex justify-content-center align-items-center p-1"><a href="<?php echo e(route('about')); ?>">About</a></li>
                        <li class="d-flex justify-content-center align-items-center p-1"><a href="<?php echo e(route('contact')); ?>">Contact</a></li>
                        <?php echo $user && $user->type == 'admin' ? '<li class="d-flex align-items-center"><a href="'. route('admin.index') .'">Admin</a></li>' :''; ?>

                    </ul>
                </div>
            </div>
        </header><?php /**PATH C:\Users\m1nggg\Desktop\project-demo\resources\views/user/layouts/header.blade.php ENDPATH**/ ?>