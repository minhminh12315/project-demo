@extends('home.layouts.master')


@section('content')
    <section>
        <div class="slide">
            <div class="slide-content position-relative">
                <img src="{{asset('assets\image\224659f4343404b05a435ab3b7697fb4.jpg')}}" alt="{{ $user ? $user->name : 'image'}}">
                <a href="#" class="btn-shop-now">Shop AN</a>
            </div>
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
@endsection    
    