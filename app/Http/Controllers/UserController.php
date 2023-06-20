<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Str;

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

        $categories = Category::where('parent_id', 0)->get();
        return view('home.contact-us', compact('categories'));
    }



    public function showdataCategory($category, $categoryname)
    {

        $categories = Category::find($category);


        if (!empty($categories)) {
            $products = Product::where('parent_id', $categories->id)->get();


            return view('home.product_details', compact('categories', 'products',));
        }

        return abort(404);
    }













    public function login()
    {
        return view('auth.login');
    }


    public function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            Session::put(['user_id' => Auth::id(), 'user_type' => Auth::user()->usertype]);
            return redirect()->route('home');
        }

        return redirect()->route('login')->with('error', 'Invalid login credentials');
    }



    public function register()
    {
        return view('auth.register');
    }


    public function registerPost(Request $request)
    {


        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|min:2',
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'usertype' => 0,
            'remember_token' => Str::random(60),
        ]);
        $user->save();
        Auth::login($user);

        return redirect()->route('login')->with('success', 'Registration successful. You are now logged in!');
    }








    public function logout()
    {
        Auth::logout();
        Session::forget('user_id');
        return redirect()->route('login');
    }
}
