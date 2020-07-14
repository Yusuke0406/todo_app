<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    //テーブルとの紐ずけ
    protected $table = 'categories';

    //可変項目
    protected $fillable =
    [
        'cat_name',
    ];

     //created_atを使わない
    public $timestamps = false;
}
