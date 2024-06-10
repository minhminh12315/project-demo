@extends('admin.layouts.master')

@section('content')
<div class="w-100 gap-3 ps-3">
    <h1>List Product</h1>
    <!-- <table class="table table-bodered table-list-product mt-2">
        <thead>
            <th>Id</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Category</th>
            <th>Image</th>
            <th>Actions</th>

        </thead>
        <tbody>
            @foreach($lstPrd as $prd)
            <tr>
                <td>{{$prd->id}}</td>
                <td>{{$prd->name}}</td>
                <td>{{$prd->description}}</td>
                <td>
                    @foreach($prd->productVariants as $variant)
                    {{$variant->price}}
                    @if (!$loop->last)
                    ,
                    @endif
                    @endforeach
                </td>
                <td>{{$prd->category->name}}</td>
                <td>
                    @foreach ($prd->productVariants as $variant)
                    @foreach ($variant->images as $i)
                    <img src="{{ asset('' . $i->image_path) }}" alt="" width="100px" height="100px">
                    @endforeach
                    @endforeach
                </td>
                <td>
                    <div class="d-flex pt-1">
                        <a class="btn btn-primary" href="{{ route('edit', $prd->id) }}">Edit</a>
                        <a class="btn btn-danger ms-1" href="{{ route('destroy', $prd->id) }}">Delete</a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table> -->
    @foreach ($variant->images as $i)
        <img src="{{ asset($i->image_path) }}" alt="" width="100px" height="100px">
    @endforeach
</div>
@endsection