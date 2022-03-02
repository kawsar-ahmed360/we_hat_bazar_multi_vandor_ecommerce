@extends('AdminDashboard.master')
@section('title') All Vandor Payment Withdrown Panding Request  @endsection
@section('admin-content')



    <!-- Row start -->
    <div class="row gutters">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="documents-section">

                <!-- Row start -->
                <div class="row no-gutters">
                    <div class="col-xl-2 col-lg-2 col-md-3 col-sm-3 col-4">

                        <div class="docs-type-container">

                            <div class="">
                                <img style="padding-left: 10px;padding-top: 10px;" src="{{(@$vandor->shop_image)?url('upload/Vandor/shop_image/'.@$vandor->shop_image):''}}" alt="">
                            </div>

                            <div class="docTypeContainerScroll">

                                <div class="docs-block">
                                    <h5>Favourites</h5>

                                    <div class="doc-labels">
                                        <a href="#" class="">
                                            <i class=""></i>৳ withdraw Panel
                                        </a>

                                        <a href="#" class="active">
                                            <i class=""></i>Panding Request
                                        </a>

                                        <a href="{{route('VandorPanelPaymentWidrowPage',[@$shop_id,@$user_id])}}" class="">
                                            <i class="fa fa-backward"></i> back
                                        </a>
                                    </div>

                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="col-xl-10 col-lg-10 col-md-9 col-sm-9 col-8">

                        <div class="documents-container">
                            <div class="modal fade" id="addNewDocument" tabindex="-1" role="dialog" aria-labelledby="addNewDocumentLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="addNewDocumentLabel">Add Document</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="row gutters">
                                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                    <div class="form-group">
                                                        <label for="docTitle">Document Title</label>
                                                        <input type="text" class="form-control" id="docTitle" placeholder="Task Title">
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                    <div class="form-group">
                                                        <label for="dovType">Document Type</label>
                                                        <input type="text" class="form-control" id="dovType" placeholder="Task Title">
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                    <div class="form-group">
                                                        <label for="addedDate">Created On</label>
                                                        <div class="custom-date-input">
                                                            <input type="text" name="" class="form-control datepicker" id="addedDate" placeholder="10/10/2019">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <div class="form-group mb-0">
                                                        <label for="docDetails">Document Details</label>
                                                        <textarea class="form-control" id="docDetails"></textarea>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer custom">
                                            <div class="left-side">
                                                <button type="button" class="btn btn-link danger btn-block" data-dismiss="modal">Cancel</button>
                                            </div>
                                            <div class="divider"></div>
                                            <div class="right-side">
                                                <button type="button" class="btn btn-link success btn-block">Add</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="documents-header">
                                <h3><font style="text-transform: capitalize;">{{@$vandor->shop_name??"demo"}}</font> <span>{{@$vandor->shop_id??"null"}}</span></h3>

                            </div>


                            <style>



                                .btn_es {

                                    margin: 10px;
                                    padding: 30px;
                                    text-align: center;
                                    text-transform: uppercase;
                                    position: fixed;
                                    height: 156px;
                                    width: 257px;
                                    transition: 0.5s;
                                    background-size: 200% auto;
                                    color: white;
                                    /* text-shadow: 0px 0px 10px rgba(0,0,0,0.2);*/
                                    box-shadow: 0 0 20px #eee;
                                    border-radius: 10px;
                                }

                                /* Demo Stuff End -> */

                                /* <- Magic Stuff Start */

                                .btn_es:hover {
                                    background-position: right center; /* change the direction of the change here */
                                }

                                .btn-1 {
                                    /*background-image: linear-gradient(to right, #f6d365 0%, #fda085 51%, #f6d365 100%);*/
                                    background: linear-gradient(90deg, #ee0000 0%, #ffb40b 100%);
                                }

                                .btn-2{
                                    background: linear-gradient(90deg, #ef0c96 0%, #00f1f1 100%);
                                }

                                .btn-3{
                                    background: linear-gradient(90deg, #0da1c1 0%, #00fff3 100%);

                                }
                                .btn-4{
                                    background: linear-gradient(90deg, #733030db 0%, #fe0b0b 100%);

                                }

                                .btn-5{
                                    background: linear-gradient(90deg, #ffb735 0%, #88a904 100%);

                                }

                            </style>

                            <div class="documentsContainerScroll">
                                <div class="documents-body">
                                    <!-- Row start -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h4 style="text-align: center;text-transform: uppercase;font-family: cursive;color: #eb1145;padding: 12px;">Total Amount: @if(@$approve_amount) ৳{{@$with_out_comission-$approve_amount}} @else {{@$with_out_comission??'0'}} @endif</h4>
                                        </div>
                                        {{--<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">--}}
                                        {{--<a class="btn_es btn-1">Hover me</a>--}}
                                        {{--<div class="doc-block" style=" box-shadow: 9px 6px 2px 1px #ea9f4d;">--}}
                                        {{--<div class="doc-icon" style="border: 1px solid #646567;">--}}
                                        {{--<img style="height: 94px;width: 88px;" src="{{asset('backend/taka.png')}}" alt="Doc Icon" />--}}
                                        {{--</div>--}}
                                        {{--<div class="doc-title" style="font-family: cursive;font-size: 19px;margin: 0px;">Overall Income</div>--}}
                                        {{--<p style="font-family: cursive;font-size: 23px;">$1200</p>--}}
                                        {{--</div>--}}


                                        {{--</div>--}}

                                        {{--<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">--}}
                                        {{--<a class="btn_es btn-1">Hover me</a>--}}
                                        {{--<div class="doc-block" style=" box-shadow: 9px 6px 2px 1px #ea9f4d;">--}}
                                        {{--<div class="doc-icon" style="border: 1px solid #646567;">--}}
                                        {{--<img style="height: 94px;width: 88px;" src="{{asset('backend/taka.png')}}" alt="Doc Icon" />--}}
                                        {{--</div>--}}
                                        {{--<div class="doc-title" style="font-family: cursive;font-size: 19px;margin: 0px;">Overall Income</div>--}}
                                        {{--<p style="font-family: cursive;font-size: 23px;">$1200</p>--}}
                                        {{--</div>--}}


                                        {{--</div>--}}

                                        <input type="hidden" value="{{$shop_id}}" id="shop_id">
                                        <input type="hidden" value="{{$user_id}}" id="user_id">

                                        <div class="table-responsive">
                                            <div class="container">
                                                <table id="copy-print-csv" class="table custom-table">
                                                    <thead>
                                                    <tr>
                                                        <th>SL.</th>
                                                        <th>Shop Name</th>
                                                        <th>Request Amount</th>
                                                        <th>Status</th>
                                                        <th>Action</th>

                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    @foreach(@$panding_list as $key=>$pand)
                                                        <tr>
                                                            <td>{{@$key+1}}</td>
                                                            <td>{{@$pand->shop_id}}</td>
                                                            <td>৳{{@$pand->request_amoung}}</td>
                                                            <td><span class="badge badge-warning">Panding</span></td>
                                                             <td>
                                                                 <a style="color:white" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#basicModalPay{{@$pand->id}}"><i class="fa fa-check"></i> Final Step</a>
                                                             </td>


                                                        </tr>

                                                        @endforeach


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
                <!-- Row end -->

            </div>
        </div>
    </div>
    <!-- Row end -->


    @foreach(@$panding_list as $key=>$pand)
    <!-- Modal -->
    <div class="modal fade" id="basicModalPay{{@$pand->id}}" tabindex="-1" role="dialog" aria-labelledby="basicModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">

                    <input type="hidden" value="@if(@$approve_amount){{@$with_out_comission-$approve_amount}}@else{{@$with_out_comission??'0'}}@endif" id="VandorAmount">

                    <h5 class="modal-title" id="basicModalLabel">Total Amount: ৳{{@$with_out_comission}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('VandorPanelPaymentWithdrawPaySubmit')}}" method="post">
                        @csrf

                        <input type="hidden" value="@if(@$approve_amount){{@$with_out_comission-$approve_amount}}@else{{@$with_out_comission??'0'}}@endif" name="vandor_total_amount">
                        <input type="hidden" value="{{@$pand->id}}" name="EditeId">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Request Amount</label>
                                <input type="text" readonly class="form-control" name="request_amount" value="{{@$pand->request_amoung}}" required id="request_amount" placeholder="Etner Amount">
                            </div>

                            <div class="col-md-12" style="margin-top: 10px;">
                                <label for="">Pay Amount</label>
                                <input type="text" class="form-control" name="pay_amount" required id="pay_amount" placeholder="Etner Amount">
                            </div>
                        </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>

                    </form>

                </div>

            </div>
        </div>
    </div>

    @endforeach


    @section('footer')

        <script>
            $('#pay_amount').on('keyup',function () {
                var Vandor_Amount = $('#VandorAmount').val();
                var requestAmount = $('#request_amount').val();
                var PayAmount = $('#pay_amount').val();

                if(parseInt(PayAmount)>parseInt(Vandor_Amount)){
                    $('#pay_amount').val('');
                    alert('Your Current Balance Is Low');
                }else if(parseInt(PayAmount)>parseInt(requestAmount)){
                    $('#pay_amount').val('');
                    alert('Your Current Request Balance Is Low');
                }


            })
        </script>

    @endsection


@endsection