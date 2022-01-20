<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Person;

class HelloController extends Controller
{
    //「hello」ディレクトリ配下の「index.blade」を表示する際は、「hello.index」と記載する
    public function index(Request $request)
    {
        // ログインチェック
        $user = Auth::user();
        $items = Person::all();
        $param = ['items' => $items, 'user' => $user];
        return view('hello.index', $param);
    }

    // セッションの利用
    public function ses_get(Request $request)
    {
        // セッションからmsgという値を取り出している
        $sesdata = $request->session()->get('msg');
        return view('hello.session', ['session_data' => $sesdata]);
    }

    public function ses_put(Request $request)
    {
        // 送信されたデータを取得
        $msg = $request->input;

        // セッションに'msg'という名前で保管
        $request->session()->put('msg', $msg);
        return redirect(('/session'));
    }
}
