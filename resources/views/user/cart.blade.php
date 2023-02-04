@extends('layouts.app')


@section('content')
<div class="container my-5">
     <div class="card shadow product_data">
     @if($cartitems->count() > 0)
          <div class="card-body">
               @php $total = 0; @endphp
               @foreach($cartitems as $item)
               <div class="row">
                    <div class="col-md-2">
                         <img src="{{ asset('uploads/product/'.$item->product->image) }}" style="width:100px;" alt="">
                    </div>
                    <div class="col-md-3">
                         <h5>{{ $item->product->name }}</h5>
                    </div>
                    <div class="col-md-2">
                         <h5>Rs {{ $item->product->selling_price }}</h5>
                    </div>
                    <div class="col-md-3">
                         <input type="hidden" class="prod_id" value="{{ $item->prod_id }}">
                              <label for="Quantity">Quantity</label>
                              <div class="input-group-text-cneter mb-3" style="width:70px">
                                   <button class="input-group-text changeQuantity decrement-btn">-</button>
                                   <input type="text" name="quantity" class="form-control qty-input text-center" value="{{ $item->pro_qty }}" >
                                   <button class="input-group-text changeQuantity increment-btn">+</button>

                              </div>
                              
                              
                    </div>
                    <div class="col-md-2">
                         <button class="btn btn-danger delete-cart-item"><i class="fa fa-trash"></i>Remove</button>
                    </div>
               </div>
               @php $total += $item->product->selling_price * $item->pro_qty; @endphp
               @endforeach
          </div>
          <div class="card-footer">
               <h5>Total price: Rs {{ $total }}

               <a href="{{ url('checkout') }}" class="btn btn-outline-success float-end">Check out</a>
               </h5>
               
          </div>
     @else
          <div class="card-body text-center">
               <h2>Your<i class="fa fa-shopping-cart"></i> Cart is empty</h2>
               <a href="{{ url('category') }}" class="btn btn-outline-primary float-end">Continue Shopping</a>
          </div>
     @endif
     </div>
</div>
<script src="{{ asset('js/custom.js') }}"></script>
@endsection