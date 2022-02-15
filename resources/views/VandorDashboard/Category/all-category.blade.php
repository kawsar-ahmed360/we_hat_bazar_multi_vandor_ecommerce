@extends('VandorDashboard.master')
@section('title') Category View @endsection
@section('vandor-content')

    <div class="container" style="padding: 10px">
        <div class="table-container" style="padding: 10px">
            <div class="t-header">All Category </div>
            <div class="table-responsive">
                <table id="copy-print-csv" class="table custom-table">
                    <thead>
                    <tr>
                        <th>SL.</th>
                        <th>Category Name</th>
                        <th>Image</th>

                        {{--<th>Image</th>--}}
                        {{--<th>Action</th>--}}
                    </tr>
                    </thead>
                    <tbody>

                    @if(@$vandor_category!=null)
                        @foreach(@$category as $key=>$cat)
                            <tr>
                        <td>{{@$key+1}}</td>
                        <td>{{@$cat->category_name}}</td>
                        <td><img style="width: 50px" src="{{(@$cat->image)?url('upload/Client/Category/'.@$cat->image):''}}" alt=""></td>
                            </tr>
                        @endforeach
                        @else

                        @endif
                        {{--<td>1</td>--}}


                    </tbody>
                </table>
            </div>
        </div>

    </div>

    @endsection