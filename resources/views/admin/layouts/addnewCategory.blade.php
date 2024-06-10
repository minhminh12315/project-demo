@extends('admin.layouts.master')

@section('content')
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h2>Add new Category</h2>
        <form action="{{ route('addnew.category.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Category Name:</label>
                <input type="text" name="name" id="name" class="text-capitalize form-control" required>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Add Category</button>
        </form>
    </div>
@endsection