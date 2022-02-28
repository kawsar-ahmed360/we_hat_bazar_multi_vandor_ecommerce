@extends('VandorDashboard.master')
@section('title') Payment Withdraws Approve Request @endsection
@section('vandor-content')

    <div class="container" style="padding: 10px">
        <div class="table-container" style="padding: 10px">
            <div class="t-header">All Payment Withdraws Approve Request </div>
            <div class="table-responsive">
                <table id="copy-print-csv" class="table custom-table">
                    <thead>
                    <tr>
                        <th>SL.</th>
                        <th>Shop Name</th>
                        <th>Request Amount</th>
                        <th>Approve Amount</th>
                        <th>Payment</th>
                        <th>Number</th>
                        <th>Status</th>
                        <th>Message</th>

                        {{--<th>Image</th>--}}
                        {{--<th>Action</th>--}}
                    </tr>
                    </thead>
                    <tbody>

                    @foreach(@$panding_request as $key=>$panding)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{@$info->shop_id}}</td>
                            <td>৳{{@$panding->request_amoung}}</td>
                            <td>৳{{@$panding->approve_amount??'null'}}</td>
                            <td>{{@$panding->payment}}</td>
                            @if(@$panding->payment=='Bkash')
                                <td>{{@$panding->bkash_number}}</td>
                            @elseif(@$panding->payment=='Nagad')
                                <td>{{@$panding->nagad_number}}</td>
                            @elseif(@$panding->payment=='Rocket')
                                <td>{{@$panding->rocket_number}}</td>
                            @elseif(@$panding->payment=='bank_account_number')
                                <td>{{@$panding->bank_account_number}}</td>
                            @endif

                            @if($panding->status==2)
                                <td><span class="badge badge-success">Approve</span></td>
                            @endif
                            <td><a  data-toggle="modal" data-target="#basicModal{{$panding->id}}"><i  @if($panding->message==null) style="font-size: 26px;text-align: center;color:red"  @else style="font-size: 26px;text-align: center;color:forestgreen" @endif class="fa fa-envelope"></i></a> </td>
                        </tr>



                    @endforeach


                    </tbody>
                </table>
            </div>
        </div>

    </div>


    @foreach(@$panding_request as $key=>$panding)
        <!-- Modal -->
        <div class="modal fade" id="basicModal{{$panding->id}}" tabindex="-1" role="dialog" aria-labelledby="basicModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="basicModalLabel">Message</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <textarea class="form-control" id="" cols="30" rows="10">{!! @$panding->message !!}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        {{--<button type="button" class="btn btn-primary">Save</button>--}}
                    </div>
                </div>
            </div>
        </div>

    @endforeach

@endsection