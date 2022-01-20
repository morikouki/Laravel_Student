<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RensouController extends Controller
{
    //
    public function rensou($name = '名前の入力がありませんでした')
    {
        // 下記のように連想配列で値をviewに渡せばすっきりと渡せる
        $data = [
            'message' => 'これはコントローラーから渡されたメッセージです',
            'name' => $name
        ];

        return view('rensou', $data);
    }
}
