<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // public function product_details($id)
    // {

    //     $product = Product::find($id);

    //     return view('home.wish-list', compact('product'));
    // }

    // // cart add  by id

    // public function cartadd(Request $request, $id)
    // {

    //     if (Auth::id()) {
    //         $user = Auth::user();
    //         $product = Product::find($id);

    //         $cart = new Cart();
    //         $cart->name = $user->name;
    //         $cart->email = $user->email;
    //         $cart->phone = $user->phone;
    //         $cart->address = $user->address;
    //         $cart->user_id = $user->id;
    //         $cart->product_title = $product->title;
    //         if ($product->discount_price != null) {
    //             $cart->price = $product->discount_price * $request->quantity;
    //         } else {
    //             $cart->price = $product->price * $request->quantity;
    //         }
    //         $cart->image = $product->image;
    //         $cart->product_id = $product->id;

    //         $cart->quantity = $request->quantity;

    //         $cart->save();
    //         return redirect()->back();
    //     } else {
    //         return redirect('login');
    //     }
    // }
}
