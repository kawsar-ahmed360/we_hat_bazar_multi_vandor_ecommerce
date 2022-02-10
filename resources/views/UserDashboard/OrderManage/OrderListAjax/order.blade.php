
@php($sl=1)
@foreach(@$order as $key=>$or)
    <tr>
        <td><input type="checkbox" name="prints[]" id="allchec" value="{{@$or->id}}" multiple></td>
        <td>{{$key+1}}</td>
        <td>#{{$or->orderId}}</td>
        @if(@$or->customer['password'])
            <td>Register Customer</td>
        @else
            <td>Guest</td>
        @endif
        <td>{{ @$or->customer['name'] }}</td>
        <td>{{ @$or->customer['mobile'] }}</td>
        <td>{{ @$or->payments['payment'] }}</td>
        <td>${{ @$or->total_ammount }}</td>


        @if(@$or->status==2)
        <td><span class="badge badge-success"  onclick="NotApprove('{{@$or->id}}')" ><i class="fa fa-check"></i></span></td>
        @elseif(@$or->status==1)
            <td><span class="badge badge-danger" onclick="Approve('{{@$or->id}}')"><i class="fa fa-close"></i></span></td>
        @endif


        @if(@$or->shipping_status==2)
            <td><span class="badge badge-info" style="border-radius: 7px 4px 8px 0px"  onclick="ShipNotApprove('{{@$or->id}}')" ><i style="font-size: 14px;" class="fa fa-car"></i></span></td>
        @elseif(@$or->shipping_status==1)
            <td><span class="badge badge-danger" style="border-radius: 7px 4px 8px 0px" onclick="ShipApprove('{{@$or->id}}')"><i style="font-size: 14px;" class="fa fa-car"></i></span></td>
        @endif


        @if(@$or->order_complete==2)
            <td><span class="badge badge-info" style="border-radius: 7px 4px 8px 0px" >Complete</span></td>
        @elseif(@$or->order_complete==1)
            <td><span class="badge badge-danger" style="border-radius: 7px 4px 8px 0px" onclick="CompleteOrder('{{@$or->id}}')"><i style="font-size: 14px;" class="fa fa-check-circle"></i></span></td>
        @endif

        {{--<td>--}}
            {{--@if(@$or->status==1)--}}
            {{--<input type="button"  onclick="Approve('{{@$or->id}}')"  > Active--}}
                {{--@elseif(@$or->status==2)--}}
                {{--<input type="button"  onclick="NotApprove('{{@$or->id}}')"> Deactive--}}
            {{--@endif--}}
        {{--</td>--}}
        {{--<td>--}}

            {{--<a href="{{ route('CustomerOrderPDF',$or->id) }}" class="btn btn-primary btn-sm" title="Order Print"><i class="fa fa-print"></i></a>--}}
        {{--</td>--}}
    </tr>




@endforeach