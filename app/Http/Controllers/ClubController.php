<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\Club;

use App\Models\Task;

class ClubController extends Controller
{
    //
        /**
     * タスク一覧を表示する
     * 
     * @return view
     */
    public function index(){
        $user = Auth::user();
        $query = Task::query();
        $query->where('user_id',Auth::id());
        $query->where('completed', 2);
        $count = $query->count();

        if($count < 10){
          $club = Club::find(1);
          $rest = $club->point - $count;
        }elseif(10 <= $count && $count < 20){
          $club = Club::find(2);
          $rest = $club->point  - $count;
        }elseif(20 <= $count && $count < 30){
          $club = Club::find(3);
          $rest = $club->point - $count;
        }elseif(30 <= $count && $count < 40){
          $club = Club::find(4);
          $rest = $club->point - $count;
        }elseif(40 <= $count && $count < 50){
          $club = Club::find(5);
          $rest = $club->point - $count;
        }elseif(50 <= $count && $count < 60){
          $club = Club::find(6);
          $rest = $club->point - $count;
        }elseif(60 <= $count && $count < 70){
          $club = Club::find(7);
          $rest = $club->point - $count;
        }elseif(70 <= $count && $count < 80){
          $club = Club::find(8);
          $rest = $club->point - $count;
        }elseif(80 <= $count){
          $club = Club::find(9);
          $rest = 0;
        }

        return view('home')->with([
            'club'=>$club,
            'count'=>$count,
            'rest' => $rest,
        ]);
    }
}
