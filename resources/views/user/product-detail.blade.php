@extends('user.layouts.master')

@section('content')
    <main>
        <div class="container">
            <div class="product-detail p-5">
                <div class="row bg-white">
                    <div class="col-6 ">
                        <div class="image-wrapper">
                            <img id="image" src="{{asset('assets/image/'. $prd->image)}}" height="350px" alt="">
                        </div>
                    </div>
                    <div class="col-6 ">
                        <h3 hidden id="id">{{$prd->id}}</h3>
                        <h3 class="card-title pt-4" id="name">{{$prd->name}}</h3>
                        <div class="card-text pt-3" id="price">{{$prd->price}}$</div>
                        <div class="card-text pt-2" >{{$prd->description}}</div>
                        <form action="#">
                            <div>
                                @foreach ($color as $c)
                                    <label for="color">{{$c->color}}</label>
                                    <input type="radio" name="color" class="{{ $c->color }}" value="{{$c->color}}" required>
                                @endforeach
                            </div>
                            <div>
                                @foreach ($size as $s)
                                    <label for="size">{{$s->size}}</label>
                                    <input type="radio" name="size" value="{{$s->size}}" required>
                                @endforeach
                            </div>
                            <div>
                                <input type="number" name="quantity" value="1" required>
                            </div>
                            <a type="submit" id="addToCart" class="btn btn-primary">Add to card</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    
@endsection