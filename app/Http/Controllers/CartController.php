<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addtocart(Request $request)
    {
          $product_id = $request->input('product_id');
          $product_qty = $request->input('product_qty');

          if (Auth::check()) {
               $prod_check = Product::where('id',$product_id)->first();

               if ($prod_check) {
                    if(Cart::where('prod_id',$product_id)->where('user_id',Auth::id())->exists())
                    {
                         return response()->json(['status' => $prod_check->name."All ready added to cart"]);
                    }
                    else {
                         $cartItem = new Cart();
                         $cartItem->prod_id = $product_id;
                         $cartItem->user_id = Auth::id();
                         $cartItem->pro_qty = $product_qty;
                         $cartItem->save();
                         return response()->json(['status' => $prod_check->name."Added to cart"]);                    
                    }
               
               }
          }
          else {
               return response()->json(['status' => "Login to continue"]);
          }

    }

    public function viewcart()
    {
     $cartitems = Cart::where('user_id', Auth::id())->get();

     return view('user.cart', compact('cartitems'));
    }

    public function deleteitem(Request $request)
    {
     if (Auth::check()) {
          $prod_id = $request->input('prod_id');
          if (Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists()) {
               $cartitems = Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->first();
               $cartitems->delete();
               return response()->json(['status' => "Item deleted"]);
          }
     }     
     else {
          return response()->json(['status' => "Login to Countinue"]);
     }
    }

    public function updatecart(Request $request)
    {
          $prod_id = $request->input('prod_id');
          $product_qty = $request->input('pro_qty');

          if (Auth::check()) {
               if (Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists()) {
                    $cart = Cart::where('prod_id', $prod_id)->where('user_id',Auth::id())->first();
                    $cart->pro_qty = $product_qty;
                    $cart->update();
                    return response()->json(['status' => "Quantity Updated"]);
               }
          }
    }
}
