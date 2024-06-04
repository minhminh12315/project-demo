<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
    <h1>Hello World</h1>
    <div class="row">
    @foreach ($lstPrd as $prd)
        <div class="col-6">
            <div class="card">
                <img src="{{$prd->image}}" class="card-img-top" alt="{{$prd->name}}">
                <div class="card-body">
                    <h5 class="card-title">{{$prd->name}}</h5>
                    <p class="card-text"> {{$prd->description}} </p>
                    <p class="card-text"> {{$prd->price}} </p>
                    <div><a class="" href="#">Add Cart</a></div>
                </div>
            </div>
        </div>
    @endforeach
    </div>
    </div>
</body>
</html>