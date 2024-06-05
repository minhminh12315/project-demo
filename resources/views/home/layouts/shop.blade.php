<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="{{asset('assets/css/home/index.css')}}">
</head>

<body>
    <header>
        <div class="d-flex justify-content-between p-3 align-items-center">
            <div class="logo">
            <a href="{{ route('home.index') }}">Logo</a>
            </div>
            <nav>
                <ul class="d-flex gap-5 align-items-center">
                    <li class="d-flex align-items-center"><a href="{{ route('shop') }}">Shop</a></li>
                    <li class="d-flex align-items-center"><a href="#">About</a></li>
                    <li class="d-flex align-items-center"><a href="#">Contact</a></li>
                    {!! $user && $user->type == 'admin' ?
                    '<li class="d-flex align-items-center"><a href="'. route('admin.index') .'">Admin</a></li>' :
                    ''!!}
                </ul>
            </nav>
            <div class="d-flex gap-3 align-items-center">
                <form action="#">
                    @csrf
                    <div class="d-flex position-relative">
                        <input type="text" class="home-search" name="search" id="search" placeholder="Search">
                        <label for="search" class="align-items-center">
                            <span class="material-symbols-outlined">
                                search
                            </span>
                        </label>
                    </div>
                </form>
                {!! $user ? $user->name . '
                <a href="'. route('logout') .'">
                    Logout
                </a>
                ' :
                '<a href="'. route('login') .'">
                    Login
                </a>'
                !!}
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
    <div class="row">
        <div class="col-3">
            
    <sidebar>
        <div class="sidebar">
            <div class="sidebar-header">
                <h3>Categories</h3>
                <button class="btn btn-primary">+</button>
            </div>
            <ul class="sidebar-list">
                @foreach ($lstCate as $cate)
                    <li>
                        <a href="{{ route('shop.category', ['id' => $cate->id]) }}">{{ $cate->name }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </sidebar>
        </div>
        <div class="col-9">
            
        
        @foreach($lstPrd as $prd)
        <div class="card">
            <div class="card-body">
                <div class="card-title">{{$prd->name}}</div>
                <img src="{{asset('assets/image/'. $prd->image)}}" height="350px" alt="">
                <div class="card-text">{{$prd->price}}</div>
                <div class="card-text">{{$prd->description}}</div>
                <a href="{{ route('product.detail', $prd->id) }}">See Detail</a>
            </div>
        </div>
        @endforeach


        </div>
    </div>

    
</body>

</html>