<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CookieController extends Controller
{
    //
    public function index(Request $request)
    {
        //msgというキーのCookieが保存されているか確認
        if ($request->hasCookie('msg')) {
            //trueならCookieに保存されている情報を取得
            $msg = 'Cookie: ' . $request->cookie('msg');
        } else {
            $msg = '※クッキーはありません。';
        }
        return view('cookie.index', ['msg' => $msg]);
    }

    public function post(Request $request)
    {
        $validate_rule = [
            'msg' => 'required',
        ];
        $this->validate($request, $validate_rule);
        $msg = $request->msg;

        //responseメソッドでまずは、Responseを用意する。この戻り値からさらにviewメソッドを呼び出している。
        $response = response()->view(
            'cookie.index',
            ['msg' => '「' . $msg . '」をクッキーに保存しました']
        );

        //responseが用意できたらクッキーに保存する
        $response->cookie('msg', $msg, 100);

        //cookieメソッドで保存処理をしたresponseを返送しないとクッキーは保存されない
        //アクションメソッドでは return viewでしてたが、クッキーを利用する場合は、Responseを用意しCookieで保存してからそのResponseを返すようにする
        return $response;
    }
}
