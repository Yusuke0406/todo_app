<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    //テーブルとの紐ずけ
    protected $table = 'clubs';

    protected $guarded =
    [
        "club",
        "point",
        "image",
    ];

}
