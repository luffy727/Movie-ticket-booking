@extends('layouts.app')

@section('title', $product->name)

@section('content')

<div class="py-3 mb-4 shadow-sm bg-warning border top">
     <div class="container">
          <h6 class="mb-0">Collections / {{ $product->catagory->name }} / {{ $product->name}}</h6>
     </div>
</div>

<div class="container">
     <div class="card shadow product_data">
          <div class="card-body">
               <div class="row">
                    <div class="col-md-4 border-right">
                         <img src="{{ asset('uploads/product/'.$product->image) }}" alt="" style="width:200px;">
                    </div>
                    <div class="col-md-8">
                         <h2 class="mb-0">
                              {{ $product->name }}
                              <label style="font-size: 16px;" class="float-end badge bg-danger trending_tag" for="">{{ $product->trending == '1'?'Trending':'' }}</label>
                         </h2>
                         <br>
                         <label class="me-3" for="">Original Price : <s>Rs {{ $product->original_price }}</s></label>
                         <label class="fw-bold" for="">Selling Price : Rs {{ $product->selling_price }}</label>
                         <p class="mt-3">
                              {!! $product->description !!}
                         </p>
                         <br>
                         @if( $product->qty >0)
                         <label class="badge bg-success">in Stock</label>
                         @else
                         <label class="badge bg-danger">Out of Stock</label>    
                         @endif
                         <div class="row mt-2">
                              <div class="col-md-2">
                                   <input type="hidden" value="{{ $product->id }}" class="prod_id">
                                   <label for="Quantity">Quantity</label>
                                   <div class="input-group text-center mb-3">
                                        <button class="input-group-text decrement-btn">-</button>
                                        <input type="text" name="quantity" value="1" class="form-control qty-input">
                                        <button class="input-group-text increment-btn">+</button>
                                   </div>
                              </div>
                              <div class="col-md-10">
                                   <br>
                                   <button type="button" class="btn btn-success me-3 addToWishlist float-start">Add to Wishlist <i class="fa-solid fa-heart"></i></button>
                                   <button type="button" class="btn btn-primary me-3 addToCartBtn float-start">Add to Cart <i class="fa-solid fa-cart-shopping"></i></button>
                                   
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</div>
@endsection

@section('scripts')
<script>
     $(document).ready(function () {

          $('.addToCartBtn').click(function (e) { 
               e.preventDefault();
               var product_id = $(this).closest('.product_data').find('.prod_id').val();
               var product_qty = $(this).closest('.product_data').find('.qty-input').val();

               $.ajaxSetup({
                         headers: {
                              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                         }
               });
               $.ajax({
                    method: "POST",
                    url: "/add-to-cart",
                    data: {
                         'product_id': product_id,
                         'product_qty': product_qty,
                    },
                    success: function (response) {
                         alert(response.status);
                    }
               });


          });

          $('.addToWishlist').click(function (e) { 
          e.preventDefault();

               var product_id = $(this).closest('.product_data').find('.prod_id').val();

               $.ajaxSetup({
                    headers: {
                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
               });
               $.ajax({
                    method: "POST",
                    url: "/add-to-wishlist",
                    data: {
                         'product_id': product_id,
                         
                    },
                    success: function (response) {
                         alert(response.status);
                    }
               });
               
          });

          $('.increment-btn').click(function (e) { 
               e.preventDefault();
               var inc_value = $('.qty-input').val();
               var value = parseInt(inc_value, 10);
               value = isNaN(value) ? 0 : value;
               if (value < 10) {
                    value++;
                    $('.qty-input').val(value);

               }
          });

          $('.decrement-btn').click(function (e) { 
               e.preventDefault();
               var dec_value = $('.qty-input').val();
               var value = parseInt(dec_value, 10);
               value = isNaN(value) ? 0 : value;
               if (value > 1) {
                    value--;
                    $('.qty-input').val(value);

               }
          });
     });
</script>

@endsection