<?php

namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Session;
// use Illuminate\Foundation\Auth\AuthenticatesUsers;
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




    public function wishlistindex()
    {
        $user = Auth::user();

        $wishlistItems = $user->wishlist;
        $wishlist = $wishlistItems->pluck('product_id');

        // Retrieve all products
        $products = Product::whereIn('id', $wishlist)->get();




        return view('home.wishlist', compact('wishlist', 'products'));
    }









    public function addToWishlist(Request $request, $productId)
    {
        $user = Auth::user();

        $wishlistItem = Wishlist::where('user_id', $user->id)
            ->where('product_id', $productId)
            ->first();

        if ($wishlistItem) {
            return redirect()->back()->with('flash_message', 'This item is already in your wishlist!');
        } else {
            $wishlistItem = new Wishlist();
            $wishlistItem->user_id = $user->id;
            $wishlistItem->product_id = $productId;
            $wishlistItem->quantity = $request->input('quantity');
            $wishlistItem->save();
            return redirect()->back()->with('success', 'Item added to wishlist.');
        }
    }








    // public function removeFromWishlist(Request $request, $productId)
    // {
    //     $user = $request->user();

    //     $wishlistItem = Wishlist::where('user_id', $user->id)
    //         ->where('product_id', $productId)
    //         ->first();

    //     if ($wishlistItem) {
    //         $wishlistItem->delete();
    //     }

    //     // Redirect or return a response
    //     // ...
    // }






    public function login()
    {
        return view('auth.login');
    }


    // public function loginPost(Request $request)
    // {
    //     $request->validate([
    //         'email' => 'required',
    //         'password' => 'required'
    //     ]);

    //     if (Auth::attempt($request->only('email', 'password'))) {
    //         Session::put(['user_id' => Auth::id(), 'user_type' => Auth::user()->usertype]);
    //         return redirect()->route('home');
    //     }

    //     return redirect()->route('login')->with('error', 'Invalid login credentials');
    // }


    public function loginPost(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $credentials['email'])->first();

        if (!$user) {
            return redirect()->route('login')->with('login_error', 'Email not found');
        }

        if (Auth::attempt($credentials)) {
            if ($user->email_verified_at !== null) {
                Session::put(['user_id' => Auth::id(), 'user_type' => Auth::user()->usertype]);
                return redirect()->route('home');
            } else {
                Auth::logout();
                return redirect()->route('login')->with('verified', false);
            }
        }

        return redirect()->route('login')->with('login_error', 'Invalid password');
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
        event(new Registered($user));
        return redirect()->route('login')->with('success', 'Registration successful. You are now logged in!');
    }









    public function logout()
    {
        if (Auth::check()) {
            Auth::logout();
            Session::forget('user_id');
            Session::forget('user_type');
        }

        return redirect()->route('login')->with('logout', true);
    }
}
