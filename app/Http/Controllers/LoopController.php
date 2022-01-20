<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoopController extends Controller
{
    //
    public function index()
    {
        $data = ["テスト1", "テスト2", "テスト3"];
        return view('loop', ['data' => $data]);
    }
}
