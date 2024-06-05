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
                Logo
            </div>
            <nav>
                <ul class="d-flex gap-5 align-items-center">
                    <li class="d-flex align-items-center"><a href="#">Shop</a></li>
                    <li class="d-flex align-items-center"><a href="#">About</a></li>
                    <li class="d-flex align-items-center"><a href="#">Contact</a></li>
                    {!! $user->type == 'admin' ?
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
                    {!! $user ? $user->name :
                    '<a href="'. route('login') .'" >
                        <span class="material-symbols-outlined">
                            person
                        </span>
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
    <section>
        <div class="slide">
            <div class="slide-content position-relative">
                <img src="{{asset('assets/image/anhDepTrai.jpg')}}" alt="{{ $user ? $user->name : 'image'}}">
                <a href="#" class="btn-shop-now">Shop Now</a>
            </div>
        </div>

        <div class="container .new-collection">
            <h1 class="text-center mt-5 mb-5"> News Collection </h1>
            <div class="row">

                @foreach ($newPrd as $prd)
                <div class="col-3">
                    <div class="card mb-2">
                        <img src="{{asset('assets/image/'. $prd->image)}}" alt="">
                        <div class="card-body">
                            <h5 class="card-title
                            ">{{$prd->name}}</h5>
                            <p class="card-text description">{{$prd->description}}</p>
                            <p class="card-text price">{{$prd->price}}$</p>
                            <button onclick="addToCart('{{ $prd->id }}')" class="btn btn-primary btn-add-to-card">Add To Cart</button>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>

        <div class="container best-seller">
            <h1 class="text-center mt-5 mb-5"> Best Seller </h1>
            <div class="row">

                @foreach ($newPrd as $prd)
                    <div class="col-3">
                        <div class="card mb-2">
                            <img src="{{asset('assets/image/' . $prd->image)}}" alt="">
                            <div class="card-body">
                                <h5 class="card-title ">{{$prd->name}}</h5>
                                <p class="card-text description">{{$prd->description}}</p>
                                <p class="card-text price">{{$prd->price}}</p>
                                <button onclick="addToCart('{{ $prd->id }}')" class="btn btn-primary btn-add-to-card">Add To Cart</button>
                            </div>
                        </div>
                    </div>
                @endforeach
        </div>
    </section>
    
    <footer>
        <div class="container pt-3">
            <div class="row">
                <div class="col-3">
                    <h3>Logo</h3>
                    <p>Address</p>
                    <p>Phone</p>
                    <p>Email</p>
                </div>
                <div class="col-3">
                    <h3>Information</h3>
                    <ul>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">Shop</a></li>
                    </ul>
                </div>
                <div class="col-3">
                    <h3>Follow Us</h3>
                    <ul>
                        <li><a href="https://www.facebook.com/minhminh12315">Facebook</a></li>
                        <li><a href="https://www.instagram.com/">Instagram</a></li>
                        <li><a href="#">Twitter</a></li>
                    </ul>
                </div>
                <div class="col-3">
                 <h3>Legal</h3>
                    <ul>
                        <li><a href="#">Terms of Use</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <script>
        function addToCart(productId) {
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            console.log('CSRF Token:', csrfToken);
            console.log('Product ID:', productId);
            $.ajax({
                url: "{{ route('cart.add') }}",
                type: 'POST',
                data: {
                    _token: csrfToken,
                    product_id: productId
                },
                success: function(response) {
                    if (response.success) {
                        $('#cart-item-count').text(response.item_count);
                    }
                }
            });
        }
        $(document).ready(function() {
            $.ajax({
                url: "{{ route('cart.count') }}",
                method: 'GET',
                success: function(response) {
                    $('#cart-item-count').text(response.item_count);
                }
            });
        });
    </script>
</body>

</html>