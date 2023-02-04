@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/contact.css') }}">
<section class="content">
<div class="container py-5" >
                    <div class="row">
                         <div class="col-md-12">
                              <div class="card" style="background-color: rgb(20, 24, 29);">
                                   <div class="card-header ">
                                        <h4 class="text-center text-white"><b>Contact US</b></h4>
                                        
                                   </div>
                                   <div class="card-body">
                                        <div class="row">
                                             <div class="col-md-6">
                                             <img src="{{ asset('image/Logo.png') }}" alt="" width="100" height="90" style="display: block;
  margin-left: auto;
  margin-right: auto;" >
                                             
                                                  <h5 for="" class="text-black text-white">Address</h5>
                                                  
                                                  <div class=" text-white">
                                                  
                                                       <h5><i class="fa-solid fa-map-location-dot"></i> No.23/2 Daladha Street, Kandy</h5>
                                                  </div>
                                                  
                                                  <h5 for="" class="text-white">Email</h5>
                                                  <div class=" text-white">
                                                  
                                                       <h5><i class="fa-solid fa-envelope"></i> filmzo@gmail.com</h5>
                                                  </div>
                                                  <h5 for="" class="text-white">Contact No</h5>
                                                  <div class=" text-white">
                                                  
                                                       <h5><i class="fa-solid fa-phone"></i> +94754794144</h5>
                                                  </div>
                                                  
                                                  
                                             </div>
                                             <div class="col-md-6">
                                                  <h4 class=" text-white"><b> Send Message</b></h4>
                                                  <form action="https://formsubmit.co/buwaneka99@gmail.com" method="POST">
                                                       <input type="hidden" name="_subject" value="FilmZo !">
                                                       <div class="form-group">
                                                            <label for="" class=" text-white">Email</label>
                                                            <input type="email" name="email" id="" class="form-control" required>
                                                       </div>
                                                       
                                                       <div class="form-group">
                                                            <label for="" class=" text-white">Message</label>
                                                            <textarea class="form-control" name="message" id="" cols="15" rows="5" required></textarea>
                                                       </div>
                                                       <br>
                                                       <button type="submit" class="btn btn-primary">Send</button>
                                                  </form> 
                                                  
                                             </div>
                                        </div>
                                   
                                   </div>
                              </div>
                         
                         </div>
                    </div>
               </div>
               </section>
@endsection('content')