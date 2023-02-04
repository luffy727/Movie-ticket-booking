@extends('layouts.app')

@section('content')
<div class="py-5">
     <div class="container">
          <div class="row">
               <div class="col-md-12">
                    <h2 class="text-white">All Categories</h2>
                    <div class="row">
                    @foreach ($catagory as $cata)
                         <div class="col-md-4 mb-3">
                              <!-- <a href="{{ url('view-category/'.$cata->slug) }}"> -->
                              <div class="card" style="width: 16rem;">
                                   <img src="{{ asset('uploads/catagory/'.$cata->image) }}" alt="category image" style="height:200px;">
                                   <div class="card-body">
                                        <h5 class="card-title">{{ $cata->name }}</h5>
                                        <p class="card-text">{{ $cata->description }}</p>
                                        <a href="{{ url('category/'.$cata->slug) }}" class="btn btn-primary">View Items</a>
                                   </div>
                              </div>
                              <!-- </a> -->
                         </div>
                    @endforeach
                    </div>
               </div>
          </div>
     </div>
</div>
@endsection