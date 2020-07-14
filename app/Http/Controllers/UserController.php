<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\Task;

use App\User;

class UserController extends Controller
{
    //
    public function index()
    {
        $user = Auth::user();
        $query = Task::query();
        $query->where('user_id',Auth::id());
        $query->where('completed', 2);
        $count = $query->count();
        return view('user.index', [
            'user' => $user,
            'count' => $count
        ]);
    }

    public function edit(){
        $user = Auth::user();
        return view('user.edit', ['user' => $user]);
    }

    public function update(Request $request){
        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        return redirect('user/{{$user->id}}');
    }
}
