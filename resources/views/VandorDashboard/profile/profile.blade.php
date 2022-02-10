@extends('VandorDashboard.master')

@section('title') Account Setting @endsection

@section('vandor-content')
    <div class="row gutters">
        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
            <div class="card h-100" style="max-height: 339px;">
                <div class="card-body">
                    <div class="account-settings">
                        <div class="user-profile">
                            <div class="user-avatar">
                                <img src="{{(@$info->profile)?url('upload/Vandor/profile/'.$info->profile):asset('backend/img/user.png')}}" alt="Le Rouge Admin" />
                            </div>
                            <h5 class="user-name">{{$info->f_name??''}}</h5>
                            <h6 class="user-email">{{$info->email??''}}</h6>
                        </div>
                        <table class="table">
                            <tr>
                                <th>Name</th>
                                <td>Kawsar</td>
                            </tr>



                            <tr>
                                <th>Mobile</th>
                                <td>{{$info->phone??''}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
            <div class="card h-100">
                <div class="card-header">
                    <div class="card-title">Update Profile</div>
                </div>


                <form action="{{route('VandorProfileUpdate')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" value="{{Auth::user('vandor')->id}}" name="EditeId">
                    <div class="card-body">
                        <div class="row gutters">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="fullName">Full Name</label>
                                    <input type="text" class="form-control" id="fullName" value="{{$info->f_name??''}}" name="f_name" placeholder="Enter full name">
                                </div>


                            </div>


                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" class="form-control" id="phone" value="{{$info->phone??''}}" name="phone" placeholder="Enter phone number">
                                </div>

                            </div>

                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="addRess">Image</label>
                                    <input type="file" class="form-control" id="imgInp" name="profile" placeholder="Enter Address">
                                    <span style="color:red">Max Size: Width:500px,Height:500px</span>
                                </div>
                            </div>

                            @if(@$info->profile!=null)

                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label for="addRess">Old Image</label> <br>
                                        <img style="width: 100px;" src="{{(@$info->profile)?url('upload/Vandor/profile/'.$info->profile):''}}" alt="your image" />
                                    </div>
                                </div>

                            @else
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label for="addRess">Preview Image</label> <br>
                                        <img id="blah" style="width: 100px;" src="#" alt="your image" />
                                    </div>
                                </div>

                                <script>
                                    imgInp.onchange = evt => {
                                        const [file] = imgInp.files
                                        if (file) {
                                            blah.src = URL.createObjectURL(file)
                                        }
                                    }
                                </script>
                            @endif


                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="card-header">
                                    <div class="card-title">Other Information</div>
                                </div>

                            </div>


                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="fullName">Street Address</label>
                                    <input type="text" class="form-control" id="fullName" value="{{$info->street_address??''}}" name="street_address" placeholder="Enter street_address">
                                </div>
                            </div>

                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="fullName">City</label>
                                    <input type="text" class="form-control" id="fullName" value="{{$info->city??''}}" name="city" placeholder="Enter city">
                                </div>
                            </div>

                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="fullName">State</label>
                                    <input type="text" class="form-control" id="fullName" value="{{$info->state??''}}" name="state" placeholder="Enter state">
                                </div>
                            </div>

                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="fullName">Zip Code</label>
                                    <input type="text" class="form-control" id="fullName" value="{{$info->zip??''}}" name="zip" placeholder="Enter zip Code">
                                </div>
                            </div>


                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="fullName">Shop Image</label>
                                    <input type="file" class="form-control" id="fullName"  name="shop_image" placeholder="Enter zip Code">
                                    <span style="color:red">Max Size: Width:160px, Height:29px</span>
                                </div>
                            </div>


                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="fullName">Shop Banner</label>
                                    <input type="file" class="form-control" id="fullName" name="shop_banner" placeholder="Enter shop_banner">
                                    <span style="color:red">Max Size: Width:1200px, Height:500px</span>
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
    </div>
    <!-- Row end -->

    @endsection