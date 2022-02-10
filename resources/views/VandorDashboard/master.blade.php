<!doctype html>
<html lang="en">

<!-- Mirrored from bootstrap.gallery/le-rouge/design/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 23 Oct 2021 11:40:30 GMT -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Meta -->
    <meta name="description" content="Responsive Bootstrap4 Dashboard Template">
    <meta name="author" content="ParkerThemes">
    <link rel="icon" type="image/png" href="{{asset('fontend/icon.png')}}">

    <!-- Title -->
    <title>@yield('title')</title>


    <!-- *************
        ************ Common Css Files *************
    ************ -->
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="{{asset('backend/css/bootstrap.min.css')}}">
    <!-- Icomoon Font Icons css -->
    <link rel="stylesheet" href="{{asset('backend/fonts/style.css')}}">
    <!-- Main css -->
    <link rel="stylesheet" href="{{asset('backend/css/main.css')}}">




    <link rel="stylesheet" href="{{asset('backend/vendor/datatables/dataTables.bs4.css')}}" />
    <link rel="stylesheet" href="{{asset('backend/vendor/datatables/dataTables.bs4-custom.css')}}" />
    <link href="{{asset('backend/vendor/datatables/buttons.bs.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    {{--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">--}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

    <!-- *************
        ************ Vendor Css Files *************
    ************ -->
    <!-- DateRange css -->
    <link rel="stylesheet" href="{{asset('backend/vendor/daterange/daterange.css')}}" />
    <link rel="stylesheet" href="{{asset('backend/vendor/datepicker/css/classic.css')}}" />
    <link rel="stylesheet" href="{{asset('backend/vendor/datepicker/css/classic.date.css')}}" />
    <link rel="stylesheet" href="{{asset('fontend/toastr.min.css')}}">

</head>



<body>
<!-- Loading starts -->
<div id="loading-wrapper">
    <div class="spinner-border" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>
<!-- Loading ends -->


