
{{--<section class="section-padding footer border-top">--}}
    {{--<div class="container">--}}
        {{--<div class="row">--}}
            {{--<div class="col-lg-3 col-md-3">--}}
                {{--<h4 class="mb-5 mt-0"><a class="logo" href="{{route('MainIndex')}}"><img src="{{(@$Logo->footer_logo)?url('upload/Client/FooterLogo/'.$Logo->footer_logo):''}}" alt="Nino Logo"></a></h4>--}}
                {{--<p class="mb-0"><a href="#"><i class="mdi mdi-phone"></i>{{@$ContactInfo->phone}}</a></p>--}}
                {{--<p class="mb-0"><a href="#"><i class="mdi mdi-cellphone-iphone"></i> {{@$ContactInfo->cellphone}}</a></p>--}}
                {{--<p class="mb-0"><a href="#"><i class="mdi mdi-email"></i> <span class="__cf_email__" data-cfemail="0d646c60627e6c656c634d6a606c6461236e6260">[{{@$ContactInfo->email}}]</span></a></p>--}}
                {{--<p class="mb-0"><a href="#"><i class="mdi mdi-web"></i>{{@$ContactInfo->web}}</a></p>--}}
            {{--</div>--}}

            {{--<div class="col-lg-2 col-md-2">--}}
                {{--<h6 class="mb-4">INFORMATION</h6>--}}
                {{--<ul>--}}
                    {{--@foreach(@$information as $main_menu)--}}
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
                    {{--<li><a href="@if($main_menu->page_type =='url') {{$main_menu->external_link}} @else {{route('page.details',$main_menu->slug)}} @endif"><i class="mdi mdi-chevron-right" aria-hidden="true"></i> {{$main_menu->menu_name}}</a></li>--}}
                    {{--@endforeach--}}

                    {{--<ul>--}}
            {{--</div>--}}

            {{--<div class="col-lg-2 col-md-2">--}}
                {{--<h6 class="mb-4">MY ACCOUNT</h6>--}}
                {{--<ul>--}}

                    {{--@foreach(@$MyAccount as $main_menu)--}}
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
                        {{--<li><a href="@if($main_menu->page_type =='url') {{$main_menu->external_link}} @else {{route('page.details',$main_menu->slug)}} @endif"><i class="mdi mdi-chevron-right" aria-hidden="true"></i>{{$main_menu->menu_name}}</a></li>--}}

                        {{--@endforeach--}}

                    {{--<ul>--}}
            {{--</div>--}}


            {{--<div class="col-lg-2 col-md-2">--}}
                {{--<h6 class="mb-4">CUSTOMER SERVICE</h6>--}}
                {{--<ul>--}}


                    {{--@foreach(@$CustomerSer as $main_menu)--}}
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
                    {{--<li><a href="@if($main_menu->page_type =='url') {{$main_menu->external_link}} @else {{route('page.details',$main_menu->slug)}} @endif"><i class="mdi mdi-chevron-right" aria-hidden="true"></i>{{$main_menu->menu_name}}</a></li>--}}

                    {{--@endforeach--}}

                    {{--<ul>--}}
            {{--</div>--}}


            {{--<div class="col-lg-3 col-md-3">--}}
                {{--<h6 class="mb-4">Download App</h6>--}}
                {{--<div class="app">--}}
                    {{--<a href="#"><img src="{{asset('fontend/img/google.png')}}" alt=""></a>--}}
                    {{--<a href="#"><img src="{{asset('fontend/img/apple.png')}}" alt=""></a>--}}
                {{--</div>--}}
                {{--<h6 class="mb-3 mt-4">GET IN TOUCH</h6>--}}


                {{--<div class="footer-social">--}}
                    {{--@forelse(@$social as $soci)--}}
                    {{--<a class="btn-facebook" href="{{@$soci->link}}"><i class="{{@$soci->icon}}"></i></a>--}}

                    {{--@empty--}}
                    {{--@endforelse--}}

                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</section>--}}



