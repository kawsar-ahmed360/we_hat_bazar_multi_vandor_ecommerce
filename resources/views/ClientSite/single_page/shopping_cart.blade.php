@extends('ClientSite.master')
@section('title') Shopping Cart Page @endsection

@section('client-content')




    {{--<section class="section-padding bg-dark inner-header">--}}
        {{--<div class="container">--}}
            {{--<div class="row">--}}
                {{--<div class="col-md-12 text-center">--}}
                    {{--<h1 class="mt-0 mb-3 text-white">Cart</h1>--}}
                    {{--<div class="breadcrumbs">--}}
                        {{--<p class="mb-0 text-white"><a href="#" class="text-white">Home</a> / <span class="text-success">Cart</span></p>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</section>--}}

    <div class="xs-breadcumb">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('MainIndex')}}"> Home</a></li>
                    <li class="breadcrumb-item"><a href="">Cart Page</a></li>

                </ol>
            </nav>
        </div>
    </div>


    <br>
    <br>

    <section class="cart-page section-padding">
        <div class="container">
            <div class="row">

                <div class="col-md-12">
                    <div class="">
                        <div class="table-responsive">
                            <table class="table cart_summary">
                                <thead>
                                <tr>
                                    <th class="cart_product text-center">Image</th>
                                    <th class="text-center">Description(Name)</th>
                                    <th class="text-center">Avail.</th>
                                    <th class="text-center">Unit price</th>
                                    <th class="text-center">Qty</th>
                                    <th class="text-center">Total</th>
                                    <th class="action">Remove(<i class="fa fa-remove"></i>)</th>
                                </tr>
                                </thead>
                                <tbody id="showCardPage">

                                 @include('ClientSite.Card_Ajax.card')


                                </tbody>

                                <tr>
                                    <td colspan="5" class="text-right"><strong>Are you gest</strong></td>
                                    <td><input type="checkbox" value="guest" name="guest" id="guest"></td>
                                </tr>

                            </table>
                        </div>

                        @if(Session::has('customer_id'))
                        <a href="{{route('CustomerCheckoutPage')}}" id="che">
                            <button style="width: 396px;margin-left: 721px;margin-bottom: 27px;background: #d400fe;"  class="btn btn-secondary btn-lg btn-block text-left" type="button"><span class="float-left"><i class="mdi mdi-cart-outline"></i> Proceed to Checkout </span><span class="float-right"><strong>Click</strong> <span class="mdi mdi-chevron-right"></span></span>
                            </button>

                        </a>
                        @else
                            <a href="{{route('CustomerLoginPage')}}" id="che">
                                <button style="width: 396px;margin-left: 721px;margin-bottom: 27px;background: #d400fe;" class="btn btn-secondary btn-lg btn-block text-left" type="button"><span class="float-left"><i class="mdi mdi-cart-outline"></i> Proceed to Checkout </span><span class="float-right"><strong>Click</strong> <span class="mdi mdi-chevron-right"></span></span>
                                </button>

                            </a>
                        @endif

                        <a href="{{route('CustomerCheckoutPage')}}" style="display:none;" id="gestcustomer">
                            <button style="width: 396px;margin-left: 721px;margin-bottom: 27px;background: #d400fe;" class="btn btn-secondary btn-lg btn-block text-left" type="button"><span class="float-left" ><i class="mdi mdi-cart-outline"></i> Proceed to Checkout </span><span class="float-right"><strong>Click</strong> <span class="mdi mdi-chevron-right"></span></span>
                            </button>

                        </a>

                        <br>


                    </div>


                </div>
            </div>
        </div>
    </section>


@section('client-footer')


    <script>
        $( window ).on("load", function() {
            $('.cd-dropdown').removeClass('dropdown-is-active');
            $('.cd-dropdown').css({
                "z-index":"9999"
            })

        });

    </script>


    <script>
        $('#guest').on('click',function(){
            if(this.checked){
                $('#gestcustomer').show();
                $('#che').hide();
            }else{
                $('#gestcustomer').hide();
                $('#che').show();
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
            axios.get('axios_cart_count')
                .then(function (response) {
                    CountCart(response.data['count'])

                })
                .catch(function (error) {
                    // handle error
                    console.log('not found');
                })
        }

        CountAllCartData();
    </script>





    <script>



      function decrement(ProId) {
          var rowId = ProId;



          $.ajax({
              url:"{{ route('ShoppingCartDecrement') }}",
              type:"GET",
              data:{rowId:rowId},

              success:function(data){
                  CountAllCartData();
                  GetAllCartItem();
                  $('#showCardPage').empty().html(data);



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
                      title: 'Successfully Updated'
                  })
              }
          })
      }


      function Increment(ProId) {
          var rowId = ProId;
          $.ajax({
              url:"{{ route('ShoppingCartIncrement') }}",
              type:"GET",
              data:{rowId:rowId},

              success:function(data){

                  CountAllCartData();
                  GetAllCartItem();
                  $('#showCardPage').empty().html(data);


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
                      title: 'Successfully Updated'
                  })
              }
          })
      }


      function RemoveCard(ProId) {
          var rowId = ProId;
          $.ajax({
              url:"{{ route('ShoppingCartRemove') }}",
              type:"GET",
              data:{rowId:rowId},

              success:function(data){

                  CountAllCartData();
                  GetAllCartItem();

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
                      title: 'Successfully Remove'
                  })

                  $('#showCardPage').empty().html(data);

              }
          })
      }




    </script>
@endsection


    @endsection