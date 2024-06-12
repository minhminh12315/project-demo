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
<<<<<<< Updated upstream
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
=======
            <div class="row bg-white g-2 mb-2">
                <div class="col-lg-5 col-md-6 col-12">
                    <div class="d-flex justify-content-center align-items-center img-prdDetail">
                        <img id="image" src="{{asset('assets/image/'. $prd->image)}}" height="350px" alt="">
                    </div>
                </div>
                <div class="col-lg-7 col-md-6 col-12">
                    <div class="d-flex flex-column gap-4 h-100 p-4">
                        <h3 hidden id="id">{{$prd->id}}</h3>
                        <h3 class="fw-bold" id="name">{{$prd->name}}</h3>
                        <div class="fw-normal fs-4" id="price">{{$prd->price}}$</div>
                        <!-- <div class="card-text ">{{$prd->description}}</div> -->
                        <div class="inp-color d-flex flex-row flex-wrap gap-2">
                            <span class="fw-normal fs-4">COLOR:</span>
                            <ul class="d-flex justify-content-center align-items-center flex-wrap gap-2">
                                <li class="">RED</li>
                                <li class="">BLUE</li>
                                <li class="">GREEN</li>
                                <li class="">YELLOW</li>
                                <li class="">BLACK</li>
                            </ul>
                        </div>
                        <div class="inp-size d-flex flex-row flex-wrap gap-2">
                            <span class="fw-normal fs-4">SIZE:</span>
                            <ul class="d-flex justify-content-center align-items-center flex-wrap gap-2">
                                <li class="">S</li>
                                <li class="">M</li>
                                <li class="">L</li>
                                <li class="">XL</li>
                                <li class="">XXL</li>
                            </ul>
                        </div>
                        <div>
                            <a type="submit" id="addToCart" class="btn btn-secondary w-50">Add to card</a>
                        </div>
                    </div>
>>>>>>> Stashed changes
                </div>
            </div>
            
        </div>
    </div>
</main>

@endsection