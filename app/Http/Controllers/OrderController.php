<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;
use RealRashid\SweetAlert\Facades\Alert;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('status', '0')->get();
        return view('order',compact('orders'));
    }

    public function view($id)
    {
        $orders = Order::where('id', $id)->first();
        return view('orderview', compact('orders'));
    }

    public function update(Request $request, $id)
    {
        $orders = Order::find($id);
        $orders->status = $request->input('order_status');
        $orders->update();
        Alert::success('Order has been updated', 'Success Message');
        return redirect('orders')->with('status', "Order has been updated");
    }

    public function orderhistory()
    {
       $orders = Order::where('status','1')->get();
       return view('history', compact('orders'));
    }

    public function orexportpdf(int $id)
    {
       
        $order = Order::findOrFail($id);
        $todayDate = date("Y-m-d");
        $pdf = Pdf::loadView('pdf.productpayment',[
            'order' => $order,
            'todayDate' => $todayDate,
        ]);
        return $pdf->download('productpayment.pdf');
    }
    
}
