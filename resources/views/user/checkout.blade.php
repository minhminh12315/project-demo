@extends('user.layouts.master')

@section('content')
<div class="container checkout-form">

    <h2>Checkout</h2>
    <form action="">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email" value="{{ $user->email }}">
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" name="phone" id="phone" value="{{ $user->phone }}">
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control" name="address" id="address" value="{{ $user->address }}">
        </div>
        <div class="form-group">
            <select class="form-control" name="pay" id="">
                <option value="">Paypal</option>
                <option value="">Credit Card</option>
                <option value="">Cash</option>
            </select>
        </div>
    </form>
</div>
@endsection