@extends('UserDashboard.master')
@section('title') All Slider @endsection
@section('user-content')

    <div class="table-container">
        <div class="t-header">All Slider  <a href="{{route('UserSliderCreate')}}"><span style="float: right;cursor:pointer" class="btn btn-success btn-sm">Add Slider</span></a></div>
        <div class="table-responsive">
            <table id="copy-print-csv" class="table custom-table">
                <thead>
                <tr>
                    <th>SL.</th>
                    <th>Created</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($slider as $key=>$slider)
                    <tr class="odd gradeX">
                        <td>{{ @$key + 1 }}</td>

                        <td class="center">
                            @if(@$slider->user_id=='')
                                <span class="badge badge-success">SuperAdmin</span>
                            @else
                                <span class="badge badge-warning">{{@$info->Role->role_name}} ({{@$info->name}})</span>
                            @endif
                        </td>


                        <td><img src="{{ asset('upload/Client/Slider/'.$slider->image) }}" class="img-thumbnail" width="100" height="100" /></td>
                        <td style="text-align: center;">


                            <a href="{{route('UserSliderEdite',$slider->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>
                            <a  href="{{route('UserSliderDelete',$slider->id)}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>

                        </td>
                    </tr>

                @endforeach


                </tbody>
            </table>
        </div>
    </div>


@endsection