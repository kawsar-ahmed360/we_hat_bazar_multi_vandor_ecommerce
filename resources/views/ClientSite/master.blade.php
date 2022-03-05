<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     @yield('seo')
    <meta name="author" content="">
    <title>@yield('title')</title>
     <link rel="icon" type="image/png" href="{{asset('fontend/icon.png')}}">

    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700" rel="stylesheet">
    <link rel="apple-touch-icon" href="apple-touch-icon.html">
    <link rel="stylesheet" href="{{asset('fontend/assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('fontend/assets/css/jquery-ui.css')}}">
    {{--<link rel="stylesheet" href="{{asset('fontend/assets/css/bootstrap.min.css')}}">--}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('fontend/assets/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('fontend/assets/css/iconfont.css')}}">
    <link rel="stylesheet" href="{{asset('fontend/assets/css/isotope.css')}}">
    <link rel="stylesheet" href="{{asset('fontend/assets/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('fontend/assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('fontend/assets/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('fontend/assets/css/vertical-menu.css')}}">
    <link rel="stylesheet" href="{{asset('fontend/assets/css/navigation.min.css')}}">
    <link rel="stylesheet" href="{{asset('fontend/assets/css/plugins.css')}}"/>
    <link rel="stylesheet" href="{{asset('fontend/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('fontend/assets/css/responsive.css')}}"/>
    <link rel="stylesheet" href="{{asset('fontend/toastr.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/6.5.95/css/materialdesignicons.min.css">

    <!-- -------------------- Font Awsome ------------------------ -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.24.0/axios.min.js" integrity="sha512-u9akINsQsAkG9xjc1cnGF4zw5TFDwkxuc9vUp5dltDWYCSmyd0meygbvgXrlc/z7/o4a19Fb5V0OUE58J7dcyw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <style>
        .swal2-header{
            z-index: 99999;
        }

        .track{
            position: relative;
            background-color: #ddd;
            height: 7px;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            margin-bottom: 45px;
            margin-top: 18px;
        }
        .track .step {
            -webkit-box-flex: 1;
            -ms-flex-positive: 1;
            flex-grow: 1;
            width: 25%;
            margin-top: -18px;
            text-align: center;
            position: relative;
        }

        .track .step.active:before {
            background: #FF5722;
        }

        .track .step::before {
            height: 7px;
            position: absolute;
            content: "";
            width: 100%;
            left: 0;
            top: 18px;
        }

        .track .step.active .icon {
            background: #ee5435;
            color: #fff;
        }

        .track .icon {
            display: inline-block;
            width: 40px;
            height: 40px;
            line-height: 40px;
            position: relative;
            border-radius: 100%;
            background: #ddd;
        }

        .track .text {
            display: block;
            margin-top: 7px;
        }

    </style>

</head>
<body>


@include('ClientSite.component_base.header')

<!-- Start: Slider -->

@yield('Slider')
<!-- End: Slider -->

<!-- Start: Category -->

<!-- End: Category -->

<!-- Start: About Us -->
<!-- font-family: "Dancing Script",cursive; -->
{{--@yield('about')--}}
<!--End: About us -->
@yield('client-content')

<!-- Start: Product Item -->
@yield('product')

@yield('category_section')

@yield('Shops')

{{--@yield('client-content')--}}

{{--@yield('content')--}}



<!-- Instagram -->
{{--@yield('client-us')--}}
<!-- Instagram -->




@include('ClientSite.component_base.footer')

<!-------Traking Modal Section---------->

<div class="modal fade" id="modal1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="width: 700px;">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title" style="font-family: cursive;">Please Enter Your Order Id Number</h4> <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div> <!-- Modal body -->
            <div class="modal-body" style="width:659px">
                <div class="container">

                    <form action="{{route('OrderTraking')}}" id="orderTrack" method="get">
                        <div class="row">
                            <div class="col-md-12">
                                <lable>Order Id</lable>
                                <input type="text" class="form-control" name="OrderId" id="OrderId" placeholder="Enter Your Order Number 00000">
                            </div>
                        </div>
                        <div class="modal-footer"> <button style="background: blueviolet;padding: 10px;" type="submit" class="btn">Track order</button> </div>
                    </form>
                </div>



                <div class="container" id="showallinfo" style="display: none;">

                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="pull-left" style="font-family: cursive;">Traking Details:</h5> <h5 class="pull-right"><span style="color:red">OrderId</span>: #<span id="OrderNumber"></span></h5>
                        </div>

                        <div class="col-md-12">
                            <p id="customer_name" style="font-size: 17px;font-family: 'Material Design Icons';">Customer Info :</p>
                        </div>

                        <div class="col-md-12">
                            <table class="table table-striped">

                                <tr>
                                    <th>Name</th>
                                    <td><span id="customerNameAjax"></span></td>
                                </tr>

                                <tr>
                                    <th>Email</th>
                                    <td><span id="customerEmailAjax"></span></td>
                                </tr>

                                <tr>
                                    <th>Mobile</th>
                                    <td><span id="customerMobileAjax"></span></td>
                                </tr>



                            </table>
                        </div>


                        <div class="col-md-12">
                            <p id="customer_name" style="font-size: 17px;font-family: 'Material Design Icons';">Product:</p>

                            <table class="table table-bordered">
                                <tbody>
                                <tr>
                                    <th>Sl</th>
                                    <th>Product Name</th>
                                    <th>Squ</th>
                                    <th>Quantity</th>

                                </tr>
                                </tbody>

                                <tbody id="allproduct">

                                </tbody>
                            </table>

                        </div>



                        <div class="col-md-12">
                            <p id="customer_name" style="font-size: 17px;font-family: 'Material Design Icons';">Track:</p>
                        </div>

                        <div class="col-md-12" id="trac_view">


                            {{--<div class="track" >--}}
                                {{--<div id="orderst" class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order confirmed</span> </div>--}}
                                {{--<div id="shipping_st" class="step "> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> On the way </span> </div>--}}
                                {{--<div id="final_oder" class="step"> <span class="icon"> <i class="fas fa-box"></i> </span> <span class="text">Ready for pickup</span> </div>--}}
                                {{--<div id="shop_name" class="step"> <span class="icon"> <i class="fas fa-shopping-cart"></i> </span> <span class="text">Ready for pickup</span> </div>--}}
                            {{--</div>--}}

                        </div>

                    </div>
                </div>


            </div> <!-- Modal footer -->

        </div>
    </div>
</div>




<script src="{{asset('fontend/assets/js/jquery-3.2.1.min.js')}}"></script>

<script src="{{asset('fontend/assets/js/jquery-ui.js')}}"></script>
<script src="{{asset('fontend/assets/js/modernizr.js')}}"></script>
<script src="{{asset('fontend/assets/js/plugins.js')}}"></script>
<script src="{{asset('fontend/assets/js/Popper.js')}}"></script>
<script src="{{asset('fontend/assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('fontend/assets/js/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('fontend/assets/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('fontend/assets/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('fontend/assets/js/jquery.menu-aim.js')}}"></script>
<script src="{{asset('fontend/assets/js/vertical-menu.js')}}"></script>
<script src="{{asset('fontend/assets/js/tweetie.js')}}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="{{asset('fontend/assets/js/echo.min.js')}}"></script>
<script src="{{asset('fontend/assets/js/jquery.ajaxchimp.min.js')}}"></script>
<script src="{{asset('fontend/assets/js/jquery.countdown.min.js')}}"></script>

<script src="{{asset('fontend/assets/js/jquery.waypoints.min.js')}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3&amp;key=AIzaSyCy7becgYuLwns3uumNm6WdBYkBpLfy44k"></script>
<script src="{{asset('fontend/assets/js/spectragram.min.js')}}"></script>
<script src="{{asset('fontend/assets/js/main.js')}}"></script>
<script src="{{asset('fontend/toastr.min.js')}}"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>



<script>
    $("body").on("keyup","#searchs",function(){

        let Searchval = $(this).val();
        if(Searchval.length >0){

            $.ajax({
                url:"{{route('FilterSearchProd')}}",
                type:"get",
                data:{Searchval:Searchval},
                success:function(data){

                    $('#filterProductShow').empty().html(data);

                }
            })
        }

        if(Searchval.length <1){
            $('#filterProductShow').empty().html("");
        }
        //  console.log(val);
    })
</script>



<script>
    function ShowSearchResult(){
        $('#filterProductShow').fadeIn();
    }


    function HideSearchResult(){
        $('#filterProductShow').fadeOut();
    }
</script>



<script>
    // --------- COUNDOWN -----------------------------------


    function getTimeRemaining(endtime) {
        var t = Date.parse(endtime) - Date.parse(new Date());
        var seconds = Math.floor((t / 1000) % 60);
        var minutes = Math.floor((t / 1000 / 60) % 60);
        var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
        var days = Math.floor(t / (1000 * 60 * 60 * 24));
        return {
            'total': t,
            'days': days,
            'hours': hours,
            'minutes': minutes,
            'seconds': seconds
        };
    }

    function initializeClock(id, endtime) {
        var clock = document.getElementById(id);
        var daysSpan = clock.querySelector('.days');
        var hoursSpan = clock.querySelector('.hours');
        var minutesSpan = clock.querySelector('.minutes');
        var secondsSpan = clock.querySelector('.seconds');

        function updateClock() {
            var t = getTimeRemaining(endtime);

            daysSpan.innerHTML = t.days;
            hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
            minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
            secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);

            if (t.total <= 0) {
                clearInterval(timeinterval);
            }
        }

        updateClock();
        var timeinterval = setInterval(updateClock, 1000);
    }




    $('input[name="this_time[]"]').each(function(k,v)
    {


            var deadline = new Date(Date.parse(new Date()) + v.defaultValue * 24 * 60 * 60 * 1000);
            initializeClock('clockdiv', deadline);
        });







    // --------- COUNDOWN END ----------------------------------------------------------
</script>

<!-------------Order Traking js---------------->

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


//                    <tr>
//                    <td>1</td>
//                    <td>1</td>
//                    <td>1</td>
//                    <td>1</td>
//                    </tr>

                    //-------------Start Product View------------

                    var pro_parent_div = document.getElementById('allproduct');
                    $('#allproduct').empty();

                    var icnremtn =1;
                    for(var i=0; i<data['order_details'].length; i++){
                      var pro_tr = document.createElement('tr');
                      var td_1 = document.createElement('td');
                      var td_2 = document.createElement('td');
                      var td_3 = document.createElement('td');
                      var td_4 = document.createElement('td');

                        td_1.innerText='#'+data['order'].orderId;
                        td_2.innerText=data['order_details'][i].products.product_name;
                        td_3.innerText=data['order_details'][i].products.product_sku;
                        td_4.innerText=data['order_details'][i].qty;


                        pro_tr.appendChild(td_1);
                        pro_tr.appendChild(td_2);
                        pro_tr.appendChild(td_3);
                        pro_tr.appendChild(td_4);

                        pro_parent_div.appendChild(pro_tr);

                    }


                    //------------Start Tracking -------------
                    var TrackView  = document.getElementById('trac_view');
                    $('#trac_view').empty();

                    for(var i=0; i<data['order_details'].length; i++){

                        var TrackElement = document.createElement('div');
                        TrackElement.setAttribute('class','track');
                        TrackElement.style.marginBottom="79px";

                        //------------Second Div Create--------
                        var SecondDiv = document.createElement('div');
                        SecondDiv.setAttribute('id','orderst');
                        SecondDiv.setAttribute('class','step');
//                         $('#orderst').addClass('active');
                        if(data['order_details'][i].order_status==1){
                            SecondDiv.classList.add("active");
                    }else{
                        SecondDiv.classList.remove("active");
                    }

                        var SecondDivInnerSpan = document.createElement('span');
                        SecondDivInnerSpan.setAttribute('class','icon');
                        var SecondDivInnerITag = document.createElement('i');
                        SecondDivInnerITag.setAttribute('class','fa fa-check');

                        var SecondDivInnerSecondSpan = document.createElement('span');
                        SecondDivInnerSecondSpan.setAttribute('class','text');
                        SecondDivInnerSecondSpan.innerText="hello";

                        //-------------Third Div TrackElement Innser Div---

                        var ThirdDiv = document.createElement('div');
                        ThirdDiv.setAttribute('id','shipping_st');
                        ThirdDiv.setAttribute('class','step');
                        if(data['order_details'][i].shipping_status==1){
                            ThirdDiv.classList.add("active");
                        }else{
                            ThirdDiv.classList.remove("active");
                        }
                        var ThirdDivInnerSpan = document.createElement('span');
                        ThirdDivInnerSpan.setAttribute('class','icon');
                        var ThirdDivInnerITag = document.createElement('i');
                        ThirdDivInnerITag.setAttribute('class','fa fa-truck');
                        var ThirdDivInnerSecondSpan = document.createElement('span');
                        ThirdDivInnerSecondSpan.setAttribute('class','text');
                        ThirdDivInnerSecondSpan.innerText="on the way";

                        ThirdDivInnerSpan.appendChild(ThirdDivInnerITag);
                        ThirdDiv.appendChild(ThirdDivInnerSpan)
                        ThirdDiv.appendChild(ThirdDivInnerSecondSpan)


                        //-------------Four Div TrackElement Innser Div---
                        var fourthDiv = document.createElement('div');
                        fourthDiv.setAttribute('id','final_oder');
                        fourthDiv.setAttribute('class','step');
                        if(data['order_details'][i].order_complete==1){
                            fourthDiv.classList.add("active");
                        }else{
                            fourthDiv.classList.remove("active");
                        }
                        var fourthDivInnerSpan = document.createElement('span');
                        fourthDivInnerSpan.setAttribute('class','icon');
                        var fourthDivInnerITag = document.createElement('i');
                        fourthDivInnerITag.setAttribute('class','fa fa-box');
                        var fourthDivInnerSecondSpan = document.createElement('span');
                        fourthDivInnerSecondSpan.setAttribute('class','text');
                        fourthDivInnerSecondSpan.innerText="Ready for pickup";


                    //-------------Five Div TrackElement Innser Div---
                        var fifthDiv = document.createElement('div');
                        fifthDiv.setAttribute('id','shop_name');
                        fifthDiv.setAttribute('class','step');
                        var fifthDivInnerSpan = document.createElement('span');
                        fifthDivInnerSpan.setAttribute('class','icon');
                        var fifthDivInnerITag = document.createElement('i');
                        fifthDivInnerITag.setAttribute('class','fa fa-shopping-cart');
                        var fifthDivInnerSecondSpan = document.createElement('span');
                        fifthDivInnerSecondSpan.setAttribute('class','text');
                        if(data['order_details'][i].shop_id){
                            fifthDivInnerSecondSpan.innerText=data['order_details'][i].shop_id;
                        }



                        fifthDivInnerSpan.appendChild(fifthDivInnerITag);
                        fifthDiv.appendChild(fifthDivInnerSpan);
                        fifthDiv.appendChild(fifthDivInnerSecondSpan);
                        fourthDivInnerSpan.appendChild(fourthDivInnerITag);
                        fourthDiv.appendChild(fourthDivInnerSpan);
                        fourthDiv.appendChild(fourthDivInnerSecondSpan);

                        SecondDivInnerSpan.appendChild(SecondDivInnerITag)

                        SecondDiv.appendChild(SecondDivInnerSpan);
                        SecondDiv.appendChild(SecondDivInnerSecondSpan);

                        TrackElement.appendChild(SecondDiv);

                        TrackElement.appendChild(ThirdDiv);
                        TrackElement.appendChild(fourthDiv);
                        TrackElement.appendChild(fifthDiv);
                        //-----------find Parent -------

                        TrackView.appendChild(TrackElement);



                    }

                    //----------------- Order Status ---------------
//                    $('#order_confirm').val(data['order'].status);
//                    var confi = $('.order_confirm').val();
//
//                    if(confi==2){
//                        $('#orderst').addClass('active');
//                    }else if(confi==1){
//                        $('#orderst').removeClass('active');
//                    }
//
//                    //----------------- Shipping Status ---------------
//                    $('#shipping_status').val(data['order'].shipping_status);
//                    var shi_confi = $('.shipping_status').val();
//
//                    if(shi_confi==2){
//                        $('#shipping_st').addClass('active');
//                    }else if(shi_confi==1){
//                        $('#shipping_st').removeClass('active');
//                    }
//
//
//                    //----------------- Final Status ---------------
//                    $('#final_step').val(data['order'].order_complete);
//                    var final_step = $('.final_step').val();
//
//                    if(final_step==2){
//                        $('#final_oder').addClass('active');
//                    }else if(final_step==1){
//                        $('#final_oder').removeClass('active');
//                    }



                }
            });

        }


    });
