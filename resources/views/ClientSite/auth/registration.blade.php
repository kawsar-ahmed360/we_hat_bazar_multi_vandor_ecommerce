@extends('ClientSite.master')

@section('title') Registration Page @endsection

@section('client-content')




    <div class="xs-breadcumb">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('MainIndex')}}"> Home</a></li>
                    <li class="breadcrumb-item"><a href="">Customer Registration</a></li>

                </ol>
            </nav>
        </div>
    </div>

    <section class="shop-single section-padding">
        <div class="container">
            <div class="row">

                <div class="col-md-3">

                </div>


                <div class="col-md-5">
                    <div class="tab-pane" >
                        <br>
                        <br>
                        <h5 class="heading-design-h5 text-center"></h5>
                        <form action="{{route('CustomerRegistartionPost')}}" method="post">
                            @csrf
                            <fieldset class="form-group">
                                <label>Enter Email/Mobile number</label>
                                <input type="text" name="mobile" id="regis_mobile" class="form-control @error('mobile') is-invalid @enderror" placeholder="+91 123 456 7890">
                                @error('mobile')
                                <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                               </span>
                                @enderror
                            </fieldset>
                            <fieldset class="form-group">
                                <label>Enter Password</label>
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="********">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                               </span>
                                @enderror

                            </fieldset>
                            <fieldset class="form-group">
                                <label>Enter Confirm Password </label>
                                <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="********">

                                @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                               </span>
                                @enderror
                            </fieldset>
                            <div class="">
                                <input type="checkbox" class="" id="">
                                <label class="" for="customCheck2">I Agree with <a href="#">Term and Conditions</a></label>
                            </div>

                            <div class="login-with-sites">
                                <p>Login Form ->   <a href="{{route('CustomerLoginPage')}}" style="float: right;height: 7px;background: #f1d1f8;font-weight: inherit;color: #501757;" class="btn btn-info btn-sm">Login</a></p>


                            </div>
                            <fieldset class="form-group" style="display: contents;">
                                <button style="padding: 9px;margin-top: 4px;background: #d901fe;" type="submit" class="btn btn-lg btn-secondary btn-block">Create Your Account</button>
                            </fieldset>

                        </form>
                    </div>
                </div>
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