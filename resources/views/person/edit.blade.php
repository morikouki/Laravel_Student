@extends('layouts.parent')

@section('title', 'Person.edit')

@section('menubar')
@parent
Person更新ページ
@endsection

@section('content')
<form action="/person/edit" method="post">
    <table>
        @csrf
        @error('name')
        {{$message}}
        @enderror
        <input type="hidden" name="id" value="{{$form->id}}">
        <tr>
            <th>name:</th>
            <td><input type="text" name="name" value="{{$form->name}}"></td>
        </tr>
        @error('mail')
        {{$message}}
        @enderror
        <tr>
            <th>mail:</th>
            <td><input type="text" name="mail" value="{{$form->mail}}"></td>
        </tr>
        @error('age')
        {{$message}}
        @enderror
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