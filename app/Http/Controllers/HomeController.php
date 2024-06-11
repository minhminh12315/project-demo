<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateInfoRequest;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\ProductVariant;
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
            'newPrd' => Product::with(['category', 'productVariants', 'productVariants.images'])->take(10)->get(),
            
            'title' => 'Day la trang Homepage'
        ];

        return view('user.index', $data);
    }

    public function shop()
    {
        $data = [
            'user' => auth()->user(),
            'lstPrd' => Product::with(['category', 'productVariants', 'productVariants.images'])->get(),
            'lstCate' => Category::all(),
            'lstCateSubCate' => Category::with('subCategory')->get(),
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

    public function productDetail($name)
    {

        
        $user = auth()->user();
        $prdName = Product::where('name', $name)->first();
        $prd = Product::where('name', $name)->with(['category', 'productVariants', 'productVariants.images'])->get();
        
        $uniqueColors = $prd->flatMap(function ($product) {
            return $product->productVariants->map(function ($variant) {
                return $variant->color->name;
            });
        })->unique();

        $uniqueSizes = $prd->flatMap(function ($product) {
            return $product->productVariants->map(function ($variant) {
                return $variant->size->name;
            });
        })->unique();

        $data = compact('user', 'prd', 'prdName','uniqueColors', 'uniqueSizes');

        return view('user.product-detail', $data);
    }

    public function productDetailColor(Request $request)
    {
        $sizesByColor = DB::table('product as p')
        ->join('product_variant as pv', 'p.id', '=', 'pv.product_id')
        ->join('color as c', 'pv.color_id', '=', 'c.id')
        ->join('size as s', 'pv.size_id', '=', 's.id')
        ->where('p.name', $request->name)
        ->where('c.name', $request->color)
        ->select('s.name')
        ->get();
        
        $data = compact('sizesByColor');

        return response()->json(['data' => $data]);
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
