@extends('ClientSite.master')

@section('title') Login Page @endsection

@section('client-content')


    <div class="xs-breadcumb">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('MainIndex')}}"> Home</a></li>
                    <li class="breadcrumb-item"><a href="">Customer Login</a></li>

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
               <div class="tab-pane active" id="login" role="tabpanel">
                   <form action="{{route('CustomerLoginPost')}}" method="post">
                       @csrf
                       <br>
                       <h5 class="heading-design-h5 text-center"></h5>
                       <fieldset class="form-group">
                           <label>Enter Email/Mobile number</label>
                           <input type="text" class="form-control" name="mobile" placeholder="+91 123 456 7890">
                       </fieldset>
                       <fieldset class="form-group">
                           <label>Enter Password</label>
                           <input type="password" name="password" class="form-control" placeholder="********">
                       </fieldset>
                       <div class="login-with-sites">
                           <p>Registration Form ->   <a href="{{route('CustomerRegistartionPage')}}" style="float: right;height: 7px;background: #f1d1f8;font-weight: inherit;color: #501757;" class="btn btn-info btn-sm">Registration</a></p>


                       </div>
                       <fieldset class="form-group" style="display: contents;">
                           <button style="padding: 9px;margin-top: 4px;background: #d901fe;" type="submit" class="btn btn-lg btn-secondary btn-block">Login Account</button>
                       </fieldset>

                       <div class="custom-control custom-checkbox">
                           <input type="checkbox" class="custom-control-input" id="customCheck1">
                           {{--<label class="custom-control-label" for="customCheck1">Remember me</label>--}}
                       </div>
                   </form>
               </div>
           </div>
        </div>
    </div>
    </div>
    </section>


    @section('client-footer')

        <script>
            $( window ).on("load", function() {
                $('.cd-dropdown').removeClass('dropdown-is-active');
            });

        </script>

        @endsection

    @endsection