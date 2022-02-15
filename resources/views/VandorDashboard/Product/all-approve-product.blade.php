@extends('VandorDashboard.master')
@section('title') Approve Product List View @endsection
@section('vandor-content')

    <div class="container" style="padding: 10px">
        <div class="table-container" style="padding: 10px">
            <div class="t-header"> Approve Product List </div>
            <div class="table-responsive">
                <table id="copy-print-csv" class="table custom-table">
                    <thead>
                    <tr>
                        <th>SL.</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Section</th>
                        <th>Category</th>
                        <th>Status</th>
                        {{--<th>Image</th>--}}
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach(@$product as $key=>$index)
                        @php
                            $sec = json_decode($index->section_id);
                            $section = App\Models\Admin\SectionManage::whereIn('id',$sec)->get();

                             $colors = json_decode($index->color_id);
                            $color = App\Models\Admin\ColorManage::whereIn('id',$colors)->get();
                        @endphp



                        <tr class="odd gradeX">
                            <td>{{ @$key + 1 }}</td>
                            <td>{{ @$index->product_name }}</td>
                            <td>{{ @$index->product_price }} Taka </td>
                            <td>@foreach(@$section as $key=>$se) @if(@$key%2==0) <span class="badge badge-success">{{@$se->section_name}}</span> @else <span class="badge badge-secondary">{{@$se->section_name}}</span> @endif @endforeach</td>
                            <td>{{@$index->Category->category_name??'null'}}</td>
                            {{--<td><img style="width: 100px" src="{{(@$index->image)?url('upload/Client/Product/'.@$index->image):''}}" alt=""></td>--}}
                            <td>
                                @if(@$index->status=='1')
                                    <span class="badge badge-success">Active</span>
                                @else
                                    <span class="badge badge-danger">Deactive</span>
                                @endif
                            </td>

                            {{--                        <td><img src="{{ asset('upload/Client/Category/'.$category->image) }}" class="img-thumbnail" width="100" height="100" /></td>--}}
                            <td style="text-align: center;">




                                {{--<a  href="#" id="oncli" class="btn btn-primary btn-sm"><i class="fa fa-plus-circle"></i>Offer</a>--}}

                                <div class="btn-group">
                                    <button class="btn btn-primary btn-sm" type="button">
                                        Action
                                    </button>
                                    <button type="button" class="btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a style="display: inherit;margin: 5px;border-radius:3px" href="" class="btn btn-info btn-sm "><i class="fa fa-edit"></i> Edit</a>
                                        <a style="display: inherit;margin: 5px;border-radius:3px" href="" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>
                                        <a style="display: inherit;margin: 5px;border-radius:3px" href="" class="btn btn-success btn-sm"><i class="fa fa-plus-circle"></i> Details Add</a>
                                        <a style="display: inherit;margin: 5px;border-radius:3px;background: #c6d103;" href="" class="btn btn-durk btn-sm"><i class="fa fa-gift"></i> %Discount</a>
                                        {{--<a style="display: inherit;margin: 5px;border-radius:3px;background: #03a796;color:white" href="" class="btn btn-durk btn-sm"><i class="fa fa-plus-circle"></i> Color Image Linkup</a>--}}
                                    </div>
                                </div>

                            </td>
                        </tr>

                    @endforeach


                    </tbody>
                </table>
            </div>
        </div>

    </div>

@endsection