<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {   
        $user = Auth::user();

        $order = Order::firstOrCreate(
            ['user_id' => $user->id, 'status' => 'cart', 'total' => 0]
        );
        
        $orderDetail = OrderDetail::updateOrCreate(
            ['order_id' => $order->id, 'product_id' => $request->product_id],
            ['price' => $request->product_price,'quantity' => DB::raw('quantity + 1')],
        );

        $orderDetail->price = $request->product_price * $orderDetail->quantity;
        $orderDetail->save();

        $order->total = $order->orderDetails()->sum(DB::raw('price * quantity'));
        $order->save();

        $itemCount = $order->orderDetails()->sum('quantity');

        return response()->json(['success' => true, 'item_count' => $itemCount]);
    }

    public function getCartItemCount()
    {
        $user = Auth::user();

        $order = Order::where('user_id', $user->id)->where('status', 'cart')->first();
        $itemCount = $order ? $order->orderDetails()->sum('quantity') : 0;

        return response()->json(['item_count' => $itemCount]);
    }
}
