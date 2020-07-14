<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\Task;

use App\User;

class UserController extends Controller
{
    //ログインしているユーザーのプロフィール画面表示
    public function index()
    {   
        //ログインしているユーザーの取得
        $user = Auth::user();

        //userが完了したタスクをcountで取得
        $query = Task::query();
        $query->where('user_id',Auth::id());
        $query->where('completed', 2);
        $count = $query->count();

        //上記で取得したcountとuserを付与してviewを返す
        return view('user.index', [
            'user' => $user,
            'count' => $count
        ]);
    }

    //ユーザーの編集画面の表示
    public function edit(){
        $user = Auth::user();

        //ログインしているユーザーを変数に入れviewに返す
        return view('user.edit', ['user' => $user]);
    }

    //ユーザー情報のUpdate機能
    public function update(Request $request){
        
        //送られてきた情報をuserに上書きする
        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        //プロフィール画面を表示する
        return redirect('user/{{$user->id}}');
    }
}
