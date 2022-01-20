<!DOCTYPE html>
<html lang="ja">

<head>
    <title>PHP Laravel入門</title>
</head>

<body>

</body>

<table>
    <tr>
        <th>ID</th>
        <th>NAME</th>
        <th>MAIL</th>
        <th>AGE</th>
    </tr>
    @foreach($items as $item)
    <tr>
        <td>{{$item->id}}</td>
        <td>{{$item->name}}</td>
        <td>{{$item->mail}}</td>
        <td>{{$item->age}}</td>
    </tr>
    @endforeach
</table>

<!-- ページネーションのボタン指定 -->
{{$items->links('pagination::bootstrap-4') }}

</html>