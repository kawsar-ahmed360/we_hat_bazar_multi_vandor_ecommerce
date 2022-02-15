@extends('AdminDashboard.master')
@section('title') Vandor Panel Product Add More @endsection
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
                                        {{ Request::routeIs('VandorPanelProductUpdate') ? 'active' : '' }} {{ Request::routeIs('VandorPanelProductAddMore') ? 'active' : '' }} ">
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


                                <form action="{{route('VandorPanelProductAddMoreUpdate')}}" method="post">
                                    @csrf
                                    <input type="hidden" value="{{@$product->id}}" name="product_id">
                                 <div class="container" style="padding: 50px">

                                     <div class="document_edite">

                                         @forelse(@$product_details as $prodeti)
                                             <div class="remove_more_edite">
                                                 <div class="row">
                                                     <h3 style=" padding-left: 15px;font-family: cursive;color: burlywood;">Edite New Section</h3>

                                                     <input type="hidden" value="Edite" name="EditeId">

                                                     <div class="col-md-12 mb-3">
                                                         <label for="">Title</label>
                                                         <input type="text" class="form-control" name="title[]" value="{{@$prodeti->title}}" placeholder="Enter title">
                                                     </div>


                                                     <div class="col-md-12 mb-3">
                                                         <label for="">Description</label>
                                                         <textarea name="description[]" class="form-control ckeditor" id="addeditor" cols="30" rows="10">{!! @$prodeti->description !!}</textarea>
                                                     </div>

                                                     <div class="col-md-12 mb-3">
                                                         <label for=""></label>
                                                         <h3 style="text-align: center">
                                                             <a href="#"  class="btn btn-success addmore_edite"><i style="font-size: 20px;padding: 3px;" class="fa fa-plus"></i></a>
                                                             <a href="#"  class="btn btn-danger removemore_edite"><i style="font-size: 20px;padding: 3px;" class="fa fa-minus"></i></a></h3>
                                                     </div>

                                                 </div>
                                             </div>
                                         @empty

                                         @endforelse

                                     </div>



                                     @forelse(@$product_details as $prodeti)

                                     @empty

                                         <div class="document">
                                             <div class="remove_more">
                                                 <div class="row">

                                                     <div class="col-md-12 mb-3">
                                                         <label for="">Title</label>
                                                         <input type="text" class="form-control" name="title[]" placeholder="Enter title">
                                                     </div>


                                                     <div class="col-md-12 mb-3">
                                                         <label for="">Description</label>
                                                         <textarea name="description[]" class="form-control ckeditor" id="addeditor" cols="30" rows="10"></textarea>
                                                     </div>

                                                     <div class="col-md-12 mb-3">
                                                         <label for=""></label>
                                                         <h3 style="text-align: center">
                                                             <a href="#"  class="btn btn-success addmore"><i style="font-size: 20px;padding: 3px;" class="fa fa-plus"></i></a>
                                                             <a href="#"  class="btn btn-danger removemore"><i style="font-size: 20px;padding: 3px;" class="fa fa-minus"></i></a></h3>
                                                     </div>

                                                 </div>
                                             </div>
                                         </div>

                                     @endforelse




                                     <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                         <div class="text-right">
                                             <button type="button" id="submit" name="submit" class="btn btn-white">Cancel</button>
                                             <button type="submit" id="submit" name="submit" class="btn btn-primary">Submit Form</button>
                                         </div>
                                     </div>

                                 </div>

                                </form>
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



    <!--------------------Edite More-------------->

    <div class="documentesdsf_edite" style="display: none">
        <div class="whole_html_edite">
            <div class="remove_more_edite">
                <div class="row">

                    <h3 style=" padding-left: 15px;font-family: cursive;color: burlywood;">Add New Section</h3>

                    <div class="col-md-12 mb-3">
                        <label for="">Title</label>
                        <input type="text" class="form-control" name="title[]" placeholder="Enter title">
                    </div>


                    <div class="col-md-12 mb-3">
                        <label class="" for="">Description</label>
                        <textarea name="description[]" class="form-control" id="addeditor" cols="30" rows="10" placeholder="Enter Details"></textarea>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for=""></label>
                        <h3 style="text-align: center">
                            <a href="#"  class="btn btn-success addmore_edite"><i style="font-size: 20px;padding: 3px;" class="fa fa-plus"></i></a>
                            <a href="#"  class="btn btn-danger removemore_edite"><i style="font-size: 20px;padding: 3px;" class="fa fa-minus"></i></a></h3>
                    </div>

                </div>
            </div>
        </div>
    </div>



    <!----------------------Add More Section------------------>
    <div class="documentes" style="display: none">
        <div class="whole_html">
            <div class="remove_more">
                <div class="row">

                    <h3 style=" padding-left: 15px;font-family: cursive;color: burlywood;">Add New Section</h3>

                    <div class="col-md-12 mb-3">
                        <label for="">Title</label>
                        <input type="text" class="form-control" name="title[]" placeholder="Enter title">
                    </div>


                    <div class="col-md-12 mb-3">
                        <label class="" for="">Description</label>
                        <textarea name="description[]" class="form-control" id="addeditor" cols="30" rows="10" placeholder="Enter Details"></textarea>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for=""></label>
                        <h3 style="text-align: center">
                            <a href="#"  class="btn btn-success addmore"><i style="font-size: 20px;padding: 3px;" class="fa fa-plus"></i></a>
                            <a href="#"  class="btn btn-danger removemore"><i style="font-size: 20px;padding: 3px;" class="fa fa-minus"></i></a></h3>
                    </div>

                </div>
            </div>
        </div>
    </div>



@section('footer')

    <!--------Edite More--------->

    <script>
        var countedite=0;
        $(document).on('click','.addmore_edite',function(){

            var whole_htmlEd = $('.whole_html_edite').html();
            $('.document_edite').append(whole_htmlEd);

            countedite++;

            const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
        })


            Toast.fire({
                icon: 'success',
                title:'Successfully Section Add',
            })

        });


        var countedite=0;
        $(document).on('click','.removemore_edite',function(){

            $(this).closest('.remove_more_edite').remove();
            countedite--;
            const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
        })


            Toast.fire({
                icon: 'success',
                title:'Successfully Section Remove',
            })
        });


    </script>







    <!--------------Add More-------->
    <script>
        var count=0;
        $(document).on('click','.addmore',function(){

            var whole_html = $('.whole_html').html();
            $('.document').append(whole_html);

            count++;

            const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
        })


            Toast.fire({
                icon: 'success',
                title:'Successfully Section Add',
            })

        });
        var count=0;
        $(document).on('click','.removemore',function(){

            $(this).closest('.remove_more').remove();
            count--;
            const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
        })


            Toast.fire({
                icon: 'success',
                title:'Successfully Section Remove',
            })
        });


    </script>
@endsection

@endsection