
@section('content')


<!-- Favicon icon -->
<link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
<link href="../assets/vendor/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
<link href="../assets/vendor/chartist/css/chartist.min.css" rel="stylesheet">
<link href="../assets/css/style.css" rel="stylesheet">


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
    @extends('layouts.app')
    <div class="nav-header">
        <a href="{{ route('admin.dashboard') }}" class="brand-logo">
            <img class="logo-abbr" src="../assets/images/logo.png" alt="">
            <img class="logo-compact" src="{{ asset('image/Logo.png') }}" alt="">
            <img class="brand-title" src="{{ asset('image/Logo.png') }}" alt="">
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
                            <li><a href="{{ route('orders') }}">View Product Orders</a></li>
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
    @include('sweetalert::alert')

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
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit & Update Category</h4>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form action="{{ url('update-catagory/'.$catagory->id) }}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        @method('PUT')
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label style="color:black;">Name</label>
                                <input type="text" class="form-control" name="name" value="{{ $catagory->name }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label style="color:black;">Slug</label>
                                <input type="text" class="form-control" name="slug" value="{{ $catagory->slug }}">
                            </div>
                            <div class="form-group col-md-12">
                                <label style="color:black;">Description</label>
                                <textarea name="description" class="form-control" rows="4" id="comment">{{ $catagory->description }}</textarea>
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label" style="color:black;">
                                    <input type="checkbox" name="status" class="form-check-input"  >Status
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label" style="color:black;">
                                    <input type="checkbox" name="popular" class="form-check-input" value="">Popular
                                </label>
                            </div>

                            <div class="form-group col-md-12 mb-3">
                                <label style="color:black;">Meta Title</label>
                                <input type="text" class="form-control" name="meta_title" value="{{ $catagory->meta_title }}">
                            </div>
                            
                            <div class="form-group col-md-12">
                                <label style="color:black;">Meta Description</label>
                                <textarea name="meta_description" class="form-control" rows="3" >{{ $catagory->meta_description }}</textarea>
                            </div>
                            <div class="form-group col-md-12">
                                <label style="color:black;">Meta Keywords</label>
                                <textarea name="meta_keywords" class="form-control" rows="3" >{{ $catagory->meta_keywords }}</textarea>
                            </div>
                            @if($catagory->image)
                                <img src="{{ asset('uploads/catagory/'.$catagory->image) }}" style="width:200px;" >
                            @endif
                            <div class="form-group col-md-12">
                                <input type="file" name="image" class="form-control">
                            </div>
                        </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
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
            <p>Copyright © Designed &amp; Developed by <a href="#" target="_blank">Filmzo Developers</a> 2022</p>
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
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@if(session('status'))
    swal( "{{ session('status') }}");
@endif


<script src="../assets/vendor/global/global.min.js"></script>
<script src="../assets/js/quixnav-init.js"></script>
<script src="../assets/js/custom.min.js"></script>

<script src="../assets/vendor/chartist/js/chartist.min.js"></script>

<script src="../assets/vendor/moment/moment.min.js"></script>
<script src="../assets/vendor/pg-calendar/js/pignose.calendar.min.js"></script>
<link href="../assets/vendor/chartist/css/chartist.min.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">

<script src="../assets/js/dashboard/dashboard-2.js"></script>
<!-- Circle progress -->
@if(session('status'))
    <script>
        swal("{{session('status')}}")
    </script>
    @endif
</body>

@endsection