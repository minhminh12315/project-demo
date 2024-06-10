@extends('admin.layouts.master')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container">
        <h2>Add new Sub_Category</h2>
        <form action="{{ route('addnew.subcategory.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Sub_Category Name:</label>
                <input type="text" name="name" id="name" class="text-capitalize form-control" required>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Add Sub_Category</button>
        </form>
    </div>

@endsection