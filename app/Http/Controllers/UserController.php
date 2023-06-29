<?php

namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Auth\Events\Registered;
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
        $wishlist = [];

        if (Auth::check()) {
            $user = Auth::user();
            $wishlist = Wishlist::where('user_id', $user->id)->pluck('product_id')->toArray();
        }

        return view('home.home', compact('categories', 'products', 'wishlist'));
    }

    public function contact()
    {

        $categories = Category::where('parent_id', 0)->get();
        return view('home.contact-us', compact('categories'));
    }



    public function showdataCategory($category, $categoryname)
    {

        $categories = Category::find($category);
        $wishlist = [];

        if (Auth::check()) {
            $user = Auth::user();
            $wishlist = Wishlist::where('user_id', $user->id)->pluck('product_id')->toArray();
            $products = Product::whereIn('id', $wishlist)->get();
        }

        if (!empty($categories)) {
            $products = Product::where('parent_id', $categories->id)->get();


            return view('home.product_details', compact('categories', 'products', 'wishlist'));
        }

        return abort(404);
    }




    public function wishlistindex()
    {
        $wishlist = [];
        $products = [];

        if (Auth::check()) {
            $user = Auth::user();
            $wishlist = Wishlist::where('user_id', $user->id)->pluck('product_id')->toArray();
            $products = Product::whereIn('id', $wishlist)->get();
        }

        return view('home.wishlist', compact('wishlist', 'products'));
    }










    public function addToWishlist($productId)
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

            $selectedvlaue =   $wishlistItem->save();
            if ($selectedvlaue) {
                return redirect()->back()->with('message', 'Item added to wishlist.');
            }
        }
    }





    public function removeFromWishlist(Request $request, $productId)
    {
        $user = $request->user();

        $wishlistItem = Wishlist::where('user_id', $user->id)
            ->where('product_id', $productId)
            ->first();


        $wishlistItem->delete();

        return redirect()->back()->with('message', 'Item remove to wishlist.');
    }







    public function showPasswordChangeForm()
    {
        return view('auth.reset-password-copy');
    }

    public function passwordChange(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);
        $user = Auth::user();
        if (Hash::check($request->current_password, $user->password)) {
            $user->password = Hash::make($request->new_password);
            $user->save();

            if ($user->usertype === 1) {
                return redirect()->route('dashboard')->with('message', 'Password changed successfully.');
            } else {
                return redirect()->route('home')->with('message', 'Password changed successfully.');
            }
        }
        return redirect()->back()->withErrors(['current_password' => 'Incorrect current password.']);
    }





    public function login()
    {
        return view('auth.login');
    }




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
                if ($user->usertype === 1) {
                    return redirect()->route('dashboard')->with('message', 'Login successful');
                }
                if ($user->usertype === 0) {
                    return redirect()->route('home')->with('message', 'Login successful');
                }
            } else {
                Auth::logout();
                return redirect()->route('login')->with('verified', false)->with('login_error', 'User not verified');
            }
        }

        return redirect()->route('login')->with('errors', 'Invalid password');
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

        if ($user->email_verified_at !== null) {
            Session::put(['user_id' => $user->id, 'user_type' => $user->usertype, 'email_verified_at' => $user->email_verified_at]);

            if ($user->usertype == 0) {
                return redirect()->route('home');
            }
        }

        return redirect()->route('login')->with('verified', false);
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
