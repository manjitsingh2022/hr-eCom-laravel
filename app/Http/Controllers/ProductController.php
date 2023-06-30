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
            date_default_timezone_set('Asia/Kolkata');
            $imageName = date('Y-m-d_H-i-s') . '.' . $image->getClientOriginalName();
            $image->move('product', $imageName);
            $product->image = $imageName;
        }
        $product->save();
        return redirect()->route('showproduct')->with('message', 'Product added successfully.');
    }



    public function view_product()
    {

        $categories =  Category::all();
        return view('admin.product', compact('categories'));
    }



    public function show_product()
    {
        $products = Product::paginate(5);

        return view("admin.show_product", compact('products'));
    }


    public function delete_product($id)
    {
        $data = Product::find($id);

        if ($data) {
            $data->delete();
            return redirect()->back()->with("message", "Product deleted successfully.");
        } else {
            return redirect()->back()->with("error", "Product not found.");
        }
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $catagory = Category::all();
        return view('admin.update_product', compact('product', 'catagory'));
    }



    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return redirect()->back()->with('error', 'Product not found!');
        }

        $validatedData = $request->validate([
            'product_name' => 'required|max:255|unique:products,product_name,' . $id,
            'description' => 'required',
            'price' => 'required|numeric',
            'discount_price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'parent_id' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $product->product_name = $validatedData['product_name'];
        $product->description = $validatedData['description'];
        $product->price = $validatedData['price'];
        $product->discount_price = $validatedData['discount_price'];
        $product->quantity = $validatedData['quantity'];
        $product->parent_id = $validatedData['parent_id'];

        if ($request->parent_id != 0 && $request->subcategory_id) {
            $product->parent_id = $request->subcategory_id;
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = uniqid() . '_' . $image->getClientOriginalName();
            $image->move('product', $imageName);

            if ($product->image && $product->image !== $imageName) {
                $oldImagePath = public_path('product/' . $product->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $product->image = $imageName;
        }

        $product->save();

        return redirect()->route('showproduct')->with('message', 'Product updated successfully!');
    }



    public function deleteValues(Request $request)
    {
        $selectedValues = $request->input('selectedIDs');
        Product::whereIn('id', $selectedValues)->delete();
        return response()->json(['message' => 'Values deleted successfully']);
    }
}
