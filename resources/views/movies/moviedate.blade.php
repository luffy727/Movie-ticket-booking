
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
    @extends('layouts.app')
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

                    </ul>
                </li>
                <li class="nav-label">Orders</li>
                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                            class="icon icon-world-2"></i><span class="nav-text">Orders</span></a>
                    <ul aria-expanded="false">
                        <li><a href="{{ route('orders') }}">View Orders</a></li>
                        <li><a href="./ui-alert.html">Alert</a></li>

                    </ul>
                </li>

                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="fa-solid fa-clapperboard"></i><span class="nav-text">Plugins</span></a>
                    <ul aria-expanded="false">
                        <li><a href="./uc-select2.html">Select 2</a></li>
                        <li><a href="./uc-nestable.html">Nestedable</a></li>
                    </ul>
                </li>
                <li><a href="widget-basic.html" aria-expanded="false"><i class="icon icon-globe-2"></i><span
                            class="nav-text">Widget</span></a></li>
                <li class="nav-label">Forms</li>
                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                            class="icon icon-form"></i><span class="nav-text">Forms</span></a>
                    <ul aria-expanded="false">
                        <li><a href="./form-element.html">Form Elements</a></li>
                        <li><a href="./form-wizard.html">Wizard</a></li>
                        <li><a href="./form-editor-summernote.html">Summernote</a></li>
                        <li><a href="form-pickers.html">Pickers</a></li>
                        <li><a href="form-validation-jquery.html">Jquery Validate</a></li>
                    </ul>
                </li>
                <li class="nav-label">Table</li>
                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                            class="icon icon-layout-25"></i><span class="nav-text">Table</span></a>
                    <ul aria-expanded="false">
                        <li><a href="table-bootstrap-basic.html">Bootstrap</a></li>
                        <li><a href="table-datatable-basic.html">Datatable</a></li>
                    </ul>
                </li>

                <li class="nav-label">Extra</li>
                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                            class="icon icon-single-copy-06"></i><span class="nav-text">Pages</span></a>
                    <ul aria-expanded="false">
                        <li><a href="./page-register.html">Register</a></li>
                        <li><a href="./page-login.html">Login</a></li>
                        <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Error</a>
                            <ul aria-expanded="false">
                                <li><a href="./page-error-400.html">Error 400</a></li>
                                <li><a href="./page-error-403.html">Error 403</a></li>
                                <li><a href="./page-error-404.html">Error 404</a></li>
                                <li><a href="./page-error-500.html">Error 500</a></li>
                                <li><a href="./page-error-503.html">Error 503</a></li>
                            </ul>
                        </li>
                        <li><a href="./page-lock-screen.html">Lock Screen</a></li>
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
                    <h4 class="card-title">Add Movie Dates</h4>
                </div>
                <div class="card-body">
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger" role="alert">
                            {{$error}}
                        </div>
                    @endforeach
                    <div class="basic-form">
                        <form action="{{ url('insert-moviedate') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <ul  class="form-group" id="saveform_errlist"> </ul>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label style="color:black;">Film Type</label>
                                <select class="form-select mtype" name="movie_id" aria-label="Default select example">
                                   
                                   @foreach ($movie as $item)
                                        <option value="{{ $item->id }}">{{ $item->mname }}</option>
                                   @endforeach                                   
                                </select>
                                <span id="mtype_error" class="text-red"></span>

                            </div>
                            
                            <div class="form-group col-md-6">
                                <label for="" style="color:black;">Watching Date</label>
                                <input type="date" name="movie_date" id="" class="form-control date">
                                <span id="date_error" class="text-red"></span>

                            </div>
                            <div class="form-group col-md-6">
                                <label for="" style="color:black;">Watching Time</label>
                                <input type="time" name="movie_time" id="" class="form-control time">
                                <span id="time_error" class="text-red"></span>

                            </div>
                            <div class="form-group col-md-6">
                                <label for="" style="color:black;">Seats</label>
                                <input type="text" name="movie_seats" id="" class="form-control">
                            </div>
                            
                        </div>
                            <button type="submit" class="btn btn-success add_movie">Submit</button> 
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
<script src="../assets/vendor/global/global.min.js"></script>
<script src="../assets/js/quixnav-init.js"></script>
<script src="../assets/js/custom.min.js"></script>
<script src="../../js/jquery-3.6.0.min.js"></script>



<script src="../assets/vendor/chartist/js/chartist.min.js"></script>

<script src="../assets/vendor/moment/moment.min.js"></script>
<script src="../assets/vendor/pg-calendar/js/pignose.calendar.min.js"></script>


<script src="../assets/js/dashboard/dashboard-2.js"></script>
<!-- Circle progress -->


</body>

@endsection

