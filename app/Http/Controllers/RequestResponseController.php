<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RequestResponseController extends Controller
{
    //Requestはクライアントからサーバーへアクセスをした時、クライアントから送られてきた情報。
    //Responseはサーバーからクライアントへ返送する情報
    public function index(Request $request, Response $response)
    {
        $url = $request->url();
        $path = $request->path();
        $status = $response->status();
        return view('requestResponse', compact('request', 'response', 'url', 'path', 'status'));
    }
}
