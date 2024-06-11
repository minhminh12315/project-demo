@extends('admin.layouts.master')

@section('content')
<div class="content-wrapper ">
    <form action="{{ route('addnew.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Product Name: </label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="description">Description: </label>
            <textarea name="description" id="description" class="form-control" required></textarea>
        </div>

        <div class="form-group">
            <label for="price">Price: </label>
            <input type="number" name="price" id="price" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="color">Color: </label>
            <select name="color" id="color" class="form-control" required>
                @foreach ($lstColor as $color)
                <option class="text-capitalize" value="{{$color->id}}">{{$color->name}}</option>
                @endforeach
            </select>
        </div>
        <a class="btn btn-success mt-2" href="{{ route('addnew.color') }}">Add new color</a>

        <div class="form-group">
            <label for="size">Size: </label>
            <select name="size" id="size" class="form-control" required>
                @foreach ($lstSize as $size)
                <option class="" value="{{$size->id}}">{{$size->name}}</option>
                @endforeach
            </select>
        </div>
        <a class="btn btn-success mt-2" href="{{ route('addnew.size') }}">Add new size</a>

        <div class="form-group">
            <label for="quantity">Quantity: </label>
            <input type="number" name="quantity" id="quantity" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="images">Image: </label>
            <input type="file" name="images[]" id="images" class="form-control" multiple>
        </div>

        <div class="form-group">
            <label for="category">Category: </label>
            <select name="category_id" id="category" class="text-capitalize form-control" required>
                @foreach ($lstCat as $cat)
                <option class="text-capitalize" value="{{$cat->id}}">{{$cat->name}}</option>
                @endforeach
            </select>
        </div>
        <a class="btn btn-success mt-2" href="{{ route('addnew.category') }}">Add new Category</a>

        <div class="form-group">
            <label for="sub_category">Sub_Category: </label>
            <select name="sub_category_id" id="sub_category" class="text-capitalize form-control" required>
                @foreach ($lstSubCat as $subCat)
                <option class="text-capitalize" value="{{$subCat->id}}">{{$subCat->name}}</option>
                @endforeach
            </select>
        </div>
        <a class="btn btn-success mt-2" href="{{ route('addnew.subcategory') }}">Add new Category</a>

        <button type="submit" class="btn btn-primary mt-2">Add Product</button>
    </form>
</div>
@foreach ($lstSubCat as $subCat)

{{$subCat}}     

@endforeach


@endsection