</script>


<!---------Axios Cart Count-------->
<script>
    function CountCart(data) {

        $("#smallcart").html(data);
        $("#cartCount").html(data);
    }

    function CountAllCartData(){

        $.ajax({
            url:"{{route('AxiosCartCount')}}",
            type:"GET",

            success:function(data){
                // console.log(data['count']);
                CountCart(data['count']);
            }
        });



        // axios.get('axios_cart_count')
        //     .then(function (response) {
        //         CountCart(response.data['count'])

        //     })
        //     .catch(function (error) {
        //         // handle error
        //         console.log('not found');
        //     })
    }

    CountAllCartData();
</script>

<!--------End Cart Count---------->


<!---------Axios Cart GET-------->
<script>
    function GetAllCart(data) {

        var	rows = '';
        var i = 0;
        $.each( data, function( key, value ) {

            rows = rows + '<tr>';
            rows = rows + '<td><img src="upload/Client/Product/'+value.options.image+'" alt="" width="50px" height="50px"></td>';
            rows = rows + '<td>'+value.qty+'</td>';
            rows = rows + '<td>'+value.name+'</td>';
            rows = rows + '<td>$'+value.price*value.qty+'</td>';
            rows = rows + '<td class="text-center">';
            rows = rows + '<a class="btn btn-sm btn-danger text-light" id="editRow" data-id="'+value.id+'"><i class="fa fa-times"></i></a>';
            rows = rows + '</td>';

            rows = rows + '</tr>';
        });
        $("#cardmini").html(rows);

    }

    function GetAllCartItem(){
        axios.get('axios_get_cart')
            .then(function (response) {
                GetAllCart(response.data['cart'])

            })
            .catch(function (error) {
                // handle error
                console.log('not found');
            })
    }

    GetAllCartItem();
</script>

<!--------End Cart Count---------->






@yield('client-footer')

<script>
    $(document).on('click','#delete',function(e){
        e.preventDefault();
        var link = $(this).attr('href');


        Swal.fire({
            title: 'Are you sure?',
            text: "You want to Delete This Item!",
            icon: 'warning',
            width: '400px',
            height:'400px',
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

<!-------------Data table --->

<script>
    $(document).ready(function() {
        $('#example').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        } );
    } );
</script>





<script type="text/javascript">
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

</html>