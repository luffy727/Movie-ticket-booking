@extends('layouts.app')



@section('content')
@include('layouts.appjs')
<script src="{{ asset('js/movie.js') }}"></script>
<div class="container " style="background-color: rgb(20, 24, 29);">
<div class="row">
     <div class="col-lg-12" >
          <div class="card">
               <div class="card-header">
                    <h3 class="card-title"><b>{{ $movie->mname}}</b></h3>
                    <h4><b>Children ticket fee: Rs{{ $movie->chticket_price}}</b></h4>
                    <h4><b>Adult ticket fee: Rs{{ $movie->adticket_price}}</b></h4>

               </div>
               <div class="card-body">
                    <div class="table-responsive">
                         <table class="table table-striped-columns table-dark" id="example">
                              <thead>
                                   <tr>
                                        <th class="text-whtie">Id</th>
                                        <th class="text-whtie">Movie ID</th>
                                        <th class="text-whtie">Movie Date</th>
                                        <th class="text-whtie">Movie Time</th>
                                        <th class="text-whtie">Available Seats</th>
                                        <th class="text-whtie">Action</th>
                                                
                                   </tr>
                              </thead>
                              <tbody>
                              @foreach ($moviedate as $item)
                                   @if($todayDate < $item->movie_date)
                                   <tr id="mitem">
                                        <td class="text-whtie"><b>{{ $item->id}}</b></td>
                                        <td class="text-whtie"><b>{{ $item->movie_id}}</b></td>
                                        <td class="text-whtie" id="mdate" oninput="mydate()"><b>{{ $item->movie_date }}</b></td>
                                        <td class="text-whtie"><b>{{ $item->movie_time }}</b></td>
                                        <td class="text-white"><b>{{ $item->movie_seats }}</b></td>
                                        <td>
                                             <a href="{{ url('book-ticket/'.$item->id) }}" class="btn btn-outline-success" >Book Tikcets</a>
                                        </td>
                                        
                                   </tr>
                                   @endif
                              @endforeach
                              </tbody>
                         </table>
                    </div>
               </div>
          </div>
     </div>
</div>
</div>



@endsection