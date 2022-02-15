@extends('AdminDashboard.master')
@section('title') All Vandor @endsection
@section('admin-content')

    <div class="table-container">
        <div class="t-header">All Vandor</div>
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
                                    <a style="display: inherit;margin: 5px;border-radius:3px" href="{{route('VandorViewDelete',[@$slider->shop_id,$slider->id])}}" class="btn btn-danger btn-sm "><i class="fa fa-trash"></i> Delete</a>



                                </div>
                            </div>
                        </td>
                    </tr>

                @endforeach


                </tbody>
            </table>
        </div>
    </div>


@endsection