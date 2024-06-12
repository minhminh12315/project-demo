@extends('admin.layouts.master')

@section('content')
<div class="container">
    <div class="container">
    <h1>Products</h1>
    <table class="table table-bordered">
    <thead>
        <tr>
            <th>Product Name</th>
            <th>Description</th>
            <th>Category</th>
            <th>Variants</th>
            <th>Option</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
            @foreach ($product->productVariants as $productVariant)
                @foreach ($productVariant->subVariants as $index => $subVariant)
                    <tr>
                        @if ($index === 0)
                            <td rowspan="{{ count($productVariant->subVariants) }}">{{ $product->name }}</td>
                            <td rowspan="{{ count($productVariant->subVariants) }}"><p>{{ $product->description }}</p></td>
                            <td rowspan="{{ count($productVariant->subVariants) }}">{{ $product->category->name }}</td>
                        @endif
                        <td>{{ $subVariant->variantOption->variant->name }}</td>
                        <td>{{ $subVariant->variantOption->name }}</td>
                        <td>{{ $productVariant->quantity }}</td>
                        <td>${{ number_format($productVariant->price, 2) }}</td>
                        @if ($index === 0)
                            <td rowspan="{{ count($productVariant->subVariants) }}">
                                <button>Update</button>
                                <button>Delete</button>
                            </td>
                        @endif
                    </tr>
                @endforeach
            @endforeach
        @endforeach
    </tbody>
    </table>

    <h1>Products</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Description</th>
                <th>Category</th>
                @foreach ($variants as $var)
                    <th>{{$var->name}}</th>
                @endforeach
                <th>Quantity</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            @foreach ($product->productVariants as $productVariant)
            <tr>
                <td rowspan="{{ count($productVariant->subVariants) }}">{{ $product->name }}</td>
                <td rowspan="{{ count($productVariant->subVariants) }}">{{ $product->description }}</td>
                <td rowspan="{{ count($productVariant->subVariants) }}">{{ $product->category->name }}</td>
                @foreach ($productVariant->subVariants as $index => $subVariant)
                @if($index > 0)
            </tr>
            <tr>
                @endif
                <td>
                    <div>{{ $subVariant->variantOption->variant->name }}: {{ $subVariant->variantOption->name }}</div>
                </td>
                <td>{{ $productVariant->quantity }}</td>
                <td>${{ number_format($productVariant->price, 2) }}</td>
                @endforeach
            </tr>
            @endforeach
            @endforeach
        </tbody>
    </table>

    <div class="row">
        @foreach ($products as $product)
        @if($product->images->first())
        {{ $product->name }}
        <div>
            <img src="{{$product->images->first()->path}}" class="img-fluid" width="200px" height="100px" alt="">
        </div>
        @endif
        @endforeach
    </div>

    

</div>

@endsection