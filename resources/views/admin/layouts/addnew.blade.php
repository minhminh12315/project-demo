@extends('admin.layouts.master')

@section('content')
    <div class="content-wrapper ">
    <form action="{{ route('addnew.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Product Name:</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" id="description" class="form-control" required></textarea>
        </div>

        <div class="form-group">
            <label for="price">Price:</label>
            <input type="number" name="price" id="price" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="image">Image:</label>
            <input type="file" name="image" id="image" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="category">Category:</label>
            <select name="category_id" id="category" class="form-control" required>
                @foreach ($lstCat as $cat)
                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary mt-2">Add Product</button>
    </form>
</div>


@endsection