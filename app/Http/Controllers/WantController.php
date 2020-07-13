<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\Want;

use App\Http\Requests\StoreWant;

class WantController extends Controller
{
    /**
     * タスク一覧を表示する
     * 
     * @return view
     */
    public function index(){
        $query = Want::query();
        $query->where('user_id',Auth::id());
        $wants = $query->get();
        return view('want.want',['wants' => $wants]);
    }

    public function store(StoreWant $request){
        $user = Auth::user();
        $want = new Want();

        $want->content = $request->content;
        $want->point = $request->point;
        $want->user_id = Auth::id();
        $want->save();
        return redirect('/want');
    }

    public function delete($id){
        $user = Auth::user();
        $want = Want::find($id);
        if($want->point <= $user->point){
            $user->point = $user->point - $want->point;
            $user->save();
            Want::find($id)->delete();
            return redirect('/want')->with('flash_message', '購入できました！楽しんで！');;
        }
        else{
            return redirect('/want')->with('flash_message', 'ポイントが足りません');
        }
    }

}
