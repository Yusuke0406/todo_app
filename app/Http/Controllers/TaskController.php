<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\Task;

use App\Http\Requests\StoreTask;

class TaskController extends Controller
{
    /**
     * タスク一覧を表示する
     * 
     * @return view
     */
    public function showList($id){
        // $tasks = Task::orderBy('due_date', 'asc')->where('user_id', Auth::id();)->get();
        $query = Task::query();
        $query->where('user_id',Auth::id());
        $query->orderBy('due_date', 'asc');
        $query->where('completed',1);
        $query->where('cat_id',$id);
        $tasks = $query->get();
        return view('task.list',['tasks' => $tasks ,'cat_id' => $id]);
    }


    public function store(StoreTask $request,$id){


        $user = Auth::user();
        $task = new Task();

        $task->content = $request->content;
        $task->due_date = $request->due_date;
        $task->user_id = Auth::id();
        $task->cat_id = $id;
        $task->save();

        return redirect("/task/$id");
    }

    public function complete($id){
        $user = Auth::user();
        $task = Task::find($id);

        $task->completed = 2;
        $task->save();

        $user->point = $user->point+1;
        $user->save();

        return redirect("/task/$task->cat_id");
    }
}
