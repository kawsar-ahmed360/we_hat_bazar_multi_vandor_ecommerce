@extends('AdminDashboard.master')
@section('title') All Vandor Payment Withdrown Panding Request  @endsection
@section('admin-content')

    <div class="table-container">
        <div class="t-header">All Panding Request </div>
        <div class="">

            <div class="row gutters">



                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">



                    <table id="copy-print-csv" class="table custom-table">
                        <thead>
                        <tr>
                            <th>SL.</th>
                            <th>Shop Name</th>
                            <th>Mobile</th>
                            <th>Request Amount</th>
                            <th>Status</th>
                            <th>DateTime</th>
                            {{--<th>Status</th>--}}
                            {{--<th>Image</th>--}}
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach(@$panding_windrown_list as $key=>$panding)
                         <tr>
                             <td>{{@$key+1}}</td>
                             <td>{{@$panding->shop_id}}</td>
                             <td>{{@$panding->VandorInof->phone??'null'}}</td>
                             <td>৳{{@$panding->request_amoung??'null'}}</td>
                             <td>
                                 @if(@$panding->status==1)
                                     <span class="badge badge-warning">Panding</span>
                                     @endif
                             </td>
                             <td>{{date('Y M d',strtotime($panding->created_at))}}</td>
                             <td>
                                 <a href="{{route('VandorPanelPaymentWidrowPage',[@$panding->shop_id,@$panding->VandorInof->id])}}"><span class="badge badge-primary"> <i class="fa fa-user-circle"></i> Panel View</span></a>
                                 <a href="#"><span class="badge badge-danger"> <i class="fa fa-trash"></i> Delete</span></a>
                             </td>
                         </tr>

                            @endforeach


                        </tbody>
                    </table>
                </div>

            </div>






        </div>
    </div>


@endsection