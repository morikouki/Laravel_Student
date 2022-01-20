<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    //
    public function index(Request $request)
    {
        //peopleテーブルのモデルであるPersonクラスから全レコードを取得している
        // $items = Person::all();

        // boardテーブルのデータを取得してるPersonモデルを取得
        // has：指定のリレーションの値をもつ
        $hasItems = Person::has('boards')->get();

        // boardテーブルのデータを持っていないPersonモデルを取得
        // doesntHave：指定のリレーションの値を持たない
        $noItems = Person::doesntHave('boards')->get();

        // viewに渡す配列を用意
        $param = ['hasItems' => $hasItems, 'noItems' => $noItems];
        return view('person.index', $param);
    }

    public function find(Request $request)
    {
        return view('person.find', ['input' => '']);
    }

    public function search(Request $request)
    {
        //findはテーブルの「id」フィールドから特定の値を取得してくる
        // $item = Person::find($request->input);


        //whereによる検索は以下のようにする。first()で最初のレコードを得る。get()にすれば複数のレコードを得る。
        // $item = Person::where('name', $request->input)->first();

        //Personクラスに用意した、nameと同じ値を検索するスコープを呼び出している。scopeは書かなくていい
        // $item = Person::nameEqual($request->input)->first();

        //2つのスコープを組み合わせている。
        $min = $request->input * 1;
        $max = $min + 10;
        $item = Person::ageGreaterThan($min)->ageLessThan($max)->first();


        $param = ['input' => $request->input, 'item' => $item];
        return view('person.find', $param);
    }

    public function add(Request $request)
    {
        return view('person.add');
    }

    public function create(Request $request)
    {
        // Personモデルに記載してあるバリデーションの実行
        $this->validate($request, Person::$rules);

        // Personモデルのインスタンス作成
        $person = new Person;

        // 値を用意する
        $form = $request->all();

        // '_token'という値は、CSRF用非表示フィールドして用意される項目で、これ自身はテーブルにはないフィールドなのでここで削除している
        unset($form['_token']);

        // インスタンスに値を設定して保存
        $person->fill($form)->save();

        // fillメソッドを使用しないで下記のやり方でも保存可能
        // $person->name = $request->name;
        // $person->mail = $request->mail;
        // $person->age = $request->age;
        // $person->save();
        return redirect('/persons');
    }

    public function edit(Request $request)
    {
        $person = Person::find($request->id);
        return view('person.edit', ['form' => $person]);
    }

    public function update(Request $request)
    {
        $this->validate($request, Person::$rules);
        $person = Person::find($request->id);
        $form = $request->all();
        unset($form['_token']);
        $person->fill($form)->save();
        return redirect('/persons');
    }

    public function delete(Request $request)
    {
        $person = Person::find($request->id);
        return view('person.del', ['form' => $person]);
    }

    public function remove(Request $request)
    {
        Person::find($request->id)->delete();
        return redirect('/persons');
    }
}
