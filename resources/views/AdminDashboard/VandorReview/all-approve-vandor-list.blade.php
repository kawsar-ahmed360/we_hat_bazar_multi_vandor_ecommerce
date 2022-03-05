@extends('AdminDashboard.master')
@section('title') All Approve Vandor @endsection
@section('admin-content')

    <div class="table-container">
        <div class="t-header">All Approve Vandor</div>
        <div class="table-responsive">
            <table id="copy-print-csv" class="table custom-table">
                <thead>
                <tr>
                    <th>SL.</th>
                    <th>Shop Id</th>
                    <th>Shop Name</th>
                    <th>Owner Name</th>
                    <th>Owner Phone</th>
                    <th>Image</th>
                    <th>Review</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($vandor as $key=>$slider)

                    <tr class="odd gradeX">
                        <td>{{ @$key + 1 }}</td>


                        <td><span class="badge badge-info">{{@$slider->shop_id}}</span></td>

                        <td>{{@$slider->shop_name??"null"}}</td>
                        <td>{{@$slider->f_name??'null'}}</td>
                        <td>{{@$slider->phone??'null'}}</td>
                        <td><img src="{{(@$slider->shop_image)?url('upload/Vandor/shop_image/'.$slider->shop_image):''}}" alt=""></td>

                        <td>
                            @if(@$slider->super_admin_status==0)
                                <span class="badge badge-warning">Panding</span>
                            @else
                                <span class="badge badge-success">Approve</span>
                            @endif

                        </td>


                        <td style="text-align: center;">



                            <div class="btn-group">
                                <button class="btn btn-primary btn-sm" type="button">
                                    Action
                                </button>
                                <button type="button" class="btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <div class="dropdown-menu">
                                    <a style="display: inherit;margin: 5px;border-radius:3px" href="{{route('VandorViewInformation',@$slider->shop_id)}}" class="btn btn-info btn-sm "><i class="fa fa-eye"></i> View Information</a>
                                    <a style="display: inherit;margin: 5px;border-radius:3px" href="{{route('VandorPanel',@$slider->shop_id)}}" class="btn btn-secondary btn-sm"><i class="fa fa-user"></i> Vandor Panel</a>
                                    {{--<a style="display: inherit;margin: 5px;border-radius:3px" href="" class="btn btn-success btn-sm"><i class="fa fa-plus-circle"></i> Details Add</a>--}}
                                    <a style="display: inherit;margin: 5px;border-radius:3px" href="{{route('VandorStatusPanding',[@$slider->shop_id,$slider->id])}}" class="btn btn-warning btn-sm "><i class="fa fa-arrow-down"></i> Panding</a>
                                    <a style="display: inherit;margin: 5px;border-radius:3px;color:white" data-toggle="modal" data-target="#basicModal{{@$slider->shop_id}}" class="btn btn-secondary btn-sm "><i class="fa fa-arrow-down"></i> Sequence</a>
                                </div>
                            </div>
                        </td>
                    </tr>

                @endforeach


                {{--href="{{route('VandorStatusSequence',[@$slider->shop_id,$slider->id])}}"--}}


                </tbody>
            </table>
        </div>
    </div>


    @foreach($vandor as $key=>$slider)
    <!-- Modal -->
    <div class="modal fade" id="basicModal{{@$slider->shop_id}}" tabindex="-1" role="dialog" aria-labelledby="basicModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="basicModalLabel">Sequence</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="{{route('VandorStatusSequence',[@$slider->shop_id,$slider->id])}}" method="post">
                        @csrf

                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Sequence</label>
                                <input type="text" class="form-control" value="{{@$slider->seq}}" name="seq">
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


@endsection