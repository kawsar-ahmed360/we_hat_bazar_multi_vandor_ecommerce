@extends('ClientSite.master')
@section('title') Order Details @endsection

@section('client-content')


    <div class="xs-breadcumb">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('MainIndex')}}"> Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="">My Profile</a></li>

                </ol>
            </nav>
        </div>
    </div>

    <br>



    <section class="account-page section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <div class="card account-left">


                                @include('ClientSite.CustomerDashboard.Menu.menu')

                            </div>
                        </div>


                        <div class="col-md-8">

                            <div class="card card-body account-right">
                                <div class="widget">
                                    <div class="section-header">
                                        <h5 class="heading-design-h5"> Order List </h5>
                                    </div>
                                    <div class="order-list-tabel-main table-responsive">
                                        <table id="example" class="datatabel table table-striped table-bordered order-list-tabel" width="100%" cellspacing="0">
                                            <thead>
                                            <tr>
                                                <th>SQU</th>
                                                <th>Product Name</th>
                                                <th>Carat</th>
                                                <th>Qty</th>
                                                <th>Price</th>
                                                <th>Discount</th>


                                            </tr>
                                            </thead>
                                            <tbody>
                                            @forelse(@$order_details as $order)
                                                <tr>

                                                    <td>#{{@$order->products['product_sku']}}</td>
                                                    <td>{{@$order->products['product_name']}}</td>
                                                    <td>{{@$order->products['carat']}}</td>

                                                    <td>{{@$order->qty}}</td>
                                                    <td>৳{{@$order->product_price}}</td>
                                                    <td>@if(@$order->products['discount']) {{@$order->products['discount']}} @else 0 @endif%</td>


                                                </tr>

                                            @empty

                                            @endforelse

                                            </tbody>


                                            <tr>
                                                <td colspan="4" class="text-right">Payment Type</td>
                                                <td colspan="2">@if(@$order->orders->payments['payment']!=null) {{@$order->orders->payments['payment']}} @else Null @endif</td>

                                            </tr>

                                            <tr>
                                                <td colspan="4" class="text-right">Shipping Charge </td>
                                                <td colspan="2">৳@if(@$order->orders['shipment_amount']!=null) {{@$order->orders['shipment_amount']}} @else Null @endif</td>

                                            </tr>

                                            <tr>
                                                <td colspan="4" class="text-right">Shipping </td>
                                                <td colspan="2">@if(@$order->orders['shipment_name']!=null) {{@$order->orders['shipment_name']}} @else Null @endif</td>

                                            </tr>


                                            <tr>
                                                <td colspan="4" class="text-right">Coupon </td>
                                                <td colspan="2">@if(@$order->orders['coupon']!=null) {{@$order->orders['coupon']}} @else Null @endif</td>

                                            </tr>






                                            <tr>
                                                <td colspan="4" class="text-right">Total Amount</td>
                                                <td colspan="2">৳@if(@$order->orders['total_ammount']) {{@$order->orders['total_ammount']}} @else Null @endif</td>

                                            </tr>

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@section('client-footer')

    <script>
        $( window ).on("load", function() {
            $('.cd-dropdown').removeClass('dropdown-is-active');
        });

    </script>

@endsection

@endsection