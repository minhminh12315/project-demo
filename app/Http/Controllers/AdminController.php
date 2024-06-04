<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $data = [
            'lstPrd' => Product::all(),
            "type" => true,
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
}
