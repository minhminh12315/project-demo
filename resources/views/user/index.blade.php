@extends('user.layouts.master')


@section('content')
<section>

    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            @foreach ($newPrd as $key => $prd)
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{$key}}" class="{{ $key == 0 ? 'active' : '' }}" aria-label="Slide {{$key}}"></button>
            @endforeach
        </div>
        <div class="carousel-inner">
            @foreach ($newPrd as $key => $prd)
            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}" data-bs-interval="{{ $key == 0 ? '2500' : '1500' }}">
                <img src="{{asset('assets/image/'. $prd->image)}}" class="d-block w-100" alt="{{ $prd->name }}">
            </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="container .new-collection">
        <h1 class="text-center mt-5 mb-5"> News Collection </h1>
        <div class="row">
            @foreach ($newPrd as $prd)
            <div class="col-3">
                <div class="card mb-2">
                    <img src="{{asset('assets/image/'. $prd->image)}}" height="350px" alt="">
                    <div class="card-body">
                        <h5 class="card-title">
                            {{$prd->name}}
                        </h5>
                        <p class="card-text description">{{$prd->description}}</p>
                        <p class="card-text price">{{$prd->price}}$</p>
                        <a href="{{ route('product.detail', $prd->id) }}" class="btn btn-primary btn-add-to-card">See Detail</a>
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
                        <p class="card-text price">{{$prd->price}}</p>
                        <button onclick="addToCart('{{ $prd->id }}')" class="btn btn-primary btn-add-to-card">Add To Cart</button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
</section>

<script>

</script>
@endsection