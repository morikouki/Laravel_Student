<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    use HasFactory;

    protected $quarded = array('id');
    protected $fillable = ['person_id', 'title', 'message'];

    public static $rules = array(
        'person_id' => 'required',
        'title' => 'required',
        'message' => 'required',
    );

    // belongsToでperson側を取得している
    public function person()
    {
        // 相手のモデルを指定　belongsToメソッドは、主テーブル(Person)とは逆の従テーブルからのレコード取得使用する
        return $this->belongsTo('App\Models\Person');
    }

    public function getData()
    {
        // optionalメソッドは、データがないもの(null)の時もエラーにならない
        return $this->id . ': ' . $this->title . '(' . optional($this->person)->name . ')';
    }
}
