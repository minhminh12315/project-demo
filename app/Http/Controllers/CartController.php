<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index()
    {
        $data = [
            'user' => Auth::user()
        ];
        return view('user.cart', $data);
    }

    public function checkout()
    {
        $data = [
            'user' => Auth::user()
        ];
        return view('user.checkout', $data);
    }
}
