<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ParaController extends Controller
{
    //任意パラメータのデフォルト値「"何も渡されてない"」と「3」をセットしている。
    public function index($msg = "何も渡されてない", $num = 3)
    {
        //paraCon.blade.phpのviewを返すようにし、値を２つ渡している
        return view('paraCon', compact('msg', 'num'));
    }
}
