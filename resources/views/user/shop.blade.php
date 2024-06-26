@extends('user.layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3">
            <sidebar>
                <div class="category-card p-4">
                    <h3>Categories</h3>

                    <ul class="sidebar-list d-flex flex-column gap-2">

                        @foreach ($lstCateSubCate as $cate)
                        <li class="p-1"><a class="h-100 w-100 text-capitalize" href="{{ route('shop.category', ['id' => $cate->id]) }}">{{ $cate->name }}</a>
                            <ul>
                                @foreach ($cate->subCategory as $sub)
                                <div class="text-danger d-flex justify-content-end text-capitalize">{{$sub->name}}</div>
                                @endforeach
                            </ul>
                        </li>
                        @endforeach

                    </ul>
                </div>
            </sidebar>
        </div>
        <div class="col-9">
            <h2>
                @if (isset($lstPrd->category))
                {{$lstPrd->$category->name}}
                @endif
            </h2>
            <div class="row g-2 row-cols-md-3 row-cols-sm-2 row-cols-1">

                @foreach ($lstPrd as $prd)
                <div class="col">
                    <div class="card mb-2">
                        <div class="overflow-hidden">
                            <img src="{{asset('assets/image/'. $prd->image)}}" class="card-img-top" alt="">
                            <a href="{{ route('product.detail', $prd->name) }}" class="btn btn-secondary w-75 btn-seeDetail">See Detail</a>
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
    </div>
</div>
<div>
@php
$firstImage = true;
@endphp
    @foreach ($lstPrd as $prd)
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
@endsection