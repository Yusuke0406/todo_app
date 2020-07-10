<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    //テーブル名 
    protected $table = 'categories';

    //可変項目
    protected $fillable =
    [
        'cat_name',
    ];

    public $timestamps = false;
}
