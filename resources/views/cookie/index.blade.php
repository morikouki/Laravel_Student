<!DOCTYPE html>
<html lang="ja">

<head>
    <title>PHP Laravel入門</title>
</head>

<body>

</body>
@section('content')
<p>{{$msg}}</p>
<form action="/cookiePost" method="post">
    <table>
        @csrf
        <tr>
            <th>Message:</th>
            <td>
                <input type="text" name="msg" value="{{old('msg')}}">
            </td>
        </tr>
        <tr>
            <th></th>
            <td><input type="submit" value="send"></td>
        </tr>
    </table>
</form>
@endsection


</html>