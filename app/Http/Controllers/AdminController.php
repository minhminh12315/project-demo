<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddnewCategoryRequest;
use App\Http\Requests\AddnewColorRequest;
use App\Http\Requests\AddnewSizeRequest;
use App\Http\Requests\AddnewSubCategoryRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\Category;
use App\Models\CategorySubCategory;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\ProductVariantImage;
use App\Models\Size;
use App\Models\SubCategory;
use App\Models\User;
use App\Models\Variant;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $data = [
            'name' => auth()->user()->name,
            'products' => Product::with(['category', 'images', 'productVariants.subVariants.variantOption.variant'])->get(),
            'variants' => Variant::all(),
        ];

        return view('admin.index', $data);
    }

    public function login()
    {
        return view('layouts.login');
    }

    public function register()
    {
        return view('layouts.register');
    }

    public function store(RegisterRequest $request)
    {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ];

        User::create($data);

        return redirect()->route('login');
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('home.index');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('name', 'password');

        if (auth()->attempt($credentials)) {
            $user = auth()->user();
            if ($user->type == 'admin') {
                return redirect()->route('admin.index');
            }
            return redirect()->route('home.index');
        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ]);
    }

    public function admin()
    {
        return view('admin.index');
    }

    public function addnew()
    {
        $data = [
            'lstCat' => Category::all(),
            "type" => true,
            'name' => auth()->user()->name
        ];

        return view('admin.layouts.addnew', $data);
    }

    
}
