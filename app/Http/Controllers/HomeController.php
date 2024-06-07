<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        return view('user.index', $data);
    }

    public function shop()
    {
        $data = [
            'user' => auth()->user(),
            'lstPrd' => Product::all(),
            'lstCate' => Category::all(),
            'title' => 'Day la trang Shop'
        ];

        return view('user.shop', $data);
    }

    public function shopByCategory($id)
    {
        $data = [
            'user' => auth()->user(),
            'lstPrd' => Product::where('category_id', $id)
                                ->groupBy('name')
                                ->select(DB::raw('MIN(id) as id'),'name', DB::raw('ROUND(AVG(price),2) as price'), DB::raw('MIN(image) as image'))
                                ->get(),
            'lstCate' => Category::all(),
            'title' => 'Day la trang Shop Detail'
        ];

        return view('user.shop', $data);
    }

    public function productDetail($id)
    {
        $user = auth()->user();
        $prd = Product::find($id);
        $color = Product::where('name', $prd->name)->select('color')->distinct()->get();
        $size = Product::where('name', $prd->name)->select('size')->distinct()->get();
        $lstCate = Category::all();
        $title = 'Day la trang Product Detail';

        $data = compact('user', 'prd', 'color', 'lstCate', 'title', 'size');

        return view('user.product-detail', $data);
    }
}
