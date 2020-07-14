<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\Task;

use App\Http\Requests\StoreTask;

class TaskController extends Controller
{
    //タスク一覧を表示
    public function showList($id){
        //タスク取得の条件
        $query = Task::query();
        $query->where('user_id',Auth::id());
        $query->orderBy('due_date', 'asc');
        $query->where('completed',1);
        $query->where('cat_id',$id);
        $tasks = $query->get();

        //取得したタスクとカテゴリーのidをviewに返す
        return view('task.list',['tasks' => $tasks ,'cat_id' => $id]);
    }

    //タスクを追加する

    //Http/Requests/StoreTaskで型が当てはまっているかの確認
    public function store(StoreTask $request,$id){
        $user = Auth::user();

        //インスタンスを生成し送られてきたデータを代入する
        $task = new Task();
        $task->content = $request->content;
        $task->due_date = $request->due_date;
        $task->user_id = Auth::id();
        $task->cat_id = $id;
        $task->save();

        return redirect("/task/$id");
    }

    //タスクテーブルのcompleteを2に変更する
    //ユーザーに１ポイント追加する
    public function complete($id){
        $task = Task::find($id);
        $task->completed = 2;
        $task->save();
        
        $user = Auth::user();
        $user->point = $user->point+1;
        $user->save();

        //完了したタスクをcountする
        $query = Task::query();
        $query->where('user_id',Auth::id());
        $query->where('completed', 2);
        $count = $query->count();

        //completeを2に変更した時にフラッシュメッセージを出す
        //移籍できるポイントが貯まったタイミングでHOMEに戻りフラッシュメッセージを表示
        if($count % 10 == 0){
            return redirect("/")->with('flash_message', 'おめでとうございます！強いチームへ移籍しました！');
        }else{
            return redirect("/task/$task->cat_id")->with('flash_message', 'ポイントが貯まりました！');
        }
        
    }
}
