@forelse(@$panding_request as $key=>$panding_re)
    <tr>
        <td style="font-size: 12px;">{{@$key+1}}</td>
        <td style="font-size: 12px;">{{@$panding_re->request_amoung}}</td>
        <td style="font-size: 12px;">{{@$panding_re->payment}}</td>
        <td style="font-size: 12px;"><span class="badge badge-warning">Panding</span></td>

    </tr>

@empty
    <tr>
        <td colspan="5" style="text-align: center;font-family: cursive;color:red">Data Not Found</td>
    </tr>
@endforelse