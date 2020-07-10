<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * タスク一覧を表示する
     * 
     * @return view
     */
    public function index(){
        $query = Category::query();
        $query->where('user_id',Auth::id());
        $categories = $query->get();
        return view('category.index',['categories' => $categories]);
    }

    public function create(Request $request){
        $user = Auth::user();
        $task = new Category();

        $task->cat_name = $request->cat_name;
        $task->user_id = Auth::id();
        $task->save();

        return redirect('/');
    }
}
