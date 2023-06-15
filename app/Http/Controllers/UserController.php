<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $categories = Category::where('parent_id', 0)->get();
        $products = Product::all();
        return view('home.home', compact('categories', 'products'));
    }

    public function contact()
    {
        return view('home.contact-us');
    }

    public function showdataCategory($category)
    {
        // echo gettype($category);
        $categories = Category::where('category_name', $category)->first();


        if (!empty($categories)) {

            $products = Product::where('parent_id', $categories->id)->get();
            // foreach ($products as $key => $value) {
            //     echo $value->product_name . '<br>';
            // }
            return view('home.home', compact('categories', 'products'));
        }
    }
}
