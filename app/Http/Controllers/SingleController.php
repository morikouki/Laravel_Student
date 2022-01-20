<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SingleController extends Controller
{
    //シングルコントローラーは「__invoke」メソッドだけを持っている。
    //これ以外のアクションメソッドの用意はしない。メソッドの追加はできるがアクションとして利用はできない。
    public function __invoke()
    {
        return view('single');
    }
}
