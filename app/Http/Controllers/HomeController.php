<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            'user' => auth()->user(),
            'lstPrd' => Product::all(),
            'newPrd' => Product::orderBy('created_at', 'desc')->take(8)->get(),
            'title' => 'Day la trang Homepage'
        ];

        return view('home.index', $data);
    }

    public function shop()
    {
        $data = [
            'user' => auth()->user(),
            'lstPrd' => Product::all(),
            'lstCate' => Category::all(),
            'title' => 'Day la trang Shop'
        ];

        return view('home.layouts.shop', $data);
    }

    public function shopByCategory($id)
    {
        $data = [
            'user' => auth()->user(),
            'lstPrd' => Product::where('category_id', $id)->get(),
            'lstCate' => Category::all(),
            'title' => 'Day la trang Shop Detail'
        ];

        return view('home.layouts.shop', $data);
    }

    public function productDetail($id)
    {
        $data = [
            'user' => auth()->user(),
            'prd' => Product::find($id),
            'lstCate' => Category::all(),
            'title' => 'Day la trang Product Detail'
        ];

        return view('home.layouts.product-detail', $data);
    }
}
