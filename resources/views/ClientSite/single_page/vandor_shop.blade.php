@extends('ClientSite.master')
@section('title') {{@$vandor->shop_name??'unknown'}} Shop Page @endsection
@section('seo')
    <meta name="description" content="{!!@$meta->shop_meta_des!!}">
    <meta name="keywords" content="{!!@$meta->shop_meta_des!!}">
@endsection

@section('client-content')




    <div class="xs-breadcumb">
        <div class="container">
            <nav aria-label="breadcrumb">
                <div class="row">
                <div class="col-md-2">
                <img style="border: 1px solid #8b02ff;padding:15px;border-radius: 4px;height: 59px" src="{{(@$vandor->shop_image)?url('upload/Vandor/shop_image/'.@$vandor->shop_image):url('backend/vandor_unk.png')}}" alt="">

                </div>
                    <div class="col-md-2">

                        <span style="color: black;font-size: 21px;font-family: monospace;">Vandor Name</span>
                        <p style="color:red"><img style="height: 17px;" src="{{(@$vandor->shop_banner)?url('upload/Vandor/shop_banner/'.@$vandor->shop_banner):url('backend/vandor_unk.png')}}" alt=""></p>
                    </div>

                    <div class="col-md-8">
                         <span><strong style="font-family: inherit;font-size:19px;font-weight: 500;"> <i class="fa fa-mobile"></i> :</strong> 01843534534</span>    <span><strong style="font-family: inherit;font-size:19px;font-weight: 500;">  <i style="padding-left: 18px;" class="fa fa-envelope"></i> :</strong> Vandor@gmail.com</span>
                        <span><strong style="font-family: inherit;font-size:19px;font-weight: 500;">  <i style="padding-left: 18px;" class="fa fa-map"></i> :</strong> Dhaka Bangladesh</span>

                        <br>
                        <p>নাসিমা আক্তার নিশা, ফেসবুক গ্রুপ উই (উইমেন অ্যান্ড ই-কমার্স ফোরাম) এর স্বপ্নদ্রস্টা ও প্রতিষ্ঠাতা। বর্তমানে তিনি উই’র প্রেসিডেন্ট। এছাড়া ই-ক্যাবের (ই-কমার্স অ্যাসোসিয়েশন অব বাংলাদেশ) যুগ্ম সাধারণ সম্পাদকের দায়িত্ব পালন করেছেন।</p>
                    </div>






                    <div class="col-md-3">

                    </div>




                </div>



            </nav>
        </div>
    </div>



    <!--------Category Section Start---------->


    <section class="xs-section-padding" style="padding: 32px 0;">
        <div class="container">
            <div class="row">


                <div class="col-md-3 col-lg-3">
                    <div class="shop-category">
                        <div class="widget widget_cate">
                            <h5 class="widget-title">BASIC FILTER</h5>
                            <select class="form-control" onchange="CatCategoryFilter()" id="CcatId">
                                <option disabled selected>--Select Category--</option>
                                @if(@$vandor_category!=null)
                                @foreach(@$vandor_category as $cat)
                                    <option value="{{@$cat->id}}">{{@$cat->category_name}}</option>
                                @endforeach
                                    @else
                                @endif
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
                            <img src="{{asset('fontend/assets/images/image_loader.gif')}}" data-echo="assets/images/web_banner/shop_offer_banner.png" alt="">
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

                                @include('ClientSite.single_page.Filter.vandor_shops')

                            </div>
                        </div>


                    </div>

                </div>
            </div>
        </div>
    </section>

    <input type="hidden" value="{{@$shop_id}}" id="shopId">

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
            var shop_id = $('#shopId').val();
            $.ajax({
                url:"{{route('VandorShopPageFilterMainVandorProduct')}}",
                type:"GET",
                data:{CcatId:CcatId,ProductName:ProductName,ProductPrice:ProductPrice,shop_id:shop_id},
                success:function (data) {
                    $('#newproduct').empty().html(data)
                }
            })

        }
    </script>


    <script>
        function CatProductPrice(){
            var ProductPrice = $('#productPrice').val();
            var shop_id = $('#shopId').val();
            var CcatId = $('#CcatId').val();
            $.ajax({
                url:"{{route('VandorShopPageFilterProductPrice')}}",
                type:"GET",
                data:{ProductPrice:ProductPrice,shop_id:shop_id,CcatId:CcatId},
                success:function (data) {
                    $('#newproduct').empty().html(data)
                }
            })
        }
    </script>


    <script>
        function CatProductName(){
            var shop_id = $('#shopId').val();
            var ProductName = $('#productName').val();
            var CcatId = $('#CcatId').val();
            $.ajax({
                url:"{{route('VandorShopPageFilterProductName')}}",
                type:"GET",
                data:{ProductName:ProductName,shop_id:shop_id,CcatId:CcatId},
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
            var shop_id = $('#shopId').val();

            $.ajax({

                headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                type:'GET',

                url: '{{route("VandorShopPageFilterTag")}}',

                data:{tag:tag,price:price,color:color,polish:polish,shop_id:shop_id},

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
            var shop_id = $('#shopId').val();

            $.ajax({

                headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                type:'GET',

                url: '{{route("VandorShopPageFilterColor")}}',

                data:{color:color,price:price,tag:tag,polish:polish,shop_id:shop_id},

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
            var shop_id = $('#shopId').val();
            $.ajax({

                headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                type:'GET',

                url: '{{route("VandorShopPageFilterPolish")}}',

                data:{polish:polish,price:price,color:color,tag:tag,shop_id:shop_id},

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
            var shop_id = $('#shopId').val();

            $.ajax({
                url:"{{route('VandorShopPageFilterPrice')}}",
                type:"GET",
                data:{namees:namees,tag:tag,color:color,polish:polish,shop_id:shop_id},
                success:function (data) {
                    $('#newproduct').empty().html(data)
                }
            })

        }
    </script>
@endsection

@endsection