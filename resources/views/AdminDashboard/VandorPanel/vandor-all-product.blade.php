@extends('AdminDashboard.master')
@section('title') Vandor Panel All Product @endsection
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
                                        <a href="#" class="@if(Request::routeIs('VandorPanelProductAdd')) @else'active'@endif">
                                            <i class="fa fa-user"></i> Panel View
                                        </a>


                                        <a href="{{route('VandorPanelProductAdd',@$vandor->shop_id)}}" class="{{ Request::routeIs('VandorPanelProductAdd') ? 'active' : '' }}">
                                            <i class="fa fa-shopping-cart"></i> Add Product
                                        </a>

                                        <a href="{{route('VandorPanelProductAll',@$vandor->shop_id)}}" class="{{ Request::routeIs('VandorPanelProductAll') ? 'active' : '' }}">
                                            <i class="fa fa-shopping-cart"></i> All Product
                                        </a>

                                        <a href="{{route('VandorPanelProductPage',$vandor->shop_id)}}" class="">
                                            <i class="fa fa-backward"></i> Back
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
                            <div class="documentsContainerScroll">
                                <div class="table-responsive">
                                 <div class="container">
                                     <table id="copy-print-csv" class="table custom-table">
                                         <thead>
                                         <tr>
                                             <th>SL.</th>
                                             <th>Product Name</th>
                                             <th>Price</th>
                                             <th>Section</th>
                                             {{--<th>Color</th>--}}
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
                                             @endphp
                                         <tr>
                                             <td>{{ @$key + 1 }}</td>
                                             <td>{{ @$index->product_name }}</td>
                                             <td>{{ @$index->product_price }} Taka </td>
                                             <td>@foreach(@$section as $key=>$se) @if(@$key%2==0) <span class="badge badge-success">{{@$se->section_name}}</span> @else <span class="badge badge-secondary">{{@$se->section_name}}</span> @endif @endforeach</td>

                                             <td>
                                                 @if(@$index->status==2)
                                                     <span class="badge badge-warning">Panding</span>
                                                     @else
                                                     <span class="badge badge-success">Approve</span>
                                                 @endif
                                             </td>
                                             <td>
                                                 <div class="btn-group">
                                                     <button class="btn btn-primary btn-sm" type="button">
                                                         Action
                                                     </button>
                                                     <button type="button" class="btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                         <span class="sr-only">Toggle Dropdown</span>
                                                     </button>
                                                     <div class="dropdown-menu">
                                                         <a style="display: inherit;margin: 5px;border-radius:3px" href="{{route('VandorPanelProductEdit',@$index->id)}}" class="btn btn-info btn-sm "><i class="fa fa-edit"></i> Edit</a>
                                                         <a style="display: inherit;margin: 5px;border-radius:3px" href="{{route('VandorPanelProductDelete',@$index->id)}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>
                                                         <a style="display: inherit;margin: 5px;border-radius:3px" href="{{route('VandorPanelProductAddMore',@$index->id)}}" class="btn btn-success btn-sm"><i class="fa fa-plus-circle"></i> Details Add</a>
                                                         <a style="display: inherit;margin: 5px;border-radius:3px;background: #c6d103;" href="{{route('VandorPanelProductDiscount',@$index->id)}}" class="btn btn-durk btn-sm"><i class="fa fa-gift"></i> %Discount</a>
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
                                <!-----End Add Product Section------->

                            </div>
                            <!-- Row end -->
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- Row end -->

    </div>

    <!-- Row end -->

    @endsection