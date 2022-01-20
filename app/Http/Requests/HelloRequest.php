<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use phpDocumentor\Reflection\PseudoTypes\True_;
use App\Http\Validators\HelloValidator;
use App\Rules\Myrule;

class HelloRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->path() == 'form/post') {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'msg' => 'required',
            'name' => 'required',
            //Ruleクラスを継承した「Myrule」クラスで作成したルールを適用している。
            'age' => ['numeric', new Myrule(5)],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '名前は必ず入力してください',
            'msg.required' => 'メッセージは必ず入力してください',
            'age.numeric' => '年齢は数字で入力してください',
            'age.hello' => 'Heloo!!入力は偶数のみ受け付けます。'
        ];
    }
}
