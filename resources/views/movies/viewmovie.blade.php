@extends('layouts.app')

@section('content')
<div class="container" style="background-color: rgb(20, 24, 29);">
     <div class="card shadow product_data" style="background-color: rgb(20, 24, 29);">
          <div class="card-body">
               <div class="row">
                    <div class="col-md-4 border-right">
                         <img src="{{ asset('uploads/movie/'.$movie->image) }}" alt="" style="width:300px;">
                    </div>
                    <div class="col-md-8">
                         <h2 class="mb-0 text-white">
                              {{ $movie->mname }}
                              <label style="font-size: 16px;" class="float-end badge bg-danger trending_tag" for="">{{ $movie->trending == '1'?'Trending':'' }}</label>
                         </h2>
                         <br>
                         <h4 class="text-white">{{ $movie->mtype }}</h4>
                         <p class="mt-3  text-white">
                              {!! $movie->mdescription !!}
                         </p>
                         <br>
                         <h5 class="text-white">Hall Number : {{ $movie->hall }}</h5>
                         <h5 class="text-white">Premier Date : {{ $movie->date }}</h5>
                         <h5 class="text-white">Premier Time : {{ $movie->time }}</h5>
                         <div class="row mt-2">
                              <div class="col-md-10">
                                   <br>
                                   <a href="{{ url('view-movie/'.$movie->mname) }}"type="button" class="btn btn-outline-warning me-3 addToWishlist float-start">Buy Ticket <i class="fa fa-ticket" aria-hidden="true"></i></a>
                                   <!-- <button type="button" class="btn btn-outline-secondary me-3 addToCartBtn float-start">Watch Trailer <i class='fa-solid fa-video'></i></button> -->
                                   
                              </div>
                         </div>
                         <br>
                         <!-- <div class="col-md-12">
                         <a href="{{ url('add-review/'.$movie->mname.'/userreview') }}" class="btn btn-primary">Add Review</a>
                         </div> -->
                    </div>
                   <br>
                  
                   
               </div>
          </div>
          <!-- <div class="card-footer">
          <div class="col-md-10">
                         <h3 class="text-white">Reviews</h3>
                         @foreach ($reviews as $item)
                              <div class="user-review">
                                   <label for="" class="text-white">{{$item->user->name}}</label>
                                   <br>
                                   @if($item->user_id == Auth::id())
                                        <a href="{{ url('edit-review/'.$movie->mname.'/userreview') }}" type="button" class="btn btn-success">edit</a>
                                   @endif
                                   <small class="text-white">Revied on {{ $item->created_at->format('d M Y') }}</small>
                                   <p class="text-white">{{ $item->user_review }}</p>
                              </div>
                         @endforeach
                    </div>
          </div> -->
     </div>
</div>

@endsection