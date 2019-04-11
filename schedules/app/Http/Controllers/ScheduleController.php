<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schedule;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateSchedule;



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
        
    $id= Auth::id();

     
    // フォルダモデルのインスタンスを作成する
    $schedule = new Schedule();
    // タイトル、日付に入力値を代入する
    $schedule->title = $request->title;
    $schedule->go_date = $request->go_date;
    $schedule->return_date = $request->return_date;
    // インスタンスの状態をデータベースに書き込む
     Auth::user()->schedules()->save($schedule);

     
     return redirect()->route('schedules.index', [
        'id'=>$id

    ]);
  
    }
    

}