<!-- Page wrapper start -->
<div class="page-wrapper">

    <!-- Sidebar wrapper start -->
    @if(@$info->super_admin_status==0)

            <nav id="sidebar" class="sidebar-wrapper" style="opacity: 0.4;">
                <!-- Sidebar brand start  -->
                <div class="sidebar-brand">
                    <a href="#" class="logo">
                        <img style="width: 182px;height: 29px;" src="{{(@$info->shop_image)?url('upload/Vandor/shop_image/'.$info->shop_image):asset('upload/Vandor/red-bull-shop.png')}}" alt="Le Rouge Admin Dashboard" />

                    </a>
                </div>
                <!-- Sidebar brand end  -->

                <!-- Sidebar content start -->
                <div class="sidebar-content">

                    <!-- sidebar menu start -->
                    <div class="sidebar-menu">
                        <ul>
                            <li class="header-menu">General</li>


                            <li>
                                <a href="{{route('home')}}">
                                    <i class="icon-devices_other"></i>
                                    <span class="menu-text">Dashboards</span>
                                </a>
                            </li>

                            <li class="sidebar-dropdown">
                                <a href="#">
                                    <i class="icon-layout"></i>
                                    <span class="menu-text">Menu Builder</span>
                                </a>
                                <div class="sidebar-submenu">
                                    <ul>
                                        <li>
                                            <a href="#">Create Menu</a>
                                        </li>
                                        <li>
                                            <a href="#">All Menu</a>
                                        </li>

                                    </ul>
                                </div>
                            </li>

                            <li class="sidebar-dropdown">
                                <a href="#">
                                    <i class="icon-layout"></i>
                                    <span class="menu-text">Page Builder</span>
                                </a>
                                <div class="sidebar-submenu">
                                    <ul>
                                        <li>
                                            <a href="#">Create Page</a>
                                        </li>
                                        <li>
                                            <a href="#">All Page</a>
                                        </li>

                                    </ul>
                                </div>
                            </li>

                        </ul>
                    </div>
                    <!-- sidebar menu end -->

                </div>
                <!-- Sidebar content end -->
            </nav>

        @else
        <nav id="sidebar" class="sidebar-wrapper">
        <!-- Sidebar brand start  -->
        <div class="sidebar-brand">
            <a href="#" class="logo">
                <img style="width: 182px;height: 29px;" src="{{(@$info->shop_image)?url('upload/Vandor/shop_image/'.$info->shop_image):asset('upload/Vandor/red-bull-shop.png')}}" alt="Le Rouge Admin Dashboard" />

            </a>
        </div>
        <!-- Sidebar brand end  -->

        <!-- Sidebar content start -->
        <div class="sidebar-content">

            <!-- sidebar menu start -->
            <div class="sidebar-menu">
                <ul>
                    <li class="header-menu">General</li>


                    <li>
                        <a href="{{route('home')}}">
                            <i class="icon-devices_other"></i>
                            <span class="menu-text">Dashboards</span>
                        </a>
                    </li>

                        <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="icon-layout"></i>
                                <span class="menu-text">Menu Builder</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a href="">Create Menu</a>
                                    </li>
                                    <li>
                                        <a href="">All Menu</a>
                                    </li>

                                </ul>
                            </div>
                        </li>

                        <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="icon-layout"></i>
                                <span class="menu-text">Page Builder</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a href="">Create Page</a>
                                    </li>
                                    <li>
                                        <a href="">All Page</a>
                                    </li>

                                </ul>
                            </div>
                        </li>

                </ul>
            </div>
            <!-- sidebar menu end -->

        </div>
        <!-- Sidebar content end -->
    </nav>

        @endif
    <!-- Sidebar wrapper end -->

    <!-- Page content start  -->
    <div class="page-content">

        @if(@$info->super_admin_status==0)
            <header class="header" style="opacity: 0.4;">
                <div class="toggle-btns">
                    <a id="toggle-sidebar" href="#">
                        <i class="icon-list"></i>
                    </a>
                    <a id="pin-sidebar" href="#">
                        <i class="icon-list"></i>
                    </a>
                </div>
                <div class="header-items">
                    <!-- Custom search start -->
                    <div class="custom-search">
                        <input type="text" class="search-query" placeholder="Search here ...">
                        <i class="icon-search1"></i>
                    </div>
                    <!-- Custom search end -->

                    <!-- Header actions start -->
                    <ul class="header-actions">


                        <li class="dropdown">
                            <a href="#" id="userSettings" class="user-settings" data-toggle="dropdown" aria-haspopup="true">
                                <span class="user-name">Hello {{@$info->f_name}}</span>
                                <span class="avatar">
										{{--<img src="{{(@$info->profile)?url('upload/User/Profile/'.$info->profile):asset('backend/img/user.png')}}" alt="avatar">--}}
                                    <span class="status busy"></span>
									</span>
                            </a>

                        </li>

                    </ul>
                    <!-- Header actions end -->
                </div>
            </header>
        @else
        <!-- Header start -->
        <header class="header">
            <div class="toggle-btns">
                <a id="toggle-sidebar" href="#">
                    <i class="icon-list"></i>
                </a>
                <a id="pin-sidebar" href="#">
                    <i class="icon-list"></i>
                </a>
            </div>
            <div class="header-items">
                <!-- Custom search start -->
                <div class="custom-search">
                    <input type="text" class="search-query" placeholder="Search here ...">
                    <i class="icon-search1"></i>
                </div>
                <!-- Custom search end -->

                <!-- Header actions start -->
                <ul class="header-actions">
                    <li class="dropdown">
                        <a href="#" id="notifications" data-toggle="dropdown" aria-haspopup="true">
                            <i class="icon-box"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right lrg" aria-labelledby="notifications">
                            <div class="dropdown-menu-header">
                                Tasks (05)
                            </div>
                            <ul class="header-tasks">
                                <li>
                                    <p>#20 - Dashboard UI<span>90%</span></p>
                                    <div class="progress">
                                        <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%">
                                            <span class="sr-only">90% Complete (success)</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <p>#35 - Alignment Fix<span>60%</span></p>
                                    <div class="progress">
                                        <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                            <span class="sr-only">60% Complete (success)</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <p>#50 - Broken Button<span>40%</span></p>
                                    <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a href="#" id="notifications" data-toggle="dropdown" aria-haspopup="true">
                            <i class="icon-bell"></i>
                            {{--<span class="count-label">8</span>--}}
                        </a>

                    </li>

                    <li class="dropdown">
                        <a href="#" id="userSettings" class="user-settings" data-toggle="dropdown" aria-haspopup="true">
                            <span class="user-name">Hello {{@$info->f_name}}</span>
                            <span class="avatar">
										{{--<img src="{{(@$info->profile)?url('upload/User/Profile/'.$info->profile):asset('backend/img/user.png')}}" alt="avatar">--}}
										<span class="status busy"></span>
									</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userSettings">
                            <div class="header-profile-actions">
                                <div class="header-user-profile">
                                    <div class="header-user">
                                        <img src="{{(@$info->profile)?url('upload/Vandor/Profile/'.$info->profile):asset('upload/Vandor/default.png')}}" alt="Admin Template">
                                    </div>
                                    <h5>Hello {{@$info->f_name}}</h5>
                                    <p>{{@$info->shop_id}}</p>
                                </div>
                                {{--<a href=""><i class="icon-user1"></i> My Profile</a>--}}
                                <a href="{{route('VandorProfile',Auth::guard('vandor')->user()->id)}}"><i class="icon-settings1"></i> Account Settings</a>
                                <a href="{{route('logout')}}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="icon-log-out1"></i> Sign Out</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                    <input type="hidden" value="{{Auth::guard('vandor')->user()->id}}" name="vandor_id">
                                </form>
                            </div>
                        </div>
                    </li>

                </ul>
                <!-- Header actions end -->
            </div>
        </header>
        <!-- Header end -->

        @endif

        <!-- Page header start -->
        <div class="page-header">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item active">Vandor Dashboard </li>
                <li class="breadcrumb-item active">ShopID : <span style="font-weight: bold">{{@$info->shop_id}}</span></li>
            </ol>

            <ul class="app-actions">
                <li>
                    <a href="#" id="reportrange">
                        <span class="range-text"></span>
                        <i class="icon-chevron-down"></i>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="icon-export"></i>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Page header end -->

        <!-- Main container start -->
        <div class="main-container">
            @if(@$info->super_admin_status==0)
                <img style="width: 612px;margin: 0 auto;display: block;" src="{{asset('upload/Vandor/giphy.gif')}}" alt="">
                @else
                @yield('vandor-content')
                @endif


        </div>
        <!-- Main container end -->

    </div>
    <!-- Page content end -->

