<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class club extends Model
{
    //テーブル名
    protected $table = 'clubs';

    protected $guarded=
    [
        'club',
        'image',
        'point',
    ];
}
