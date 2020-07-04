<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //テーブル名 
    protected $table = 'tasks';

    //可変項目
    protected $fillable =
    [
        'content',
        'due_date',
        'user_id'
    ];

    //created_atを使わない
    public $timestamps = false;
}
 