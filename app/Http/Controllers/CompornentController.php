<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompornentController extends Controller
{
    //
    public function index()
    {
        return view('component');
    }

    public function each()
    {
        $data = [
            ['name' => '山田', 'age' => 22],
            ['name' => '高橋', 'age' => 11],
            ['name' => '森', 'age' => 25]
        ];
        return view('each', ['data' => $data]);
    }
}
