@extends('layouts.app')

@section('content')

<div class="container">
     <div class="row">
          <div class="col-md-12">
               <div class="card">
                    <div class="card-body">
                         <h5>You are writing review for {{ $review->movie->mname }}</h5>
                         <form action="{{ url('update-review') }}" method="post">
                              @csrf
                              @method('PUT')
                              <input type="hidden" name="review_id" value="{{ $review->id }}">
                              <div class="col-md-10">
                                   <textarea class="form-control" name="user_review" id="" rows="3"  placeholder="Write a review " required>{{ $review->user_review}}</textarea>
                              </div>
                              <br>
                              <button type="submit" class="btn btn-outline-primary">Submit Review</button>
                         </form>
                    </div>
               </div>
          </div>
     </div>
</div>
@endsection