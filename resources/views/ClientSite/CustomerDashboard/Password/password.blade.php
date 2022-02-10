@extends('ClientSite.master')
@section('title') Password Change @endsection

@section('client-content')


    <div class="xs-breadcumb">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('MainIndex')}}"> Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="">My Profile</a></li>

                </ol>
            </nav>
        </div>
    </div>

    <br>




    <section class="account-page section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <div class="card account-left">


                                @include('ClientSite.CustomerDashboard.Menu.menu')

                            </div>
                        </div>
                        <div class="col-md-8">


                            <div class="card card-body account-right">
                                <div class="widget">
                                    <div class="section-header">
                                        <h5 class="heading-design-h5"> Password Change </h5>
                                    </div>
                                    <form action="{{route('CustomerPasswordPost')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" value="{{Session::get('customer_id')}}" name="Customer_id">


                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="control-label">Old Password <span class="required">*</span>
                                                    </label>
                                                    <input class="form-control border-form-control" name="old_password"  placeholder="Old Password" type="text">
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="control-label">New Password <span class="required">*</span>
                                                    </label>
                                                    <input class="form-control border-form-control" name="password"  placeholder="Password" type="text">
                                                </div>
                                            </div>


                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="control-label">New Password <span class="required">*</span>
                                                    </label>
                                                    <input class="form-control border-form-control" name="Confirm_password"  placeholder="Confirm_password" type="text">
                                                </div>
                                            </div>

                                        </div>


                                        <div class="row">
                                            <div class="col-sm-12 text-right">
                                                <button style="padding: 7px;border-radius: 5px 0px 6px;background: #9202ff;margin: 4px;color: white;border: 0px;" type="button" class=""> Cencel </button>
                                                <button style="padding: 7px;border-radius: 5px 0px 6px;background: #d901fe;margin: 4px;color: white;border: 0px;" type="submit" class=""> Save Changes </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <br>

@section('client-footer')

    <script>
        $( window ).on("load", function() {
            $('.cd-dropdown').removeClass('dropdown-is-active');
        });

    </script>

    @endsection


@endsection