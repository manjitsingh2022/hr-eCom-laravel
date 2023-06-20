<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show()
    {
        $categories = Category::where('parent_id', 0)->get();
        return view('admin.product', compact('categories'));
    }

    public function storeProduct(Request $request)
    {
        $product = new Product;
        $product->product_name = $request->product_name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->discount_price = $request->discount_price;
        $product->parent_id = $request->parent_id;

        if ($request->parent_id != 0 && $request->subcategory_id) {
            $product->parent_id = $request->subcategory_id;
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move('product', $imageName);
            $product->image = $imageName;
        }

        $product->save();

        return redirect()->back()->with('message', 'Product added successfully.');
    }
}
