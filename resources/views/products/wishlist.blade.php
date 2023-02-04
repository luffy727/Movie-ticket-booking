@extends('layouts.app')


@section('content')
<div class="container my-5">
     <div class="card shadow ">
          <div class="card-body">
          @if($wishlist->count() > 0)
               @foreach($wishlist as $item)
               <div class="row product_data">
                    <div class="col-md-2">
                         <img src="{{ asset('uploads/product/'.$item->product->image) }}" style="width:100px;" alt="">
                    </div>
                    <div class="col-md-2">
                         <h5>{{ $item->product->name }}</h5>
                    </div>
                    <div class="col-md-2">
                         <h5>Rs {{ $item->product->selling_price }}</h5>
                    </div>
                    <div class="col-md-2">
                         <input type="hidden" value="{{ $item->prod_id }}" class="prod_id">
                         <label for="Quantity">Quantity</label>
                              <div class="input-group text-center mb-2">
                                   <button class="input-group-text decrement-btn">-</button>
                                   <input type="text" name="quantity" value="1" class="form-control qty-input">
                                   <button class="input-group-text increment-btn">+</button>
                              </div>
                    </div>
                    <div class="col-md-2 my-auto">
                         <button class="btn btn-success addToCartBtn"><i class="fa fa-shopping-cart"></i>Add to Cart</button>
                    </div>
                    <div class="col-md-2 my-auto">
                         <button class="btn btn-danger remove-wishlist-list"><i class="fa fa-trash"></i>Remove</button>
                    </div>
               </div>
               @endforeach
          </div>
           
          @else
               <h4>There are no products in your Wishlist</h4>
          @endif
     </div>
</div>
<script src="{{ asset('js/custom.js') }}"></script>
@endsection