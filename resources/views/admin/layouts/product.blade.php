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
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Edit Product</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach ($lstPrd as $product)
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-title">{{$product->name}}</div>
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