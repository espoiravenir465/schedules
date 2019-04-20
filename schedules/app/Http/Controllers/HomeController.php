<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        // ログインユーザーを取得する
        $user = Auth::user();

        // ログインユーザーに紐づくしおりを一つ取得する
        $schedule = $user->schedules()->first();

        // まだ一つもしおりを作っていなければホームページをレスポンスする
        if (is_null($schedule)) {
            return view('home');
        }
       

        // しおりがあればそのしおりのスケジュール一覧にリダイレクトする
         $id= Auth::id();
        return redirect()->route('schedules.index', [
            'id'=>$id,
        ]);
    }
}
