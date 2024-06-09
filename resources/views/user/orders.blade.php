@extends('user.layouts.master')

@section('content')

<div class="row container">
    <div class="col-3">
        <sidebar>
            <div class="sidebar-header">
                <h3>My Account</h3>
            </div>
            <div class="sidebar-content">
                <ul class="sidebar-list">
                    <li><a href="{{ route('user.info') }}">Info</a></li>
                    <li><a disabled href="{{ route('user.orders') }}">Orders</a></li>
                </ul>
            </div>
        </sidebar>
    </div>
    <div class="col-9">
        <main>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h1>Orders</h1>
                        <div class="card">
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Order ID</th>
                                            <th scope="col">Total</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($lstOrder as $order)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $order->id }}</td>
                                            <td>{{ $order->total }}</td>
                                            <td>{{ $order->status }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
        </main>
    </div>
</div>



@endsection