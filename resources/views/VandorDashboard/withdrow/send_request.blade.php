@extends('VandorDashboard.master')

@section('title') Request Send @endsection

@section('vandor-content')



    <div class="row gutters">

        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

            <div class="row gutters">
                <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-12">
                </div>


                <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12" style="background-repeat: no-repeat; background-image: url('../fontend/request_payment.png')">


                    <div class=" h-100" style="background: #0f0f0f7a;">
                        <div class="card-header">
                            <div class="card-title" style="font-size: 22px;font-family: cursive;color: #fff;">Request Payment</div>

                        </div>

                        <div class="card-header">
                            <div class="card-title" style="font-size: 20px;font-family: cursive;text-align: center;color: #fff;">Available Blance: ৳@if(@$with_out_comission!=null) {{@$with_out_comission-@$request_amount}} @else {{@$with_out_comission??'0'}} @endif</div>
                            <input type="hidden" value="@if(@$with_out_comission!=null){{@$with_out_comission-@$request_amount}}@else{{@$with_out_comission}}@endif" id="Total_Ammount">
                        </div>



                        <form action="{{route('VandorWithdraRequestStore')}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" value="{{Auth::user('vandor')->id}}" name="userId">
                            <input type="hidden" value="{{Auth::user('vandor')->shop_id}}" name="shop_id">

                            <div class="card-body">
                                <div class="row gutters">

                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label for="fullName" style="font-family: cursive;color: #fff;">Request Amount</label>
                                            <input type="text" class="form-control" id="request_amoung"  name="request_amoung" required placeholder="Enter ৳000-000-000">
                                        </div>
                                    </div>

                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="row gutters">
                                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-12" style="line-height: 0;">
                                        <div class="form-group">
                                            <input type="radio" style="height: 20px;width: 20px;"  id="Bkash"  name="payment" value="Bkash" placeholder="Enter ">
                                            <label for="fullName" style="font-family: cursive;color: #fff;font-size: 18px;font-weight: 100;">Bkash</label>
                                        </div>
                                    </div>

                                        <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-12" style="line-height: 0;display: none;" id="bkash">
                                            <div class="form-group">
                                                <input type="text" class="form-control"   id="bikash_number"  name="bkash_number" placeholder="Enter bkash Number">

                                            </div>
                                        </div>

                                    </div>
                                    </div>

                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="row gutters">
                                            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-12" style="line-height: 0;">
                                                <div class="form-group">
                                                    <input type="radio" style="height: 20px;width: 20px;"  id="Nagad"  name="payment" value="Nagad" placeholder="Enter ">
                                                    <label for="fullName" style="font-family: cursive;color: #fff;font-size: 18px;font-weight: 100;">Nagad</label>
                                                </div>
                                            </div>

                                            <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-12" style="line-height: 0;display: none;" id="nagad">
                                                <div class="form-group">
                                                    <input type="text" class="form-control"   id="nagad_number"  name="nagad_number" placeholder="Enter Nagad Number">

                                                </div>
                                            </div>

                                        </div>
                                    </div>



                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="row gutters">
                                            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-12" style="line-height: 0;">
                                                <div class="form-group">
                                                    <input type="radio" style="height: 20px;width: 20px;"  id="Rocket"  name="payment" value="Rocket" placeholder="Enter ">
                                                    <label for="fullName" style="font-family: cursive;color: #fff;font-size: 18px;font-weight: 100;">Rocket</label>
                                                </div>
                                            </div>

                                            <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-12" style="line-height: 0;display: none;" id="rocket">
                                                <div class="form-group">
                                                    <input type="text" class="form-control"   id="rocket_number"  name="rocket_number" placeholder="Enter Rocket Number">

                                                </div>
                                            </div>

                                        </div>
                                    </div>



                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="row gutters">
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12" style="line-height: 0;">
                                                <div class="form-group">
                                                    <input type="radio" style="height: 20px;width: 20px;"  id="bank_account_number"  name="payment" value="bank_account_number" placeholder="Enter ">
                                                    <label for="fullName" style="font-family: cursive;color: #fff;font-size: 18px;font-weight: 100;">Bank Account Number</label>
                                                </div>
                                            </div>

                                            <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-12" style="line-height: 0;display:none;" id="bank_account">
                                                <div class="form-group">
                                                    <input type="text" class="form-control"   id="bank_account_numberrd"  name="bank_account_number" placeholder="Enter Bank Account Number">

                                                </div>
                                            </div>

                                        </div>
                                    </div>






                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="text-right">
                                            <button type="button" id="submit" name="submit" class="btn btn-white">Cancel</button>
                                            @if($panding_request_count<1)
                                            <button type="submit" id="submit" name="submit" class="btn btn-primary">Submit Form</button>
                                                @else
                                                <button type="button"  disabled class="btn btn-primary">Submit Form</button>
                                            @endif
                                        </div>
                                    </div>


                                </div>

                            </div>

                        </form>



                    </div>
                </div>


                <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-12">

                </div>



            </div>


            <hr>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="row">

                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="card h-100">
                            <div class="card-header">
                             <h3 style="text-align: center;font-family: cursive;font-weight: 200;">Apporve List</h3>
                                <input style="width: 118px;float: right;margin-left: 70%;bottom: 224px;font-size: 14px;" type="text" id="Approve_serach"  placeholder="Enter 2022-02-28">
                                <table class="table table-striped" >
                                    <thead>
                                    <tr>
                                        <th style="font-size: 12px;">Sl</th>
                                        <th style="font-size: 12px;">Request Amount</th>
                                        <th style="font-size: 12px;">Approve Amount</th>
                                        <th style="font-size: 12px;">Payment</th>
                                        <th style="font-size: 12px;">Status</th>
                                    </tr>
                                    </thead>
                                    {{--approve_request--}}
                                    <tbody id="approve_fil">

                                    {{--@include('VandorDashboard.withdrow.filter.approve_filter')--}}
                                    @include('VandorDashboard.withdrow.filter.apporve_filter')
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="card h-100">
                            <div class="card-header">
                               <h3 style="text-align: center;font-family: cursive;font-weight: 200;">Panding List</h3>
                                <input style="width: 118px;float: right;margin-left: 70%;bottom: 224px;font-size: 14px;" type="text" id="panding_serach" placeholder="Enter 2022-02-28">
                                <table class="table" >
                                    <thead>
                                    <tr>
                                        <th style="font-size: 12px;">Sl</th>
                                        <th style="font-size: 12px;">Request Amount</th>
                                        <th style="font-size: 12px;">Payment</th>
                                        <th style="font-size: 12px;">Status</th>
                                    </tr>
                                    </thead>

                                    <tbody id="panding_filter">
                                     @include('VandorDashboard.withdrow.filter.panding_filter')
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>







        </div>
    </div>




    @section('vandor_footer')

        <!-------show hide------>



        <script>
            $('#Bkash').on('click',function () {
                $('#bkash').show();
                $('#nagad').hide();
                $('#rocket').hide();
                $('#bank_account').hide();
                $('#bikash_number').attr("required", "true");


                $('#bank_account_numberrd').removeAttr("required", "true");
                $('#nagad_number').removeAttr("required", "true");
                $('#rocket_number').removeAttr("required", "true");
            })

            $('#Nagad').on('click',function () {
                $('#bkash').hide();
                $('#nagad').show();
                $('#rocket').hide();
                $('#bank_account').hide();

                $('#nagad_number').attr("required", "true");

                $('#bank_account_numberrd').removeAttr("required", "true");
                $('#bikash_number').removeAttr("required", "true");
                $('#rocket_number').removeAttr("required", "true");


            })

            $('#Rocket').on('click',function () {
                $('#bkash').hide();
                $('#nagad').hide();
                $('#rocket').show();
                $('#bank_account').hide();
                $('#rocket_number').attr("required", "true");

                $('#nagad_number').removeAttr("required", "true");
                $('#bikash_number').removeAttr("required", "true");
                $('#bank_account_numberrd').removeAttr("required", "true");
            })


            $('#bank_account_number').on('click',function () {
                $('#bkash').hide();
                $('#nagad').hide();
                $('#rocket').hide();
                $('#bank_account').show();
                $('#bank_account_numberrd').attr("required", "true");

                $('#nagad_number').removeAttr("required", "true");
                $('#bikash_number').removeAttr("required", "true");
                $('#rocket_number').removeAttr("required", "true");
            })
        </script>

        <script>
            var TotalAm = $('#Total_Ammount').val();
            $('#request_amoung').on('keyup',function () {
                var req_amm = $('#request_amoung').val();
                if(parseInt(req_amm)>parseInt(TotalAm)){
                    alert('your current balance is low');
                    $('#request_amoung').val('');
                }
            })
        </script>


        <script>
            $('#panding_serach').on('keyup',function () {
                var valu = $('#panding_serach').val();
                $.ajax({
                    url:"{{route('VandorWithdraPandingRequestAjaxFilter')}}",
                    type:"GET",
                    data:{valu:valu},
                    success:function (data) {
                        $('#panding_filter').html(data);
                    }
                })
            })
        </script>


        <script>
            $('#Approve_serach').on('keyup',function () {
                var valu = $('#Approve_serach').val();
                $.ajax({
                    url:"{{route('VandorWithdraApproveRequestFilterAjax')}}",
                    type:"GET",
                    data:{valu:valu},
                    success:function (data) {
                        $('#approve_fil').html(data);
                    }
                })
            })
        </script>

        @endsection


    @endsection