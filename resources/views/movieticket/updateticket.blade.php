@extends('layouts.app')

@section('content')
<!-- Favicon icon -->
<link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
<link href="../assets/vendor/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
<link href="../assets/vendor/chartist/css/chartist.min.css" rel="stylesheet">
<link href="../assets/css/style.css" rel="stylesheet">
<meta name="csrf-token" content="{{ csrf_token() }}">


<body>

<!--*******************
    Preloader start
********************-->
<div id="preloader">
    <div class="sk-three-bounce">
        <div class="sk-child sk-bounce1"></div>
        <div class="sk-child sk-bounce2"></div>
        <div class="sk-child sk-bounce3"></div>
    </div>
</div>
<!--*******************
    Preloader end
********************-->


<!--**********************************
    Main wrapper start
***********************************-->
<div id="main-wrapper">

    <!--**********************************
        Nav header start
    ***********************************-->
    
    <div class="nav-header">
        <a href="{{ route('admin.dashboard') }}" class="brand-logo">
            <img class="logo-abbr" src="../assets/images/logo.png" alt="">
            <img class="logo-compact" src="../assets/images/logo-text.png" alt="">
            <img class="brand-title" src="../assets/images/logo-text.png" alt="">
        </a>

        <div class="nav-control">
            <div class="hamburger">
                <span class="line"></span><span class="line"></span><span class="line"></span>
            </div>
        </div>
    </div>
    <!--**********************************
        Nav header end
    ***********************************-->

    <!--**********************************
        Header start
    ***********************************-->
    <div class="header">
        <div class="header-content">
            <nav class="navbar navbar-expand">
                <div class="collapse navbar-collapse justify-content-between">
                    <div class="header-left">
                        <div class="search_bar dropdown">
                            <span class="search_icon p-3 c-pointer" data-toggle="dropdown">
                                <i class="mdi mdi-magnify"></i>
                            </span>
                            <div class="dropdown-menu p-0 m-0">
                                <form>
                                    <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                                </form>
                            </div>
                        </div>
                    </div>

                    <ul class="navbar-nav header-right">
                        <li class="nav-item dropdown notification_dropdown">
                            <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                <i class="mdi mdi-bell"></i>
                                <div class="pulse-css"></div>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div> 
    <!--**********************************
        Header end ti-comment-alt
    ***********************************-->

    <!--**********************************
        Sidebar start
    ***********************************-->
    <div class="quixnav">
        <div class="quixnav-scroll">
            <ul class="metismenu" id="menu">
                <li class="nav-label first">Main Menu</li>
                <!-- <li><a href="index.html"><i class="icon icon-single-04"></i><span class="nav-text">Dashboard</span></a>
                </li> -->
                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                            class="icon icon-single-copy-06"></i><span class="nav-text">Pages</span></a>
                    <ul aria-expanded="false">
                        <li><a href="{{ route('index') }}">User Detials</a></li>
                        <li><a href="{{ route('add') }}">Add Users</a></li>
                        <li><a href="{{ route('admin.dashboard') }}">Add Movies</a></li>

                    </ul>
                </li>

                
                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                            class="icon icon-single-04"></i><span class="nav-text">Admin Profile</span></a>
                    <ul aria-expanded="false">
                        <li><a href="{{ route('profile') }}">Profile</a></li>
                        <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Email</a>
                            <ul aria-expanded="false">
                                <li><a href="./email-compose.html">Compose</a></li>
                                <li><a href="./email-inbox.html">Inbox</a></li>
                                <li><a href="./email-read.html">Read</a></li>
                            </ul>
                        </li>
                        <li><a href="./app-calender.html">Calendar</a></li>
                    </ul>
                </li>
                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                            class="icon icon-app-store"></i><span class="nav-text">Merchandise</span></a>
                    <ul aria-expanded="false">
                        <li><a href="{{ route('catagory') }}">Category</a></li>
                        <li><a href="{{ route('addcatagory') }}">Add Category</a></li>
                        <li><a href="{{ route('products') }}">Merchandise</a></li>
                        <li><a href="{{ route('addproduct') }}">Add Merchandise</a></li>
                        
                    </ul>
                </li>
                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                <i class="fa-solid fa-film"></i><span class="nav-text">Movies</span></a>
                    <ul aria-expanded="false">
                        <li><a href="{{ route('movie') }}">Movies</a></li>
                        <li><a href="{{ route('addmovie') }}">Add Movies</a></li>
                        <li><a href="{{ route('moviedate') }}">Add Movie Date</a></li>
                        <li><a href="{{ route('movieshedule') }}">Movie Shedule</a></li>
                        <li><a href="{{ route('upadd') }}">Add Upcoming Movies</a></li>
                        <li><a href="{{ route('upmovie') }}">View Upcoming Movies</a></li>

                    </ul>
                </li>
                <li class="nav-label">Orders</li>
                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                            class="icon icon-world-2"></i><span class="nav-text">Orders</span></a>
                    <ul aria-expanded="false">
                        <li><a href="{{ route('orders') }}">View Orders</a></li>
                        <li><a href="{{ route('moviebooking') }}">Movie Booking Orders</a></li>

                    </ul>
                </li>

                
            </ul>
        </div>
    </div>
    <!--**********************************
        Sidebar end
    ***********************************-->

    <!--**********************************
        Content body start
    ***********************************-->
    @include('layouts.appjs')

    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Hi, welcome back!</h4>
                        <p class="mb-0">Your Filmzo dashboard</p>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Layout</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Blank</a></li>
                    </ol>
                </div>
            </div>
            
            <div class="container py-5">
                    <div class="row">
                         <div class="col-md-12">
                              <div class="card">
                                   <div class="card-header bg-primary">
                                        <h4><b>Booking View</b>
                                        
 
                                        </h4>
                                        <a href="{{ url('moviebooking') }}" class="btn btn-danger text-white float-end">Back</a>
                                   </div>
                                   <div class="card-body">
                                        <div class="row">
                                             <div class="col-md-6">
                                                  <h4 class="text-black"><b>Customer details</b></h4>
                                                  <label for="" class="text-black">First name</label>
                                                  <div class="border p-2 text-black">{{ $booking->cname }}</div>
                                                  
                                                  <label for="" class="text-black">Email</label>
                                                  <div class="border p-2 text-black">{{ $booking->cmail }}</div>
                                                  <label for="" class="text-black">Contact No</label>
                                                  <div class="border p-2 text-black">{{ $booking->cphone }}</div>
                                                  <label for="" class="text-black"> Seat</label>
                                                  <div class="border p-2 text-black">
                                                       {{ $booking->seatqty }}
                                                  </div>
                                                  
                                             </div>
                                             <div class="col-md-6">
                                             <h4><b> Movie details</b></h4>
                                                  <table class="table table-dark">
                                                       <thead>
                                                            <tr>
                                                                 <th>Movie Name</th>
                                                                 <th>Seat</th>
                                                                 <th>Total price</th>
                                                                 <th>Date</th>
                                                                 <th>Time</th>
                                                                 <th>Hall</th>
                                                            </tr>
                                                       </thead>
                                                       <tbody>
                                                            @foreach( $book as $item)
                                                            <tr>
                                                                 <td>{{ $item->m_name }}</td>
                                                                 <td>{{ $item->seatqty }}</td>
                                                                 <td>{{ $item->total_price }}</td>
                                                                 <td>{{ $item->mtime }}</td>
                                                                 <td>{{ $item->mdate }}</td>
                                                                 <td>{{ $item->m_hall}}</td>
                                                                
                                                            </tr>
                                                            @endforeach
                                                       </tbody>
                                                  </table>
                                                  <h4>Grand Total: Rs{{ $booking->total_price }}</h4>
                                                  @if($booking->status == 0)
                                                  <div class="mt-3">
                                                       <form action="{{ url('update-booking/'.$booking->id) }}" method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="form-group">
                                                                 <label for="my-select" class="text-black">Booking Status</label>
                                                                 <select id="my-select" class="form-control" name="booking_status">
                                                                      <option value="0" {{ $booking->status == '0'?'selected':'' }} >Pending</option>
                                                                      <option value="1" {{ $booking->status == '1'?'selected':'' }} >Completed</option>
                                                                 </select>
                                                                 <button type="submit" class="btn btn-info">Update</button>
                                                            </div>
                                                       </form> 
                                                  </div>
                                                  @endif
                                             </div>
                                        </div>
                                   
                                   </div>
                              </div>
                         
                         </div>
                    </div>
               </div>
            
            
        </div>
    </div>
   
    <!--**********************************
        Content body end
    ***********************************-->


    <!--**********************************
        Footer start
    ***********************************-->
    <div class="footer">
        <div class="copyright">
            <p>Copyright ?? Designed &amp; Developed by <a href="#" target="_blank">Filmzo Developers</a> 2022</p>
        </div>
    </div>
    <!--**********************************
        Footer end
    ***********************************-->

    <!--**********************************
       Support ticket button start
    ***********************************-->

    <!--**********************************
       Support ticket button end
    ***********************************-->


</div>
<!--**********************************
    Main wrapper end
***********************************-->

<!--**********************************
    Scripts
***********************************-->
<!-- Required vendors -->
<script src="../assets/vendor/global/global.min.js"></script>
<script src="../assets/js/quixnav-init.js"></script>
<script src="../assets/js/custom.min.js"></script>




<script src="../assets/vendor/chartist/js/chartist.min.js"></script>

<script src="../assets/vendor/moment/moment.min.js"></script>
<script src="../assets/vendor/pg-calendar/js/pignose.calendar.min.js"></script>


<script src="../assets/js/dashboard/dashboard-2.js"></script>
<!-- Circle progress -->


</body>

@endsection

