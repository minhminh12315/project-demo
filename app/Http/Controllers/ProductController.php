<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductVariant;
use App\Models\SubVariant;
use App\Models\Variant;
use App\Models\VariantOption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    public function addnew()
    {   
        $user = auth()->user();
        $name = $user->name;
        $category = Category::all();
        $data = compact('name', 'category');
        
        return view('admin.products.addnew', $data);
    }

    public function storeProduct(StoreProductRequest $request)
    {

        DB::beginTransaction();

        try {
            Log::info('Creating product', $request->only(['name', 'description', 'category_id']));

            $product = Product::create([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'category_id' => $request->input('category_id'),
            ]);

            Log::info('Product created', ['product_id' => $product->id]);

            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $path = $image->store('images', 'public');
                    ProductImage::create([
                        'path' => $path,
                        'product_id' => $product->id,
                    ]);
                    Log::info('Image uploaded', ['path' => $path, 'product_id' => $product->id]);
                }
            }

            $variantNames = $request->input('variant_name');
            $values = $request->input('value');
            $quantities = $request->input('quantity');
            $prices = $request->input('price');
            $combinations = $request->input('combinations');

            Log::info('Processing variants', [
                'variantNames' => $variantNames,
                'values' => $values,
                'quantities' => $quantities,
                'prices' => $prices,
                'combinations' => $combinations,
            ]);

            foreach ($combinations as $index => $combination) {
                $combinationParts = explode(', ', $combination);
                $variantOptions = [];

                foreach ($combinationParts as $part) {
                    $variant = Variant::firstOrCreate(['name' => $part]);

                    Log::info('Variant processed', ['variant' => $variant->name]);
                    $variantOption = VariantOption::create([
                        'name' => $part,
                        'variant_id' => $variant->id, // Assign the variant_id
                    ]);

                    $variantOptions[] = $variantOption;
                    Log::info('Variant option processed', ['variantOption' => $variantOption->name]);
                }

                $productVariant = ProductVariant::create([
                    'product_id' => $product->id,
                    'quantity' => $quantities[$index],
                    'price' => $prices[$index],
                ]);

                Log::info('Product variant created', [
                    'product_id' => $product->id,
                    'quantity' => $quantities[$index],
                    'price' => $prices[$index],
                ]);

                foreach ($variantOptions as $variantOption) {
                    SubVariant::create([
                        'product_variant_id' => $productVariant->id,
                        'variant_option_id' => $variantOption->id,
                    ]);
                    Log::info('Sub variant created', [
                        'product_variant_id' => $productVariant->id,
                        'variant_option_id' => $variantOption->id,
                    ]);
                }
            }

            DB::commit();

            Log::info('Product added successfully', ['product_id' => $product->id]);

            return redirect()->route('addnew.store')->with('success', 'Product added successfully.');
        } catch (\Exception $e) {
            DB::rollback();

            Log::error('Error adding product', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return redirect()->back()->with('error', 'An error occurred while adding the product.');
        }
    }

    public function storeCategory(Request $request)
    {   

        $category = new Category();
        $category->name = $request->category;
        if(isset($request->parent_id)){
            $category->parent_id = $request->parent_id;
        }
        $category->save();
        Log::info('Category added', ['category' => $category->name]);
        return redirect()->back()->with('success', 'Category added successfully.');
    }
}
