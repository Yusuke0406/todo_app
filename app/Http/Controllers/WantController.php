<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\Want;

use App\Http\Requests\StoreWant;

class WantController extends Controller
{
    //ログインしているユーザーのやりたいこと一覧を表示する
    public function index(){

        //やりたいこと取得の条件
        $query = Want::query();
        $query->where('user_id',Auth::id());
        $wants = $query->get();

        //取得したやりたいことをviewに返す
        return view('want.want',['wants' => $wants]);
    }

    //やりたいことを追加する

    //Http/Requests/WantTaskで型が当てはまっているかの確認
    public function store(StoreWant $request){
        $user = Auth::user();

        //インスタンスを生成し送られてきたデータを代入する
        $want = new Want();
        $want->content = $request->content;
        $want->point = $request->point;
        $want->user_id = Auth::id();
        $want->save();

        return redirect('/want');
    }

    //やりたいことを削除する
    public function delete($id){
        $user = Auth::user();
        $want = Want::find($id);

        //ポイントが足りていたらやりたいことを削除する
        if($want->point <= $user->point){
            //userポイントからwantポイントを引く
            $user->point = $user->point - $want->point;
            $user->save();
            Want::find($id)->delete();

            //削除した時にフラッシュメッセージを出す
            return redirect('/want')->with('flash_message', '購入できました！楽しんで！');;
        }
        else{
            //ポイントが足りていない時
            return redirect('/want')->with('flash_message', 'ポイントが足りません');
        }
    }

}
