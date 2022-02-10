{{--<section class="top-category section-padding">--}}
    {{--<div class="container">--}}
        {{--<div class="owl-carousel owl-carousel-category">--}}

            {{--@foreach(@$category as $cat)--}}
                {{--@php--}}
                 {{--$procot = App\Models\Admin\ProductManage::where('cat_id',$cat->id)->count();--}}
                {{--@endphp--}}
            {{--<div class="item">--}}
                {{--<div class="category-item">--}}
                    {{--<a href="{{route('CategoryShopPage',base64_encode($cat->id))}}">--}}
                        {{--<img class="img-fluid" src="{{(@$cat->image)?url('upload/Client/Category/'.$cat->image):''}}" alt="">--}}
                        {{--<h6>{{@$cat->category_name}}</h6>--}}
                        {{--<p>{{@$procot}} Items</p>--}}
                    {{--</a>--}}
                {{--</div>--}}
            {{--</div>--}}


                {{--@endforeach--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</section>--}}




<div class="paddingT-30 paddingB-30 bg-gray">

    <!---->
    <div class="container-fluid">
        <div class="xs-content-header1 version-2">
            <h2 class="xs-content-title float-left" style="color: #8e02ff;">  CATEGORY </h2>
            <a href="#"><p class="float-right">Show More <i class="fas fa-eye"></i></p></a>
            <div class="clearfix"></div>
        </div>
    </div>
    <!---->

    <div class="container">
        <div class="row" >
            <!--  -->
            @foreach(@$category as $cat)
            <div class="col-lg-2 ">

                <div class="categorysection">
                    <img  src="{{(@$cat->image)?url('upload/Client/Category/'.$cat->image):''}}" alt="Mobile">

                    <div class="xs-product-content text-center">

                  <span class="product-categories">

                  </span>
                        <h4 class="product-title"><a href="{{route('CategoryShopPage',base64_encode($cat->id))}}">{{@$cat->category_name}} </a></h4>
                    </div>
                </div>

            </div>

            @endforeach



        </div>
    </div>


</div>



<section class="paddingT-30 paddingB-30 ">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 text-center">

                <a href="#"> <img src="{{asset('fontend/assets/images/banner3.jpg')}}" alt=""> </a>

            </div>

        </div>
    </div>
</section>