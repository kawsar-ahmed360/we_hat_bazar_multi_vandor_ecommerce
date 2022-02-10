@extends('UserDashboard.master')
@section('title') Contact Information  @endsection
@section('user-content')

    <div class="table-container">
        <div class="t-header">Contact Information  </div>
        <div class="">

            <div class="row gutters">


                <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-5">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">

                                <h3 style="font-family: monospace;font-weight: normal;">Contact Information  @if(@$edite) Edit: @else  @endif</h3>

                                <form action="@if(@$edite){{ route('UserContactInfoUpdate') }} @else @endif" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    @if(@$edite)
                                        <input type="hidden" value="{{@$edite->id}}"name="EditeId">
                                    @else

                                    @endif

                                    <div class="row gutters">


                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label for="inputName">Mobile Number</label>
                                                <input type="text" class="form-control @error('phone') is-invalid @enderror" @if(@$edite->phone) value="{{@$edite->phone}}" @else @endif name="phone" id="imgInp" placeholder="Enter phone">
                                                @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                               	 <strong style="color:red">{{$message}}</strong>
                                               </span>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label for="inputName">Address</label>
                                                <input type="text" class="form-control @error('cellphone') is-invalid @enderror" @if(@$edite->cellphone) value="{{@$edite->cellphone}}" @else @endif name="cellphone" id="imgInp" placeholder="Enter Address">
                                                @error('cellphone')
                                                <span class="invalid-feedback" role="alert">
                                               	 <strong style="color:red">{{$message}}</strong>
                                               </span>
                                                @enderror
                                            </div>
                                        </div>



                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label for="inputName">Email</label>
                                                <input type="email" class="form-control @error('email') is-invalid @enderror" @if(@$edite->email) value="{{@$edite->email}}" @else @endif name="email" id="imgInp" placeholder="Enter email">
                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                               	 <strong style="color:red">{{$message}}</strong>
                                               </span>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label for="inputName">Web</label>
                                                <input type="text" class="form-control @error('web') is-invalid @enderror" @if(@$edite->web) value="{{@$edite->web}}" @else @endif name="web" id="imgInp" placeholder="Enter web">
                                                @error('web')
                                                <span class="invalid-feedback" role="alert">
                                               	 <strong style="color:red">{{$message}}</strong>
                                               </span>
                                                @enderror
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


                <div class="col-xl-7 col-lg-7 col-md-7 col-sm-7 col-7">



                    <table id="copy-print-csv" class="table custom-table table-responsive">
                        <thead>
                        <tr>
                            <th>SL.</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Email</th>
                            <th>Web</th>

                        </tr>
                        </thead>
                        <tbody>
                        {{--@foreach($index as $key=>$index)--}}
                            <tr class="odd gradeX">
                                <td>1</td>
                                <td>{{ @$edite->phone }}</td>
                                <td>{{ @$edite->cellphone }}</td>
                                <td>{{ @$edite->email }}</td>
                                <td>{{ @$edite->web }}</td>
                                {{--<td>--}}
                                {{--@if(@$index->status=='1')--}}
                                {{--<span class="badge badge-success">Active</span>--}}
                                {{--@else--}}
                                {{--<span class="badge badge-danger">Deactive</span>--}}
                                {{--@endif--}}
                                {{--</td>--}}

                                {{--                        <td><img src="{{ asset('upload/Client/Category/'.$category->image) }}" class="img-thumbnail" width="100" height="100" /></td>--}}
                                {{--<td style="text-align: center;">--}}


                                    {{--<a href="{{route('TagEdite',$index->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>--}}
                                    {{--<a  href="{{route('TagDelete',$index->id)}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>--}}

                                {{--</td>--}}
                            </tr>

                        {{--@endforeach--}}


                        </tbody>
                    </table>
                </div>

            </div>






        </div>
    </div>


@endsection