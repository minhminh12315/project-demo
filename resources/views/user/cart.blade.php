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
    <header class="bg-white mb-5">
        <div class="d-flex justify-content-between p-3 align-items-center ms-5 ps-5">
            <div class="logo">
                <a href="{{ route('home.index') }}">Logo</a>
            </div>
            <nav>
                <ul class="d-flex gap-5 align-items-center ">
                    <li class="d-flex align-items-center"><a href="{{ route('shop') }}">Shop</a></li>
                    <li class="d-flex align-items-center"><a href="#">About</a></li>
                    <li class="d-flex align-items-center"><a href="#">Contact</a></li>
                    {!! $user && $user->type == 'admin' ? '<li class="d-flex align-items-center"><a href="'. route('admin.index') .'">Admin</a></li>' :''!!}
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
                    <a id="go-cart" href="{{ route('cart.index') }}">
                        <span class="material-symbols-outlined">
                            shopping_cart
                        </span>
                    </a>
                    <span id="cart-item-count"></span>
                </div>
            </div>
        </div>
    </header>
    <section>
        <div class="container">
            <h1 class="text-center mt-5 mb-5"> Cart </h1>
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
                            </tr>
                        </thead>
                        <tbody id="cart">

                        </tbody>
                    </table>
                    <div class="text-right mt-5">
                        <h3 id="total"> </h3>
                        <a href="{{ route('home.checkout') }}" class="btn btn-primary">Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer class="mt-5">
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
        $(document).ready(function(event) {
            function displayCart() {
                let cart = JSON.parse(localStorage.getItem('cart')) || [];
                let cartContainer = $('#cart');
                cartContainer.empty();
                let total = 0;
                cart.forEach(function(item) {
                    total += item.price * item.quantity;
                });

                $('#total').text('Total: ' + total.toFixed(2) + '$');

                if (cart.length === 0) {
                    cartContainer.append('<p>Your cart is empty</p>');
                } else {
                    cart.forEach(function(item, index) {
                        let totalEachItem = item.price * item.quantity;
                        console.log(totalEachItem);
                        let itemHtml = `
                            <tr>
                                <td>
                                    <img class="" src="${item.img}" alt="${item.name}" height="100px">
                                </td>
                                <td >${item.name}</td>
                                <td>${item.color}</td>
                                <td>${item.price}</td>
                                <td>
                                    <input  id="quantity" type="number" value="${item.quantity}" >
                                </td>
                                <td>${totalEachItem.toFixed(2)} $</td>
                                <td>
                                    <button class="remove-from-cart btn btn-danger" data-index="${index}">Remove</button>
                                </td>
                            </tr>
                        `;
                        cartContainer.append(itemHtml);
                    });

                    $('.remove-from-cart').click(function() {
                        let index = $(this).data('index');
                        cart.splice(index, 1);
                        localStorage.setItem('cart', JSON.stringify(cart));
                        displayCart();
                    });
                }
            }
            displayCart();
        });
    </script>
</body>

</html>