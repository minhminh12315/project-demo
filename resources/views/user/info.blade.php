@extends('user.layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3">

            <sidebar>
                <div class="category-card p-4">
                    <h3>My Account</h3>
                    <ul class="sidebar-list d-flex flex-column gap-2">
                        <li class="p-1"><a class="h-100 w-100" href="{{ route('user.info') }}">Info</a></li>
                        <li class="p-1"><a class="h-100 w-100" href="{{ route('user.info.edit') }}">Account</a></li>
                        <li class="p-1"><a class="h-100 w-100" href="{{ route('user.info.edit.password') }}">Change Password</a></li>
                        <li class="p-1"><a class="h-100 w-100" href="{{ route('user.orders') }}">Orders</a></li>
                    </ul>
                </div>
            </sidebar>
        </div>
        <div class="col-9">
            @yield('info-content')
        </div>
    </div>
</div>

@endsection