@extends('layouts.parent')

@section('title', 'Session')

@section('menubar')
@parent
Session登録ページ
@endsection

@section('content')
<p>{{$session_data}}</p>
<form action="/session" method="post">
    <table>
        @csrf
        <tr>

            <td><input type="text" name="input"></td>
        </tr>
        <tr>
            <td><input type="submit" value="send"></td>
        </tr>
    </table>
</form>
@endsection