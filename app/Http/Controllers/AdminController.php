<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $data = [
            'lstPrd' => Product::with('category')->get(),
            "type" => true,
            'name' => auth()->user()->name
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
        return redirect()->route('login');
    }

    public function authenticate(Request $request)
    {   
        $rememberme = $request->has('rememberme') ? true : false;
        $credentials = $request->only('name', 'password');

        if (auth()->attempt($credentials, $rememberme)) {
            $user = auth()->user();
            if($user->type == 'admin') {
                return redirect()->route('admin.index');
            }
            return redirect()->route('home.index');
        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ]);

    }

    public function admin() {
        return view('admin.index');
    }

    public function addnew() {
        $data = [
            'lstCat' => Category::all(),
            "type" => true,
            'name' => auth()->user()->name
        ];
        return view('admin.layouts.addnew', $data);
    }    

    public function storeProduct(Request $request) {
        $product = new Product;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        $image = $request->image;

        if($image)
        {
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('assets/image', $imagename);
            $product->image = $imagename;
        }

        $product->save();

        return redirect()->route('admin.index');
    }

    public function edit($id) {
        $data = [
            'product' => Product::find($id),
            'lstCat' => Category::all(),
            "type" => true,
            'name' => auth()->user()->name
        ];
        return view('admin.layouts.edit', $data);
    }

    public function update(Request $request, $id) {
        $product = Product::find($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        $image = $request->image;

        if($image)
        {
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('assets/image', $imagename);
            $product->image = $imagename;
        }

        $product->save();

        return redirect()->route('admin.index');
    }

    public function delete($id) {
        Product::destroy($id);
        return redirect()->route('admin.index');
    }
}
