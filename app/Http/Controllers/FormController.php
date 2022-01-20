<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\HelloRequest;
use Illuminate\Support\Facades\Validator;

class FormController extends Controller
{

    public function index()
    {
        $data = [
            'msg' => 'お名前を入力してください',
        ];

        return view('form', $data);
    }
    //
    public function post(HelloRequest $request)
    {

        return view('form', ['msg' => '正しく入力されました']);
    }

    public function indexValidate()
    {
        return view('validateForm', ['msg' => 'お名前を入力してください']);
    }

    public function validatePost(Request $request)
    {
        $rules = [
            'name' => 'required',
            'msg' => 'required',
            'age' => 'numeric',
        ];

        $message = [
            'name.required' => '必ず入力してください',
            'msg.required' => 'メッセージは必ず入力してください',
            'age.numeric' => '年齢は数字で入力してください',
            'age.min' => '年齢は0以上でしてください',
            'age.max' => '年齢は200いかでしてくダサい',
        ];
        $validator = Validator::make($request->all(), $rules, $message);
        $validator->sometimes('age', 'min:0', function ($input) {
            return is_numeric($input->age);
        });
        $validator->sometimes('age', 'max:200', function ($input) {
            return is_numeric($input->age);
        });
        if ($validator->fails()) {
            return redirect('/validateForm')
                ->withErrors($validator)
                ->withInput();
        }
        return view('validateForm', ['msg' => '正しく入力されたよ']);
    }
}
