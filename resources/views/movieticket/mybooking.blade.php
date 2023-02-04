@extends('layouts.app')

@section('content')
<div class="py-5">
     <div class="container">
          <div class="card">
               <div class="card-body">
               <h5 class="card-title">My Bookings</h5>

                    <div class="row">
                         <div class="col-md-12">
                         <table class="table table-dark">
                              <thead class="thead-dark">
                                   <tr>
                                        <th>Booking Id</th>
                                        <th>Customer name</th>
                                        <th>Movie name</th>
                                        <th>Seats</th>
                                        <th>Total price</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                   </tr>
                              </thead>
                              <tbody>
                                   @foreach($booking as $item)
                                   <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->cname }}</td>
                                        <td>{{ $item->m_name }}</td>
                                        <td>{{ $item->seatqty }}</td>
                                        <td>{{ $item->total_price }}</td>
                                        <td>{{ $item->status == '0'?'pending' : 'completed' }}</td>
                                        <td>
                                             <a href="{{ url('view-booking/'.$item->id) }}" type="button" class="btn btn-primary">View</a>
                                        </td>
                                   </tr>
                                   @endforeach
                              </tbody>
                              <tfoot>
                                   <tr>
                                        <th>Booking Id</th>
                                        <th>Customer name</th>
                                        <th>Movie name</th>
                                        <th>Seats</th>
                                        <th>Total price</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                   </tr>
                              </tfoot>
                         </table>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</div>

@endsection