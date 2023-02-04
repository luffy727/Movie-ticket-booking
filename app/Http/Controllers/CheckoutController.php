<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Razorpay\Api\Api;
use RealRashid\SweetAlert\Facades\Alert;


class CheckoutController extends Controller
{
    public function index()
    {
        /* $old_cartitems = Cart::where('user_id', Auth::id())->get();
        foreach ($old_cartitems as $item) {
            if(Product::where('id', $item->prod_id)->where('qty','>=',$item->pro_qty)->exists())
            {
                $removeitem = Cart::where('user_id',Auth::id())->where('prod_id', $item->prod_id)->first();
                $removeitem->delete();
            }
        } */
        $cartitems = Cart::where('user_id', Auth::id())->get();
        return view('user.checkout', compact('cartitems'));
    }

    public function placeorder(Request $request)
    {
        $order = new Order();

        $order->user_id = Auth::id();
        $order->fname = $request->input('fname');
        $order->lname = $request->input('lname');
        $order->email = $request->input('email');
        $order->phone = $request->input('phone');
        $order->address1 = $request->input('address1');
        $order->address2 = $request->input('address2');
        $order->city = $request->input('city');
        $order->state = $request->input('state');
        $order->pincode = $request->input('pincode');
        $order->payment_mode = $request->input('payment_mode');
        $order->payment_id = $request->input('payment_id');


        //total price
        $total =0;
        $cartitems_total = Cart::where('user_id', Auth::id())->get();
        foreach ($cartitems_total as $prod) {
            $total += $prod->product->selling_price * $prod->pro_qty;
        }
        $order->total_price =$total;
        
        $order->tracking_no = 'buwa'.rand(1111,9999);
        $order->save();

        
        $cartitems = Cart::where('user_id', Auth::id())->get();
        foreach ($cartitems as $item ) {
            OrderItem::create([
                'order_id' => $order->id,
                'prod_id' => $item->prod_id,
                'qty' => $item->pro_qty,
                'price' => $item->product->selling_price,
            ]);

            $prod = Product::where('id', $item->prod_id)->first();
            $prod->qty = $prod->qty - $item->pro_qty;
            $prod->update();
        }

        if (Auth::user()->address1 == NULL)
        {
            $user = User::where('id', Auth::id())->first();
            $user->name = $request->input('fname');
            $user->lname = $request->input('lname');
            $user->phone = $request->input('phone');
            $user->address1 = $request->input('address1');
            $user->address2 = $request->input('address2');
            $user->city = $request->input('city');
            $user->state = $request->input('state');
            $user->pincode = $request->input('pincode');
            $user->payment_mode = $request->input('payment_mode');
            $user->payment_id = $request->input('payment_id');
            $user->update();

        }

        $cartitems = Cart::where('user_id', Auth::id())->get();
        Cart::destroy($cartitems);

        if($request->input('payment_mode') == "Paid by Razorpay")
        {
            return response()->json(['status' => "Order placed successfully"]);
        }
        else {
            return redirect('my-orders')->with('status',"Order placed successfully");
        }
        // return redirect('userdashboard')->with('status', "Order placed successfully");
    }

    public function razorpaycheck(Request $request)
    {
        $cartitems = Cart::where('user_id', Auth::id())->get();
        $total_price = 0;
        foreach ($cartitems as $item ) {
            $total_price += $item->product->selling_price * $item->pro_qty; 
        }

        $name = $request->input('name');
        $lastname = $request->input('lastname');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $address1 = $request->input('address1');
        $address2 = $request->input('address2');
        $city = $request->input('city');
        $state = $request->input('state');
        $pincode = $request->input('pincode');

        return response()->json([

                'name'=> $name,
                'lastname'=> $lastname,
                'email'=> $email,
                'phone'=> $phone,
                'address1'=> $address1,
                'address2'=> $address2,
                'city'=> $city,
                'state'=> $state,
                'pincode'=> $pincode,
                'total_price' => $total_price,
        ]);
    }
}
