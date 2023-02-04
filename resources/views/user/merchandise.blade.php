@extends('layouts.app')

@section('content')
<!-- <link rel="stylesheet" href="../../css/bootstrap.min.css"> -->
     <div class="py-5">
          <div class="container" style="background-color: rgb(20, 24, 29);">
               <div class="row">
                    <h2 class="text-white">Featured Products</h2>
                    <div class="owl-carousel featured-carousel owl-theme">
                         @foreach($featured_product as $prod)
                              <div class="col-md-3 mt-3">
                                   <div class="card text-center" style="width: 14rem;">
                                        <img src="{{ asset('uploads/product/'.$prod->image) }}" alt="product image" >
                                        <div class="card-body">
                                        <a href=" {{ url('category') }}">
                                             <h4 class="card-title text-black" >{{ $prod->name }}</h4>
                                        </a>    
                                             <span class="float-start">Price - {{ $prod->selling_price }}</span>
                                             <span class="float-end"><s>{{ $prod->original_price }}</s></span>
                                             
                                        </div>
                                   </div>
                              </div>
                         @endforeach
                    </div>
                    
               </div>
          </div>
     </div>

     <div class="py-5">
          <div class="container" style="background-color: rgb(20, 24, 29);">
               <div class="row">
               
               <h2 class="text-white">Trending Category</h2>
               
                    <div class="owl-carousel featured-carousel owl-theme">
                         @foreach($trending_catagory as $tcatagory)
                              <div class="col-md-3 mt-3">
                                   <div class="card text-center card text-white bg-secondary" style="width: 14rem;">
                                        <img src="{{ asset('uploads/catagory/'.$tcatagory->image) }}" alt="product image" >
                                        <div class="vard-body">
                                        <a href=" {{ url('category') }}">
                                             <h4 class="card-title text-white" >{{ $tcatagory->name }}</h4>
                                             <p class="card-text text-white">{{ $tcatagory->description }}</p>
                                        </a>
                                        </div>
                                   </div>
                              </div>
                         @endforeach
                    </div>
                    
               </div>
          </div>
     </div>
     @section('scripts')
     <script>
          $('.featured-carousel').owlCarousel({
     loop:true,
     margin:10,
     nav:true,
     responsive:{
          0:{
               items:1
          },
          300:{
               items:2
          },
          900:{
               items:3 
          }
     }
     })
     </script>
     @endsection

     

     
@endsection

