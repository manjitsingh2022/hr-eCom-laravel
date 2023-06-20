<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function view_category()
    {
        $categories = Category::all();
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
            'category_name' => 'required|string|max:255',
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
            return redirect()->route('viewcategorylist')->with('success', 'Category created successfully.');
        } else {
            return redirect()->route('viewcategory')->with('error', 'Category already exists. Please choose a different name.');
        }
    }



    public function getSubcategories(Request $request)
    {
        $subcategories = Category::where('parent_id', $request->parentCategoryId)->where('status', 1)->get();
        return response()->json($subcategories);
    }



    public function delete_catagory($id)
    {
        $data = Category::find($id);

        if ($data) {
            $data->delete();
            return redirect()->back()->with("message", "Category deleted successfully.");
        } else {
            return redirect()->back()->with("error", "Category not found.");
        }
    }
}
