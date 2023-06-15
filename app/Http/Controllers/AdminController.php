<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function adminIndex()
    {
        $categories = Category::where('parent_id', 0)->get();
        // $products =  Product::all();
        return view('admin.body', compact('categories'));
    }
}
