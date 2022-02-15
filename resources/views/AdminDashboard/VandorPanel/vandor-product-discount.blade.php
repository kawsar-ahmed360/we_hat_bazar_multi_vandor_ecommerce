@extends('AdminDashboard.master')
@section('title') Vandor Panel Product Discount @endsection
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

                                        <a href="{{route('VandorPanelProductAll',@$vandor->shop_id)}}" class="{{ Request::routeIs('VandorPanelProductAll') ? 'active' : '' }} {{ Request::routeIs('VandorPanelProductEdit') ? 'active' : '' }}
                                        {{ Request::routeIs('VandorPanelProductUpdate') ? 'active' : '' }} {{ Request::routeIs('VandorPanelProductDiscount') ? 'active' : '' }} ">
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


                                 <div class="container" style="padding: 60px">
                                 <form action="{{route('VandorPanelProductDiscountPost')}}" method="post">
                                     @csrf

                                     <input type="hidden" value="{{@$product->id}}" name="productId">

                                     <div class="form-group row" style="">
                                         <label for="example-text-input" class="col-sm-2 col-form-label">Old Price</label>
                                         <div class="col-sm-8">
                                             <input class="form-control" readonly  type="text" value="{{@$product->product_price}}" placeholder="Enter your Product Name..." id="OldPrice">
                                         </div>
                                     </div>


                                     <div class="form-group row">
                                         <label for="example-text-input" class="col-sm-2 col-form-label">Discount Price</label>
                                         <div class="col-sm-8">
                                             <input class="form-control" readonly type="text" value="{{@$product->new_price}}" placeholder="Enter your Product Name..." id="DicountPrice">
                                         </div>
                                     </div>


                                     <div class="form-group row">
                                         <label for="example-text-input" class="col-sm-2 col-form-label">Discount %</label>
                                         <div class="col-sm-8">
                                             <input class="form-control" type="text" value="{{@$product->discount}}" name="discount" placeholder="%..." id="discount">
                                         </div>
                                     </div>

                                     <div class="form-group row">
                                         <label for="example-text-input" class="col-sm-2 col-form-label">New Price</label>
                                         <div class="col-sm-8">
                                             <input class="form-control" type="text" readonly name="new_price" placeholder="New Price..." id="newPrice">
                                         </div>
                                     </div>




                                     <h4>Commission:</h4>

                                     <div class="form-group row">
                                         <label for="example-text-input" class="col-sm-2 col-form-label">Commission%</label>
                                         <div class="col-sm-8">
                                             <input type="text" readonly class="form-control @error('commission') is-invalid @enderror" value="{{@$product->commission}}" name="commission" id="discount_com" placeholder="Enter commission%">
                                         </div>
                                     </div>


                                     <div class="form-group row">
                                         <label for="example-text-input" class="col-sm-3 col-form-label">Inclue Commission Price</label>
                                         <div class="col-sm-7">
                                             <input type="text" readonly class="form-control @error('inc_commission_price') is-invalid @enderror" value="{{@$product->inc_commission_price}}" name="inc_commission_price" id="newPriceComm" placeholder="Enter inc_commission_price">
                                         </div>
                                     </div>




                                     <div class="form-group row">
                                         <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                         <div class="col-sm-10">
                                             <a style="color:white" class="btn btn-warning btn-sm pull-right">Close</a>
                                             <button style="margin-right: 7px;" type="submit" class="btn btn-success btn-sm pull-right">Submit Product</button>

                                         </div>
                                     </div>


                                     </form>





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


@section('footer')



    <script type="text/javascript">
        $(document).on("change keyup blur", "#discount", function() {
            var main = $('#OldPrice').val();
            var Discountmain = $('#DicountPrice').val();

            if (main) {

                var disc = $('#discount').val();
                var dec = (disc/100).toFixed(2); //its convert 10 into 0.10
                var mult = main*dec; // gives the value for subtract from main value
//                var discont = main-mult;
            }else{

                var disc = $('#discount').val();
                var dec = (disc/100).toFixed(2); //its convert 10 into 0.10
                var mult = Discountmain*dec; // gives the value for subtract from main value
//                var discont = Discountmain-mult;


            }



            $('#newPrice').val(mult);

            Commissio();
        });

        function Commissio(){


            var main_com = $('#newPrice').val();

            var disc_com = $('#discount_com').val();
            var dec_com = (disc_com/100).toFixed(2); //its convert 10 into 0.10
            var mult_com = main_com*dec_com; // gives the value for subtract from main value
//            var discont_com = main_com-mult_com;

            $('#newPriceComm').val(mult_com);
        }
    </script>

@endsection

@endsection