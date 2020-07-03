<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * タスク一覧を表示する
     * 
     * @return view
     */
    public function showList(){
        return view('task.list');
    }
}
