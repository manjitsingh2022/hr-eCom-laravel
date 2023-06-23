<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Settings;

class AdminController extends Controller
{
    public function adminIndex()
    {
        $categories = Category::where('parent_id', 0)->get();
        // $products =  Product::all();
        return view('admin.body', compact('categories'));
    }




    // public function settingsCategory()
    // {
    //     $settings = Settings::all();

    //     return view('admin.categories.setting', compact('settings'));
    // }


    // public function settingsstore()
    // {
    //     $settings = Settings::all();

    //     return view('admin.categories.setting', compact('settings'));
    // }
}
