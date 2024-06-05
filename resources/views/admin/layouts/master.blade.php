<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="{{asset('assets/css/admin/index.css')}}">
</head>

<body>
        <div class="row">
                <sidebar class="col-2">
                        <logo>
                                <a href="{{ route('home.index') }}">Logo</a>
                        </logo>
                        <user class="d-flex">
                                <img src="{{asset('assets/image/anhDepTrai.jpg')}}" alt="avatar">
                                <div>{{$name}}</div>
                        </user>
                        <ul>    
                                <li><a href="{{ route('home.index') }}">Go Page</a></li>
                                <li><a href="#">Product</a></li>
                                <li><a href="{{ route('addnew')}}">Add new</a></li>
                        </ul>
                </sidebar>
                <div class="col-10 right-site">
                        <div class="ps-3">
                                <header >
                                        <nav>
                                                <div>Here is the admin page</div>
                                        </nav>
                                </header>
                        </div>
                        <div class="content-wrapper">
                                @yield('content')
                        </div>
                </div>
        </div>
</body>

</html>