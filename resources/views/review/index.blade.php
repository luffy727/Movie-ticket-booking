@extends('layouts.app')

@section('content')

<div class="container">
     <div class="row">
          <div class="col-md-12">
               <div class="card">
                    <div class="card-body">
                         <h5>You are writing review for {{ $movie->mname }}</h5>
                         <form action="{{ url('add-review') }}" method="post">
                              @csrf
                              <input type="hidden" name="movie_id" value="{{ $movie->id }}">
                              <div class="col-md-10">
                                   <textarea class="form-control" name="user_review" id="" rows="3"  placeholder="Write a review " required></textarea>
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