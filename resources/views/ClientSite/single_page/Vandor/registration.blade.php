@extends('ClientSite.master')
@section('title') Vandor Registration @endsection

@section('client-content')



    <div class="xs-breadcumb">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('MainIndex')}}"> Home</a></li>
                    <li class="breadcrumb-item"><a href="">Vandor Registration</a></li>

                </ol>
            </nav>
        </div>
    </div>

    <section class="shop-single section-padding">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="container" style="border: 1px solid silver;padding-bottom: 20px;margin-top: 20px;">
            <form action="{{route('StoreVandorRegisterForm')}}" method="POST">
                @csrf
            <div class="row" style="margin-top: 20px">
               <div class="col-md-12">
                   <h4 style="font-weight: 400;">Basic Information:</h4>
               </div>
                <div class="col-md-4">
                    <label for="">Full Name</label>
                    <input type="text" class="form-control @error('f_name') is-invalid @enderror" name="f_name" placeholder="Enter name">
                   @error('f_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label for="">Email</label>
                    <input type="text" class="form-control" name="email"  placeholder="Enter @gmail.com">
                </div>


                <div class="col-md-4">
                    <label for="">Phone</label>
                    <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone"  placeholder="Enter 0000-0000-000">

                    @error('phone')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                </div>

                <div class="col-md-12">
                    <h4 style="font-weight: 400;padding-top:13px">Address:</h4>
                </div>

                <div class="col-md-12">
                    <label for="">Street Address</label>
                    <textarea name="street_address" id="" cols="3" rows="3" class="form-control @error('street_address') is-invalid @enderror" placeholder="Enter Address"></textarea>
                    @error('street_address')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>


                <div class="col-md-4" style="padding-top: 10px">
                    <label for="">City</label>
                    <input type="text" class="form-control @error('city') is-invalid @enderror" name="city"  placeholder="Enter city name">
                    @error('city')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-4" style="padding-top: 10px">
                    <label for="">State / Province</label>
                    <input type="text" class="form-control" name="state"  placeholder="Enter state name">
                </div>



                <div class="col-md-4" style="padding-top: 10px">
                    <label for="">Postal / Zip Code</label>
                    <input type="text" class="form-control @error('zip_code') is-invalid @enderror" name="zip"  placeholder="Enter Postal / Zip Code">

                    @error('zip_code')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>



                <div class="col-md-12" style="padding-top: 10px">
                    <label for=""> Description of product/service being displayed</label>
                    <textarea name="product_being_displayed" id="" cols="3" rows="3" class="form-control" placeholder="Enter Description of product/service being displayed"></textarea>
                </div>

                <div class="col-md-12">
                    <h4 style="font-weight: 400;padding-top:13px">Shop Information:</h4>
                </div>


                <div class="col-md-4">
                    <label for="">Name</label>
                    <input type="text" class="form-control @error('shop_name') is-invalid @enderror" name="shop_name" placeholder="Shop name">
                    @error('shop_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>


                <div class="col-md-4">
                    <label for="">Image</label>
                    <input type="file" class="form-control" name="shop_image" placeholder="Shop name">
                    <span style="color:red">Max Size: Width:100px,Height:100px</span>
                </div>

                <div class="col-md-4">
                    <label for="">Banner</label>
                    <input type="file" class="form-control" name="shop_banner" placeholder="Shop name">
                    <span style="color:red">Max Size: Width:12000px,Height:500px</span>
                </div>


                <div class="col-md-12">
                    <h4 style="font-weight: 400;padding-top:13px">Shop Security:</h4>
                </div>

                <div class="col-md-6">
                    <label for="">Password</label>
                    <input type="text" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="password">
                    @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>


                <div class="col-md-6">
                    <label for="">Confirm Password</label>
                    <input type="text" class="form-control" name="confirmed" placeholder="confirmed password">
                </div>

                <div class="col-md-12">
                    <button style="padding: 9px;margin-top: 10px;float: right;margin-top: 12px;margin-left: 5px;" class="btn btn-success">Submit</button>
                    <button style="padding: 8px;margin-top: 10px;float: right;margin-top: 12px;margin-left: 5px;" class="btn btn-danger">Close</button>
                </div>

               </form>

            </div>
        </div>
        </div>
    </section>


    <br>
    <br>

@section('client-footer')

    <script>
        $( window ).on("load", function() {
            $('.cd-dropdown').removeClass('dropdown-is-active');
        });

    </script>

@endsection
@endsection