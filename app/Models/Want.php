<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Want extends Model
{
    //テーブル名
    protected $table = 'wants';

    //可変項目
    protected $fillable =
    [
        'content',
        'point'
    ];

    public $timestamps = false;
}
