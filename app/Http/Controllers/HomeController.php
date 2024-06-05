<?php

namespace App\Http\Controllers;

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
}
