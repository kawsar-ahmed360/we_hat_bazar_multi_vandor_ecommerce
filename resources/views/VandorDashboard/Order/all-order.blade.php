@extends('VandorDashboard.master')
@section('title') Approve Order List View @endsection
@section('vandor-content')

    <div class="row">
        <div class="col-md-12">
            <div class="table-container">
                <div class="t-header">All Order List </div>
                <div class="table-responsive">
                    <form action="{{route('VandorMultiOrderPrient')}}" method="POST" id="form">
                        @csrf
                        <table id="copy-print-csv"  class="table table-striped table-bordered dt-responsive nowrap">
                            {{--<input type="checkbox" name="types" value="color_print" style="margin-left: 399px;margin-top: 10px;position: absolute;border: 1px solid red;height: 28px;width: 30px;" title="color_print">--}}
                            <button style="margin-left: 293px;margin-top: 7px;position: absolute;border: 1px solid red;" class="btn btn-outline-dark" type="submit" id="subm">Multi-Print</button>
                            <thead>
                            <tr>
                                <th> All</th>
                                <th>SL.</th>
                                <th>OrderId</th>
                                <th>Cust Status</th>
                                <th>Name</th>
                                <th>Mobile</th>
                                <th>Payment</th>
                                <th>Total Am..</th>

                                {{--<th>Shipping</th>--}}
                                {{--<th>Complete</th>--}}
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody id="show_item_all">

                            @include('VandorDashboard.Order.OrderListAjax.order')
                            {{--@php $sl=1 @endphp--}}
                            {{--@foreach(@$order as $key=>$or)--}}

                                {{--@php--}}
                                    {{--$order_details = \App\Models\Client\OrderDetail::where('shop_id',$shop_i->shop_id)->where('order_id',$or->id)->get();--}}
                                    {{--dd($order_details);--}}
                                {{--@endphp--}}

                                {{--<tr>--}}

                                    {{--<td><input type="checkbox" name="prints[]" id="allchec" value="{{@$or->id}}" multiple></td>--}}
                                    {{--<td>{{$key+1}}</td>--}}
                                    {{--<td>#{{$or->orderId}}</td>--}}
                                    {{--@if(@$or->customer['password'])--}}
                                        {{--<td>Register Customer</td>--}}
                                    {{--@else--}}
                                        {{--<td>Guest</td>--}}
                                    {{--@endif--}}
                                    {{--<td>{{ @$or->customer['name'] }}</td>--}}
                                    {{--<td>{{ @$or->customer['mobile'] }}</td>--}}
                                    {{--<td>{{ @$or->payments['payment'] }}</td>--}}
                                    {{--<td>${{ @$or->total_ammount }}</td>--}}


                                    {{--@if(@$or->status==2)--}}
                                        {{--<td><span class="badge badge-success"  onclick="NotApprove('{{@$or->id}}')" ><i class="fa fa-check"></i></span></td>--}}
                                    {{--@elseif(@$or->status==1)--}}
                                        {{--<td><span class="badge badge-danger" onclick="Approve('{{@$or->id}}')"><i class="fa fa-close"></i></span></td>--}}
                                    {{--@endif--}}


                                    {{--@if(@$or->shipping_status==2)--}}
                                        {{--<td><span class="badge badge-info" style="border-radius: 7px 4px 8px 0px"  onclick="AdminShipNotApprove('{{@$or->id}}')" ><i style="font-size: 14px;" class="fa fa-car"></i></span></td>--}}
                                    {{--@elseif(@$or->shipping_status==1)--}}
                                        {{--<td> <span class="badge badge-danger" onclick="AdminShipApprove('{{@$or->id}}')"><i style="font-size: 14px;" class="fa fa-car"></i></span> </td>--}}
                                    {{--@endif--}}


                                    {{--@if(@$or->order_complete==2)--}}
                                        {{--<td><span class="badge badge-info" style="border-radius: 7px 4px 8px 0px" >Complete</span></td>--}}
                                    {{--@elseif(@$or->order_complete==1)--}}
                                        {{--<td><span class="badge badge-danger" style="border-radius: 7px 4px 8px 0px" onclick="CompleteOrder('{{@$or->id}}')"><i style="font-size: 14px;" class="fa fa-check-circle"></i></span></td>--}}
                                    {{--@endif--}}

                                    {{--<td>--}}
                                        {{--<a href="" style="background: #d9b400;padding: 7px;border-radius: 4px" class=""><i style="color:white" class="fa fa-eye"></i></a>--}}
                                        {{--<a href="" style="background: red;padding: 7px;border-radius: 4px" class=""><i style="color:white" class="fa fa-trash"></i></a>--}}
                                    {{--</td>--}}
                                    {{--<td>--}}
                                    {{--@if(@$or->status==1)--}}
                                    {{--<input type="button"  onclick="Approve('{{@$or->id}}')"  > Active--}}
                                    {{--@elseif(@$or->status==2)--}}
                                    {{--<input type="button"  onclick="NotApprove('{{@$or->id}}')"> Deactive--}}
                                    {{--@endif--}}
                                    {{--</td>--}}
                                    {{--<td>--}}

                                    {{--<a href="{{ route('CustomerOrderPDF',$or->id) }}" class="btn btn-primary btn-sm" title="Order Print"><i class="fa fa-print"></i></a>--}}
                                    {{--</td>--}}
                                {{--</tr>--}}



                            {{--@endforeach--}}


                            </tbody>

                        </table>


                    </form>
                </div>
            </div>

        </div>
    </div>


@section('footer')


    {{--<script>--}}
        {{--function Approve(id){--}}
            {{--var alerm =  confirm("Are you sure!");--}}
            {{--if(alerm){--}}


                {{--var id = id;--}}
                {{--$.ajax({--}}
                    {{--url:"{{route('VandorOrderFirstStatusApprove')}}",--}}
                    {{--type:"GET",--}}
                    {{--data:{id:id},--}}
                    {{--success:function (data) {--}}
                        {{--$('#show_item_all').empty().html(data);--}}

                        {{--window.location.reload();--}}

                        {{--const Toast = Swal.mixin({--}}
                                {{--toast: true,--}}
                                {{--position: 'top-end',--}}
                                {{--showConfirmButton: false,--}}
                                {{--timer: 3000,--}}
                                {{--timerProgressBar: true,--}}
                                {{--didOpen: (toast) => {--}}
                                {{--toast.addEventListener('mouseenter', Swal.stopTimer)--}}
                        {{--toast.addEventListener('mouseleave', Swal.resumeTimer)--}}
                    {{--}--}}
                    {{--})--}}

                        {{--Toast.fire({--}}
                            {{--icon: 'success',--}}
                            {{--title: 'Successfully Approve'--}}
                        {{--})--}}
                    {{--}--}}
                {{--})--}}
            {{--}--}}
        {{--}--}}
    {{--</script>--}}

    {{--<script>--}}
        {{--function NotApprove(id){--}}

            {{--var alerm =  confirm("Are you sure!");--}}
            {{--if(alerm){--}}

                {{--var id = id;--}}
                {{--$.ajax({--}}
                    {{--url:"{{route('AllCustomerNotApprove')}}",--}}
                    {{--type:"GET",--}}
                    {{--data:{id:id},--}}
                    {{--success:function (data) {--}}
                        {{--$('#show_item_all').empty().html(data);--}}

                        {{--window.location.reload();--}}
                        {{--const Toast = Swal.mixin({--}}
                                {{--toast: true,--}}
                                {{--position: 'top-end',--}}
                                {{--showConfirmButton: false,--}}
                                {{--timer: 3000,--}}
                                {{--timerProgressBar: true,--}}
                                {{--didOpen: (toast) => {--}}
                                {{--toast.addEventListener('mouseenter', Swal.stopTimer)--}}
                        {{--toast.addEventListener('mouseleave', Swal.resumeTimer)--}}
                    {{--}--}}
                    {{--})--}}

                        {{--Toast.fire({--}}
                            {{--icon: 'success',--}}
                            {{--title: 'Successfully Deactive'--}}
                        {{--})--}}
                    {{--}--}}
                {{--})--}}
            {{--}--}}
        {{--}--}}
    {{--</script>--}}

    {{--<!---------------Shipping Status------------------>--}}

    {{--<script>--}}
        {{--function AdminShipApprove(id) {--}}
            {{--var alerm = confirm("Are you sure!");--}}
            {{--if(alerm){--}}
                {{--var id = id;--}}
                {{--$.ajax({--}}
                    {{--url:"{{route('AllCustomerShippingApprove')}}",--}}
                    {{--type: "get",--}}
                    {{--data:{id:id},--}}
                    {{--success:function (data) {--}}
                        {{--window.location.reload();--}}
                        {{--$('#show_item_all').empty().html(data);--}}
                        {{--const Toast = Swal.mixin({--}}
                                {{--toast: true,--}}
                                {{--position: 'top-end',--}}
                                {{--showConfirmButton: false,--}}
                                {{--timer: 3000,--}}
                                {{--timerProgressBar: true,--}}
                                {{--didOpen: (toast) => {--}}
                                {{--toast.addEventListener('mouseenter', Swal.stopTimer)--}}
                        {{--toast.addEventListener('mouseleave', Swal.resumeTimer)--}}
                    {{--}--}}
                    {{--});--}}

                        {{--Toast.fire({--}}
                            {{--icon: 'success',--}}
                            {{--title: 'Successfully Shipment Deactive'--}}
                        {{--})--}}
                    {{--}--}}
                {{--})--}}

            {{--}--}}

        {{--}--}}
    {{--</script>--}}





    {{--<script>--}}
        {{--function AdminShipNotApprove(id) {--}}

            {{--var alerm = confirm("Are you sure!");--}}
            {{--if (alerm) {--}}
                {{--var id = id;--}}
                {{--$.ajax({--}}
                    {{--url: "{{route('AllCustomerShippingNotApprove')}}",--}}
                    {{--type: "GET",--}}
                    {{--data: {id: id},--}}
                    {{--success: function (data) {--}}
                        {{--$('#show_item_all').empty().html(data);--}}
                        {{--window.location.reload();--}}

                        {{--const Toast = Swal.mixin({--}}
                                {{--toast: true,--}}
                                {{--position: 'top-end',--}}
                                {{--showConfirmButton: false,--}}
                                {{--timer: 3000,--}}
                                {{--timerProgressBar: true,--}}
                                {{--didOpen: (toast) => {--}}
                                {{--toast.addEventListener('mouseenter', Swal.stopTimer)--}}
                        {{--toast.addEventListener('mouseleave', Swal.resumeTimer)--}}
                    {{--}--}}
                    {{--});--}}

                        {{--Toast.fire({--}}
                            {{--icon: 'success',--}}
                            {{--title: 'Successfully Shipment Deactive'--}}
                        {{--})--}}
                    {{--}--}}
                {{--})--}}
            {{--}--}}
        {{--}--}}
    {{--</script>--}}


    {{--<script>--}}


        {{--function CompleteOrder(id) {--}}

            {{--var alerm = confirm("Are you sure!");--}}
            {{--if (alerm) {--}}
                {{--var id = id;--}}
                {{--$.ajax({--}}
                    {{--url: "{{route('AllCustomerOrderComplete')}}",--}}
                    {{--type: "GET",--}}
                    {{--data: {id:id},--}}
                    {{--success: function (data) {--}}
                        {{--$('#show_item_all').empty().html(data);--}}
                        {{--window.location.reload();--}}

                        {{--const Toast = Swal.mixin({--}}
                                {{--toast: true,--}}
                                {{--position: 'top-end',--}}
                                {{--showConfirmButton: false,--}}
                                {{--timer: 3000,--}}
                                {{--timerProgressBar: true,--}}
                                {{--didOpen: (toast) => {--}}
                                {{--toast.addEventListener('mouseenter', Swal.stopTimer)--}}
                        {{--toast.addEventListener('mouseleave', Swal.resumeTimer)--}}
                    {{--}--}}
                    {{--});--}}

                        {{--Toast.fire({--}}
                            {{--icon: 'success',--}}
                            {{--title: 'Successfully Shipment Deactive'--}}
                        {{--})--}}
                    {{--}--}}
                {{--})--}}
            {{--}--}}
        {{--}--}}



    {{--</script>--}}

@endsection


@endsection