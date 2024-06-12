@extends('admin.layouts.master')

@section('content')
<div class="content-wrapper ">
<form action="{{ route('addnew.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="name">Title: </label>
        <input type="text" name="name" id="name" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="description">Description: </label>
        <textarea name="description" id="description" class="form-control" required></textarea>
    </div>

    <div class="form-group">
        <label for="images">Image: </label>
        <input type="file" name="images[]" id="images" class="form-control" multiple>
    </div>

    <div class="form-group">
        <label for="category">Category: </label>
        <select name="category_id" id="category" class="text-capitalize form-control" required>
            @if ($category->count() > 0)
            @foreach ($category as $cat)
            <option class="text-capitalize" value="{{$cat->id}}">{{$cat->name}}</option>
            @endforeach
            @endif
        </select>
        <p>If you want to add a new Category, please go to the bottom of the page.</p>
    </div>

    <div>
        <button type="button" class="btn btn-info badge mt-2" id="add_variant">Add Variant</button>
    </div>

    <div id="variants_container"></div>

    <button type="button" class="btn btn-info badge mt-2" id="generate_combinations">Generate Combinations</button>

    <div id="combinations_container"></div>

    <button type="submit" class="btn btn-primary mt-2">Add Product</button>
</form>

    <button class="btn btn-info badge addnew_category mt-4" type="button">Add new Category</button>
    <form id="form_addnew_category">

        <div class="form-group">
            <label for="category_addnew">Category: </label>
            <input type="text" name="category_addnew" id="category_addnew" class="form-control" required>
        </div>
        <label for="parent_id" class="form-label">Parent Category</label>
        <select name="parent_id" id="parent_id">

            <option value="">None</option>
            @foreach($category as $category)
            <option value="{{ $category->id }}" {{ old('parent_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
            @endforeach
        </select>
        <button type="button" id="store_category" class="btn btn-primary mt-2">Add Category</button>
        <button type="button" id="cancel_category" class="btn btn-danger mt-2">Cancel</button>
    </form>
</div>



@endsection