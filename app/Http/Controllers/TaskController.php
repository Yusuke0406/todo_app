<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\Task;

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

    public function store(Request $request){
        $user = Auth::user();
        $task = new Task();

        $task->content = $request->content;
        $task->due_date = $request->due_date;
        $task->user_id = 1;
        $task->category_id = 1;
        $task->save();

        redirect('/');
    }
}
