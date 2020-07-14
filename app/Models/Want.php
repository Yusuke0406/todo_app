<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Want extends Model
{
    //テーブルの紐ずけ
    protected $table = 'wants';

    //可変項目
    protected $fillable =
    [
        'content',
        'point'
    ];

     //created_atを使わない
    public $timestamps = false;
}
