
<table>
@foreach($authors as $a)
    <tr>
        <td>{{$a->name}}</td>
        <td><img src="{{$a->avatar}}" alt="{{$a->avatar}}" srcset=""></td>
    </tr>
@endforeach
</table>