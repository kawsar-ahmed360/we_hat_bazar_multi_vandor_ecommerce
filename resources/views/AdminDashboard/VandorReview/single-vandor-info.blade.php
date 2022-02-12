@extends('AdminDashboard.master')
@section('title')Vandor Information @endsection
@section('admin-content')

    <div class="row gutters">
        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
            <div class="card h-100">
                <div class="card-body">
                    <div class="account-settings">
                        <div class="user-profile">
                            <div class="user-avatar">
                                <img style="width: 223px;height: 38px;border-radius: 3px;" src="{{(@$vandor_info->shop_image)?url('upload/Vandor/shop_image/'.$vandor_info->shop_image):''}}" alt="Le Rouge Admin" />
                            </div>
                            <h5 class="user-name">{{@$vandor_info->shop_name??'null'}}</h5>
                            <h6 class="user-email">{{@$vandor_info->shop_id??'null'}}</h6>
                        </div>
                        <table class="table">
                            <tr>
                                <th>Owner Na.</th>
                                <td>{{@$vandor_info->f_name??'null'}}</td>
                            </tr>



                            <tr>
                                <th>Mobile</th>
                                <td>{{@$vandor_info->phone??'null'}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
            <div class="card h-100">
                <div class="card-header">
                    <div class="card-title">Vandor Information</div>
                </div>




                    <div class="card-body">
                        <div class="row gutters">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="fullName">Email</label>
                                    <input type="text" class="form-control" readonly="" id="fullName" value="{{@$vandor_info->email??''}}" name="name" placeholder="Enter full name">
                                </div>


                            </div>


                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="phone">City</label>
                                    <input type="text" class="form-control" id="phone" readonly value="{{@$vandor_info->city??''}}" name="mobile" placeholder="Enter phone number">
                                </div>

                            </div>

                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="phone">Street Address</label>
                                    <textarea name="" id="" cols="3" rows="2" class="form-control">{!! @$vandor_info->street_address??'' !!}</textarea>

                                </div>

                            </div>

                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="phone">State</label>
                                    <input type="text" class="form-control" id="phone" readonly value="{{@$vandor_info->state??''}}" name="mobile" placeholder="Enter phone number">
                                </div>

                            </div>


                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="phone">Zip Code</label>
                                    <input type="text" class="form-control" id="phone" readonly value="{{@$vandor_info->zip??''}}" name="mobile" placeholder="Enter phone number">
                                </div>

                            </div>

                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="phone">Product Being Displayed</label>
                                    <textarea name="" id="" cols="3" rows="2" class="form-control">{!! @$vandor_info->product_being_displayed??'' !!}</textarea>

                                </div>

                            </div>







                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="text-right">
                                    {{--<button type="button" id="submit" name="submit" class="btn btn-white">Cancel</button>--}}
                                    @if(@$vandor_info->super_admin_status==0)
                                    <a style="color:white" href="{{route('VandorAdminApprove',$vandor_info->shop_id)}}" id="submit" name="submit" class="btn btn-danger">Approve</a>
                                   @else
                                    <a style="color:white" id="submit" name="submit" class="btn btn-danger">Already Approved</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>


            </div>
        </div>
    </div>
    <!-- Row end -->


@endsection