</div>
<!-- Page wrapper end -->

<!--**************************
    **************************
        **************************
                    Required JavaScript Files
        **************************
    **************************
**************************-->
<!-- Required jQuery first, then Bootstrap Bundle JS -->
<script src="{{asset('backend/js/jquery.min.js')}}"></script>
<script src="{{asset('backend/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('backend/js/moment.js')}}"></script>
<script type="text/javascript" src="{{ asset('backend/js/handlebars.min.js') }}"></script>

<!-- *************
    ************ Vendor Js Files *************
************* -->
<!-- Slimscroll JS -->
<script src="{{asset('backend/vendor/slimscroll/slimscroll.min.js')}}"></script>
<script src="{{asset('backend/vendor/slimscroll/custom-scrollbar.js')}}"></script>

<!-- Daterange -->
<script src="{{asset('backend/vendor/daterange/daterange.js')}}"></script>
<script src="{{asset('backend/vendor/daterange/custom-daterange.js')}}"></script>

<!-- Polyfill JS -->
<script src="{{asset('backend/vendor/polyfill/polyfill.min.js')}}"></script>

<!-- Apex Charts -->
<script src="{{asset('backend/vendor/apex/apexcharts.min.js')}}"></script>
<script src="{{asset('backend/vendor/apex/admin/visitors.js')}}"></script>
<script src="{{asset('backend/vendor/apex/admin/deals.js')}}"></script>
<script src="{{asset('backend/vendor/apex/admin/income.js')}}"></script>
<script src="{{asset('backend/vendor/apex/admin/customers.js')}}"></script>

<!-- Main JS -->
<script src="{{asset('backend/js/main.js')}}"></script>
<script src="{{asset('fontend/toastr.min..js')}}"></script>

<!-- Data Tables -->
<script src="{{asset('backend/vendor/datatables/dataTables.min.js')}}"></script>
<script src="{{asset('backend/vendor/datatables/dataTables.bootstrap.min.js')}}"></script>

<!-- Custom Data tables -->
<script src="{{asset('backend/vendor/datatables/custom/custom-datatables.js')}}"></script>
<script src="{{asset('backend/vendor/datatables/custom/fixedHeader.js')}}"></script>

<!-- Download / CSV / Copy / Print -->
<script src="{{asset('backend/vendor/datatables/buttons.min.js')}}"></script>
<script src="{{asset('backend/vendor/datatables/jszip.min.js')}}"></script>
<script src="{{asset('backend/vendor/datatables/pdfmake.min.js')}}"></script>
<script src="{{asset('backend/vendor/datatables/vfs_fonts.js')}}"></script>
<script src="{{asset('backend/vendor/datatables/html5.min.js')}}"></script>
<script src="{{asset('backend/vendor/datatables/buttons.print.min.js')}}"></script>

<script src="{{ asset('files/assets/js/custom.js')}}"></script>
<script src="{{ asset('files/assets/ckeditor/ckeditor.js')}}"></script>


<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/js/bootstrap-select.min.js"></script>--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>







@yield('footer')



<script>
    $select2 = $(".js-example-basic-multiple").select2({
        placeholder: "Select"});
</script>


<script>
    $(document).on('click','#delete',function(e){
        e.preventDefault();
        var link = $(this).attr('href');

        Swal.fire({
            title: 'Are you sure?',
            text: "You want to Delete This Item!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {


            Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
            )
            window.location.href = link;
        }else{
            Swal('Safe Data');
        }
    })

    })
</script>


<script>
            @if(Session::has('message'))

    var type ="{{ Session::get('alert-type','success') }}";

    switch(type){
        case "success":
            toastr.success("{{ Session::get('message') }}");
            break;
        case "error":
            toastr.error("{{ Session::get('message') }}");
            break;
    }

    @endif
</script>


</body>

<!-- Mirrored from bootstrap.gallery/le-rouge/design/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 23 Oct 2021 11:42:19 GMT -->
</html>