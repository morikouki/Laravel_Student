<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DbController extends Controller
{
    //
    // public function index(Request $request)
    // {
    //     //クエリ文字列にidというパラメータが送られてきたかチェック
    //     if (isset($request->id)) {

    //         //idをキーにした配列を用意する
    //         $param = ['id' => $request->id];

    //         //「:名前」はプレースホルダ（値を確保しておく場所のこと）で、その後の引数にある配列から値を指定の場所にはめ込んでSQL文を完成させる
    //         //ここの「:id」は$param変数内の「'id'」をセットしている。
    //         $items = DB::select('select * from people where id = :id', $param);
    //     } else {
    //         $items = DB::select('select * from people');
    //     }
    //     return view('db.index', ['items' => $items]);
    // }

    public function index(Request $request)
    {
        //DB::selectで書いていた全件取得は、DB::tableのクエリビルダに変えられる
        // 下記のようにgetメソッドに引数を渡せばそのフィールドだけを取得してくれる
        // $tems = DB::table('people')->get('id', 'name');
        // orderByで並び順を変えている
        // offsetメソッドで指定した位置からレコードを取得するoffset(1)は、２番目のレコードからの取得になる
        // limit(3)で、指定した数だけレコードを取得している。これは、3件取得
        // $items = DB::table('people')->offset(1)->limit(3)->orderBy('age', 'asc')->get();


        // simplePaginateメソッドでページネーションを使用。引数に項目数を指定。単純な前後の移動しかできない
        // paginateメソッドはページ番号のリンクも表示される
        $items = DB::table('people2')->paginate(5);
        return view('db.index', ['items' => $items]);
    }

    public function show(Request $request)
    {
        // //クエリ文字列でidを取得
        // $id = $request->id;

        // //whereはwhere句に該当するもの、firstメソッドは最初のレコードだけを返すもの
        // //where('id', '>', 5)と記載すれば、idが5より大きいものを取得してくるようにもできる。
        // $item = DB::table('people')->where('id', '>', $id)->first();
        // return view('db.show', ['item' => $item]);

        // $name = $request->name;
        // $items = DB::table('people')

        //     //クエリ文字列で受け取ったテキストを含んでいないか曖昧検索をしてる。
        //     ->where('name', 'like', '%' . $name . '%')

        //     //where->orWhereは、どちらかで指定したのがあれば検索返ってくる。or検索のようなもの
        //     ->orWhere('mail', 'like', '%' . $name . '%')
        //     ->get();
        // return view('db.show', ['items' => $items]);

        $min = $request->min;
        $max = $request->max;

        //whereRawを使用すれば、文字列で検索条件を指定できる。「?」のところに引数で渡した配列の値が入る。
        //min＝20,max=50だとしたら、20歳以上50歳以下のレコードを検索していることになる
        $items = DB::table('people')->whereRaw('age >= ? and age <= ?', [$min, $max])->get();
        return view('db.show', ['items' => $items]);
    }

    public function add(Request $request)
    {
        return view('db.add');
    }

    public function create(Request $request)
    {
        //formから送信されたデータを配列に入れる
        $param = [
            'name' => $request->name,
            'mail' => $request->mail,
            'age' => $request->age,
        ];

        // // DBクラスのinsertを使用して、SQL文のinsert文を使用。
        // DB::insert('insert into people (name, mail, age) values (:name, :mail, :age)', $param);

        //クエリビルダのやり方。insertメソッドでやるだけ
        DB::table('people')->insert($param);

        //リダイレクトでパス指定しないと変数が無いエラーになる。
        return redirect('/student');
    }

    public function edit(Request $request)
    {
        // //クエリ文字列で更新するデータのidを受け取る
        // $param = [
        //     'id' => $request->id
        // ];

        // //対象のidのデータを取得する
        // $item = DB::select('select * from people where id = :id', $param);

        //クエリビルダでの対象レコード取得
        $item = DB::table('people')->where('id', $request->id)->first;

        //更新対象のでーたをviewに渡す
        return view('db.edit', ['form' => $item]);
    }

    public function update(Request $request)
    {
        //formから送られてきたデータを取得
        $param = [
            'id' => $request->id,
            'name' => $request->name,
            'mail' => $request->mail,
            'age' => $request->age,
        ];

        // //updateメソッドでupdate文を実行する
        // DB::update('update people set name = :name, mail = :mail, age = :age where id = :id', $param);

        //クエリビルだでのupdate、whereで更新対象を指定してからupdateメソッドを実行する。
        DB::table('people')->where('id', $request->id)->update($param);
        return redirect('/student');
    }

    public function delete(Request $request)
    {
        //クエリ文字列で送られた対象のidを配列にセット
        $param = [
            'id' => $request->id
        ];

        // //対象のidのデータを取得
        // $item = DB::select('select * from people where id = :id', $param);

        //クエリビルダでの対象レコード取得
        $item = DB::table('people')->where('id', $param)->first();
        return view('db.del', ['form' => $item]);
    }

    public function remove(Request $request)
    {
        // //クエリ文字列で送られた対象のidを配列にセット
        // $param = ['id' => $request->id];

        // //DBクラスのdeleteメソッドでdelete文を使用して削除
        // DB::delete('delete from people where id = :id', $param);

        //クエリビルダでの削除
        DB::table('people')->where('id', $request->id)->delete();
        return redirect('/student');
    }
}
