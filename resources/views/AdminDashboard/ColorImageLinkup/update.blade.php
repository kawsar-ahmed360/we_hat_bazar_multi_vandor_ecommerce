@extends('AdminDashboard.master')
@section('title') Image Linkup With Color @endsection
@section('admin-content')

    <div class="table-container">
        <div class="t-header">{{@$product_name}} Image Linkup With Color </div>
        <div class="table-responsive">

            <div class="row gutters">


                <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-5">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">

                                <h3 style="font-family: monospace;font-weight: normal;">Image Linkup With Color</h3>

                                <form action="{{route('ProductColorLinkupUpdate')}}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                        <input type="hidden" value="{{@$product_id}}" name="pro_id">


                                    <div class="row gutters">


                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label for="inputName">Color Select</label>
                                                <select class="form-control @error('color_id') is-invalid @enderror" name="color_id" id="">
                                                    <option selected disabled>-----Selected Once-----</option>
                                                    @forelse(@$color as $color)
                                                        <option value="{{@$color->id}}">{{@$color->color_name}}</option>
                                                     @empty

                                                    @endforelse
                                                </select>
                                                {{--<input type="text" class="form-control @error('plating_name') is-invalid @enderror"  name="plating_name" id="imgInp" placeholder="Enter plating_name">--}}
                                                @error('color_id')
                                                <span class="invalid-feedback" role="alert">
                                               	 <strong style="color:red">{{$message}}</strong>
                                               </span>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label for="inputName">Multi Image Select</label>
                                                <input type="file" class="form-control @error('product_gallery') is-invalid @enderror" multiple  name="product_gallery[]" id="imgInp" placeholder="Enter plating_name">
                                                <span style="color:red">Max Size: Width:515px, Height:515px</span>
                                                @error('product_gallery')
                                                <span class="invalid-feedback" role="alert">
                                               	 <strong style="color:red">{{$message}}</strong>
                                               </span>
                                                @enderror
                                            </div>
                                        </div>




                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="text-right">
                                                <button type="button" id="submit"  class="btn btn-white">Cancel</button>
                                                <button type="submit" id="submit"  class="btn btn-primary">Submit Form</button>
                                            </div>
                                        </div>



                                    </div>

                            </div>
                            </form>
                        </div>
                    </div>

                </div>


                <div class="col-xl-7 col-lg-7 col-md-7 col-sm-7 col-7">



                    <table id="copy-print-csv" class="table custom-table">
                        <thead>
                        <tr>
                            <th>SL.</th>
                            <th>Color</th>
                            <th>Product</th>
                            <th>Total Ima</th>
                            {{--<th>Image</th>--}}
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach(@$color_image as $key=>$index)
                            <tr class="odd gradeX">
                                <td>{{@$key+1}}</td>
                                <td>{{@$index->Color->color_name}}</td>
                                <td>{{@$index->Product->product_name}}</td>
                                <td>{{@$index->TotalImage}}</td>

                                <td style="text-align: center;">


                                    <a style="color: white;" data-toggle="modal" data-target="#vCenterModal{{@$key}}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> View</a>
                                    <a  href="{{route('ProductColorImageLinkupDelete',[$index->pro_id,$index->color_id])}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>






        </div>
    </div>

    @foreach(@$color_image as $key=>$index)
        @php
         $image_gallery = \App\Models\Admin\ProductGallery::where('color_id',$index->color_id)->where('pro_id',$index->pro_id)->get();
        @endphp
    <div class="modal fade" id="vCenterModal{{@$key}}" tabindex="-1" role="dialog" aria-labelledby="vCenterModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="vCenterModalTitle">{{@$index->Color->color_name}} Color Link Image Gallery</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">

                        <div class="row gutters">
                            @foreach(@$image_gallery as $key=>$gallery)

                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                        <img src="{{(@$gallery->product_gallery)?url('upload/Client/ProductGallery/'.@$gallery->product_gallery):''}}" class="img-thumbnail" alt="Responsive image">
                                    </div>


                            @endforeach


                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
    @endforeach


@endsection