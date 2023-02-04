@extends('layouts.app')


@section('content')
<div class="container py-5">
     <div class="row">
          <div class="col-md-12">
               <div class="card">
                    <div class="card-header bg-secondary">
                         <h4><b> Order View</b>
                              <a href="{{ url('my-orders') }}" class="btn btn-danger text-white float-end">Back</a><br>
                              @if($orders->status == 1)
                                   @if ($orders->payment_mode == "COD")

                                   <br>
                                   <a href="{{ url('reciept-orders-pdf/'.$orders->id) }}" class="btn btn-success text-white float-end">DOWNLOAD RECIEPT</a>
                                   @endif  
                              @endif   
                         </h4>

                         <h4 class="text-center"><b>FILMZO</b></h4>
                    </div>
                    <div class="card-body">
                         <div class="row">
                              <div class="col-md-6">
                                   <h4><b>Shipping details</b></h4>
                                   <label for="">First name</label>
                                   <div class="border p-2">{{ $orders->fname }}</div>
                                   <label for="">Last name</label>
                                   <div class="border p-2">{{ $orders->lname }}</div>
                                   <label for="">Email</label>
                                   <div class="border p-2">{{ $orders->email }}</div>
                                   <label for="">Contact No</label>
                                   <div class="border p-2">{{ $orders->phone }}</div>
                                   <label for="">Shipping Address</label>
                                   <div class="border p-2">
                                        {{ $orders->address1 }}
                                        {{ $orders->address2 }}
                                        {{ $orders->city }}
                                        {{ $orders->state }}
                                   </div>
                                   <label for="">Zip Code</label>
                                   <div class="border p-2">{{ $orders->pincode }}</div>
                              </div>
                              <div class="col-md-6">
                              <h4><b> Order details</b></h4>
                                   <table class="table table-dark">
                                        <thead>
                                             <tr>
                                                  <th>Name</th>
                                                  <th>Quantity</th>
                                                  <th>Price</th>
                                                  <th>Image</th>
                                             </tr>
                                        </thead>
                                        <tbody>
                                             @foreach ($orders->orderitems as $item)
                                             <tr>
                                                  <td>{{ $item->product->name }}</td>
                                                  <td>{{ $item->qty }}</td>
                                                  <td>{{ $item->price }}</td>
                                                  <td>
                                                       <img src="{{ asset('uploads/product/'.$item->product->image)}}" width="60px" alt="Product image">
                                                  </td>
                                             </tr>
                                             @endforeach
                                        </tbody>
                                   </table>
                                   <h4>Grand Total: Rs{{ $orders->total_price }}</h4>
                              </div>
                         </div>
                    
                    </div>
               </div>
              
          </div>
     </div>
</div>

@endsection