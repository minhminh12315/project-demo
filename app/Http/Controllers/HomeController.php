<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateInfoRequest;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            'user' => auth()->user(),
            'lstPrd' => Product::all(),
            'newPrd' => Product::orderBy('created_at', 'desc')->take(10)->get(),
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
                ->select(DB::raw('MIN(id) as id'), 'name', DB::raw('ROUND(AVG(price),2) as price'), DB::raw('MIN(image) as image'))
                ->with(['category'])->get(),
            'lstCate' => Category::all(),
            'title' => 'Day la trang Shop Detail'
        ];

        return view('user.shop', $data);
    }

    public function productDetail($id)
    {
        $user = auth()->user();
        $prd = Product::find($id);
        $lstCate = Category::all();
        $color = Product::find($id)->productVariants->groupBy('color')->keys();
        $size = Product::find($id)->productVariants->groupBy('size')->keys();

        $title = 'Day la trang Product Detail';

        $data = compact('user', 'prd', 'color', 'lstCate', 'title', 'size');

        return view('user.product-detail', $data);
    }

    public function userInfo()
    {
        $data = [
            'user' => auth()->user(),
            'title' => 'Day la trang User Info'
        ];

        return view('user.info_detail', $data);
    }

    public function editUserInfo()
    {
        $data = [
            'user' => auth()->user(),
            'title' => 'Day la trang User Info'
        ];

        return view('user.info_edit', $data);
    }

    public function updateUserInfo(UpdateInfoRequest $request)
    {
        $user = auth()->user();
        if (!Hash::check($request->password, $user->password)) {
            Log::error('Password and Confirm Password do not match for user id: ' . $user->id);
            return redirect()->back()->with('error', 'Password and Confirm Password do not match');
        } else {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->password = bcrypt($request->passwordn);
            $user->save();
            return redirect()->route('user.info');
        }
    }

    public function editUserInfoPassword()
    {
        $data = [
            'user' => auth()->user(),
            'title' => 'Day la trang User Info'
        ];

        return view('user.info_edit_password', $data);
    }

    public function updateUserInfoPassword(Request $request)
    {
        $user = auth()->user();
        if (!Hash::check($request->password, $user->password) || $request->new_password != $request->confirm_password) {
            Log::error('Password and Confirm Password do not match for user id: ' . $user->id);
            return redirect()->back()->with('error', 'Password and Confirm Password do not match');
        } else {

            $user->password = bcrypt($request->new_password);
            $user->save();
            Log::info('User id: ' . $user->id . ' has updated password');
            return redirect()->route('user.info');
        }
    }

    

    public function orders()
    {
        $data = [
            'user' => auth()->user(),
            'title' => 'Day la trang Orders',
            'lstOrder' => Order::where('user_id', auth()->user()->id)->with(['orderDetails.product'])->get(),
        ];

        return view('user.info_orders', $data);
    }
}
