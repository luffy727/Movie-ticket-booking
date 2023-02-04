@extends('layouts.app')

@section('content')
<div class="container">
     <div class="card">
          <div class="card-header">
               <h4>My Booking Details
                @if($booking->status == 1)  
                    @if ($booking->payment_mode == "Paid by Razorpay")
                         <a href="{{ url('payment-reciept-pdf/'.$booking->id) }}" type="button" class="btn btn-outline-success float-end">Download Payment Reciept</a>
                    @endif</h4>
               @endif
          </div>
          <div class="card-body">
                   
               <div class="basic-form">
                    <div class="row">
                    <div class="col-md-6">
                         <label for="staticEmail" class="col-sm-2 col-form-label">Customer Name</label>
                              <div class="col-sm-10">
                                   <input type="text" readonly class="form-control-plaintext" id="staticEmail" name="m_name" value="{{ $booking->cname }}">
                              </div>
                         </div>
                         <div class="col-md-6">
                         <label for="staticEmail" class="col-sm-2 col-form-label">Customer Mail</label>
                              <div class="col-sm-10">
                                   <input type="text" readonly class="form-control-plaintext" id="staticEmail" name="m_name" value="{{ $booking->cmail }}">
                              </div>
                         </div>
                         <div class="col-md-6">
                         <label for="staticEmail" class="col-sm-2 col-form-label">Customer Number</label>
                              <div class="col-sm-10">
                                   <input type="text" readonly class="form-control-plaintext" id="staticEmail" name="m_name" value="{{ $booking->cphone }}">
                              </div>
                         </div>
                         <div class="col-md-6">
                         <label for="staticEmail" class="col-sm-2 col-form-label">seats</label>
                              <div class="col-sm-10">
                                   <input type="text" readonly class="form-control-plaintext" id="staticEmail" name="seatqty" value="{{ $booking->seatqty }}">
                              </div>
                         </div>
                    
                         <div class="col-md-6">
                         <label for="staticEmail" class="col-sm-2 col-form-label">Movie Name</label>
                              <div class="col-sm-10">
                                   <input type="text" readonly class="form-control-plaintext" id="staticEmail" name="m_name" value="{{ $booking->m_name }}">
                              </div>
                         </div>
                         <div class="col-md-6">
                         <label for="staticEmail" class="col-sm-2 col-form-label">Hall Name</label>
                              <div class="col-sm-10">
                                   <input type="text" readonly class="form-control-plaintext" id="staticEmail" name="m_hall" value="{{ $booking-> m_hall }}">
                              </div>
                         </div>
                         <div class="col-md-6">
                         <label for="staticEmail" class="col-sm-2 col-form-label" >Date</label>
                              <div class="col-sm-10">
                                   <input type="date" readonly class="form-control-plaintext"  name="mdate" value="{{ $booking->mdate }}">
                              </div>
                         </div>
                         <div class=" col-md-6">
                         <label for="staticEmail" class="col-sm-2 col-form-label">Time</label>
                              <div class="col-sm-10">
                                   <input type="time" readonly class="form-control-plaintext"  name="mtime" value="{{ $booking->mtime }}">
                              </div>
                         </div>
                         <div class=" col-md-6">
                         <label for="staticEmail" class="col-sm-2 col-form-label">Total Price</label>
                              <div class="col-sm-10">
                                   <input type="text" readonly class="form-control-plaintext"  name="total_price" value="{{ $booking->total_price }}">
                              </div>
                         </div>
                    </div>
                    @if ($booking->payment_mode == "Paid by Razorpay")
                    <div class=" col-md-6">
                         <label for="staticEmail" class="col-sm-2 col-form-label">Payment Id</label>
                              <div class="col-sm-10">
                                   <input type="text" readonly class="form-control-plaintext"  name="total_price" value="{{ $booking->payment_id }}">
                              </div>
                    </div>
                    @endif
               </div>
          </div>
     </div>
</div>
@endsection