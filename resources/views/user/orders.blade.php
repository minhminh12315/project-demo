@extends('user.layouts.master')

@section('content')

 <sidebar>
    <div class="sidebar-header">
        <h3>My Account</h3>
    </div>
    <div class="sidebar-content">
        <ul class="sidebar-list">
            <li><a  href="{{ route('user.info') }}">Info</a></li>
            <li><a disabled href="{{ route('user.orders') }}">Orders</a></li>
        </ul>
    </div>
 </sidebar>
    <main>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>Info</h1>
                    <div class="card">
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
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection