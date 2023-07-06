<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function view_category()
    {


        $categories = Category::leftJoin('products', 'categories.id', '=', 'products.parent_id')
            ->select('categories.id', 'categories.category_name', DB::raw('COUNT(products.parent_id) AS product_count'))
            ->groupBy('categories.id', 'categories.category_name')
            ->paginate(10);
        // $categories = Category::paginate(10);
        return view('admin.category', compact('categories'));
    }


    public function create()
    {
        $categories = Category::where('parent_id', 0)->where('status', 1)->get();
        return view('admin.categories.create', compact('categories'));
    }



    public function storeCatgory(Request $request)
    {
        $validatedData = $request->validate([
            'category_name' => 'required|string|max:255|unique:categories',
            'parent_id' => 'nullable|exists:categories,id',
            'status' => 'nullable|integer'
        ]);

        $parentId = $validatedData['parent_id'] ?? 0;

        if ($parentId === null) {
            $parentId = 0;
        }

        $category = Category::updateOrCreate(
            ['category_name' => $validatedData['category_name']],
            ['parent_id' => $parentId, 'status' => $validatedData['status'] ?? 1]
        );

        if ($category->wasRecentlyCreated) {
            return redirect()->route('viewcategorylist')->with('message', 'Category created successfully.');
        } else {
            return redirect()->route('viewcategory')->with('errors', 'Category already exists. Please choose a different name.');
        }
    }



    public function getSubcategories(Request $request)
    {
        $subcategories = Category::where('parent_id', $request->parentCategoryId)->where('status', 1)->get();
        return response()->json($subcategories);
    }



    public function edit(Category $category)
    {
        return view('admin.category_update', compact('category'));
    }



    public function update(Request $request, Category $category)
    {
        $request->validate([
            'category_name' => 'required|max:255|unique:categories,category_name,' . $category->id,
        ]);

        $category->update([
            'category_name' => $request->input('category_name')
        ]);

        return redirect()->route('viewcategorylist')->with('message', 'Category name updated successfully');
    }











    public function delete_catagory($id)
    {
        $data = Category::find($id);

        if ($data) {
            $data->delete();
            return redirect()->back()->with("message", "Category deleted successfully.");
        } else {
            return redirect()->back()->with("errors", "Category not found.");
        }
    }

    // public function delete_category($id)
    // {
    //     $category = Category::find($id);

    //     if (!$category) {
    //         return redirect()->back()->with("errors", "Category not found.");
    //     }

    //     // Check if the category has associated products
    //     $products = $category->products;

    //     if ($products->count() > 0) {
    //         // Option 1: Delete all associated products
    //         // This will permanently delete all products associated with the category.
    //         // You should only do this if it's the desired behavior in your application.
    //         $category->products()->delete();

    //         // Option 2: Change the category for all associated products
    //         // Uncomment the following line if you want to update the category of associated products.
    //         // $category->products()->update(['category_id' => $defaultCategoryId]);

    //         // After handling the associated products, you can now delete the category
    //         $category->delete();
    //         return redirect()->back()->with("message", "Category and associated products deleted successfully.");
    //     } else {
    //         // If no associated products, simply delete the category
    //         $category->delete();
    //         return redirect()->back()->with("message", "Category deleted successfully.");
    //     }
    // }


    public function updateStatus(Request $request, $id)
    {
        $status = $request->input('status');
        $subcategory = Category::findOrFail($id);

        $subcategory->status = $status;
        $subcategory->save();

        return response()->json(['message' => true]);
    }
}
