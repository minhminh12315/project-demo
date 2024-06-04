<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            'lstPrd' => Product::all(),
            'title' => 'Day la trang Homepage'
        ];

        return view('home.index', $data);
    }
}
