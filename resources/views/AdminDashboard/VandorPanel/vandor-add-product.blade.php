@extends('AdminDashboard.master')
@section('title') Vandor Panel Product Add @endsection
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

                                    <!-- Row start -->
                                    <form action="{{route('VandorPanelProductStore')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                    <!--------- Add Product Section------->
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="card">
                                            <div class="card-body">
                                                {{--<h4 style="font-family: monospace;font-weight: normal;">Product Add :</h4>--}}

                                                <input type="hidden" value="{{@$vandor->shop_id}}" name="shop_id">

                                                <div class="row gutters">
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                                                        <div class="form-group">
                                                            <label for="inputName">Product Name <span style="color:red">*</span></label>
                                                            <input type="text" class="form-control @error('product_name') is-invalid @enderror" name="product_name" id="imgInp" placeholder="Enter product_name">
                                                            @error('product_name')
                                                            <span class="invalid-feedback" role="alert">
                                                             <strong style="color:red">{{$message}}</strong>
                                                           </span>
                                                            @enderror
                                                        </div>
                                                    </div>


                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6" style="max-width: 510px;">
                                                        <div class="form-group">
                                                            <label for="inputName">Section <span style="color:red">*</span></label>
                                                            <select name="section_id[]" class="form-control js-example-basic-multiple" multiple id="highlight">

                                                                @foreach(\App\Models\Admin\SectionManage::get() as $se)
                                                                    <option value="{{@$se->id}}">{{@$se->section_name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>


                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                                                        <div class="form-group">
                                                            <label for="inputName">Category_name <span style="color:red">*</span></label>
                                                            <select name="cat_id" class="form-control" id="highlight">
                                                                <option disabled selected>----Select Once------</option>
                                                                @if(@$category!=null)
                                                                @foreach(@$category as $cat)
                                                                    <option value="{{@$cat->id}}">{{@$cat->category_name}}</option>
                                                                @endforeach
                                                                    @else
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>


                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6" style="max-width: 510px;">
                                                        <div class="form-group">
                                                            <label for="inputName">Color Name </label>
                                                            <select name="color_id[]" class="form-control js-example-basic-multiple" multiple id="highlight">

                                                                @foreach(\App\Models\Admin\ColorManage::get() as $color)
                                                                    <option value="{{@$color->id}}">{{@$color->color_name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>


                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6" style="max-width: 520px;">
                                                        <div class="form-group">
                                                            <label for="inputName">Tag Name <span style="color:red">*</span></label>
                                                            <select name="tag_id[]" class="form-control js-example-basic-multiple" multiple id="highlight">

                                                                @foreach(\App\Models\Admin\TagManage::get() as $tag)
                                                                    <option value="{{@$tag->id}}">{{@$tag->tag_name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>


                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6" style="max-width: 520px;">
                                                        <div class="form-group">
                                                            <label for="inputName">Plation/Polish</label >
                                                            <select name="plation_id[]" class="form-control js-example-basic-multiple" multiple id="highlight">

                                                                @foreach(\App\Models\Admin\Plating::get() as $plo)
                                                                    <option value="{{@$plo->id}}">{{@$plo->plating_name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>


                                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-6">
                                                        <div class="form-group">
                                                            <label for="inputName">Product Price <span style="color:red">*</span></label>
                                                            <input type="text" class="form-control OriginalPrice @error('product_price') is-invalid @enderror" name="product_price" id="imgInp" placeholder="Enter product_price">
                                                            @error('product_price')
                                                            <span class="invalid-feedback" role="alert">
                                                             <strong style="color:red">{{$message}}</strong>
                                                           </span>
                                                            @enderror
                                                        </div>
                                                    </div>


                                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-6">
                                                        <div class="form-group">
                                                            <label for="inputName">Commission% <span style="color:red">*</span></label>
                                                            <input type="text" class="form-control @error('commission') is-invalid @enderror" name="commission" id="discount" placeholder="Enter commission%">
                                                            @error('commission')
                                                            <span class="invalid-feedback" role="alert">
                                                             <strong style="color:red">{{$message}}</strong>
                                                           </span>
                                                            @enderror
                                                        </div>
                                                    </div>



                                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-6">
                                                        <div class="form-group">
                                                            <label for="inputName">Inclue Commission Price <span style="color:red">*</span></label>
                                                            <input type="text" readonly class="form-control @error('inc_commission_price') is-invalid @enderror" name="inc_commission_price" id="newPriceComm" placeholder="Enter inc_commission_price">
                                                            @error('inc_commission_price')
                                                            <span class="invalid-feedback" role="alert">
                                                             <strong style="color:red">{{$message}}</strong>
                                                           </span>
                                                            @enderror
                                                        </div>
                                                    </div>



                                                    <div class="col-xl-12 col-lg-12-md-12 col-sm-12 col-12">
                                                        <div class="form-group">
                                                            <label for="inputName">Product SKU <span style="color:red">*</span></label>
                                                            <input type="text" class="form-control @error('product_sku') is-invalid @enderror" name="product_sku" id="imgInp" placeholder="Enter product_sku">
                                                            @error('product_sku')
                                                            <span class="invalid-feedback" role="alert">
                                                             <strong style="color:red">{{$message}}</strong>
                                                           </span>
                                                            @enderror
                                                        </div>
                                                    </div>



                                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                        <div class="form-group">
                                                            <label for="inputName">Summary</label>
                                                            <textarea type="text" class="form-control ckeditor @error('summary') is-invalid @enderror" name="summary" id="imgInp" placeholder="Enter summary"></textarea>
                                                            @error('summary')
                                                            <span class="invalid-feedback" role="alert">
                                                             <strong style="color:red">{{$message}}</strong>
                                                           </span>
                                                            @enderror
                                                        </div>
                                                    </div>


                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                                                        <div class="form-group">
                                                            <label for="inputName">Image <span style="color:red">*</span></label>
                                                            <input type="file" class="form-control ckeditor @error('image') is-invalid @enderror" name="image" id="imgInp" placeholder="Enter  title">

                                                            <span style="color:red">Max Size: Width:440px, Height:440px</span>
                                                            @error('image')
                                                            <span class="invalid-feedback" role="alert">
                                                             <strong style="color:red">{{$message}}</strong>
                                                           </span>
                                                            @enderror
                                                        </div>
                                                    </div>



                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                                                        <div class="form-group">
                                                            <label for="inputName">Gallery <span style="color:red">*</span></label>
                                                            <input type="file" class="form-control  @error('product_gallery') is-invalid @enderror" name="product_gallery[]" multiple id="imgInp" placeholder="Enter  title">

                                                            <span style="color:red">Max Size: Width:515px, Height:515px</span>
                                                            @error('product_gallery')
                                                            <span class="invalid-feedback" role="alert">
                                                         <strong style="color:red">{{$message}}</strong>
                                                       </span>
                                                            @enderror
                                                        </div>
                                                    </div>


                                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                        <h4>Seo Tools:  <button style="background: none;
                                            border: 1px solid burlywood;
                                            padding: 3px;" type="button" class="" data-toggle="collapse" data-target="#demo"><span class="glyphicon glyphicon-sort"></span></button></h4>

                                                                <div id="demo" class="collapse">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <label for="" style="display: inline-block; max-width: 100%;
                                            margin-bottom: 5px;font-weight: normal;">Meta Title</label>
                                                                            <input type="text" class="form-control" name="meta_title" id="meta_title" placeholder="Enter meta title">
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <label for="" style="display: inline-block; max-width: 100%;
                                            margin-bottom: 5px;font-weight: normal;">Meta Description</label>
                                                                            <textarea class="form-control" name="meta_des" id="meta_des" cols="20" rows="6"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>








                                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                                    <div class="text-right">
                                                                        <button type="button" id="submit" name="submit" class="btn btn-white">Cancel</button>
                                                                        <button type="submit" id="submit" name="submit" class="btn btn-primary">Submit</button>
                                                                    </div>
                                                                </div>



                                                    </div>



                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </form>

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
    </div>
    </div>
    <!-- Row end -->

    @section('footer')
        <script>
         $(document).on('keyup','#discount',function () {
             var main = $('.OriginalPrice').val();
             var disc = $('#discount').val();
             if(jQuery.isNumeric(disc) == false){
                 alert('Please enter numeric value');
                 $('#OriginalPrice').focus();
                 return;
             }else{

                 var disc = $('#discount').val();
                 var dec = (disc/100).toFixed(2); //its convert 10 into 0.10
                 var mult = main*dec; // gives the value for subtract from main value
//                 var discont = main-mult;
             }

             $('#newPriceComm').val(mult);
         })
        </script>
    @endsection

    @endsection