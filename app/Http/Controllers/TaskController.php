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
        // $tasks = Task::orderBy('due_date', 'asc')->where('user_id', Auth::id();)->get();
        $query = Task::query();
        $query->where('user_id',Auth::id());
        $query->orderBy('due_date', 'asc');
        $query->where('completed',1);
        $tasks = $query->get();
        return view('task.list',['tasks' => $tasks]);
    }

    public function store(Request $request){
        $user = Auth::user();
        $task = new Task();

        $task->content = $request->content;
        $task->due_date = $request->due_date;
        $task->user_id = Auth::id();
        $task->category_id = 1;
        $task->save();

        return redirect('/task');
    }
}
