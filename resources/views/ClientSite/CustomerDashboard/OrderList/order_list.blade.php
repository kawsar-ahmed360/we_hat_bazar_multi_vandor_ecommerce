@extends('ClientSite.master')
@section('title') Order List @endsection

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
                                                <th>Order #</th>
                                                <th>Date Purchased</th>
                                                <th>Status</th>
                                                <th>Total</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @forelse(@$order as $order)
                                            <tr>
                                                <td>#{{@$order->orderId}}</td>
                                                <td>{{ $order->created_at->format('F d,Y') }}</td>
                                                <td>
                                                    @if($order->status==2)
                                                    <span class="badge badge-success">Approve</span>
                                                        @elseif($order->shipping_status==2)
                                                        <span class="badge badge-success">Shiped</span>
                                                       @elseif($order->order_complete==2)
                                                        <span class="badge badge-success">Order Complete</span>
                                                        @else
                                                        <span class="badge badge-info">In Progress</span>
                                                     @endif


                                                </td>
                                                <td>${{$order->total_ammount}}</td>
                                                <td style="display: flex;">
                                                    <a style="padding: 7px;border-radius: 5px 0px 6px;background: #9202ff;margin: 4px;color: white;" data-toggle="tooltip" data-placement="top" title="" href="{{route('customerOrderDetails',base64_encode($order->id))}}" data-original-title="View Detail" class="">
                                                        <i class="fa fa-eye"></i>
                                                    </a>

                                                    <a style="padding: 7px;border-radius: 5px 0px 6px;background: #d901fe;margin: 4px;color: white;" data-toggle="tooltip" data-placement="top" title="" href="{{route('customerOrderDetailsPdf',base64_encode($order->id))}}" data-original-title="View Detail" class="">
                                                        <i class="fa fa-print"></i>
                                                    </a>
                                                </td>
                                            </tr>

                                                @empty

                                                @endforelse


                                            </tbody>
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