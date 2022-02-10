@extends('ClientSite.master')
@section('title') {{@$product_details->product_name}} @endsection
@section('seo')
    <meta name="description" content="{!!@$product_details->meta_des!!}">
    <meta name="keywords" content="{!!@$product_details->meta_title!!}">
@endsection

@section('client-content')


    {{--<section class="section-padding bg-dark inner-header">--}}
        {{--<div class="container">--}}
            {{--<div class="row">--}}
                {{--<div class="col-md-12 text-center">--}}
                    {{--<h1 class="mt-0 mb-3 text-white">Shop Detail</h1>--}}
                    {{--<div class="breadcrumbs">--}}
                        {{--<p class="mb-0 text-white"><a href="#" class="text-white">Home</a> / <span class="text-success">Shop Detail</span></p>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</section>--}}


    {{--<section class="shop-single section-padding">--}}
        {{--<div class="container">--}}
            {{--<div class="row">--}}
                {{--<div class="col-md-6">--}}
                    {{--<div class="shop-detail-left">--}}
                        {{--<div class="shop-detail-slider">--}}
                            {{--<div class="card">--}}
                                {{--<div class="demo">--}}
                                    {{--<ul id="lightSlider">--}}
                                        {{--@foreach(@$product_details->ProductGallery as $gall)--}}
                                        {{--<li data-thumb="{{(@$gall->product_gallery)?url('upload/Client/ProductGallery/'.@$gall->product_gallery):''}}"> <img src="{{(@$gall->product_gallery)?url('upload/Client/ProductGallery/'.@$gall->product_gallery):''}}" /> </li>--}}
                                            {{--@endforeach--}}

                                    {{--</ul>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-md-6">--}}
                    {{--<div class="shop-detail-right">--}}
                        {{--<span class="badge badge-success">@if(@$product_details->discount) {{@$product_details->discount}}% OFF @else 0% Off @endif</span>--}}


                        {{--<span class="pull-right">--}}
                            {{--<style>--}}
                                {{--.checked {--}}
                                    {{--color: orange;--}}
                                {{--}--}}
                                {{--.pull-right{--}}
                                    {{--margin-left: 168px;--}}
                                {{--}--}}
                            {{--</style>--}}

                            {{--@if(avarage_rating_star(@$product_details->id)==0)--}}
                                 {{--review not yet--}}
                                {{--@endif--}}
                                {{--@for($i=1; $i<=avarage_rating_star(@$product_details->id); $i++)--}}
                                {{--<span class="fa fa-star checked"></span>--}}
                                 {{--@endfor--}}

                            {{--( {{avarage_review(@$product_details->id)}} Customer Review)--}}
                        {{--</span>--}}
                        {{--<h2>{{@$product_details->product_name}}</h2>--}}
                        {{--<h6><strong><span class="mdi mdi-approval"></span>{{@$product_details->carat}}</strong></h6>--}}

                        {{--@if(@$product_details->discount)--}}
                        {{--<p class="regular-price"><i class="mdi mdi-tag-outline"></i> MRP : ${{@$product_details->product_price}}</p>--}}
                        {{--<p class="offer-price mb-0">Discounted price : <span class="text-danger">${{@$product_details->new_price}}</span></p>--}}
                        {{--@else--}}
                            {{--<p class="regular-price"><i class="mdi mdi-tag-outline"></i>Discount MRP : $000.00</p>--}}
                            {{--<p class="offer-price mb-0"><strong>Regular price</strong> : <span class="text-danger">${{@$product_details->product_price}}</span></p>--}}
                            {{--@endif--}}

                        {{--<form action="{{route('AddCart')}}" method="post">--}}
                            {{--@csrf--}}
                         {{--@if(@$product_details->discount)--}}
                                {{--<input type="hidden" name="price" value="{{@$product_details->new_price}}">--}}
                             {{--@else--}}
                                {{--<input type="hidden" name="price" value="{{@$product_details->product_price}}">--}}
                             {{--@endif--}}
                            {{--<input type="hidden" value="{{@$product_details->id}}" name="ProductId">--}}
                            {{--<input type="hidden" value="{{@$product_details->product_name}}" name="pro_name">--}}
                            {{--<input type="hidden" value="{{@$product_details->image}}" name="pro_image">--}}
                        {{--<div class="_p-add-cart">--}}
                            {{--<div class="_p-qty">--}}
                                {{--<span>Add Quantity</span>--}}
                                {{--<div class="value-button decrease_" id="incremnet" value="Decrease Value">-</div>--}}
                                {{--<input type="number" name="qty" id="number" min="1" value="1" />--}}
                                {{--<div class="value-button increase_" id="" value="Increase Value">+</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<a href="" id="ale"><button type="submit" id="sub" class="btn btn-secondary btn-lg"><i class="mdi mdi-cart-outline"></i> Add To Cart</button> </a>--}}
                        {{--</form>--}}

                        {{--<div class="short-description">--}}
                            {{--<h5>--}}
                                {{--Quick Overview--}}
                                {{--<p class="float-right">Availability: @if(@$product_details->product_qty!=null) <span class="badge badge-success"> In Stock </span> @else <span style="background: darkred;color:white" class="badge badge-danger"> Out Of Stock </span> @endif </p>--}}
                            {{--</h5>--}}
                           {{--{!! @$product_details->summary !!}--}}
                        {{--</div>--}}


                        {{--<h6 class="mb-3 mt-4">Why shop from Osahan Jewelry?</h6>--}}
                        {{--<div class="row">--}}
                            {{--<div class="col-md-6">--}}
                                {{--<div class="feature-box">--}}
                                    {{--<i class="mdi mdi-truck-fast"></i>--}}
                                    {{--<h6 class="text-info">Free Delivery</h6>--}}
                                    {{--<p>Lorem ipsum dolor...</p>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="col-md-6">--}}
                                {{--<div class="feature-box">--}}
                                    {{--<i class="mdi mdi-basket"></i>--}}
                                    {{--<h6 class="text-info">100% Guarantee</h6>--}}
                                    {{--<p>Rorem Ipsum Dolor sit...</p>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</section>--}}





    {{--<section class="pro-details">--}}
        {{--<div class="container">--}}
            {{--<div class="row">--}}
                {{--<div class="col-md-12">--}}
                    {{--<ul class="nav nav-tabs" id="myTab" role="tablist">--}}


                        {{--@foreach(@$product_details->ProductDetails as $key=>$pro_details)--}}
                        {{--<li class="nav-item">--}}
                            {{--<a class="nav-link @if($key==0) active @endif" id="overview-tab" data-toggle="tab" href="#overview{{$key}}" role="tab" aria-controls="overview" aria-selected="true">{{@$pro_details->title}}</a>--}}
                        {{--</li>--}}
                        {{--@endforeach--}}

                            {{--<li class="nav-item">--}}
                                {{--<a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="true">Review</a>--}}
                            {{--</li>--}}


                    {{--</ul>--}}

                    {{--<div class="tab-content" id="myTabContent" style="padding: 18px;">--}}

                        {{--@foreach(@$product_details->ProductDetails as $key=>$pro_details)--}}
                        {{--<div class="tab-pane fade @if(@$key==0) show active @endif" id="overview{{$key}}" role="tabpanel" aria-labelledby="overview-tab">--}}

                         {{--{!! @$pro_details->description !!}--}}

                        {{--</div>--}}
                        {{--@endforeach--}}



                            {{--<div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">--}}
                                {{--<h6>Review </h6>--}}
                                {{--@if(\Illuminate\Support\Facades\Session::has('customer_id'))--}}
                                    {{--@if($show_review_form==1)--}}
                                {{--<div class="cont">--}}
                                    {{--<div class="stars">--}}
                                        {{--<form action="{{route('ReviewPost')}}" method="POST">--}}
                                            {{--@csrf--}}
                                            {{--<input type="hidden" name="order_details_id" value="{{@$order_details_id->id}}">--}}



                                            {{--<input class="star star-5" id="star-5-2" type="radio" value="5" name="star"/>--}}
                                            {{--<label class="star star-5" for="star-5-2"></label>--}}
                                            {{--<input class="star star-4" id="star-4-2" type="radio" value="4" name="star"/>--}}
                                            {{--<label class="star star-4" for="star-4-2"></label>--}}
                                            {{--<input class="star star-3" id="star-3-2" type="radio" value="3" name="star"/>--}}
                                            {{--<label class="star star-3" for="star-3-2"></label>--}}
                                            {{--<input class="star star-2" id="star-2-2" type="radio" value="2" name="star"/>--}}
                                            {{--<label class="star star-2" for="star-2-2"></label>--}}
                                            {{--<input class="star star-1" id="star-1-2" type="radio" value="1" name="star"/>--}}
                                            {{--<label class="star star-1" for="star-1-2"></label>--}}
                                            {{--<div class="rev-box">--}}
                                                {{--<textarea class="review" col="30" name="review"></textarea>--}}
                                                {{--<label class="review" for="review">Breif Review</label>--}}

                                                {{--<button class="int" style="cursor: pointer" type="submit">Submit</button>--}}
                                            {{--</div>--}}
                                        {{--</form>--}}
                                    {{--</div>--}}
                                {{--</div>--}}

                                        {{--@else--}}

                                        {{--@endif--}}

                                    {{--@else--}}

                                     {{--<div class="">--}}
                                         {{--<h4 style="text-align: center;"><a href="" class="btn btn-warning">Login</a> To Review</h4>--}}
                                     {{--</div>--}}

                                {{--@endif--}}

                            {{--</div>--}}

                    {{--</div>--}}

                {{--</div>--}}
            {{--</div>--}}
    {{--</section>--}}

    {{--<section class="product-items-slider section-padding bg-white border-top">--}}
        {{--<div class="container">--}}
            {{--<div class="section-header">--}}
                {{--<h5 class="heading-design-h5">Related Products--}}
                    {{--<a class="float-right text-secondary" href="shop.html">View All</a>--}}
                {{--</h5>--}}
            {{--</div>--}}

            {{--<div class="owl-carousel owl-carousel-featured">--}}

                {{--@forelse(@$related_product as $product)--}}
                    {{--<div class="item">--}}
                        {{--<div class="product">--}}
                            {{--<a href="{{route('SinglePorduct',@$product->slug)}}">--}}
                                {{--<div class="product-header">--}}
                                    {{--@if(@$product->discount)--}}
                                        {{--<span class="badge badge-success">{{@$product->discount}}% OFF</span>--}}
                                    {{--@endif--}}
                                    {{--<img class="img-fluid" src="{{(@$product->image)?url('upload/Client/Product/'.@$product->image):''}}" alt="">--}}
                                    {{--<span class="text-danger mdi mdi-heart"></span>--}}
                                {{--</div>--}}
                                {{--<div class="product-body">--}}
                                    {{--<h5>{{@$product->product_name}}</h5>--}}
                                    {{--<h6><strong><span class="mdi mdi-approval"></span>{{@$product->carat}}</strong></h6>--}}

                                    {{--<div class="row " style="padding-left:13px">--}}

                                        {{--@if(avarage_rating_star(@$product->id)==0)--}}
                                            {{--review not yet--}}
                                        {{--@endif--}}
                                        {{--@for($i=1; $i<=avarage_rating_star(@$product->id); $i++)--}}
                                            {{--<span style="color:red" class="mdi mdi-star-outline"></span>--}}
                                        {{--@endfor--}}

                                        {{--<span class="vote">({{avarage_review(@$product->id)}})</span>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="product-footer">--}}
                                    {{--<button type="button" class="btn btn-secondary btn-sm float-right"><i class="mdi mdi-cart-outline"></i></button>--}}
                                    {{--<a href="{{route('WishlistAdd',base64_encode($product->id))}}" style="margin-right:2px;color:white" class="btn btn-danger btn-sm float-right"><i class="mdi mdi-heart-outline"></i></a>--}}
                                    {{--@if(@$product->discount)--}}

                                        {{--<p class="offer-price mb-0"> ${{@$product->new_price}}  <i class="mdi mdi-tag-outline"></i><br><span class="regular-price">${{@$product->product_price}}</span></p>--}}
                                    {{--@else--}}

                                        {{--<p class="offer-price mb-0"> ${{@$product->product_price}}  <i class="mdi mdi-tag-outline"></i><br><span class="regular-price">$00.00</span></p>--}}
                                    {{--@endif--}}


                                {{--</div>--}}
                            {{--</a>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                {{--@endforeach--}}


            {{--</div>--}}
        {{--</div>--}}
    {{--</section>--}}

   {{--<!-------------Product Review Section------------>--}}
    {{--<section class="product-items-slider section-padding bg-white border-top">--}}
        {{--<div class="container">--}}
        {{--<div class="section-header">--}}
            {{--<h5 class="heading-design-h5">Products Review--}}

            {{--</h5>--}}
        {{--</div>--}}
        {{--<div class="testimonial-box-container">--}}
            {{--<!--BOX-1-------------->--}}
            {{--@foreach(@$product_review as $reviews)--}}
            {{--<div class="testimonial-box">--}}
                {{--<!--top------------------------->--}}
                {{--<div class="box-top">--}}
                    {{--<!--profile----->--}}
                    {{--<div class="profile">--}}

                        {{--<!--name-and-username-->--}}
                        {{--<div class="name-user">--}}
                            {{--<strong>{{@$reviews->CustomerInfo->name}}</strong>--}}
                            {{--<span>Date: {{date('d-m-Y',strtotime($reviews->updated_at))}}</span>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<!--reviews------>--}}
                    {{--<div class="reviews">--}}
                        {{--@for($i=1; $i<=$reviews->star; $i++)--}}
                            {{--<i class="fas fa-star"></i>--}}
                        {{--@endfor--}}

                       {{----}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<!--Comments---------------------------------------->--}}
                {{--<div class="client-comment">--}}
                    {{--<p>{!! @$reviews->review !!}</p>--}}
                {{--</div>--}}
            {{--</div>--}}

                {{--@endforeach--}}




        {{--</div>--}}
        {{--</div>--}}
    {{--</section>--}}




    <div class="xs-breadcumb">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('MainIndex')}}"> Home</a></li>
                    <li class="breadcrumb-item"><a href="#"> {{@$product_details->Category->category_name}}</a></li>
                    <li class="breadcrumb-item"><a href="">{{@$product_details->product_name}}</a></li>

                </ol>
            </nav>
        </div>
    </div>
    <div class="xs-section-padding xs-product-details-section" style="padding: 41px 0px 102px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-6" id="showg">
                @include('ClientSite.single_page.Filter.large_gallery')

                </div>

                <div class="col-lg-6">
                    <div class="summary-content single-product-summary">
                        <h3 class="entry-title"><span style="color:black;font-weight: bold;">Category Name:</span> {{@$product_details->Category->category_name}}</h3>
                        <h4 class="product-title" style="margin-bottom: 0px;">{{@$product_details->product_name}}</h4>

                        <span class="pull-left">
                            <style>
                                .checked {
                                    color: orange;
                                }

                            </style>

                            @if(avarage_rating_star(@$product_details->id)==0)
                                review not yet
                            @endif
                            @for($i=1; $i<=avarage_rating_star(@$product_details->id); $i++)
                                <span class="fa fa-star checked"></span>
                            @endfor

                       ( {{avarage_review(@$product_details->id)}} Customer Review)
                        </span>
                        <br>


                        {{--<span class="star-rating color-green">--}}
                        {{--<span class="value">(200 Customers review)</span>--}}
                        {{--</span>--}}
                        <p></p>
                        {!! @$product_details->summary !!}


                        <p class="float-right">Availability: @if(@$product_details->product_qty!=null) <span style="background: #f2fef2;border: 1px solid #001e38;border-radius: 2px;color: #001e38;font-size: 14px;font-weight: 500;padding: 6px 13px;" class="badge badge-success"> In Stock </span> @else <span style="background: #ff5d45;border: 1px solid #001e38;border-radius: 2px;color: #ffffff;font-size: 14px;font-weight: 500;padding: 6px 13px;" class="badge badge-danger"> Out Of Stock </span> @endif </p>
                        @if(@$product_details->discount)
                            <span class="price highlight">
                             <del>৳{{@$product_details->product_price}}</del>
                             ৳{{@$product_details->new_price}}
                             </span>
                        @else

                            <span class="price highlight">
                             <del>৳0000</del>
                             ৳{{@$product_details->product_price}}
                             </span>

                        @endif

                        <div class="color" style="margin-bottom: 13px;">
                            <h4>Colors:</h4>


                            @foreach(@$color_name as $key=>$color)
                                <span onclick="image_color('{{@$color->id}}','{{@$product_details->slug}}','{{@$product_details->id}}')"><input
                                            type="color" style="width: 36px;height: 35px;margin-left: 4px;margin-left: 4px;border-radius: 50%;background:{{@$color->color}};border: 1px solid white;" value="{{@$color->color}}" readonly disabled></span>
                            @endforeach
                        </div>


                        <div class="xs-add-to-chart-form row">
                            <div class="col-md-8">
                                <form action="{{route('AddCart')}}" method="post">
                                    @csrf



                                    @if(@$product_details->discount)
                                        <input type="hidden" name="price" value="{{@$product_details->new_price}}">
                                    @else
                                        <input type="hidden" name="price" value="{{@$product_details->product_price}}">
                                    @endif
                                    <input type="hidden" value="{{@$product_details->id}}" name="ProductId">
                                    <input type="hidden" value="{{@$product_details->product_name}}" name="pro_name">
                                    <input type="hidden" value="{{@$product_details->image}}" name="pro_image">

                                    <div class="w-quantity quantity xs_input_number">
                                        <input type="number" name="qty" id="number" min="1" max="100" value="1" />
                                    </div>
                                    <div class="w-quantity-btn">

                                        <button type="submit" id="sub" class="single_add_to_cart_button btn btn-primary">
                                            Add To Cart
                                        </button>
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>

    <div class="  ">
        <div class="container">
            <ul class="nav nav-tabs xs-nav-tab version-4" id="myTab" role="tablist">

                @foreach(@$product_details->ProductDetails as $key=>$pro_details)
                    <li class="nav-item">
                        <a class="nav-link @if($key==0) active @endif" id="overview-tab" data-toggle="tab" href="#overview{{$key}}" role="tab" aria-controls="overview" aria-selected="true">{{@$pro_details->title}}</a>
                    </li>
                @endforeach
                    <li class="nav-item">
                        <a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="true">Review</a>
                    </li>

            </ul>
            <div class="tab-content" id="myTabContent">
                @foreach(@$product_details->ProductDetails as $key=>$pro_details)
                <div class="tab-pane animated slideInUp @if(@$key==0) show active @endif" id="overview{{$key}}" role="tabpanel" aria-labelledby="overview-tab">

                {!! @$pro_details->description !!}

                </div>
                @endforeach


                    <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                        <h6>Review </h6>
                        @if(\Illuminate\Support\Facades\Session::has('customer_id'))
                            @if($show_review_form==1)
                                <div class="cont">
                                    <div class="stars">
                                        <form action="{{route('ReviewPost')}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="order_details_id" value="{{@$order_details_id->id}}">



                                            <input class="star star-5" id="star-5-2" type="radio" value="5" name="star"/>
                                            <label class="star star-5" for="star-5-2"></label>
                                            <input class="star star-4" id="star-4-2" type="radio" value="4" name="star"/>
                                            <label class="star star-4" for="star-4-2"></label>
                                            <input class="star star-3" id="star-3-2" type="radio" value="3" name="star"/>
                                            <label class="star star-3" for="star-3-2"></label>
                                            <input class="star star-2" id="star-2-2" type="radio" value="2" name="star"/>
                                            <label class="star star-2" for="star-2-2"></label>
                                            <input class="star star-1" id="star-1-2" type="radio" value="1" name="star"/>
                                            <label class="star star-1" for="star-1-2"></label>
                                            <div class="rev-box">
                                                <textarea class="review" col="30" name="review"></textarea>
                                                <label class="review" for="review">Breif Review</label>

                                                <button class="int" style="cursor: pointer" type="submit">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            @else

                            @endif

                        @else

                            <div class="">
                                <h4 style="text-align: center;"><a href="" style="padding: 7px;" class="btn btn-warning">Login</a> To Review</h4>
                            </div>

                        @endif

                    </div>


            </div>
        </div>
    </div>

    <!-- ************************************* WE Exporter SHOP SECTION ************************************************************* -->
    <section class="paddingB-70 paddingT-30 ">
        <div class="container-fluid">
            <div class="xs-content-header1 version-2">
                <h2 class="xs-content-title float-left" style="color: #f113a4;"> Related Product </h2>
                <!-- <a href="#"><p class="float-right">Show More <i class="fas fa-eye"></i></p></a> -->
                <div class="clearfix"></div>
            </div>
            <div class="row">
            @forelse(@$related_product as $product)
                <!--*****************************************************************-->
                <div class="col-md-6 col-lg-2" style="margin-top: 13px;">

                    <div class="product-card">
                        <div class="product-img">
                            <img src="{{(@$product->image)?url('upload/Client/Product/'.@$product->image):''}}" alt="">
                        </div>
                        <div class="product-text">
                            <span>{{@$product->product_name}} </span> <br>
                            @if(@$product->discount)
                                <span class="text-danger"> ৳{{@$product->new_price}} <del style="color:#ccc">৳{{@$product->product_price}}</del> </span>
                            @else
                                <span class="text-danger"> ৳{{@$product->product_price}} <del style="color:#ccc">৳00.00</del> </span>
                            @endif
                        </div>

                        <div class="product-cart">
                            <a href="{{route('SinglePorduct',@$product->slug)}}"> <button type="submit"> <i class="icon icon-online-shopping-cart text-white"></i> Add to cart</button></a>
                        </div>

                    </div>

                </div>

                @empty
                @endforelse


            </div>
        </div>
    </section>


    <input type="hidden" id="productQty" value="{{@$product_details->product_qty}}" >

  @section('client-footer')




      <script>
          function image_color(color_id,slug,pro_id) {
              $.ajax({
                  url:"{{route('SinglePorductColorGalleryAjax')}}",
                  type:"GET",
                  data:{color_id:color_id,slug:slug,pro_id:pro_id},
                  success:function (data) {

                      $('#showg').empty().html(data);
                  }
              })
          }
      </script>


      <script>

          $(document).ready(function() {
              var quryvrify = $('#productQty').val();
               if(quryvrify<1){
                    $('#sub').attr('disabled',true);
                   const Toast = Swal.mixin({
                           toast: true,
                           position: 'top-end',
                           showConfirmButton: false,
                           timer: 4000,
                           timerProgressBar: true,
                           didOpen: (toast) => {
                           toast.addEventListener('mouseenter', Swal.stopTimer)
                   toast.addEventListener('mouseleave', Swal.resumeTimer)
               }
               })

                   Toast.fire({
                       icon: 'error',
                       title: 'This Product Out of Stock'
                   })
               }

          });


          $('#ale').on('click',function () {


              const Toast = Swal.mixin({
                      toast: true,
                      position: 'top-end',
                      showConfirmButton: false,
                      timer: 3000,
                      timerProgressBar: true,
                      didOpen: (toast) => {
                      toast.addEventListener('mouseenter', Swal.stopTimer)
              toast.addEventListener('mouseleave', Swal.resumeTimer)
          }
          })

              Toast.fire({
                  icon: 'success',
                  title: 'Product Added To Cart'
              })
          })
      </script>


      <script>
          $( window ).on("load", function() {
              $('.cd-dropdown').removeClass('dropdown-is-active');
              $('.owl-carousel').css({
                  "display":"block"
              })

              $('.cd-dropdown').css({
                  "z-index":"9999"
              })
          });

      </script>

      <script>
          $('.v-gray').on('click',function () {

              $('.too').toggle('dropdown-is-active');

          })


          })
      </script>



      <script>

      </script>

  @endsection



@endsection