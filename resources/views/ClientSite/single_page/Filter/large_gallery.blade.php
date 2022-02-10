

    <style>


        .carousel-item img {
            width: 448px;
            height: 449px !important;
        }

        #myCarousel .carousel-indicators {
            position: static;

        }

        #myCarousel .carousel-indicators>li {
            width: 100px
        }

        #myCarousel .carousel-indicators li img {
            display: block;

        }

        #myCarousel .carousel-indicators li.active img {
            opacity: 1
        }
    </style>

                <div id="myCarousel" class="carousel slide" data-ride="carousel" align="center">
                    <div class="carousel-inner">
                        @foreach(@$ProductGallery as $key=>$gall)

                            <div class="carousel-item {{(@$key==0)?'active':''}}"> <img src="{{(@$gall->product_gallery)?url('upload/Client/ProductGallery/'.@$gall->product_gallery):''}}" class="rounded"> </div>

                        @endforeach


                    </div>
                    <ol class="carousel-indicators list-inline" >
                        {{--<div  scrollamount="3" style="min-width: 493px;min-height: 96px;">--}}
                        @foreach(@$ProductGallery as $key=>$gall)
                        <li class="list-inline-item {{(@$key==0)?'active':''}}" >
                            <a id="carousel-selector-0" class="selected" data-slide-to="{{$key}}" data-target="#myCarousel">
                                <img src="{{(@$gall->product_gallery)?url('upload/Client/ProductGallery/'.@$gall->product_gallery):''}}" class="img-fluid rounded">
                                {{--<img style="min-width: 79px;min-height: 75px;" src="{{(@$gall->product_gallery)?url('upload/Client/ProductGallery/'.@$gall->product_gallery):''}}" class="img-fluid rounded">--}}
                            </a>
                            </li>
                        @endforeach
                        {{--</div>--}}

                    </ol>
                </div>


