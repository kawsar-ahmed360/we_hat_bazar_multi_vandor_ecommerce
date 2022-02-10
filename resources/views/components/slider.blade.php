{{--<section class="carousel-slider-main text-center bg-white">--}}
    {{--<div class="owl-carousel owl-carousel-slider">--}}
        {{--@foreach(@$slider as $slider)--}}
        {{--<div class="item">--}}
            {{--<a href="#"><img class="img-fluid" src="{{(@$slider->image)?url('upload/Client/Slider/'.@$slider->image):''}}" alt="First slide"></a>--}}
        {{--</div>--}}
            {{--@endforeach--}}
    {{--</div>--}}
{{--</section>--}}





<div class="xs-banner banner-fullwidth-version-2 ">
    <div class="container-fluid container-fullwidth">
        <div class="row">

            <div class="col-lg-3">

            </div>

            <div class="xs-banner-slider-6 owl-carousel col-lg-9">
                @foreach(@$slider as $slider)
                <div class="xs-banner-item row" style='background: url("{{asset("upload/Client/Slider/".@$slider->image)}}");'>
                    <div class="xs-banner-content">

                    </div>
                </div>
                @endforeach
            </div>


        </div>
    </div>
</div>


<section class="paddingT-40 paddingB-30 ">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 text-center">

                <a href="#"> <img src="{{asset('fontend/assets/images/banner1.png')}}" alt=""> </a>

            </div>
        </div>
    </div>
</section>