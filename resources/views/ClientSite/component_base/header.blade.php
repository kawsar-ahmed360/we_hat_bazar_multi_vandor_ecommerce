









{{--<div class="modal fade login-modal-main" id="bd-example-modal">--}}
    {{--<div class="modal-dialog modal-lg modal-dialog-centered" role="document">--}}
        {{--<div class="modal-content">--}}
            {{--<div class="modal-body">--}}
                {{--<div class="login-modal">--}}
                    {{--<div class="row">--}}
                        {{--<div class="col-lg-6 pad-right-0">--}}
                            {{--<div class="login-modal-left"></div>--}}
                        {{--</div>--}}
                        {{--<div class="col-lg-6 pad-left-0">--}}
                            {{--<button type="button" class="close close-top-right" data-dismiss="modal" aria-label="Close">--}}
                                {{--<span aria-hidden="true"><i class="mdi mdi-close"></i></span>--}}
                                {{--<span class="sr-only">Close</span>--}}
                            {{--</button>--}}

                            {{--<div class="login-modal-right">--}}
                                {{--<div class="tab-content">--}}
                                    {{--<div class="tab-pane active" id="login" role="tabpanel">--}}
                                        {{--<form action="#" method="post">--}}
                                            {{--@csrf--}}
                                            {{--<h5 class="heading-design-h5">Login to your account</h5>--}}
                                            {{--<fieldset class="form-group">--}}
                                                {{--<label>Enter Email/Mobile number</label>--}}
                                                {{--<input type="text" class="form-control" name="mobile" placeholder="+91 123 456 7890">--}}
                                            {{--</fieldset>--}}
                                            {{--<fieldset class="form-group">--}}
                                                {{--<label>Enter Password</label>--}}
                                                {{--<input type="password" name="password" class="form-control" placeholder="********">--}}
                                            {{--</fieldset>--}}
                                            {{--<fieldset class="form-group">--}}
                                                {{--<button type="submit" class="btn btn-lg btn-secondary btn-block">Enter to your account</button>--}}
                                            {{--</fieldset>--}}
                                            {{--<div class="login-with-sites text-center">--}}
                                            {{--<p>or Login with your social profile:</p>--}}
                                            {{--<button class="btn-facebook login-icons btn-lg"><i class="mdi mdi-facebook"></i> Facebook</button>--}}
                                            {{--<button class="btn-google login-icons btn-lg"><i class="mdi mdi-google"></i> Google</button>--}}
                                            {{--<button class="btn-twitter login-icons btn-lg"><i class="mdi mdi-twitter"></i> Twitter</button>--}}
                                            {{--</div>--}}
                                            {{--<div class="custom-control custom-checkbox">--}}
                                                {{--<input type="checkbox" class="custom-control-input" id="customCheck1">--}}
                                                {{--<label class="custom-control-label" for="customCheck1">Remember me</label>--}}
                                            {{--</div>--}}
                                        {{--</form>--}}
                                    {{--</div>--}}


                                    {{--<div class="tab-pane" id="register" role="tabpanel">--}}
                                        {{--<h5 class="heading-design-h5">Register Now!</h5>--}}
                                        {{--<form action="{{route('CustomerRegistartionPost')}}" method="post">--}}
                                            {{--@csrf--}}
                                            {{--<fieldset class="form-group">--}}
                                                {{--<label>Enter Email/Mobile number</label>--}}
                                                {{--<input type="text" name="mobile" id="regis_mobile" class="form-control @error('mobile') is-invalid @enderror" placeholder="+91 123 456 7890">--}}
                                                {{--@error('mobile')--}}
                                                {{--<span class="invalid-feedback" role="alert">--}}
                                                  {{--<strong>{{ $message }}</strong>--}}
                                               {{--</span>--}}
                                                {{--@enderror--}}
                                            {{--</fieldset>--}}
                                            {{--<fieldset class="form-group">--}}
                                                {{--<label>Enter Password</label>--}}
                                                {{--<input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="********">--}}

                                                {{--@error('password')--}}
                                                {{--<span class="invalid-feedback" role="alert">--}}
                                                  {{--<strong>{{ $message }}</strong>--}}
                                               {{--</span>--}}
                                                {{--@enderror--}}

                                            {{--</fieldset>--}}
                                            {{--<fieldset class="form-group">--}}
                                                {{--<label>Enter Confirm Password </label>--}}
                                                {{--<input type="password" name="password_confirmation" class="form-control" placeholder="********">--}}
                                            {{--</fieldset>--}}
                                            {{--<fieldset class="form-group">--}}
                                                {{--<button type="submit" class="btn btn-lg btn-secondary btn-block">Create Your Account</button>--}}
                                            {{--</fieldset>--}}
                                            {{--<div class="custom-control custom-checkbox">--}}
                                                {{--<input type="checkbox" class="custom-control-input" id="customCheck2">--}}
                                                {{--<label class="custom-control-label" for="customCheck2">I Agree with <a href="#">Term and Conditions</a></label>--}}
                                            {{--</div>--}}
                                        {{--</form>--}}
                                    {{--</div>--}}
                                {{--</div>--}}



                                {{--<div class="clearfix"></div>--}}
                                {{--<div class="text-center login-footer-tab">--}}
                                    {{--<ul class="nav nav-tabs" role="tablist">--}}
                                        {{--<li class="nav-item">--}}
                                            {{--<a class="nav-link active" data-toggle="tab" href="#login" role="tab"><i class="mdi mdi-lock"></i> LOGIN</a>--}}
                                        {{--</li>--}}
                                        {{--<li class="nav-item">--}}
                                            {{--<a class="nav-link" data-toggle="tab" href="#register" role="tab"><i class="mdi mdi-pencil"></i> REGISTER</a>--}}
                                        {{--</li>--}}
                                    {{--</ul>--}}
                                {{--</div>--}}
                                {{--<div class="clearfix"></div>--}}
                            {{--</div>--}}

                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}

