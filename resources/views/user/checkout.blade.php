@extends('layouts.app')

@section('content')
     <div class="container mt-5">
          <form action="{{ url('place-order') }}" method="POST">
          @csrf
               <div class="row">
                    <div class="col-md-7">
                         <div class="card">
                              <div class="card-body">
                                   <h4><b>Basic Detials</b></h4>
                                   <br>
                                   <div class="row checkout-form">
                                        <div class="col-md-6 mt-3">
                                             <label for="">First Name</label>
                                             <input type="text" name="fname" value="{{ Auth::user()->name }}" class="form-control name" placeholder="Enter the first name">
                                             <span id="fname_error" class="text-danger"></span>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                             <label for="">Last Name</label>
                                             <input type="text" name="lname" value="{{ Auth::user()->lname }}" class="form-control lastname" placeholder="Enter the last name">
                                             <span id="lname_error" class="text-danger"></span>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                             <label for="">Email</label>
                                             <input type="email" name="email" value="{{ Auth::user()->email }}" class="form-control email" placeholder="Enter the email">
                                             <span id="email_error" class="text-danger"></span>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                             <label for="">Phone Number</label>
                                             <input type="text" name="phone" value="{{ Auth::user()->phone }}" class="form-control phone" placeholder="Enter the Phone number">
                                             <span id="phone_error" class="text-danger"></span>

                                        </div>
                                        <div class="col-md-6 mt-3">
                                             <label for="">Address 1</label>
                                             <input type="text" name="address1" value="{{ Auth::user()->address1 }}" class="form-control address1" placeholder="Enter the address 1">
                                             <span id="address1_error" class="text-danger"></span>

                                        </div>
                                        <div class="col-md-6 mt-3">
                                             <label for="">Address 2</label>
                                             <input type="text" name="address2" value="{{ Auth::user()->address2 }}" class="form-control address2" placeholder="Enter the first address 2">
                                             <span id="address2_error" class="text-danger"></span>

                                        </div>
                                        <div class="col-md-6 mt-3">
                                             <label for="">City</label>
                                             <input type="text" name="city" value="{{ Auth::user()->city }}" class="form-control city" placeholder="Enter the city">
                                             <span id="city_error" class="text-danger"></span>

                                        </div>
                                        <div class="col-md-6 mt-3">
                                             <label for="">State</label>
                                             <input type="text" name="state" value="{{ Auth::user()->State }}" class="form-control state" placeholder="Enter the state">
                                             <span id="state_error" class="text-danger"></span>

                                        </div>
                                        <div class="col-md-6 mt-3">
                                             <label for="">pin code</label>
                                             <input type="text" name="pincode" value="{{ Auth::user()->pincode }}" class="form-control pincode" placeholder="Enter the pin code">
                                             <span id="pincode_error" class="text-danger"></span>

                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>
                    <div class="col-md-5">
                         <div class="card">
                              <div class="card-body">
                                   <h4><b>Order Details</b></h4>
                                   <br>
                                   <table class="table table-striped">
                                        <thead>
                                             <tr>
                                                  <th>Name</th>
                                                  <th>Quantity</th>
                                                  <th>Price</th>
                                             </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($cartitems as $item)
                                        <tr>
                                             <td>{{ $item->product->name }}</td>
                                             <td>{{ $item->pro_qty }}</td>
                                             <td>{{ $item->product->selling_price }}</td>
                                        </tr>
                                        @endforeach  
                                        </tbody>
                                   </table>
                                   <br>
                                   <input type="hidden" name="payment_mode" value="COD">
                                   <button type="submit" class="btn btn-primary w-100">Place Order | Cach on Delivery</button>
                                   <br>
                                   <!-- <button type="button" class="btn btn-primary w-100 mt-3 razorpay_btn">Pay with Razorpay</button> -->
                              </div>
                         </div>
                    </div>
               </div>
          </form>
     </div>
     <!-- <script src="{{ asset('js/checkout.js') }}"></script> -->

@endsection

@section('scripts')
     <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
@endsection