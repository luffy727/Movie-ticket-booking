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
                    <form method="POST" action="{{ url('place-booking') }}" class="require-validation" data-cc-on-file="false" id="payment-form">
                    @csrf
                    @php $total_price = 0; @endphp
                    <div class="row">
                         <div class="col-md-6">
                              <label for="inputEmail4" class="form-label">Your Email</label>
                              <input type="email" class="form-control cmail" name="cmail"id="inputEmail4">
                              <span id="cmail_error" class="text-danger"></span>
                         </div>
                         <div class="col-md-6">
                              <label for="inputEmail4" class="form-label">Your Name</label>
                              <input type="text" class="form-control cname" name="cname" id="inputEmail4">
                              <span id="cname_error" class="text-danger"></span>
                         </div>
                         <div class="col-md-6">
                              <label for="inputEmail4" class="form-label">Your Phone </label>
                              <input type="tel" class="form-control cphone" name="cphone" id="inputEmail4">
                              <span id="cphone_error" class="text-danger"></span>
                         </div>
                         <div class="col-md-3">
                              <label for="inputEmail4" class="form-label">Seats </label>
                              <input type="number" name="seatqty" readonly class="form-control seatqty" id="seatqty" >
                              <span id="seatqty_error" class="text-danger"></span>
                         </div>
                    
                         <div class="col-md-6">
                         <label for="staticEmail" class="col-sm-2 col-form-label">Movie Name</label>
                              <div class="col-sm-10">
                                   <input type="text" readonly class="form-control-plaintext m_name" id="staticEmail" name="m_name" value="{{ $moviedate-> movies->mname }}">
                                   <span id="m_name_error" class="text-danger"></span>
                              </div>
                         </div>
                         <div class="col-md-6">
                         <label for="staticEmail" class="col-sm-2 col-form-label">Hall Name</label>
                              <div class="col-sm-10">
                                   <input type="text" readonly class="form-control-plaintext m_hall" id="staticEmail" name="m_hall" value="{{ $moviedate-> movies->hall }}">
                                   <span id="m_hall_error" class="text-danger"></span>
                              </div>
                         </div>
                         <div class="col-md-6">
                         <label for="staticEmail" class="col-sm-2 col-form-label" >Date</label>
                              <div class="col-sm-10">
                                   <input type="date" readonly class="form-control-plaintext mdate"  name="mdate" value="{{ $moviedate->movie_date }}">
                                   <span id="mdate_error" class="text-danger"></span>
                              </div>
                         </div>
                         <div class=" col-md-6">
                         <label for="staticEmail" class="col-sm-2 col-form-label">Time</label>
                              <div class="col-sm-10">
                                   <input type="time" readonly class="form-control-plaintext mtime"  name="mtime" value="{{ $moviedate->movie_time }}">
                                   <span id="mtime_error" class="text-danger"></span>
                              </div>
                         </div>
                    </div>
                         <div class="row g-4">
                              <div class="col-sm">
                              <label for="" class="col-sm-3 col-form-label">adult</label>
                                   <input type="text" class="form-control" name="adnum" id="admun" oninput="myFunction()">
                              </div>
                              <div class="col-sm">
                              <label for="inputEmail3" class="col-sm-4 col-form-label">ticket price</label>
                                   <input type="text" readonly class="form-control-plaintext" name="adprice" id="adprice" value="{{ $moviedate-> movies->adticket_price }}" oninput="myFunction()">
                              </div>
                              <div class="col-sm">
                              <label for="inputEmail3" class="col-sm-4 col-form-label">online fee</label>
                                   <input type="text" readonly class="form-control-plaintext text-center" name="fee" id="afee" value="50" oninput="myFunction()">
                              </div>
                              <div class="col-sm">
                              <!-- <h4>Total Price: <span id="adtotalPrice">0</span></h4> -->
                              <label for="inputEmail3" class="col-sm-4 col-form-label" >total price</label>
                                   <input type="number" readonly class="form-control" name="adtotal_price" id="adtotalPrice" value="" oninput="myFunction()"> 
                              </div>

                         </div>
                         <div class="row g-4">
                              <div class="col-sm">
                              <label for="inputEmail3" class="col-sm-4 col-form-label">children</label>
                                   <input type="text" class="form-control" name="chnum" id="chnum" oninput="myFunction()">
                              </div>
                              <div class="col-sm">
                              <label for="inputEmail3" class="col-sm-4 col-form-label">ticket price</label>
                                   <input type="text" readonly class="form-control-plaintext" name="chprice" id="chprice" oninput="myFunction()" value="{{ $moviedate-> movies->chticket_price }}">
                              </div>
                              <div class="col-sm">
                              <label for="inputEmail3" class="col-sm-4 col-form-label">online fee</label>
                                   <input type="text" readonly class="form-control-plaintext text-center" name="fee" id="cfee" oninput="myFunction()"  value="50">
                              </div>
                              <div class="col-sm">
                              <label for="inputEmail3" class="col-sm-4 col-form-label">total price</label>
                                   <input type="text" readonly class="form-control" name="chtotalPrice" id="chtotalPrice" value="" oninput="myFunction()">
                              </div>
                         </div>
                         <br>
                         <div class="col-md-6">
                         <h4>Total price: 
                              <input type="text" readonly class="form-control total_price" name="total_price" id="total_price" value="">
                              <!-- <input type="text"readonly class="form-control " name="total_price" id="error_msg" value=""> -->
                              <span id="total_price_error" class="text-danger"></span>
                         </h4>
                         <input type="hidden" name="payment_mode" value="COD">
                         </div>
                         <br>
                         <div class="row">
                         <!-- <div class="col-md-3">
                              
                              <button type="submit" class="btn btn-warning w-100" >Place Booking</buttom>
                         </div> -->
                         <br>
                         <div class="col-md-3">
                              
                         <button type="button" class="btn btn-primary w-100 razorpay_mbtn">Pay with Razorpay</button>
                         </div>
                         
                         </div>
                    </form>
               </div>
          </div>
     </div>
</div>

@endsection

@section('scripts')
     <script src="{{ asset('js/payment.js') }}"></script>
     <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
@endsection