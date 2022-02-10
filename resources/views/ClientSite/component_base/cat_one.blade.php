@section('category')

@foreach(@$category as $cat)
    <li><a href="#"> <img src="{{(@$cat->icon_image)?url('upload/Client/Icon_Category/'.@$cat->icon_image):''}}" style="height:20px; padding-right:10px" >{{@$cat->category_name}}</a></li>

@endforeach

@endsection


@section('category_two')

    @foreach(@$category as $cat)
        <option value="women's-clothing-accessories">{{@$cat->category_name}}</option>
    @endforeach

@endsection