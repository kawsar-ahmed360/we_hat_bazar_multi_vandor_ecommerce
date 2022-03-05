
<div class="paddingT-30 paddingB-30 bg-gray">

    <!---->
    <div class="container-fluid">
        <div class="xs-content-header1 version-2">
            <h2 class="xs-content-title float-left" style="color: #8e02ff;"> Shops </h2>
            {{--<a href="#"><p class="float-right">Show More <i class="fas fa-eye"></i></p></a>--}}
            <div class="clearfix"></div>
        </div>
    </div>
    <!---->

    <div class="container">
        <div class="row" >

            @foreach(@$allshop as $key=>$shop)
            <div class="col-lg-2 ">

                <a href="{{route('vandorShopPage',[@$shop->shop_id,@$shop->id])}}">
                <div class="categorysection">
                    <img style="padding: 13px;height: 56px;background: white;" src="{{(@$shop->shop_image)?url('upload/Vandor/shop_image/'.@$shop->shop_image):url('backend/vandor_unk.png')}}" alt="Mobile">

                    <div class="xs-product-content text-center">

                  <span class="product-categories" style="font-size: .95714em;margin-bottom: 0px;margin-top:5px">
                    <span style="color:white">{{@$shop->shop_id}}</span>
                  </span>
                        <h4 class="product-title" style="line-height: 1.625;font-weight: 500;font-size: 1.14286em;"><a href="">Ajker Deal </a></h4>
                    </div>
                </div>
                </a>

            </div>

                @endforeach

        </div>
    </div>


</div>
