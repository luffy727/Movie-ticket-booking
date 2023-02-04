@extends('layouts.app')

@section('content')
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
    @foreach($trending_movie as $trailer)
    <input type="hidden" value="" name="movie_id" id="movie_id ">
      <div class="modal-header">
        <h4 class="modal-title" ><b>{{ $trailer->mname }}</b></h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <iframe width="560" height="315" src="{{ $trailer->video_url }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
      @endforeach
    </div>
  </div>
</div>

<div class="py-5">
          <div class="container" style="background-color: rgb(20, 24, 29);">
               <div class="row">
                    <h2 class="text-white"><b>Top Trending Movies</b></h2>
                    <div class="owl-carousel featured-carousel owl-theme">
                         @foreach($trending_movie as $film)
                              <div class="col-md-4 mb-3">
                                   <div class="card text-center text-white bg-dark" style="width: 16rem;">
                                        <img src="{{ asset('uploads/movie/'.$film->image) }}" alt="product image" style="height:370px;">
                                        <div class="card-body text-white bg-dark">
                                             <h5 class="card-title" >{{ $film->mname }}</h5>
                                             <p class="card-text">{{ $film->mtype }}</p>
                                        </div>
                                        <div class="card-body d-grid gap-2">
                                             <a href="{{ url('movieview/'.$film->mname) }}" type="button" class="btn btn-outline-warning">Buy Ticket <i class="fa fa-ticket" aria-hidden="true"></i></a>
                                             <button value="{{$film->id}}" type="button" class="btn btn-outline-secondary editbtn" data-bs-toggle="modal" data-bs-target="#exampleModal">Watch Trailer <i class='fa-solid fa-video'></i></button>
                                        </div>   
                                   </div>
                              </div>
                         @endforeach
                    </div>
                    
               </div>
          </div>
     </div>
     <div class="py-5">
          <div class="container" style="background-color: rgb(20, 24, 29);">
               <div class="row">
                    <h2 class="text-white"><b>Upcoming Movies</b></h2>
                    <div class="owl-carousel featured-carousel owl-theme">
                         @foreach($upmovie as $film)
                              <div class="col-md-4 mb-3">
                                   <div class="card text-center text-white bg-dark" style="width: 18rem;">
                                        <img src="{{ asset('uploads/upcmovie/'.$film->image) }}" alt="product image" style="height:370px;">
                                        <div class="card-body text-white bg-dark">
                                             <h5 class="card-title" >{{ $film->umname }}</h5>
                                             <p class="card-text"><b>{{ $film->umtype }}</b></p>
                                             <p class="card-text">{{ $film->sdescription }}</p>
                                             <h6><b>{{ $film->rdate }}</b></h6>

                                        </div>
                                        <div class="card-body d-grid gap-2">
                                             <button value="{{$film->id}}" type="button" class="btn btn-outline-secondary editbtn" data-bs-toggle="modal" data-bs-target="#exampleModal">Watch Trailer <i class='fa-solid fa-video'></i></button>
                                        </div>   
                                   </div>
                              </div>
                         @endforeach
                    </div>
                    
               </div>
          </div>
     </div>
     <div class="footer">
            <div class="copyright">
                <p class="text-white text-center">Copyright © Designed &amp; Developed by <a href="#" target="_blank">Filmzo Developers</a> 2022</p>
            </div>
     </div>
     @section('scripts')
     <script>
     var owl= $('.featured-carousel').owlCarousel({
     loop:true,
     margin:10,
     nav:true,
     responsive:{
          0:{
               items:1
          },
          300:{
               items:2
          },
          900:{
               items:3 
          }
     }
     });
     
     owl.on('mousewheel', '.owl-stage', function (e) {
    if (e.deltaY>0) {
        owl.trigger('next.owl');
    } else {
        owl.trigger('prev.owl');
    }
    e.preventDefault();
     });
     </script>
     @endsection

     <!--  @section('scripts')
     <script>
          $(document).ready(function () {
               $(document).on('click', '#show-trailer', function () {
                    var movieURL = $(this).data('url');
                    $.get(movieURL, function (data){ 
                         $('#exampleModal').modal('show');
                         $('#mname').text(data.mname);
                    })
                    

                    
               });
          });
     </script> 
     @endsection -->

@endsection