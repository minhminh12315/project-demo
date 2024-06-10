<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddnewCategoryRequest;
use App\Http\Requests\AddnewColorRequest;
use App\Http\Requests\AddnewSizeRequest;
use App\Http\Requests\AddnewSubCategoryRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\ProductVariantImage;
use App\Models\Size;
use App\Models\SubCategory;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $data = [
            'lstPrd' => Product::with(['category', 'productVariants', 'productVariants.images'])->get(),
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
            'lstColor' => Color::all(),
            'lstSize' => Size::all(),
            'lstSubCat' => SubCategory::all(),
            "type" => true,
            'name' => auth()->user()->name
        ];
        return view('admin.layouts.addnew', $data);
    }

    public function storeProduct(Request $request)
    {
        $product = new Product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        $product->sub_category_id = $request->sub_category_id;

        $product->save();


        $productVariant = new ProductVariant();

        $productVariant->price = $request->price;
        $productVariant->quantity = $request->quantity;
        $productVariant->product_id = $product->id;
        $productVariant->color_id = $request->color;
        $productVariant->size_id = $request->size;
        $productVariant->save();

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = uniqid(time(), true) . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('assets/images'), $imageName);
        
                $productVariantImage = new ProductVariantImage();
                $productVariantImage->product_variant_id = $productVariant->id;
                $productVariantImage->image_path = 'assets/images/'.$imageName;
                $productVariantImage->save();
            }
        }



        return redirect()->route('admin.index');
    }

    public function addnewColor()
    {
        $data = [
            'lstCat' => Category::all(),
            'lstSubCat' => SubCategory::all(),
            "type" => true,
            'name' => auth()->user()->name
        ];
        return view('admin.layouts.addnewColor', $data);
    }

    public function storeColor(AddnewColorRequest $request)
    {
        $color = new Color;
        $color->name = $request->name;
        $color->save();

        return redirect()->route('addnew');
    }

    public function addnewSize()
    {
        $data = [
            'lstCat' => Category::all(),
            'lstSubCat' => SubCategory::all(),
            "type" => true,
            'name' => auth()->user()->name
        ];
        return view('admin.layouts.addnewSize', $data);
    }

    public function storeSize(AddnewSizeRequest $request)
    {
        $size = new Size;
        $size->name = $request->name;
        $size->save();

        return redirect()->route('addnew');
    }

    public function addnewCategory()
    {
        $data = [
            'lstCat' => Category::all(),
            'lstSubCat' => SubCategory::all(),
            "type" => true,
            'name' => auth()->user()->name
        ];
        return view('admin.layouts.addnewCategory', $data);
    }

    public function storeCategory(AddnewCategoryRequest $request)
    {
        $category = new Category;
        $category->name = $request->name;
        $category->save();

        return redirect()->route('addnew');
    }

    public function addnewSubCategory()
    {
        $data = [
            'lstCat' => Category::all(),
            'lstSubCat' => SubCategory::all(),
            "type" => true,
            'name' => auth()->user()->name
        ];
        return view('admin.layouts.addnewSubCategory', $data);
    }

    public function storeSubCategory(AddnewSubCategoryRequest $request)
    {
        $subCategory = new SubCategory;
        $subCategory->name = $request->name;
        $subCategory->save();

        return redirect()->route('addnew');
    }

    public function edit($id)
    {
        $data = [
            'product' => Product::find($id),
            'lstCat' => Category::all(),
            "type" => true,
            'name' => auth()->user()->name
        ];
        return view('admin.layouts.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        $image = $request->image;

        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('assets/image', $imagename);
            $product->image = $imagename;
        }

        $product->save();

        return redirect()->route('admin.index');
    }

    public function delete($id)
    {
        Product::destroy($id);
        return redirect()->route('admin.index');
    }
}
