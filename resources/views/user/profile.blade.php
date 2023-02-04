@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- Column -->
        <div class="card"> 
          <img class="card-img-top" src="{{ asset('image/Filmzo 3.jpg') }}" alt="Card image cap">
            <div class="card-body little-profile text-center">
                <div class="pro-img"><img src="{{asset(Auth::user()->avatar)}}" alt="user"></div>
                <h3 class="m-b-0">{{ $user->name }}</h3>
                <h4 class="m-b-0">{{ $user->email }}</h4>
                <h4 class="m-b-0">{{ $user->phone }}</h4>
                <ul class="social-list">
                        <li><i class="fa-brands fa-facebook"></i></li>
                        <li><i class="fa-brands fa-instagram"></i></li>
                        <li><i class="fa-brands fa-google"></i></li>
                        <li><i class="fa-brands fa-linkedin-in"></i></li>
                        <li><i class="fa-brands fa-twitter"></i></li>
               </ul>
                <p>Web Designer &amp; Developer</p> <a href="javascript:void(0)" class="m-t-10 waves-effect waves-dark btn btn-primary btn-md btn-rounded" data-abc="true">Follow</a>
                <!-- <div class="row text-center m-t-20">
                    <div class="col-lg-4 col-md-4 m-t-20">
                        <h3 class="m-b-0 font-light">10434</h3><small>Articles</small>
                    </div>
                    <div class="col-lg-4 col-md-4 m-t-20">
                        <h3 class="m-b-0 font-light">434K</h3><small>Followers</small>
                    </div>
                    <div class="col-lg-4 col-md-4 m-t-20">
                        <h3 class="m-b-0 font-light">5454</h3><small>Following</small>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
>

<link rel="stylesheet" href="{{ asset('css/profile.css') }}">

@endsection