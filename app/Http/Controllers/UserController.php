<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Catagory;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $featured_product = Product::where('trending', '1')->take(15)->get();
        $trending_catagory = Catagory::where('popular','1')->take(15)->get();
        return view('user.merchandise', compact('featured_product', 'trending_catagory'));
    }

    public function category()
    {
        $catagory = Catagory::where('status','0')->get();
        return view('user.category', compact('catagory'));
    }

    public function viewcategory($slug)
    {
        if (Catagory::where('slug', $slug)->exists()) {
            $catagory = Catagory::where('slug', $slug)->first();
            $product = Product::where('cate_id', $catagory->id)->where('status','0')->get();
            return view('user.index', compact('catagory', 'product'));
        }
        else {
            Alert::info('Slug does not exists  ', 'Info Message');
            return redirect('category')->with('status', "Slug does not exists");
        }
    }

    public function productview($cata_slug, $prod_slug)
    {
        if (Catagory::where('slug', $cata_slug)->exists())
        {
            if (Product::where('slug', $prod_slug)->exists()) 
            {
                $product = Product::where('slug', $prod_slug)->first();
                return view('user.view', compact('product'));
            }
            else {
                Alert::info('Link was broken', 'Info Message');
                return redirect('category')->with('status'. "Link was broken");
            }
        }
        else {
            Alert::warning('No such category found', 'Info Message');
            return redirect('category')->with('status'. "No such category found");
        }
    }

    public function myorder()
    {
        $orders = Order::where('user_id', Auth::id())->get();
        return view('orders.index', compact('orders'));
    }

    public function view( $id)
    {
        $orders = Order::where('id', $id)->where('user_id', Auth::id())->first();
        return view('orders.view', compact('orders'));
    }
}
