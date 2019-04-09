<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schedule;
use Illuminate\Support\Facades\Auth;



class ScheduleController extends Controller
{
    public function index(int $id)
    {
    $schedules = Schedule::where('user_id',$id)->get();

        return view('schedules/index', [
            'schedules' => $schedules,
        ]);
      
        
    }
    
    public function showCreateForm()
    {
    return view('schedules/create');
    }
    
    
    public function create(CreateSchedule $request)
    {
    // フォルダモデルのインスタンスを作成する
    $schedule = new Schedule();
    // タイトルに入力値を代入する
    $schedule->title = $request->title;
    // インスタンスの状態をデータベースに書き込む
     Auth::user()->schedules()->save($schedule);


    return redirect()->route('events.index', [
        'id' => $schedule->id,
    ]);

    }
}
