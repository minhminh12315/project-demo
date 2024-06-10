@extends('user.info')

@section('info-content')
<main>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Setting Account</h1>
                <div class="card pt-2">
                    <div class="card-body">
                        <form action="{{ route('user.info.update') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="phone" class="form-control" id="phone" name="phone" value="@if ($user->phone){{ $user->phone }}@endif" placeholder="Input your phonenumber">
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <input type="address" class="form-control" id="address" name="address" value="@if ($user->address){{ $user->address }}@endif" placeholder="Input your address">
                            </div>
                            <div class="mb-3">
                                <label for="pasword" class="form-label">pasword</label>
                                <input type="password" class="form-control" id="pasword" name="password">
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection