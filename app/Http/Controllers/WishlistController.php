<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wishlist;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


class WishlistController extends Controller
{
    public function view()
    {
        $wishlist = Wishlist::where('user_id', Auth::id())->get();
        return view('products.wishlist', compact('wishlist'));
    }

    public function add(Request $request)
    {
        if (Auth::check()) {
            $prod_id = $request->input('product_id');
            if (Product::find($prod_id)) {
                $wish = new Wishlist();
                $wish->prod_id = $prod_id;
                $wish->user_id = Auth::id();
                $wish->save();
                return response()->json(['status' => "Product added to wishlist"]);

            }
            else {
                return response()->json(['status' => "Product doesnot exist"]);
            }
        }
        else {
            return response()->json(['status' => "login to continue"]);
        }

    }

    public function deleteitem(Request $request)
    {
        if (Auth::check()) {
            $prod_id = $request->input('prod_id');
            if (Wishlist::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists()) {
                 $wish = Wishlist::where('prod_id', $prod_id)->where('user_id', Auth::id())->first();
                 $wish->delete();
                 return response()->json(['status' => "Item deleted"]);
            }
       }     
       else {
            return response()->json(['status' => "Login to Countinue"]);
       }
    }
}
