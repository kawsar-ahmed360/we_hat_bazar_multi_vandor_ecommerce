@extends('UserDashboard.master')
@section('title') Menu Create @endsection
@section('user-content')
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="card-body">

                <h2 style="font-family: monospace;font-weight: normal;">Menu Create:</h2>

                <form action="{{route('MenuStoreUser')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row gutters">


                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                            <div class="form-group">
                                <label for="inputName">Menu Name</label>
                                <input type="text" class="form-control @error('menu_name') is-invalid @enderror" name="menu_name" id="imgInp" placeholder="Enter full name">
                                @error('menu_name')
                                <span class="invalid-feedback" role="alert">
                                               	 <strong style="color:red">{{$message}}</strong>
                                               </span>
                                @enderror
                            </div>
                        </div>


                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                            <div class="form-group">
                                <label for="inputName">Parent Menu</label>
                                <select name="root_id" class="form-control @error('root_id') is-invalid @enderror"  onchange="ajaxSearch(this.value,'subcatid','root_id')">
                                    <option>Select Menu</option>
                                    @foreach($main as $main_menu)
                                        <option value="{{$main_menu->id}}">{{$main_menu->menu_name}}</option>
                                    @endforeach
                                </select>
                                @error('root_id')
                                <span class="invalid-feedback" role="alert">
                                               	 <strong style="color:red">{{$message}}</strong>
                                               </span>
                                @enderror
                            </div>
                        </div>


                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                            <div class="form-group">
                                <label for="inputName">Sub Menu</label>
                                <div id="subcatid">
                                    <select name="sroot_id" class="form-control @error('sroot_id') is-invalid @enderror">
                                        <option value="">Sub Menu</option>

                                        @foreach($sub_main as $sub_menu)

                                            <option value="{{$sub_menu->id}}">{{$sub_menu->menu_name}}</option>

                                        @endforeach

                                    </select>
                                </div>
                                @error('sroot_id')
                                <span class="invalid-feedback" role="alert">
                                               	 <strong style="color:red">{{$message}}</strong>
                                               </span>
                                @enderror
                            </div>
                        </div>


                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                            <div class="form-group">
                                <label for="inputName">Last Menu</label>
                                <div id="lastcatid">
                                    <select name="troot_id" class="form-control @error('troot_id') is-invalid @enderror">
                                        <option value="">Last Menu</option>

                                        @foreach($sroot_main as $sroot_menu)

                                            <option value="{{$sroot_menu->id}}">{{$sroot_menu->menu_name}}</option>

                                        @endforeach
                                    </select>
                                </div>
                                @error('troot_id')
                                <span class="invalid-feedback" role="alert">
                                               	 <strong style="color:red">{{$message}}</strong>
                                               </span>
                                @enderror
                            </div>
                        </div>


                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                            <div class="form-group">
                                <label for="inputName">Page Type</label>
                                <select name="page_type" class="form-control @error('page_type') is-invalid @enderror" onChange="">
                                    <option value="">Page Type</option>

                                    <option value="page">Page</option>
                                    <option value="Service">Service</option>
                                    <option value="gallery">Picture Gallery</option>
                                    <option value="video">Video Gallery</option>
                                    <option value="contact">Contact Us</option>
                                    <option value="url">Url</option>

                                </select>
                                @error('page_type')
                                <span class="invalid-feedback" role="alert">
                                               	 <strong style="color:red">{{$message}}</strong>
                                               </span>
                                @enderror
                            </div>
                        </div>


                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                            <div class="form-group">
                                <label for="inputName">External Link</label>
                                <input type="text" class="form-control @error('external') is-invalid @enderror" name="external" id="imgInp" placeholder="Enter external">
                                @error('external')
                                <span class="invalid-feedback" role="alert">
                                               	 <strong style="color:red">{{$message}}</strong>
                                               </span>
                                @enderror
                            </div>
                        </div>


                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label for="inputName">Target Window</label>
                                <select name="target" class="form-control @error('target') is-invalid @enderror" onChange="">
                                    <option value="">Target Window</option>

                                    <option value="_self">Same Window</option>
                                    <option value="_blank">New Window</option>

                                </select>
                                @error('target')
                                <span class="invalid-feedback" role="alert">
                                               	 <strong style="color:red">{{$message}}</strong>
                                               </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="form-check form-check-inline">
                                <input style="height: 29px;width: 29px;" class="form-check-input" type="checkbox" id="inlineCheckbox1" name="display" value="1">
                                <label class="form-check-label" style="font-size: 19px" for="inlineCheckbox1">Main Menu</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input style="height: 29px;width: 29px;" class="form-check-input" type="checkbox" id="inlineCheckbox2" name="important_link" value="important_link">
                                <label class="form-check-label" style="font-size: 19px" for="inlineCheckbox2">INFORMATION</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input style="height: 29px;width: 29px;" class="form-check-input" type="checkbox" id="inlineCheckbox2" name="my_account" value="my_account">
                                <label class="form-check-label" style="font-size: 19px" for="inlineCheckbox2">WE FORUM</label>
                            </div>


                            <div class="form-check form-check-inline">
                                <input style="height: 29px;width: 29px;" class="form-check-input" type="checkbox" id="inlineCheckbox2" name="customer_service" value="customer_service">
                                <label class="form-check-label" style="font-size: 19px" for="inlineCheckbox2">RERURN POLICY(Only One Menu Add)</label>
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

@section('footer')


    <script>
        $(document).on('click','#mega',function(){


            if($(this).prop("checked") == true){

                // alert('ok');

                $('.singlse').css({
                    display:'none'
                })
            }
            else if($(this).prop("checked") == false){
                $('.singlse').css({
                    display:''
                })
            }


        })



        $(document).on('click','#single',function(){


            if($(this).prop("checked") == true){

                $('.mega').css({
                    display:'none'
                })

                $('.single').css({
                    display:''
                })
            }
            else if($(this).prop("checked") == false){
                $('.mega').css({
                    display:''
                })

                $('.single').css({
                    display:'none'
                })
            }


        })

    </script>




@endsection
@endsection





<script>
    function ajaxSearch(keywords,id,colid)
    {
        //alert(keywords+id+colid);
        if(keywords==0 ){
            return false;
        }
        else{
            var surl = '{{ route("MenusearchajaxUser") }}';
            $.ajax({
                type: "GET",
                url: surl,
                data: {'keywords':keywords,'colid':colid},

                cache: false,
                beforeSend: function(){
                    $('#LoadingImageE').show();
                },
                complete: function(){
                    $('#LoadingImageE').hide();
                },
                success: function(response) {
                    $('#'+id).html(response);
                    //$("#LoadingImageE").hide();
                },
                error: function (xhr, status) {
                    $("#LoadingImageE").hide();
                    alert('Unknown error ' + status);
                }
            });
        }
    }
</script>

