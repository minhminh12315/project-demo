<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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

    public function storeOrder(Request $request)
    {   
        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->total = $request->total;
        $order->phone = $request->phone;
        $order->address = $request->address;
        $order->save();

        foreach ($request->data as $item) {
            try {
                $orderDetail = new OrderDetail();
                $orderDetail->order_id = $order->id;
                $orderDetail->product_id = $item['id'];
                $orderDetail->quantity = $item['quantity'];
                $orderDetail->price = $item['price'];
                $orderDetail->save();
    
                Log::info('OrderDetail saved: ' . $orderDetail->id);
            } catch (Exception $e) {
                Log::error('Error saving OrderDetail: ' . $e->getMessage());
            }
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Order created successfully'
        ]);
    }
}
