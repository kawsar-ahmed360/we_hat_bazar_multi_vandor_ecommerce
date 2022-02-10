@extends('ClientSite.master')
@section('title') Wishlist @endsection

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
                                        <h5 class="heading-design-h5"> Wishlist </h5>
                                    </div>
                                    <div class="order-list-tabel-main table-responsive">
                                        <table id="example" class="datatabel table table-striped table-bordered order-list-tabel" width="100%" cellspacing="0">
                                            <thead>
                                            <tr>
                                                <th>Sl#</th>
                                                <th>Product Name</th>
                                                <th>Image</th>
                                                <th>Price</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @forelse(@$wishlist as $key=>$wish)
                                                <tr>
                                                    <td>#{{$key+1}}</td>
                                                    <td>{{@$wish->Product->product_name}}</td>
                                                    <td><img style="width: 50px;" src="{{asset('upload/Client/Product/'.$wish->Product->image)}}" alt=""></td>
                                                    <td>@if($wish->Product->discount)${{@$wish->Product->new_price}} @else ${{$wish->Product->product_price}} @endif</td>
                                                    <td>
                                                        <a data-toggle="tooltip" data-placement="top" id="delete" title="" href="{{route('customerWishDelete',base64_encode($wish->id))}}" data-original-title="View Detail" class="btn btn-danger btn-sm">
                                                            <i class="mdi mdi-delete"></i>
                                                        </a>

                                                        <a data-toggle="tooltip" data-placement="top"  title="" href="{{route('SinglePorduct',$wish->Product->slug)}}" data-original-title="View Detail" class="btn btn-info btn-sm">
                                                            <i class="mdi mdi-cart"></i>
                                                        </a>

                                                    </td>
                                                </tr>

                                            @empty

                                            @endforelse


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
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