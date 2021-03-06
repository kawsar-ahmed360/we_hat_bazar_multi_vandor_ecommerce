@extends('AdminDashboard.master')
@section('title') Vandor Panel View @endsection
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
                                        <a href="#" class="active">
                                            <i class="fa fa-user"></i> Panel View
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
                                <div class="documents-body">
                                    <!-- Row start -->
                                    <div class="row gutters">
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                                            <div class="doc-block">
                                                <div class="doc-icon">
                                                    <img style="height: 94px;width: 88px;" src="{{asset('upload/Vandor/cat_per.png')}}" alt="Doc Icon" />
                                                </div>
                                                <div class="doc-title">Category Permission</div>
                                                <a href="{{route('VandorCategoryPermissionEs',@$vandor->shop_id)}}" class="btn btn-white btn-lg">View</a>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                                            <div class="doc-block">
                                                <div class="doc-icon">
                                                    <img style="height: 94px;width: 88px;" src="{{asset('upload/Vandor/pro.png')}}" alt="Doc Icon" />
                                                </div>
                                                <div class="doc-title">Product Add</div>
                                                <a href="{{route('VandorPanelProductPage',@$vandor->shop_id)}}" class="btn btn-white btn-lg">view</a>
                                            </div>
                                        </div>


                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                                            <div class="doc-block">
                                                <div class="doc-icon">
                                                    <img style="height: 94px;width: 88px;" src="{{asset('backend/amm.png')}}" alt="Doc Icon" />
                                                </div>
                                                <div class="doc-title">Payment Widrow</div>
                                                <a href="{{route('VandorPanelPaymentWidrowPage',[@$vandor->shop_id,@$vandor->id])}}" class="btn btn-white btn-lg">view</a>
                                            </div>
                                        </div>


                                    </div>
                                    <!-- Row end -->
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

@endsection