@extends('user.layouts.master')

@section('content')
<section class="p-0">
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" data-bs-touch="true">
        <div class="carousel-indicators">
            @foreach ($newPrd as $key => $prd)
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{$key}}" class="{{ $key == 0 ? 'active' : '' }}" aria-label="Slide {{$key}}"></button>
            @endforeach
        </div>
        <div class="carousel-inner">
            @foreach ($newPrd as $key => $prd)
            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}" data-bs-interval="{{ $key == 0 ? '4000' : '2500' }}">
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
        <div class="row g-2 row-cols-md-4 row-cols-sm-2 row-cols-1">
            @foreach ($newPrd as $prd)
            <div class="col">
                <div class="card mb-2">
                    <div class="overflow-hidden">
                        @foreach ($prd->productVariants as $variant)
                            <img src="{{asset($variant->images[0]->image_path)}}" class="card-img-top" alt="">
                        @endforeach
                        <!-- <img src="{{asset('assets/image/'. $prd->image)}}" class="card-img-top" alt=""> -->
                        <a href="{{ route('product.detail', $prd->id) }}" class="btn btn-secondary w-75 btn-seeDetail">See Detail</a>
                    </div>
                    <div class="card-body d-flex flex-column gap-2">
                        <h5 class="card-title ">
                            {{$prd->name}}
                        </h5>
                        <p class="card-text price">{{$prd->price}}$</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="container best-seller">
        <h1 class="text-center mt-5 mb-5"> Best Seller </h1>
        <div class="row g-2 row-cols-md-4 row-cols-sm-2 row-cols-1">
            @foreach ($newPrd as $prd)
            <div class="col">
                <div class="card mb-2">
                    <div class="overflow-hidden">
                        <img src="{{asset('assets/image/'. $prd->image)}}" class="card-img-top" alt="">
                        <a href="{{ route('product.detail', $prd->id) }}" class="btn btn-secondary w-75 btn-seeDetail">See Detail</a>
                    </div>
                    <div class="card-body d-flex flex-column gap-2">
                        <h5 class="card-title ">
                            {{$prd->name}}
                        </h5>
                        <p class="card-text price">{{$prd->price}}$</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<script>

</script>
@endsection