@extends('layouts.parent')

@section('title', 'Update')

@section('menubar')
@parent
更新ページ
@endsection

@section('content')
<form action="/student/update" method="post">
    <table>
        @csrf
        <!-- 対象のidはhiddenで隠す -->
        <input type="hidden" name="id" value="{{$form->id}}">
        <tr>
            <th>name:</th>
            <td><input type="text" name="name" value="{{$form->name}}"></td>
        </tr>
        <tr>
            <th>mail:</th>
            <td><input type="text" name="mail" value="{{$form->mail}}"></td>
        </tr>
        <tr>
            <th>age:</th>
            <td><input type="text" name="age" value="{{$form->age}}"></td>
        </tr>
        <tr>
            <td><input type="submit" value="send"></td>
        </tr>
    </table>
</form>
@endsection