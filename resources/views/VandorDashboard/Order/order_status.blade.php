@extends('VandorDashboard.master')
@section('title') Order Status Page @endsection
@section('vandor-content')

    <div class="row">
        <div class="col-md-12">
            <div class="table-container">
                <div style="padding: 16px 10px 0px 10px;" class="t-header">Order Status List  <strong style="color:red">OderId: #{{@$order->orderId}}</strong></div>
                <div style="padding: 6px 10px;" class="t-header">Customer Name  <strong style="color:red">{{@$order->customer->name}}</strong></div>
                <div style="padding: 0px 10px;" class="t-header">Customer Mobile  <strong style="color:red">{{@$order->customer->mobile}}</strong></div>
                <div class="table-responsive" style="margin-top: 20px">
                    {{--<form action="{{route('MultiOrderPront')}}" method="POST" id="form">--}}
                        {{--@csrf--}}
                        <table   class="table table-striped table-bordered dt-responsive nowrap">
                            {{--<input type="checkbox" name="types" value="color_print" style="margin-left: 399px;margin-top: 10px;position: absolute;border: 1px solid red;height: 28px;width: 30px;" title="color_print">--}}
                            {{--<button style="margin-left: 293px;margin-top: 7px;position: absolute;border: 1px solid red;" class="btn btn-outline-dark" type="submit" id="subm">Multi-Print</button>--}}
                            <thead>
                            <tr>

                                <th>SL.</th>
                                <th>Product Name</th>
                                <th>Squ</th>
                                <th>Qty</th>
                                <th>Payment</th>
                                <th>Total Amount</th>

                                <th>Status</th>
                                <th>Shipping Status</th>
                                <th>Complete</th>
                            </tr>
                            </thead>
                            <tbody >

                           @foreach(@$order_details as $key=>$order)
                            <tr>
                                <td>{{@$key+1}}</td>
                                <td>{{@$order->products->product_name}}</td>
                                <td>{{@$order->products->product_sku}}</td>
                                <td>{{@$order->qty}}</td>
                                <td>{{@$order->orders->payments['payment']}}</td>
                                <td>{{@$order->subtotal}}</td>
                                <td>
                                   @if(@$order->order_status==1)
                                        <a href="{{route('VandorOrderStatusApprove',[@$order->id,$info->shop_id])}}"><span class="badge badge-success">Click Approve</span></a>
                                       @else
                                        <a href="{{route('VandorOrderStatusPanding',[@$order->id,$info->shop_id])}}"> <span class="badge badge-warning">Already Approve</span></a>
                                    @endif
                                </td>

                                <td>
                                    @if(@$order->order_status==2)
                                    @if(@$order->shipping_status==1)
                                        <a href="{{route('VandorShippingStatusApprove',[@$order->id,$info->shop_id])}}"><span class="badge badge-success">Click Approve</span></a>
                                    @else
                                        <a href="{{route('VandorShippingStatusPanding',[@$order->id,$info->shop_id])}}"> <span class="badge badge-warning">Already Approve</span></a>
                                    @endif
                                        @else
                                        <a style="opacity: 0.5"><span class="badge badge-success">Click Approve</span></a>
                                    @endif
                                </td>

                                <td>
                                    @if(@$order->order_status==2 && @$order->shipping_status==2)
                                    @if(@$order->order_complete==1)
                                        <a href="{{route('VandorCompleteStatusApporve',[@$order->id,$info->shop_id])}}"><span class="badge badge-success">Click Approve</span></a>
                                    @else
                                        <a href="{{route('VandorCompleteStatusPanding',[@$order->id,$info->shop_id])}}"><span class="badge badge-warning">Already Approve</span></a>
                                    @endif
                                        @else
                                        <a style="opacity: 0.5"><span class="badge badge-success">Click Approve</span></a>
                                    @endif
                                </td>
                            </tr>

                           @endforeach


                            </tbody>

                        </table>


                    {{--</form>--}}
                </div>
            </div>

        </div>
    </div>

@endsection