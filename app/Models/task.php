<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //テーブルとの紐ずけ 
    protected $table = 'tasks';

    //可変項目
    protected $fillable =
    [
        'content',
        'due_date',
        'user_id',
        'cat_id'
    ];

    //created_atを使わない
    public $timestamps = false;

    //Carbonクラスのデータに置き換える処理
    protected $dates = [
        'due_date'
    ];

}