{{--<section class="section-padding bg-white border-top pt-4 pb-4">--}}
    {{--<div class="container">--}}
        {{--<div class="row">--}}
            {{--<div class="col-lg-4 col-sm-6">--}}
                {{--<div class="feature-box">--}}
                    {{--<i class="mdi mdi-truck-fast"></i>--}}
                    {{--<h6>Free & Next Day Delivery</h6>--}}
                    {{--<p>Lorem ipsum dolor sit amet, cons...</p>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-lg-4 col-sm-6">--}}
                {{--<div class="feature-box">--}}
                    {{--<i class="mdi mdi-basket"></i>--}}
                    {{--<h6>100% Satisfaction Guarantee</h6>--}}
                    {{--<p>Rorem Ipsum Dolor sit amet, cons...</p>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-lg-4 col-sm-6">--}}
                {{--<div class="feature-box">--}}
                    {{--<i class="mdi mdi-tag-heart"></i>--}}
                    {{--<h6>Great Daily Deals Discount</h6>--}}
                    {{--<p>Sorem Ipsum Dolor sit amet, Cons...</p>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</section>--}}



{{--<section class="pt-4 pb-4 border-top">--}}
    {{--<div class="container">--}}
        {{--<div class="row no-gutters">--}}
            {{--<div class="col-lg-6 col-sm-6">--}}
                {{--<p class="mt-0 mb-0">© Copyright 2021 <strong class="text-dark">NINO</strong>. All Rights Reserved</p>--}}
                {{--<small class="mt-0 mb-0">--}}
                    {{--e-Commerce Design by <a class="text-primary" target="_blank" href="https://www.esoft.com.bd/">e-Soft</a>--}}
                {{--</small>--}}
            {{--</div>--}}
            {{--<div class="col-lg-6 col-sm-6 text-right">--}}
                {{--<img src="{{asset('fontend/img/payment_methods.png')}}" alt="osahan logo">--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</section>--}}






<!-- Start: Java Script -->


<footer class="xs-footer-section">
    <div class="xs-footer-main">
        <div class="container container-fullwidth">
            <div class="row no-gutters">
                <div class="col-lg-6 row xs-footer-info-and-payment">

                    <div class="col-lg-6 col-md-6 media">
                        <span class="icon icon-support color-yellow d-flex"></span>
                        <div class="media-body">
                            <h5>Contact<strong>{{@$ContactInfo->phone}}</strong></h5>
                            <address>
                                {{@$ContactInfo->cellphone}}
                            </address>
                            <a href="https://www.google.com/maps/place/Women+%26+eCommerce/@23.7749316,90.3961904,17z/data=!3m1!4b1!4m5!3m4!1s0x3755c770adc4be3d:0x9ed5a4b30f85e151!8m2!3d23.7749316!4d90.3983791" class="xs-map-popup btn btn-warning"><i class="icon icon-placeholder"></i>View On Map</a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 media">
                        <span class="icon icon-highlight color-yellow d-flex"></span>
                        <div class="media-body">
                            <h5>We Using <strong>Safe Payments</strong></h5>
                            <ul class="xs-payment-card">
                                <li>
                                    <a href="#">
                                        <img src="{{asset('fontend/assets/images/credit-cards/skril-1.png')}}" alt="payment-icon-image">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="{{asset('fontend/assets/images/credit-cards/palypal-1.png')}}" alt="payment-icon-image">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="{{asset('fontend/assets/images/credit-cards/american_express-1.png')}}" alt="payment-icon-image">
                                    </a>
                                </li>
                            </ul>
                            <div class="xs-footer-secure-info">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 row" style="padding-left: 120px;">
                    <div class="col-lg-6 col-md-6 footer-widget" >
                        <h3 class="widget-title">We Forum</h3>
                        <ul class="xs-list">
                            @foreach(@$MyAccount as $main_menu)
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
                            <li><a href="@if($main_menu->page_type =='url') {{$main_menu->external_link}} @else {{route('page.details',$main_menu->slug)}} @endif">{{$main_menu->menu_name}}</a></li>
                            @endforeach


                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-6 footer-widget">
                        <h3 class="widget-title">Important Links</h3>
                        <ul class="xs-list">
                            @foreach(@$information as $main_menu)
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
                            <li><a href="@if($main_menu->page_type =='url') {{$main_menu->external_link}} @else {{route('page.details',$main_menu->slug)}} @endif">{{$main_menu->menu_name}}</a></li>
                            @endforeach


                        </ul>
                    </div>
                </div>



            </div>
        </div>
    </div>
    <div class="xs-copyright copyright-yellow">
        <div class="container container-fullwidth">
            <div class="row">
                <div class="col-md-4">
                    <div class="xs-copyright-text">
                        &copy; 2021 <a href="#"> WE HatBazar </a> All Rights Reserved
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="xs-copyright-text text-center">
                        <strong>  কারিগরি উন্নয়নের কাজ চলছে ... </strong>
                    </div>
                </div>


                <div class="col-md-4">
                    <ul class="xs-social-list version-2">
                        @forelse(@$social as $soci)
                        <li><a href="{{@$soci->link}}"><i class="{{@$soci->icon}}"></i>{{substr(@$soci->icon, 10)}}</a></li>
                        @endforeach
                            {{--icon icon-facebook--}}
                        {{--<li><a href="#"><i class="icon icon-twitter"></i>Twitter</a></li>--}}
                        {{--<li><a href="#"><i class="icon icon-instagram"></i> Instagram</a></li>--}}
                    </ul>
                </div>

            </div>
        </div>
    </div>
</footer>
