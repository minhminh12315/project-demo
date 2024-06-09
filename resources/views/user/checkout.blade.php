@extends('user.layouts.master')

@section('content')
<div class="container checkout-form">
    <h2>List Item</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Color</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody id="checkOut">

        </tbody>
    </table>
    <div >
        <span id="checkOutTotal"></span>
    </div>
    <h2>Checkout</h2>
    <form>
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input disabled type="text" class="form-control" name="name" id="name" value="{{ $user->name }}">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input disabled type="email" class="form-control" name="email" id="email" value="{{ $user->email }}">
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" name="phone" id="phone" value="{{ $user->phone }}">
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control" name="address" id="address" value="{{ $user->address }}">
        </div>
        <!-- <div class="form-group">
            <select class="form-control" name="pay" id="">
                <option value="">Paypal</option>
                <option value="">Credit Card</option>
                <option value="">Cash</option>
            </select>
        </div> -->
        <p>Note: Currently the shop only supports direct payment upon receipt</p>
        <button id="checkOutFinal" type="button" class="btn btn-primary">Order</button>
    </form>
</div>
@endsection