<div class="content-wrapper">
    <div class="content-head">
        <div class="container-fluid">
            <div class="row mb-2">
                Dashboard
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Edit Product</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach ($lstPrd as $product)
                            <div class="col-md-3">
                                <div class="card mb-2">
                                    <img src="{{asset('assets/image/anhDepTrai.jpg
                                    ')}}" class="img-fluid"  alt="{{$product->name}}" width="100px" height="100px">
                                    <div class="card-title ">{{$product->name}}</div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>