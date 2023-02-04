@extends('layouts.app')

@section('content')
<script src="{{ asset('js/movie.js') }}"></script>
<div class="container">
     <div class="card">
          <div class="card-header">
               <h4>Booking Details</h4>
          </div>
          <div class="card-body">
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger" role="alert">
                            {{$error}}
                        </div>
                    @endforeach
               <div class="basic-form">
                    <form method="POST" action="{{ url('place-booking') }}">
                    @csrf
                    <div class="row">
                    <div class="col-md-6">
                         <label for="staticEmail" class="col-sm-2 col-form-label">Customer Name</label>
                              <div class="col-sm-10">
                                   <input type="text" readonly class="form-control-plaintext" id="staticEmail" name="m_name" value="{{ $booking->cname }}">
                              </div>
                         </div>>
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
                         <label for="staticEmail" class="col-sm-2 col-form-label">Total Price</label>
                              <div class="col-sm-10">
                                   <input type="text" readonly class="form-control-plaintext"  name="total_price" value="{{ $booking->total_price }}">
                              </div>
                         </div>
                    </div>
                         
                         <br>
                         <button type="submit" class="btn btn-primary">Pay with Razorpay</button>
                    </form>
               </div>
          </div>
     </div>
</div>
@endsection