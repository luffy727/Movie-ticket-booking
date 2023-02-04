@extends('layouts.app')

@section('content')
<div class="py-5">
          <div class="container">
               <div class="row">
                    <h2 class="text-white">{{ $catagory->name }}</h2>
                         @foreach($product as $prod)
                              <div class="col-md-3 mt-3">
                                   <div class="card text-center" style="width: 14rem;">
                                        <img src="{{ asset('uploads/product/'.$prod->image) }}" alt="product image"  style="height: 17rem;">
                                        <div class="card-body">
                                             <h4 class="card-title" >{{ $prod->name }}</h4>
                                             <span class="float-start">Price - {{ $prod->selling_price }}</span>
                                             <span class="float-end"><s>{{ $prod->original_price }}</s></span>
                                             <a href="{{ url('category/'.$catagory->slug.'/'.$prod->slug) }}" class="btn btn-secondary">View Details</a>
                                        </div>
                                   </div>
                              </div>
                         @endforeach                    
               </div>
          </div>
     </div>
@endsection