{{--<nav class="navbar navbar-light navbar-expand-lg bg-white bg-faded osahan-menu">--}}
    {{--<div class="container">--}}
        {{--<a class="navbar-brand" href="{{route('MainIndex')}}"> <img src="{{(@$Logo->logo)?url('upload/Client/Logo/'.$Logo->logo):''}}" alt="logo"> </a>--}}
        {{--<button class="navbar-toggler navbar-toggler-white" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">--}}
            {{--<span class="navbar-toggler-icon"></span>--}}
        {{--</button>--}}
        {{--<div class="navbar-collapse" id="navbarNavDropdown">--}}

            {{--<div class="navbar-nav mr-auto mt-2 mt-lg-0 margin-auto top-categories-search-main">--}}
                {{--<div class="top-categories-search">--}}
                    {{--<div class="input-group">--}}
                        {{--<input class="form-control" placeholder="Search for jewelery" onfocus="ShowSearchResult()" onblur="HideSearchResult()" id="searchs"  aria-label="Search for jewelery" type="text">--}}
                        {{--<span class="input-group-btn">--}}
                        {{--<button class="btn btn-secondary" type="button"><i class="mdi mdi-file-find"></i> Search</button>--}}
                        {{--</span>--}}
                        {{--<div id="filterProductShow" style="background:white;z-index:9999;width:100%;top:100%;left:0;margin-top:2px;position: absolute;"></div>--}}
                    {{--</div>--}}

                {{--</div>--}}



            {{--</div>--}}
            {{--<div class="my-2 my-lg-0">--}}
                {{--<ul class="list-inline main-nav-right">--}}


                    {{--@if(\Illuminate\Support\Facades\Session::has('customer_id'))--}}

                        {{--<li class="list-inline-item dropdown osahan-top-dropdown">--}}
                            {{--<a class="btn btn-theme-round dropdown-toggle dropdown-toggle-top-user" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                                {{--<img alt="logo" src="{{(@$custo_info->image)?url('upload/Client/Customer_Profile/'.$custo_info->image):''}}">--}}
                                {{--<strong>Hi</strong> {{\Illuminate\Support\Facades\Session::get('customer_name')}} </a>--}}
                            {{--<div class="dropdown-menu dropdown-menu-right dropdown-list-design">--}}
                                {{--<a href="{{route('CustomerDashboard')}}" class="dropdown-item">--}}
                                    {{--<i aria-hidden="true" class="mdi mdi-home-outline"></i> My Dashboard </a>--}}
                                {{--<a href="{{route('CustomerDashboard')}}" class="dropdown-item">--}}
                                    {{--<i aria-hidden="true" class="mdi mdi-map-marker-circle"></i> My Profile </a>--}}

                                {{--<a href="{{route('customerOrderList')}}" class="dropdown-item">--}}
                                    {{--<i aria-hidden="true" class="mdi mdi-format-list-bulleted"></i> Order List </a>--}}

                                {{--<a href="{{route('customerWishList')}}" class="dropdown-item">--}}
                                    {{--<i aria-hidden="true" class="mdi mdi-heart"></i> WishList </a>--}}


                                {{--<div class="dropdown-divider"></div>--}}
                                {{--<a class="dropdown-item" href="{{route('CustomerLogout',base64_encode(\Illuminate\Support\Facades\Session::get('customer_id')))}}">--}}
                                    {{--<i class="mdi mdi-lock"></i> Logout </a>--}}
                            {{--</div>--}}
                        {{--</li>--}}
                    {{--@else--}}

                        {{--<li class="list-inline-item">--}}
                            {{--<a href="{{route('CustomerLoginPage')}}" data-target="#"  class="btn btn-link border-left"><i class="mdi mdi-account-circle"></i> Login/Sign Up</a>--}}
                        {{--</li>--}}

                    {{--@endif--}}




                    {{--<li class="list-inline-item cart-btn">--}}
                        {{--<a href="{{route('ShoppingCart')}}"  class="btn btn-link"><i class="mdi mdi-cart"></i> My Cart <small class="cart-value" id="smallcart"></small></a>--}}
                    {{--</li>--}}


                    {{--<li class="list-inline-item cart-btn">--}}
                        {{--<a href="#"  data-toggle="modal" data-target="#modal1"  class="btn btn-link"><i class="mdi mdi-map-marker-circle"></i> Order Traking </a>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</nav>--}}

{{--<nav class="navbar navbar-expand-lg navbar-light bg-dark osahan-menu-2 pad-none-mobile">--}}
    {{--<div class="container">--}}
        {{--<div class="collapse navbar-collapse" id="navbarText">--}}
            {{--<ul class="navbar-nav mr-auto mt-2 mt-lg-0 ">--}}
                {{--<li class="nav-item">--}}
                    {{--<a class="nav-link shop" href="{{route('MainIndex')}}"><span class="mdi mdi-store"></span> Home</a>--}}
                {{--</li>--}}



                {{--@foreach($main as $main_menu)--}}
                    {{--<?php--}}
                    {{--$submenus = App\Models\Admin\Menu::where('root_id',$main_menu->id)--}}
                        {{--->where('sroot_id',NULL);--}}
                    {{--if($submenus->count() > 0){--}}
                        {{--$class='dropdown-toggle';--}}
                    {{--}--}}
                    {{--else{--}}
                        {{--$class='';--}}

                    {{--}--}}

                    {{--?>--}}

                    {{--<li class="nav-item dropdown">--}}
                        {{--<a class="nav-link <?php echo $class;?>" href="@if($main_menu->page_type =='url') {{$main_menu->external_link}} @else {{route('page.details',$main_menu->slug)}} @endif" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                            {{--{{$main_menu->menu_name}}--}}
                        {{--</a>--}}
                        {{--@if($submenus->count() > 0)--}}

                            {{--<div class="dropdown-menu">--}}
                                {{--@foreach($submenus->get() as $smenus)--}}
                                    {{--<?php $thirdmenus = App\Models\Admin\Menu::where('sroot_id',$smenus->id)--}}
                                        {{--->where('troot_id',NULL);?>--}}
                                    {{--<a class="dropdown-item" href="@if($smenus->page_type =='url') {{$smenus->external_link}} @else {{route('page.details',$smenus->slug)}} @endif"><i class="mdi mdi-chevron-right" aria-hidden="true"></i>{{ $smenus->menu_name }} </a>--}}


                                {{--@endforeach--}}
                            {{--</div>--}}

                        {{--@endif--}}
                    {{--</li>--}}


                {{--@endforeach--}}


            {{--</ul>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</nav>--}}









<div class="xs-top-bar d-none d-md-none d-lg-block">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-6">
                        <ul class="xs-top-bar-info">
                            <li><a href="#"><i class="icon icon-van "></i>Free Delivery</a></li>
                            @foreach(@$CustomerSer as $main_menu)
                            <?php
                            $submenus = App\Models\Admin\Menu::where('root_id',$main_menu->id)
                            ->where('sroot_id',NULL);
                            if($submenus->count() > 0){
                            $class='dropdown-toggle';
                            }
                            else{
                            $class='';

                            }

                            ?>
                            <li><a href="@if($main_menu->page_type =='url') {{$main_menu->external_link}} @else {{route('page.details',$main_menu->slug)}} @endif>{{$main_menu->menu_name}}</a></li>

                            @endforeach
                        </ul>
                    </div>

                    <div class="col-lg-6 follow">
                        <ul class="xs-social-list">
                            <li class="xs-list-text text-white">Follow Us</li>
                            <!-- <img src="assets/images/fb.png" alt=""> -->

                            <li><a href="#"><i class="icon icon-facebook"></i></a></li>

                        </ul>
                    </div>

                </div>
            </div>
            <div class="col-lg-6">
                <ul class="xs-top-bar-info right-content">


                    <li><a href="{{route('showVandorRegisterForm')}}">Vandor Registration </a></li>
                    <li><a href="{{route('CustomerLoginPage')}}">Loign </a></li>
                    <li><a href="#" data-toggle="modal" data-target=".xs-modal">English</a></li>
                    <li><a href="#" data-toggle="modal" data-target=".xs-modal">বাংলা</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>


<header class="xs-header version-fullwidth">
    <div class="xs-navBar v-yellow">
        <div class="container-fluid container-fullwidth">
            <div class="row">
                <div class="col-lg-3 col-sm-4 xs-order-1">
                    <div class="xs-logo-wraper">
                        <a href="{{route('MainIndex')}}">
                            <img src="{{(@$Logo->logo)?url('upload/Client/Logo/'.$Logo->logo):''}}" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-7 col-sm-3 xs-order-3 xs-menus-group">
                    <nav class="xs-menus">
                        <div class="nav-header">
                            <div class="nav-toggle"></div>
                        </div>
                        <div class="nav-menus-wrapper">
                            <ul class="nav-menu">
                                <li class="active">
                                    <a href="{{route('MainIndex')}}">Home </a>

                                </li>

                                @foreach($main as $main_menu)
                                <?php
                                $submenus = App\Models\Admin\Menu::where('root_id',$main_menu->id)
                                ->where('sroot_id',NULL);
                                if($submenus->count() > 0){
                                $class='dropdown-toggle';
                                }
                                else{
                                $class='';

                                }

                                ?>


                                <li>
                                    <a href="@if($main_menu->page_type =='url') {{$main_menu->external_link}} @else {{route('page.details',$main_menu->slug)}} @endif">{{$main_menu->menu_name}}</a>
                                    @if($submenus->count() > 0)
                                    <ul class="nav-dropdown">
                                        @foreach($submenus->get() as $smenus)
                                        <?php $thirdmenus = App\Models\Admin\Menu::where('sroot_id',$smenus->id)
                                        ->where('troot_id',NULL);?>
                                        <li><a href="@if($smenus->page_type =='url') {{$smenus->external_link}} @else {{route('page.details',$smenus->slug)}} @endif">{{ $smenus->menu_name }}</a></li>
                                         @endforeach

                                    </ul>
                                    @endif

                                </li>


                            @endforeach
                            </ul>
                        </div>
                    </nav>
                </div>

                <div class="col-lg-2 col-sm-5 xs-order-2 xs-wishlist-group">
                    <div class="xs-wish-list-item">

                        <!-- <ul class="xs-header-info">
                           <li class="d-none d-md-none d-lg-block"><i class="icon icon-van"></i> Track Your Order</li>
                        </ul> -->

                        <span class="xs-wish-list">
                        <a data-toggle="modal" data-target="#modal1" class="xs-single-wishList">

                        <i class="mdi mdi-map-marker-circle"></i>
                        </a>
                        </span>

                        <!--<span class="xs-wish-list">-->
                        <!--<a href="#" class="xs-single-wishList">-->
                        <!--<span class="xs-item-count">0</span>-->
                        <!--<i class="icon icon-arrows"></i>-->
                        <!--</a>-->
                        <!--</span>-->


                        <style>
                            .tds{
                                font-size: .35em;
                                color: #565656;
                                font-weight: 500;
                                position: absolute;
                                top: -5px;
                                right: -5px;
                                display: inline-block;
                                width: 21px;
                                height: 21px;
                                line-height: 18px;
                                border: 2px solid #fff;
                                text-align: center;
                                background-color: #f0f0f0;
                                border-radius: 100%;
                            }
                            .sss{
                                font-size: 2.14286em;
                                color: #555;
                                position: relative;
                            }
                        </style>

                        <div class="dropdown dropright xs-miniCart-dropdown">
                            <a href="{{route('ShoppingCart')}}" class="sss">
                               <small style="background-color: #cd11eb;color: #fff;" class="cart-value tds" id="smallcart"></small>
                                <i class="icon icon-bag"></i>
                            </a>
                        </div>






                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ***************************************************** New Category Section ******************************************* -->

    <div class="xs-navDown">
        <div class="container container-fullwidth">
            <div class="row">
                <div class="col-lg-3 col-xl-3 d-none d-md-none d-lg-block">
                    <div class="cd-dropdown-wrapper xs-vartical-menu v-menu-is-active v-gray then">

                        <a class="cd-dropdown-trigger dropdown-is-active" href="#0">
                            <i class="fa fa-list-ul"></i> All Categories
                        </a>

                        <nav class="cd-dropdown too too_two dropdown-is-active" style="z-index: -99;">
                            <h2>Marketpress</h2>
                            <a href="#0" class="cd-close">Close</a>
                            <ul class="cd-dropdown-content">

                                @foreach(@$category as $cat)
                                    <li><a href="#"> <img src="{{(@$cat->icon_image)?url('upload/Client/Icon_Category/'.@$cat->icon_image):''}}" style="height:20px; padding-right:10px" >{{@$cat->category_name}}</a></li>

                                @endforeach

                            </ul>
                        </nav>
                    </div>
                </div>

                <div class="col-lg-6 col-xl-7">
                    <form class="xs-navbar-search" method="get" action="#">
                        <div class="input-group">
                            <input style="top: 10px;" type="search" class="form-control" placeholder="Search for jewelery" onfocus="ShowSearchResult()" onblur="HideSearchResult()" id="searchs">

                            <div id="filterProductShow" style="background:white;z-index:9999;width:62%;top:100%;left:0;margin-top:2px;position: absolute;"></div>


                            <div class="xs-category-select-wraper">

                                    <select class="xs-category-select">
                                        <option disabled selected>All Categories</option>
                                        @foreach(@$category as $cat)
                                            <option value="women's-clothing-accessories">{{@$cat->category_name}}</option>
                                        @endforeach

                                    </select>


                            </div>

                            <div class="input-group-btn">
                                <input type="hidden" id="search-param" name="post_type" value="product">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search" style="padding-top:6px;font-size:18px"></i></button>
                            </div>

                        </div>
                    </form>
                </div>

                <div class="col-lg-3 col-xl-2 d-none d-md-none d-lg-block">

                    <a href="#" class="btn btn-outline-primary btn-lg">
                        <i class="fas fa-phone-volume" style="font-size: 15px;"></i>
                        <strong> {{@$ContactInfo->phone}} </strong>
                    </a>

                </div>

            </div>
        </div>
    </div>



    <!-- ********************************************************* New Category Section End ****************************************************** -->

</header>




<input type="hidden" id="order_confirm" class="order_confirm" >
<input type="hidden" id="shipping_status" class="shipping_status" >
<input type="hidden" id="final_step" class="final_step" >



@section('client-footer')


    <script>
        $('#orderTrack').submit(function(e){
            e.preventDefault();

            var url = $(this).attr('action');
            var method = $(this).attr('method');
            var data = $(this).serialize();


            var a = document.forms["orderTrack"]["OrderId"].value;

            if (a == null || a == "") {
                alert('null');
            }else{


                $.ajax({
                    url:url,
                    type:method,
                    data:data,

                    success:function(data){

                        $('#showallinfo').css({
                            "display":"block"
                        })

                        $('#OrderNumber').empty().html(data['order'].orderId);
                        $('#customerNameAjax').empty().html(data['customer_info'].name);
                        $('#customerEmailAjax').empty().html(data['customer_info'].email);
                        $('#customerMobileAjax').empty().html(data['customer_info'].mobile);

                        //----------------- Order Status ---------------
                        $('#order_confirm').val(data['order'].status);
                        var confi = $('.order_confirm').val();

                        if(confi==2){
                            $('#orderst').addClass('active');
                        }else if(confi==1){
                            $('#orderst').removeClass('active');
                        }

                        //----------------- Shipping Status ---------------
                        $('#shipping_status').val(data['order'].shipping_status);
                        var shi_confi = $('.shipping_status').val();

                        if(shi_confi==2){
                            $('#shipping_st').addClass('active');
                        }else if(shi_confi==1){
                            $('#shipping_st').removeClass('active');
                        }


                        //----------------- Final Status ---------------
                        $('#final_step').val(data['order'].order_complete);
                        var final_step = $('.final_step').val();

                        if(final_step==2){
                            $('#final_oder').addClass('active');
                        }else if(final_step==1){
                            $('#final_oder').removeClass('active');
                        }



                    }
                });

            }


        });
    </script>





@endsection