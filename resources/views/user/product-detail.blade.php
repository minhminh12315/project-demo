@extends('user.layouts.master')

@section('content')


<main>
    <div class="container">
        @if (isset($prdName->category))
        <a class="product-detail-link" href="{{ route('home.index') }}">Main Page</a>
        <span>-></span>
        <a class="product-detail-link" href="{{ route('shop') }}">shop</a>
        <span>-></span>
        <a class="product-detail-link" href="{{ route('shop.category', ['id' => $prdName->category->id]) }}">{{ $prdName->category->name }}</a>
        <span>-></span>
        <a class="product-detail-link" href="{{ route('product.detail', $prdName->id) }}">{{ $prdName->name }}</a>
        @endif
        <div class="product-detail p-5">
            <div class="row bg-white">
                <div class="col-6 ">
                    <div class="image-wrapper">
                        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                            @php
                                $firstImage = true;
                            @endphp
                            @foreach ($prd as $prd)
                                @foreach ($prd->productVariants as $variant)
                                    @foreach ($variant->images as $image)
                                        <div class="carousel-item {{$firstImage ? 'active' : ''}}">
                                            <img src="{{asset($image->image_path)}}" height="300px" width="500px" class="d-block w-100" alt="{{$prd->name}}">
                                        </div>
                                        @php
                                            $firstImage = false;
                                        @endphp
                                    @endforeach
                                @endforeach
                            @endforeach
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-6 ">
                    <h3 class="card-title pt-4" id="name">{{$prdName->name}}</h3>
                    <div class="card-text pt-3" id="price"> 
                    </div>
                    <div class="card-text pt-2">{{$prdName->description}}</div>
                    <form action="#">
                        <div>
                            <label for="color">Color</label>
                            <select name="color" id="color">
                                @foreach ($uniqueColors as $color)
                                    <option value="{{$color}}">{{$color}}</option>
                                @endforeach
                            </select>
                            
                        </div>
                        <div>
                            <label for="size">Size</label>
                            <select name="size" id="size">
                                @if (isset($sizesByColor))
                                    @foreach ($sizesByColor as $size)
                                        <option value="{{$size}}">{{$size}}</option>
                                    @endforeach
                                    @else
                                    @foreach ($uniqueSizes as $size)
                                    <option value="{{$size}}">{{$size}}</option>
                                    @endforeach
                                    @endif
                            </select>
                        </div>
                        <div>
                            <input type="number" name="quantity" id="quantity" value="1" required>
                        </div>
                        <a type="submit" id="addToCart" class="btn btn-primary mt-3">Add to card</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection