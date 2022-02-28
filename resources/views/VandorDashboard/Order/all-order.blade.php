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


    <!-------------Modal View------------->

    <div class="modal fade bd-example-modal-lg ngmodalshow" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myLargeModalLabel">Order Status</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <table class="table table-striped">
                         <thead>
                             <tr>
                                 <th>Sl</th>
                                 <th>Product Name</th>
                                 <th>Squ</th>
                                 <th>Qty</th>
                                 <th>Total Amount</th>
                                 <th>Order Status</th>
                                 <th>Shipping Status</th>
                                 <th>Complete</th>
                             </tr>
                         </thead>

                        <tbody id="tbody">



                        </tbody>
                    </table>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    {{--<button type="button" class="btn btn-primary">Save</button>--}}
                </div>
            </div>
        </div>
    </div>


@section('footer')


    <script>
        function satausview(OrderId,ShopId){

            var Order_Id = OrderId;
            var Shop_Id = ShopId;

            var alerm =  confirm("Are you sure you want to preivew This Order Status!");
           if(alerm){

               $('.ngmodalshow').modal('show');

               $.ajax({
                   url: "{{route('VandorMouseOverPreview')}}",
                   type: "GET",
                   data: {Order_Id:Order_Id,Shop_Id:Shop_Id},

                   success:function (data) {




                       var tbody = document.getElementById('tbody');


                       $('#tbody').empty();

                       for(var i=0; i<data['order_details'].length; i++){
                           //---------------Main Tr---------
                           var n_tr = document.createElement('tr');
                           //---------------All Td---------
                           var n_td = document.createElement('td');
                           var n_td1 = document.createElement('td');
                           var n_td2 = document.createElement('td');
                           var n_td3 = document.createElement('td');
                           var n_td4 = document.createElement('td');
                           var n_td5 = document.createElement('td');
                           var n_td6 = document.createElement('td');
                           var n_td7 = document.createElement('td');
                            //---------------Dynamic Value---------
                           n_td.innerText=data['order_details'][i].id;
                           n_td1.innerText=data['order_details'][i].products.product_name;
                           n_td2.innerText=data['order_details'][i].products.product_sku;
                           n_td3.innerText=data['order_details'][i].qty;
                           n_td4.innerText=data['order_details'][i].subtotal;
                           //---------------Dynamic Value And Status And Css---------
                           if(data['order_details'][i].order_status==1){
                               //------------n_td5-------
                               n_td5_span = document.createElement('span');
                               n_td5_span.innerText="panding";
                               n_td5.appendChild(n_td5_span);
                               n_td5_span.style.background="red";
                               n_td5_span.style.padding="4px";
                               n_td5_span.style.color="white";
                               n_td5_span.style.borderRadius="5px";
                           }else{
                               //------------n_td5-------
                               n_td5_span = document.createElement('span');
                               n_td5_span.innerText="approve";
                               n_td5.appendChild(n_td5_span);
                               n_td5_span.style.background="green";
                               n_td5_span.style.padding="4px";
                               n_td5_span.style.color="white";
                               n_td5_span.style.borderRadius="5px";
                           }

                           if(data['order_details'][i].shipping_status==1) {
                               n_td6_span = document.createElement('span');
                               n_td6_span.innerText = "panding";
                               n_td6.appendChild(n_td6_span);
                               n_td6_span.style.background = "red";
                               n_td6_span.style.padding = "4px";
                               n_td6_span.style.color = "white";
                               n_td6_span.style.borderRadius = "5px";
                           }else{
                               n_td6_span = document.createElement('span');
                               n_td6_span.innerText = "Approve";
                               n_td6.appendChild(n_td6_span);
                               n_td6_span.style.background = "green";
                               n_td6_span.style.padding = "4px";
                               n_td6_span.style.color = "white";
                               n_td6_span.style.borderRadius = "5px";
                           }


                           if(data['order_details'][i].order_complete==1) {
                               n_td7_span = document.createElement('span');
                               n_td7_span.innerText = 'panding';
                               n_td7.appendChild(n_td7_span);
                               n_td7_span.style.background = "red";
                               n_td7_span.style.padding = "4px";
                               n_td7_span.style.color = "white";
                               n_td7_span.style.borderRadius = "5px";
                           }else{
                               n_td7_span = document.createElement('span');
                               n_td7_span.innerText = 'Approve';
                               n_td7.appendChild(n_td7_span);
                               n_td7_span.style.background = "green";
                               n_td7_span.style.padding = "4px";
                               n_td7_span.style.color = "white";
                               n_td7_span.style.borderRadius = "5px";
                           }
                           //----------td Append Tr---------
                           n_tr.appendChild(n_td);
                           n_tr.appendChild(n_td1);
                           n_tr.appendChild(n_td2);
                           n_tr.appendChild(n_td3);
                           n_tr.appendChild(n_td4);
                           n_tr.appendChild(n_td5);
                           n_tr.appendChild(n_td6);
                           n_tr.appendChild(n_td7);
                           //----------Tbody Append Tr---------
                           tbody.appendChild(n_tr);


                       }



                   }

               });
           }


        }
    </script>

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