<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class task extends Model
{
    //テーブル名 
    protected $table = 'tasks';

    //可変項目
    protected $fillable =
    [
        'content',
        'due_date',
        'completed',
        'category_id'
    ];
}
 