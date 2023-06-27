<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function view_category()
    {
        $categories = Category::paginate(10);
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
            return redirect()->route('viewcategory')->with('error', 'Category already exists. Please choose a different name.');
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





    // public function destroy(Category $category)
    // {
    //     // Logic to delete the category
    //     $category->delete();

    //     return redirect()->back()->with('success', 'Category deleted successfully');
    // }




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
