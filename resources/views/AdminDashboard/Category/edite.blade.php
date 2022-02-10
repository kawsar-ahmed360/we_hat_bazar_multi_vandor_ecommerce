@extends('AdminDashboard.master')
@section('title') Category Edit @endsection
@section('admin-content')
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="card-body">

                <h2 style="font-family: monospace;font-weight: normal;">Category Edit:</h2>

                <form action="{{ route('CategoryUpdate') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" value="{{@$edite->id}}" name="EditeId">

                    <div class="row gutters">


                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                            <div class="form-group">
                                <label for="inputName">Category Name</label>
                                <input type="text" class="form-control @error('category_name') is-invalid @enderror" value="{{@$edite->category_name}}" name="category_name" id="imgInp" placeholder="Enter category_name">
                                @error('category_name')
                                <span class="invalid-feedback" role="alert">
                                               	 <strong style="color:red">{{$message}}</strong>
                                               </span>
                                @enderror
                            </div>
                        </div>


                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                            <div class="form-group">
                                <label for="inputName">Highlight</label>
                                <select name="highlight" class="form-control" id="highlight">
                                    <option disabled selected>----Select Once------</option>
                                    <option value="1" {{(@$edite->highlight=='1')?'selected':''}}>Yes</option>
                                    <option value="2" {{(@$edite->highlight=='2')?'selected':''}}>No</option>
                                </select>
                            </div>
                        </div>




                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label for="inputName">Image</label>
                                <input type="file" class="form-control ckeditor @error('image') is-invalid @enderror" name="image" id="imgInp" placeholder="Enter  title">

                                <span style="color:red">Max Size: Width:135px, Height:135px</span>
                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                               	 <strong style="color:red">{{$message}}</strong>
                                               </span>
                                @enderror
                            </div>
                        </div>



                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label for="inputName">Old Image</label> <br>

                                <img style="width: 100px;" src="{{(@$edite->image)?url('upload/Client/Category/'.@$edite->image):''}}" alt="">

                            </div>
                        </div>




                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label for="inputName">Icon Image</label>
                                <input type="file" class="form-control @error('icon_image') is-invalid @enderror" name="icon_image" id="imgInp" placeholder="Enter title">

                                <span style="color:red">Max Size: Width:135px, Height:135px</span>
                                @error('icon_image')
                                <span class="invalid-feedback" role="alert">
                                               	 <strong style="color:red">{{$message}}</strong>
                                               </span>
                                @enderror
                            </div>
                        </div>



                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label for="inputName">Icon Old Image</label> <br>

                                <img style="width: 100px;" src="{{(@$edite->icon_image)?url('upload/Client/Icon_Category/'.@$edite->icon_image):''}}" alt="">

                            </div>
                        </div>



                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <h4>Seo Tools:  <button style="background: none;
                                            border: 1px solid burlywood;
                                            padding: 3px;" type="button" class="" data-toggle="collapse" data-target="#demo"><span class="glyphicon glyphicon-sort"></span></button><h4>

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
                                            <button type="submit" id="submit" name="submit" class="btn btn-primary">Submit Form</button>
                                        </div>
                                    </div>



                        </div>

                    </div>
                </form>
            </div>
        </div>

@endsection