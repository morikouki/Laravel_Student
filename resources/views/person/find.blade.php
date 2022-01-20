@extends('layouts.parent')

@section('title', 'Person.find')

@section('menubar')
@parent
検索ページ
@endsection

@section('content')
<form action="/person/find" method="post">
    @csrf
    <input type="text" name="input" value="{{$input}}">
    <input type="submit" value="find">
</form>
@if (isset($item))
<table>
    <tr>
        <th>DATA</th>
    </tr>
    <tr>
        <td>{{$item->getData()}}</td>
    </tr>
</table>
@endif
@endsection