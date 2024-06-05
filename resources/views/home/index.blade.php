<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('assets/css/home/index.css')}}">


</head>

<body>
    <header>
        <div class="d-flex justify-content-between p-3 align-items-center">
            <div class="logo">
                Logo
            </div>
            <nav>
                <ul class="d-flex gap-5 align-items-center">
                    <li class="d-flex align-items-center"><a href="#">Shop</a></li>
                    <li class="d-flex align-items-center"><a href="#">About</a></li>
                    <li class="d-flex align-items-center"><a href="#">Contact</a></li>
                </ul>
            </nav>
            <div class="d-flex gap-3 align-items-center">
                <form action="#">
                    @csrf
                    <div class="d-flex position-relative">
                        <input type="text" class="home-search" name="search" id="search" placeholder="Search">
                        <label for="search align-items-center">
                            <span class="material-symbols-outlined ">
                                search
                            </span>
                        </label>
                    </div>
                </form>
                {!! $user ? 
                'Hello, ' . $user->name : 
                '<a href="'. route('login') .'" class="">
                    <span class="material-symbols-outlined">
                        person
                    </span>
                </a>' !!}
                <div>
                    <a href="#">
                        <span class="material-symbols-outlined">
                            shopping_cart
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </header>
    <section>
        <div class="slide">
            <div class="slide-content position-relative">
                <img src="{{asset('assets/image/anhDepTrai.jpg')}}" alt="{{ $user ? $user->name : 'image'}}">
                <a href="#" class="btn-shop-now">Shop Now</a>
            </div>
        </div>
        
        <div class="container ">
            <h1 class="text-center mt-5 mb-5"> News Collection </h1>
            <div class="row">
                @foreach ($newPrd as $prd)
                <div class="col-3">
                    <div class="card mb-2">
                        <img src="{{asset('assets/image/anhDepTrai.jpg')}}" alt="">
                        <div class="card-body">
                            <h5 class="card-title
                            ">{{$prd->name}}</h5>
                            <p class="card-text">{{$prd->description}}</p>
                            <a href="#" class="btn btn-primary btn-add-to-card">Add To Cart</a>
                        </div>
                    </div>
                </div>
                @endforeach
                
            </div>
        </div>   
    </section>
    
</body>

</html>