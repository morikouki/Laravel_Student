<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QueryController extends Controller
{
    //
    public function index(Request $request)
    {
        //クエリー文字列はルートパラメータとは違う受け取り方をする
        $data = [
            'message' => 'これはコントローラーから渡されたメッセージです。',
            //下記のように「$request->クエリー文字列」で受け取る
            'name' => $request->name
        ];

        return view('query', $data);
    }
}
