@extends('layouts.app')

@section('content')
<img src="{{ asset('image/Logo.png') }}" alt="" width="100" height="90" style="display: block;
  margin-left: auto;
  margin-right: auto;" >
<h2 class="text-white text-center">About Us</h2>
  
<div class="container" style="background-color: rgb(20, 24, 29);">
     <div class="card shadow" style="background-color: rgb(20, 24, 29);">
          <div class="card-body">
               <div class="row">
                    <h3 class="card-title text-white">Filmzo</h3>
                    <p class="card-text text-white">Filmzo is Sri Lanka’s biggest online tickets portal. We offer a unique and rich experience in purchasing online movie tickets. Sri Lanka’s best theatre chains are accompanied with us to provide the best cinematic experience to the public.Filmzo is the smartest way to book a ticket in Sri Lanka! We have understood the wants and needs of the Sri Lankan public when it comes to booking online tickets. Filmzo has partnered with Sri Lanka’s largest and most prominent theatre chains in Sri Lanka. Filmzo provides the most fastest and safest way to book tickets. As our slogan suggests, We provide the smartest way to book movie tickets in Sri Lanka.</p>
               </div>
          </div>
     </div>
</div>
<br>

<div class="container" style="background-color: rgb(20, 24, 29);">
     <div class="card shadow" style="background-color: rgb(20, 24, 29);">
          <div class="card-body">
               <div class="row">
                    <h3 class="card-title text-white">OUR VALUES</h3>
                    <p class="card-text text-white">Get to know our values Our values guide the way we work with our strategic alliances, within our communities and with one another. Through integrity & accountability, positive attitude, knowledge gathering & sharing and work-life-balance, we have created a lively company culture where there are innovative ideas, success and we make sure that our employees and customers are always satisfied.</p>
               </div>
          </div>
     </div>
</div>
<br>
<h1 class="text-center text-white">Film Halls</h1>
<br>
<div class="container">
<div class="card mb-10" style="width: 1100px;">
  <div class="row g-0">
    <div class="col-md-5">
      <img src="{{ asset('image/c1.jpg') }}" class="img-fluid rounded-start" alt="..." style="height: 300px;">
    </div>
    <div class="col-md-7">
      <div class="card-body">
        <h2 class="card-title"><b>C1 Hall</b></h2>
        <p class="card-text">C1 is a state-of-art modern cinema showcasing an immersive, unparallel Dolby Atmos surround sound experience coupled with ultra-bright 4K projection with 3D capability. C1 seats 100 viewers and prides itself in having seating accessibility for wheelchairs. Each seat is designed and engineered for an all-round first-class experience for sounds and visuals – to the highest available industry standards.</p>
      </div>
    </div>
  </div>
</div>
</div>
<br>
<div class="container">
<div class="card mb-10" style="width: 1100px;">
  <div class="row g-0">
    <div class="col-md-5">
      <img src="{{ asset('image/c2.jpg') }}" class="img-fluid rounded-start" alt="..." style="height: 300px;">
    </div>
    <div class="col-md-7">
      <div class="card-body">
        <h2 class="card-title"><b>C2 Hall</b></h2>
        <p class="card-text">C2 features an expansive Dolby 7.1 surround sound system and superior 2K laser projection with 3D capability. C2 maximizes space efficiently without compromise on the best cinema experience. It comfortably seats 70 viewers, in seating slightly plusher than C1 and C3, with unobstructed views throughout. C2 is the perfect venue for your next private screening, corporate event or party – inquire here.</p>
      </div>
    </div>
  </div>
</div>
</div>
<br>
<div class="container">
<div class="card mb-10" style="width: 1100px;">
  <div class="row g-0">
    <div class="col-md-5">
      <img src="{{ asset('image/c3.jpg') }}" class="img-fluid rounded-start" alt="..." style="height: 300px;">
    </div>
    <div class="col-md-7">
      <div class="card-body">
        <h2 class="card-title"><b>C3 Hall</b></h2>
        <p class="card-text">C3 packs a punch with superior 2K laser projection with 3D capability and an expansive Dolby 7.1 surround system. C3 seats 150 viewers, all seat views are unobstructed and designed for the ultimate viewing experience. C3 also features inclusive design by having seating accessibility for wheelchairs.</p>
      </div>
    </div>
  </div>
</div>
</div>
<br>

<div class="footer">
  <div class="copyright">
    <p class="text-white text-center">Copyright © Designed &amp; Developed by <a href="#" target="_blank">Filmzo Developers</a> 2022</p>
  </div>
</div>
@endsection