<?php

namespace App\Models;

use App\Scopes\ScopePerson;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Board;

class Person extends Model
{
    use HasFactory;

    //idは自動採番なので「値を用意しておかない項目」という指定をしている。
    protected $quarded = array('id');

    // 保存したいフィールドはfillable変数に指定しないといけない
    protected $fillable = ['name', 'mail', 'age'];

    public static $rules = array(
        'name' => 'required',
        'mail' => 'email',
        'age' => 'numeric|min:0|max:150',
    );

    // hasOneメソッドでは相手が一つの場合に取得できる
    public function board()
    {
        return $this->hasOne('App\Models\Board');
    }

    // hasManyメソッドは相手が複数あるときに取得できる
    public function boards()
    {
        return $this->hasMany('App\Models\Board');
    }

    protected static function boot()
    {
        parent::boot();

        // addGlobalScopeという静的メソッドを使用してスコープを追加する
        // static::addGlobalScope('age', function (Builder $builder) {
        //     // 下記は年齢が30より大きい人を表示する。これにより、Personクラスで取得されるユーザーは全て年齢が30より大きい人になる
        //     $builder->where('age', '>', 30);
        // });

        // Scopeクラスとして独立させたスコープを呼び出している。
        static::addGlobalScope(new ScopePerson);
    }

    public function getData()
    {
        return $this->id . ': ' . $this->name . '(' . $this->age . ')';
    }

    // nameフィールドとイコールになる値を検索するスコープ
    public function scopeNameEqual($query, $str)
    {
        return $query->where('name', $str);
    }

    // ageの値が引数の値と等しいかもっと大きいものに絞り込むスコープ
    public function scopeAgeGreaterThan($query, $n)
    {
        return $query->where('age', '>=', $n);
    }

    // ageの値が引数の値と等しいかもっと小さいものに絞り込むスコープ
    public function scopeAgeLessThan($query, $n)
    {
        return $query->where('age', '<=', $n);
    }
}
