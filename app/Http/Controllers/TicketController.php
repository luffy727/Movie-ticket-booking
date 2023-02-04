<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\MovieDate;
use App\Models\Booking;
use App\Models\User;
use Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Barryvdh\DomPDF\Facade\Pdf;
use Razorpay\Api\Api;
use Illuminate\Support\Str;


class TicketController extends Controller
{
    
    public function mybooking()
    {
        $booking = Booking::where('user_id', Auth::id())->get();
        return view('movieticket.mybooking',compact('booking'));
    }

    public function viewbooking($id)
    {
        $booking = Booking::find($id);
        return view('movieticket.mybookinghistory', compact('booking'));
    }

    public function bookingdeatials($id)
    {
        
        $moviedate = MovieDate::find($id);
        return view('movieticket.ticketorder', compact('moviedate'));
    }

    public function placeorder(Request $request)
    {
        $booking = new Booking();

        $this->validate($request,[
            'cname' => 'required',
            'cmail' => 'required',
            'cphone' => 'required',
            'seatqty' => 'required',
            'total_price' => 'required',
        ]);
        $booking->user_id = Auth::user()->id;
        $booking->cname = $request->input('cname');
        $booking->cmail = $request->input('cmail');
        $booking->cphone = $request->input('cphone');
        $booking->m_name = $request->input('m_name');
        $booking->m_hall = $request->input('m_hall');
        $booking->seatqty = $request->input('seatqty');
        $booking->mdate = $request->input('mdate');
        $booking->mtime = $request->input('mtime');
        $booking->total_price = $request->input('total_price');
        $booking->payment_mode = $request->input('payment_mode');
        $booking->payment_id = $request->input('payment_id');
        $booking->save(); 
        
        /* $moviedate = MovieDate::where('id', $booking->mdate_id)->first();
        $moviedate->movie_seats = $moviedate->movie_seats - $booking->seatqty;
        $moviedate->update(); */
        
        if ($request->input('payment_mode') == 'Paid by Razorpay') {
            Alert::success('Payment Done');
            return response()->json(['status'=> "place booking successfully"]);
        }
        Alert::success('Place Your Booking');
        //return redirect('userdashboard')->with('status', "Product updated Successfully");
    }

    public function bookingdetails()
    {
        $booking = Booking::where('status','0')->get();
        return view('movieticket.ticketconfirm', compact('booking'));
    }

    public function updatebooking($id)
    {
        $booking = Booking::find($id);
        $book = Booking::where('id', $id)->get();
        return view('movieticket.updateticket', compact('booking','book'));
    }

    public function updatestatus(Request $request, $id)
    {
        $booking = Booking::find($id);
        $booking->status = $request->input('booking_status');
        $booking->update();
        Alert::success('Booking Completed Successfully', 'Success Message');
        return redirect('moviebooking');
    }

    public function bookinghistory()
    {
        $booking = Booking::where('status','1')->get();
        return view('movieticket.bookinghistory', compact('booking'));
    }

    public function bhexportpdf()
    {
        $booking = Booking::where('status','1')->get();
        $pdf = Pdf::loadView('pdf.bookinghistory',[
            'booking' => $booking
        ]);
        return $pdf->download('bookinghistory.pdf');
    }

    public function prexportpdf(int $id)
    {
        $booking = Booking::findOrFail($id);
        $todayDate = date("Y-m-d");
        $pdf = Pdf::loadView('pdf.paymentinvoice',[
            'booking' => $booking,
            'todayDate' => $todayDate,
        ]);
        return $pdf->download('paymentinvoice.pdf');
    }

    public function paymentsummery()
    {
        $booking = Booking::find();
        return view('movieticket.ticketsummery', compact('booking'));
    }

    public function paymentdone(Request $request)
    {
        $cmail = $request->input('cmail'); 
        $cname = $request->input('cname');
        $cphone = $request->input('cphone');
        $seatqty = $request->input('seatqty');
        $m_name = $request->input('m_name');
        $m_hall = $request->input('m_hall');
        $mdate = $request->input('mdate');
        $mtime = $request->input('mtime');
        $total_price = $request->input('total_price');

        return response()->json([
            'cmail' => $cmail, 
            'cname' => $cname,
            'cphone' => $cphone,
            'seatqty' => $seatqty,
            'm_name' => $m_name,
            'm_hall' => $m_hall,
            'mdate' => $mdate,
            'mtime' => $mtime,
            'total_price' => $total_price,
        ]);
    }


}
