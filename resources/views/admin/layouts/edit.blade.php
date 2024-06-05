@extends('admin.layouts.master')

@section('content')
    <div class="content-wrapper ">
    <form action="{{ route('edit.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Product Name:</label>
            <input value="{{ $product->name }}" type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" id="description" class="form-control" required>{{ $product->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="price">Price:</label>
            <input value="{{ $product->price }}" type="number" name="price" id="price" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="image">Image:</label>
            
            <input type="file" name="image" id="image" class="form-control" required>
        </div>
        <img id="image-show" src=" {{ asset('assets/image'. $product->image)}} " width="100px" height="100px" alt="">

        <div class="form-group">
            <label for="category">Category:</label>
            <select name="category_id" id="category" class="form-control" required>
                @foreach ($lstCat as $cat)
                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary mt-2">Update Product</button>
    </form>
</div>


@endsection

<script>
    $('#image').change(function(){
        var file = $(this)[0].files[0];
        var reader = new FileReader();
        reader.onload = function(e){
            $('#image-show').attr('src', e.target.result);
        }
        reader.readAsDataURL(file);
    });
</script>