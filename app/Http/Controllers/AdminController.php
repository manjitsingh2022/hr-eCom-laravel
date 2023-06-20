<?php

namespace App\Http\Controllers;

use App\Models\Category;


class AdminController extends Controller
{
    public function adminIndex()
    {
        $categories = Category::where('parent_id', 0)->get();
        // $products =  Product::all();
        return view('admin.body', compact('categories'));
    }
}
