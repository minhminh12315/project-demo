@extends('home.layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3">
            <sidebar>
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h3>Categories</h3>
                        </div>
                        <div class="cart-text">
                            <ul class="sidebar-list">
                                @foreach ($lstCate as $cate)
                                <li class="pb-2">
                                    <a class="h-100 w-100" href="{{ route('shop.category', ['id' => $cate->id]) }}">{{ $cate->name }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </sidebar>
        </div>
        <div class="col-9">
            <div class="row">
                @foreach($lstPrd as $prd)
                <div class="col-3 mb-2">
                    <div class="card">
                        <div class="card-body">
                            <img src="{{asset('assets/image/'. $prd->image)}}" height="100%" width="100%" alt="">
                            <div class="card-title">{{$prd->name}}</div>
                            <div class="card-text">{{$prd->price}} $</div>
                            <div class="card-text">{{$prd->description}}</div>
                            <a class="btn btn-primary" href="{{ route('product.detail', $prd->id) }}">See Detail</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection