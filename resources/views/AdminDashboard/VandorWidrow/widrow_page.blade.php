@extends('AdminDashboard.master')
@section('title') Vandor widrow Panel View @endsection
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
                                            <i class=""></i>৳ withdraw Panel
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


                            <style>



                                .btn_es {

                                    margin: 10px;
                                    padding: 30px;
                                    text-align: center;
                                    text-transform: uppercase;
                                    position: fixed;
                                    height: 156px;
                                    width: 257px;
                                    transition: 0.5s;
                                    background-size: 200% auto;
                                    color: white;
                                    /* text-shadow: 0px 0px 10px rgba(0,0,0,0.2);*/
                                    box-shadow: 0 0 20px #eee;
                                    border-radius: 10px;
                                }

                                /* Demo Stuff End -> */

                                /* <- Magic Stuff Start */

                                .btn_es:hover {
                                    background-position: right center; /* change the direction of the change here */
                                }

                                .btn-1 {
                                    /*background-image: linear-gradient(to right, #f6d365 0%, #fda085 51%, #f6d365 100%);*/
                                    background: linear-gradient(90deg, #ee0000 0%, #ffb40b 100%);
                                }

                                .btn-2{
                                    background: linear-gradient(90deg, #ef0c96 0%, #00f1f1 100%);
                                }

                                .btn-3{
                                    background: linear-gradient(90deg, #0da1c1 0%, #00fff3 100%);

                                }
                                .btn-4{
                                    background: linear-gradient(90deg, #733030db 0%, #fe0b0b 100%);

                                }

                                .btn-5{
                                    background: linear-gradient(90deg, #ee12ff 0%, #a90413 100%);

                                }

                                .btn-7{
                                    background: linear-gradient(90deg, #ffb735 0%, #88a904 100%);
                                }

                                .btn-8{
                                    background: linear-gradient(90deg, #572424 0%, #4bff00 100%);
                                }

                            </style>

                            <div class="documentsContainerScroll">
                                <div class="documents-body">
                                    <!-- Row start -->
                                  <div class="row">
                                      {{--<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">--}}
                                          {{--<a class="btn_es btn-1">Hover me</a>--}}
                                          {{--<div class="doc-block" style=" box-shadow: 9px 6px 2px 1px #ea9f4d;">--}}
                                              {{--<div class="doc-icon" style="border: 1px solid #646567;">--}}
                                                  {{--<img style="height: 94px;width: 88px;" src="{{asset('backend/taka.png')}}" alt="Doc Icon" />--}}
                                              {{--</div>--}}
                                              {{--<div class="doc-title" style="font-family: cursive;font-size: 19px;margin: 0px;">Overall Income</div>--}}
                                              {{--<p style="font-family: cursive;font-size: 23px;">$1200</p>--}}
                                          {{--</div>--}}


                                      {{--</div>--}}

                                      {{--<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">--}}
                                          {{--<a class="btn_es btn-1">Hover me</a>--}}
                                          {{--<div class="doc-block" style=" box-shadow: 9px 6px 2px 1px #ea9f4d;">--}}
                                          {{--<div class="doc-icon" style="border: 1px solid #646567;">--}}
                                          {{--<img style="height: 94px;width: 88px;" src="{{asset('backend/taka.png')}}" alt="Doc Icon" />--}}
                                          {{--</div>--}}
                                          {{--<div class="doc-title" style="font-family: cursive;font-size: 19px;margin: 0px;">Overall Income</div>--}}
                                          {{--<p style="font-family: cursive;font-size: 23px;">$1200</p>--}}
                                          {{--</div>--}}


                                      {{--</div>--}}

                                      <input type="hidden" value="{{$shop_id}}" id="shop_id">
                                      <input type="hidden" value="{{$user_id}}" id="user_id">

                                      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12" style="margin-bottom: 10px;">
                                          <label for="">Start Date</label>
                                          <input type="date" id="s_date" class="form-control" name="">
                                      </div>

                                      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12" style="margin-bottom: 10px;">
                                          <label for="">End Date</label>
                                          <input disabled type="date" id="e_date" class="form-control" name="">
                                      </div>



                                      <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">

                                          <div class="doc-block btn-1" style="">
                                          <div class="doc-icon" style="border: 1px solid #646567;">
                                              <i class=""><img style="height: 70px;width: 69px;" src="{{asset('backend/takas.png')}}" alt=""></i>
                                          </div>
                                          <div class="doc-title" style="font-family: cursive;font-size: 19px;margin: 0px;color: white;">Total Income</div>
                                          <p style="font-family: cursive;font-size: 23px;color: white;" id="TotalIncome">৳{{@$total_income??'0'}}</p>
                                          </div>


                                      </div>

                                      <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                                          <div class="doc-block btn-2" style="">
                                              <div class="doc-icon" style="border: 1px solid #646567;">
                                                  <i class=""><img style="height: 70px;width: 69px;" src="{{asset('backend/takas.png')}}" alt=""></i>
                                              </div>
                                              <div class="doc-title" style="font-family: cursive;font-size: 19px;margin: 0px;color: white;">Commission</div>
                                              <p style="font-family: cursive;font-size: 23px;color: white;" id="TotalCommission">৳{{@$comission_price??'0'}}</p>
                                          </div>
                                      </div>


                                      <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">

                                          <div class="doc-block btn-3" style="">
                                              <div class="doc-icon" style="border: 1px solid #646567;">
                                                  <i class=""><img style="height: 70px;width: 69px;" src="{{asset('backend/takas.png')}}" alt=""></i>
                                              </div>
                                              <div class="doc-title" style="font-family: cursive;font-size: 19px;margin: 0px;color: white;">WithOut Commission</div>
                                              <p style="font-family: cursive;font-size: 23px;color: white;" id="WithOutCommision">৳{{@$with_out_comission??'0'}} </p>
                                          </div>
                                      </div>


                                      <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">

                                          <div class="doc-block btn-7" style="">
                                              <div class="doc-icon" style="border: 1px solid #646567;">
                                                  <i class=""><img style="height: 70px;width: 69px;" src="{{asset('backend/takas.png')}}" alt=""></i>
                                              </div>
                                              <div class="doc-title" style="font-family: cursive;font-size: 19px;margin: 0px;color: white;">Withdrowan Amount</div>
                                              <p style="font-family: cursive;font-size: 23px;color: white;" id="">৳@if(@$Approve_request_amount){{@$Approve_request_amount??'0'}}@else 0 @endif</p>
                                          </div>
                                      </div>



                                      <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">

                                          <div class="doc-block btn-8" style="">
                                              <div class="doc-icon" style="border: 1px solid #646567;">
                                                  <i class=""><img style="height: 70px;width: 69px;" src="{{asset('backend/takas.png')}}" alt=""></i>
                                              </div>
                                              <div class="doc-title" style="font-family: cursive;font-size: 19px;margin: 0px;color: white;">Current Balance</div>
                                              <p style="font-family: cursive;font-size: 23px;color: white;" id="">৳@if(@$Approve_request_amount){{@$with_out_comission-$Approve_request_amount}}@else{{@$with_out_comission??'0'}}@endif</p>
                                          </div>
                                      </div>


                                      <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                                          <a href="{{route('VandorPanelPaymentWithdrawPanding',[@$shop_id,@$user_id])}}">
                                          <div class="doc-block btn-4" style="">
                                              <div class="doc-icon" style="border: 1px solid #646567;">
                                                  <img style="height: 94px;width: 88px;" src="{{asset('backend/pending-work.png')}}" alt="Doc Icon" />
                                              </div>
                                              <div class="doc-title" style="font-family: cursive;font-size: 19px;margin: 0px;color: white;">({{@$panding_request??'0'}}) Panding Request</div>
                                              <p style="font-family: cursive;font-size: 23px;color: white;" id="WithOutCommision"></p>
                                          </div>
                                          </a>
                                      </div>

                                      <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                                          <a href="{{route('VandorPanelPaymentWithdrawApprove',[@$shop_id,@$user_id])}}">
                                          <div class="doc-block btn-5" style="">
                                              <div class="doc-icon" style="border: 1px solid #646567;">
                                                  <img style="height: 94px;width: 88px;" src="{{asset('backend/approve.png')}}" alt="Doc Icon" />
                                              </div>
                                              <div class="doc-title" style="font-family: cursive;font-size: 19px;margin: 0px;color: white;">({{@$Approve_request??'0'}}) Approve Request</div>
                                              <p style="font-family: cursive;font-size: 23px;color: white;" id="WithOutCommision"></p>
                                          </div>
                                          </a>
                                      </div>


                                  </div>

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
            $(document).on('change','#s_date',function () {
                var s_date = $('#s_date').val();


                if(s_date!=null){
                    var e_date = $('#e_date').val();
                    $('#e_date').removeAttr('disabled');
                    EndDate();

                }

            });

            function EndDate(){

                $(document).on('change','#e_date',function () {
                    var s_date = $('#s_date').val();
                    var e_date = $('#e_date').val();
                    var shop_id = $('#shop_id').val();
                    var user_id = $('#user_id').val();

                    $.ajax({
                        url:"{{route('VandorPanelPaymentWidrowDateWiseReport')}}",
                        type:"GET",
                        data:{s_date:s_date,e_date:e_date,shop_id:shop_id,user_id:user_id},
                        success:function(data){

                          $('#TotalIncome').text('৳'+data['total_income']);
                          $('#TotalCommission').text('৳'+data['comission_price']);
                          $('#WithOutCommision').text('৳'+data['with_out_comission']);

                        }

                    })
                });

            }
        </script>
        @endsection

    @endsection