@extends('ClientSite.master')
@section('title'){{@$category->category_name}} Shop Page @endsection
@section('seo')
    <meta name="description" content="{!!@$meta->shop_meta_des!!}">
    <meta name="keywords" content="{!!@$meta->shop_meta_des!!}">
@endsection

@section('client-content')




    <div class="xs-breadcumb">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('MainIndex')}}"> Home</a></li>
                    <li class="breadcrumb-item"><a href="">{{@$category->category_name}} Shop</a></li>

                </ol>
            </nav>
        </div>
    </div>


    {{--<section class="shop-list section-padding">--}}
        {{--<div class="container">--}}
            {{--<div class="row">--}}
                {{--<div class="col-md-3">--}}
                    {{--<div class="shop-filters">--}}
                        {{--<div id="accordion">--}}

                            {{--<div class="card">--}}
                                {{--<div class="card-header" id="headingTwo">--}}
                                    {{--<h5 class="mb-0">--}}
                                        {{--<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">--}}
                                            {{--TAGS  <span class="mdi mdi-chevron-down float-right"></span>--}}
                                        {{--</button>--}}
                                    {{--</h5>--}}
                                {{--</div>--}}
                                {{--<div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordion">--}}
                                    {{--<div class="card-body">--}}
                                        {{--<div class="sidebar-widget-list">--}}
                                            {{--<ul class="scroll">--}}
                                                {{--@foreach(@$tags as $ta)--}}
                                                    {{--<li>--}}
                                                        {{--<div class="pay-top sin-payment">--}}
                                                            {{--<input id="tag{{$ta->id}}" class="input-radio" type="checkbox" value="{{@$ta->id}}"  name="tag[]">--}}
                                                            {{--<label class="radio-label" for="payment_method_1"> {{@$ta->tag_name}} </label>--}}
                                                        {{--</div>--}}
                                                    {{--</li>--}}

                                                {{--@endforeach--}}


                                            {{--</ul>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}



                            {{--<div class="card">--}}
                                {{--<div class="card-header" id="headingOne">--}}
                                    {{--<h5 class="mb-0">--}}
                                        {{--<button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">--}}
                                            {{--Colors <span class="mdi mdi-chevron-down float-right"></span>--}}
                                        {{--</button>--}}
                                    {{--</h5>--}}
                                {{--</div>--}}
                                {{--<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">--}}
                                    {{--<div class="card-body">--}}
                                        {{--<div class="sidebar-widget-list">--}}
                                            {{--<ul class="scroll">--}}
                                                {{--@foreach(@$color as $key=>$color)--}}

                                                    {{--<li>--}}
                                                        {{--<div class="pay-top sin-payment">--}}
                                                            {{--<input id="tag{{$color->id}}" class="input-radio" type="checkbox" value="{{@$color->id}}"  name="color[]">--}}
                                                            {{--<label class="radio-label" for="payment_method_1"> {{@$color->color_name}} </label>--}}
                                                        {{--</div>--}}
                                                    {{--</li>--}}
                                                {{--@endforeach--}}

                                            {{--</ul>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="card">--}}
                                {{--<div class="card-header" id="headingThree">--}}
                                    {{--<h5 class="mb-0">--}}
                                        {{--<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">--}}
                                            {{--PLATING / POLISH <span class="mdi mdi-chevron-down float-right"></span>--}}
                                        {{--</button>--}}
                                    {{--</h5>--}}
                                {{--</div>--}}

                                {{--<div id="collapseThree" class="collapse show" aria-labelledby="headingThree" data-parent="#accordion">--}}
                                    {{--<div class="card-body">--}}
                                        {{--<div class="sidebar-widget-list">--}}
                                            {{--<ul class="scroll">--}}

                                                {{--@foreach(@$polish as $polish)--}}

                                                    {{--<li>--}}
                                                        {{--<div class="pay-top sin-payment">--}}
                                                            {{--<input id="tag{{$polish->id}}" class="input-radio" type="checkbox" value="{{@$polish->id}}"  name="polish[]">--}}
                                                            {{--<label class="radio-label" for="payment_method_1"> {{@$polish->plating_name}} </label>--}}
                                                        {{--</div>--}}
                                                    {{--</li>--}}

                                                {{--@endforeach--}}

                                            {{--</ul>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}


                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="left-ad mt-4">--}}
                        {{--<img class="img-fluid" alt="" src="{{asset('fontend/img/add-side.png')}}">--}}
                    {{--</div>--}}
                {{--</div>--}}


                {{--<div class="col-md-9">--}}
                    {{--<a href="#"><img class="img-fluid mb-3" src="{{asset('fontend/img/shop.jpg')}}" alt=""></a>--}}
                    {{--<div class="shop-head">--}}
                        {{--<a href="#"><span class="mdi mdi-home"></span> Home</a> <span class="mdi mdi-chevron-right"></span> <a href="#">{{@$category->category_name}} Shop</a> <span class="mdi mdi-chevron-right"></span> <a href="#"></a>--}}
                        {{--<div class="btn-group float-right mt-2">--}}

                            {{--<select style="background: #17a2b8;color: white;padding: 5px;width: 180px;border-radius: 2px;text-align: center;" name="price_filter" id="price_filter" onchange="filterPrice(this)">--}}
                                {{--<option style="background: white;color: black;" disabled selected>select once</option>--}}
                                {{--<option style="background: white;color: black;" value="Relevance">Relevance</option>--}}
                                {{--<option style="background: white;color: black;" value="Low to High">Price (Low to High)</option>--}}
                                {{--<option style="background: white;color: black;" value="High to Low">Price (High to Low)</option>--}}
                                {{--<option style="background: white;color: black;" value="Discount (High to Low)">Discount (High to Low)</option>--}}
                                {{--<option style="background: white;color: black;" value="Name (A to Z)">Name (A to Z)</option>--}}
                            {{--</select>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<h5 class="mb-3">{{@$category->category_name}}</h5>--}}
                    {{--</div>--}}



                    {{--<div class="row" id="newproduct">--}}

                        {{--@include('ClientSite.single_page.Filter.category_shop')--}}


                    {{--</div>--}}





                {{--</div>--}}


            {{--</div>--}}

        {{--</div>--}}
    {{--</section>--}}




    <!--------Old Section End----------->
    <!--------Category Section Start---------->


    <section class="xs-section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-lg-3">
                    <div class="shop-category">
                        <div class="widget widget_cate">
                            <h5 class="widget-title">BASIC FILTER</h5>
                            <select class="form-control" onchange="CatCategoryFilter()" id="CcatId">
                                <option disabled selected>--Select Category--</option>
                                @foreach(@$categorys as $cat)
                                    <option value="{{@$cat->id}}">{{@$cat->category_name}}</option>
                                @endforeach
                            </select>
                            <h6 style="margin-top:7px;font-family: cursive;color: #919090;">OR</h6>
                            <input style="margin-top:5px"  type="text" onkeyup="CatProductName()" class="form-control" id="productName" placeholder="Enter Product Name">
                            <h6 style="margin-top:7px;font-family: cursive;color: #919090;">OR</h6>
                            <input style="margin-top:5px" type="text" onkeyup="CatProductPrice()" id="productPrice" class="form-control" placeholder="Enter ৳000">
                        </div>

                        <div class="widget widget_cate">
                            <h5 class="widget-title">TAGS</h5>

                            @foreach(@$tags as $ta)
                                <div class="custom-checkbox">
                                    <input style="width: 20px; height: 20px;top: 0;background: -moz-radial-gradient(#FF9593, #dfdfdf);border: 1px solid #eaeaea;pointer-events: visible;cursor: pointer;" type="checkbox" value="{{@$ta->id}}" class="" id="tag{{$ta->id}}" name="tag[]">
                                    <label class="" style="margin-bottom: 0;padding-top: 3px;padding-left: 14px;font-size: .85714em !important;vertical-align: top;" for="tenInch">{{@$ta->tag_name}}</label>
                                </div>

                            @endforeach


                        </div>
                        <div class="widget widget_cate">
                            <h5 class="widget-title">COLORS</h5>

                            @foreach(@$color as $key=>$color)
                                <div class="custom-checkbox">
                                    <input style="width: 20px; height: 20px;top: 0;background: -moz-radial-gradient(#FF9593, #dfdfdf);border: 1px solid #eaeaea;pointer-events: visible;cursor: pointer;" id="tag{{$color->id}}" class="input-radio" type="checkbox" value="{{@$color->id}}"  name="color[]">
                                    {{--{{@$color->color_name}}--}}
                                    <label title="{{@$color->color_name}}" style="height:20px;width:20px;margin-left: 7px;border-radius: 10px;margin-bottom: 0;padding-top: 3px;padding-left: 14px;font-size: .85714em !important;vertical-align: top;background: {{@$color->color}}" for="tenInch"></label>

                                </div>
                            @endforeach
                        </div>
                        <div class="widget widget_cate">
                            <h5 class="widget-title">PLATING / POLISH</h5>

                            @foreach(@$polish as $polish)
                                <div class="custom-checkbox">
                                    <input style="width: 20px; height: 20px;top: 0;background: -moz-radial-gradient(#FF9593, #dfdfdf);border: 1px solid #eaeaea;pointer-events: visible;cursor: pointer;" id="tag{{$polish->id}}" class="input-radio" type="checkbox" value="{{@$polish->id}}"  name="polish[]">

                                    <label style="margin-left: 7px;border-radius: 10px;margin-bottom: 0;padding-top: 3px;padding-left: 14px;font-size: .85714em !important;vertical-align: top;" for="tenInch">{{@$polish->plating_name}}</label>

                                </div>
                            @endforeach

                        </div>



                        <div class="widget widget_banner">
                            <img src="assets/images/image_loader.gif" data-echo="assets/images/web_banner/shop_offer_banner.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-md-9 col-lg-9">
                    <div class="shop-cate-list">
                        <div class="shop-cate-title">
                            <h5>Shop/Product Page</h5>
                        </div>
                        <ul class="shop-catelist-item">



                            <li>
                                <div class="media">
                                    <h6 class="d-flex">View</h6>
                                    <ul class="nav nav-tabs shop-view-nav" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="list-th-tab" data-toggle="tab" href="#list-th" role="tab" aria-controls="list-th" aria-selected="true"><i class="fa fa-th"></i></a>
                                        </li>

                                    </ul>
                                </div>
                            </li>
                            <li>

                                <select name="price_filter" id="price_filter" onchange="filterPrice(this)" class="product-ordering" style="color:#1a1b1d">
                                    <option disabled selected="selected">Default sorting</option>
                                    <option value="Relevance">Relevance</option>
                                    <option value="Low to High">Price (Low to High)</option>
                                    <option value="High to Low">Price (High to Low)</option>
                                    <option value="Discount (High to Low)">Discount (High to Low)</option>
                                    <option value="Name (A to Z)">Name (A to Z)</option>
                                </select>

                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="list-th" role="tabpanel" aria-labelledby="list-th-tab">
                            <div class="row category-v4" id="newproduct">

                                @include('ClientSite.single_page.Filter.category_shop')

                            </div>
                        </div>


                    </div>

                </div>
            </div>
        </div>
    </section>

    <input type="hidden" value="{{@$cat_id}}" id="CatId">

@section('client-footer')


    <script>
        $( window ).on("load", function() {
            $('.cd-dropdown').removeClass('dropdown-is-active');
            $('.cd-dropdown').css({
                "z-index":"9999"
            })
        });

    </script>

    <!-----Extra Filter Add-------->
    <script>
        function CatCategoryFilter(){
            var CcatId = $('#CcatId').val();
            var ProductName = $('#productName').val();
            var ProductPrice = $('#productPrice').val();
            var CatId = $('#CatId').val();
            $.ajax({
                url:"{{route('CategoryShopPageFilterMainCategoryProduct')}}",
                type:"GET",
                data:{CcatId:CcatId,ProductName:ProductName,ProductPrice:ProductPrice,CatId:CatId},
                success:function (data) {
                    $('#newproduct').empty().html(data)
                }
            })

        }
    </script>


    <script>
        function CatProductPrice(){
            var ProductPrice = $('#productPrice').val();
            var CatId = $('#CatId').val();
            var CcatId = $('#CcatId').val();
            $.ajax({
                url:"{{route('CategoryShopPageFilterProductPrice')}}",
                type:"GET",
                data:{ProductPrice:ProductPrice,CatId:CatId,CcatId:CcatId},
                success:function (data) {
                    $('#newproduct').empty().html(data)
                }
            })
        }
    </script>


    <script>
        function CatProductName(){
            var CatId = $('#CatId').val();
            var ProductName = $('#productName').val();
            var CcatId = $('#CcatId').val();
            $.ajax({
                url:"{{route('CategoryShopPageFilterProductName')}}",
                type:"GET",
                data:{ProductName:ProductName,CatId:CatId,CcatId:CcatId},
                success:function (data) {
                    $('#newproduct').empty().html(data)
                }
            })
        }
    </script>

    <!-----Extra Filter End-------->


    <script>
        var tag = [];
        $('input[name="tag[]"]').on('change', function (e) {
            e.preventDefault();
            tag = [];
            $('input[name="tag[]"]:checked').each(function()
            {
                tag.push($(this).val());
            });

            var price = $('#price_filter').val();
            var CatId = $('#CatId').val();

            $.ajax({

                headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                type:'GET',

                url: '{{route("CategoryShopPageFilterTag")}}',

                data:{tag:tag,price:price,color:color,polish:polish,CatId:CatId},

                success:function(data){

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
                        title: 'Filter Action Done'
                    })

                    $('#newproduct').empty().html(data)

                }

            });
        });
    </script>

    <!----------------------Color Section-------------------------->

    <script>
        var color = [];
        $('input[name="color[]"]').on('change', function (e) {
            e.preventDefault();
            color = [];
            $('input[name="color[]"]:checked').each(function()
            {
                color.push($(this).val());
            });

            var price = $('#price_filter').val();
            var CatId = $('#CatId').val();

            $.ajax({

                headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                type:'GET',

                url: '{{route("CategoryShopPageFilterColor")}}',

                data:{color:color,price:price,tag:tag,polish:polish,CatId:CatId},

                success:function(data){

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
                        title: 'Filter Action Done'
                    })

                    $('#newproduct').empty().html(data)

                }

            });
        });
    </script>



    <!----------------------Polish Section-------------------------->

    <script>
        var polish = [];
        $('input[name="polish[]"]').on('change', function (e) {
            e.preventDefault();
            polish = [];
            $('input[name="polish[]"]:checked').each(function()
            {
                polish.push($(this).val());
            });

            var price = $('#price_filter').val();
            var CatId = $('#CatId').val();
            $.ajax({

                headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                type:'GET',

                url: '{{route("CategoryShopPageFilterPolish")}}',

                data:{polish:polish,price:price,color:color,tag:tag,CatId:CatId},

                success:function(data){

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
                        title: 'Filter Action Done'
                    })

                    $('#newproduct').empty().html(data)

                }

            });
        });
    </script>

    <!--------Price FIlter---------->

    <script>



        function filterPrice(name){
            var namees = name.value;
            var CatId = $('#CatId').val();

            $.ajax({
                url:"{{route('CategoryShopPageFilterPrice')}}",
                type:"GET",
                data:{namees:namees,tag:tag,color:color,polish:polish,CatId:CatId},
                success:function (data) {
                    $('#newproduct').empty().html(data)
                }
            })

        }
    </script>
@endsection

@endsection