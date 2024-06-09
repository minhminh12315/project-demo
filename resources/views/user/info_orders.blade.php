@extends('user.info')

@section('info-content')
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
                                    <th scope="col">Order ID</th>
                                    <th scope="col">Product Name: </th>
                                    <th scope="col">Quantity: </th>
                                    <th scope="col">Price: </th>
                                    <th scope="col">Total: </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($lstOrder as $order)
                                @foreach($order->orderDetails as $orderDetail)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $orderDetail->product->name }}</td>
                                    <td>{{ $orderDetail->quantity }}</td>
                                    <td>{{ $orderDetail->product->price }}</td>
                                    <td>{{ $orderDetail->total }}</td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td colspan="4" class="text-end">Total: </td>
                                    <td>{{ $order->total }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</main>
<div>

</div>
@endsection