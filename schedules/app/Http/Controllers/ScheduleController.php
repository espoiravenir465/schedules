<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schedule;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateSchedule;
use App\Event;
use Carbon\Carbon;



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
    
    public function detail(int $id)
    {
        $events = Event::where('schedule_id',$id)->get();
        $event_start_date = Event::select('event_start_date')->where('schedule_id',$id)->first();
        $startMonths = [201904 => ['y' => 2019,'m' => 4],201905 => ['y' => 2019,'m' => 5],201906 => ['y' => 2019,'m' => 6],201907 => ['y' => 2019,'m' => 7],201908 => ['y' => 2019,'m' => 8],
        201909=>['y'=>2019,'m'=>9],201910=>['y'=>2019,'m'=>10],201911=>['y'=>2019,'m'=>11],201912=>['y'=>2019,'m'=>12]];
        $days = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31];
        $startym = substr($event_start_date['event_start_date'],0,4).substr($event_start_date['event_start_date'],5,2);
        $startday = ltrim(substr($event_start_date['event_start_date'],8,2),'0');
        $columns = [0,1,2,3,4,5];
        $hours = [0 => ['s' => '0:00','r' => '0:00-1:00'],1 => ['s' => '1:00','r' => '1:00-2:00'],
        2 => ['s' => '2:00','r' => '2:00-3:00'],3 => ['s' => '3:00','r' => '3:00-4:00'],
        4 => ['s' => '4:00','r' => '4:00-5:00'],5 => ['s' => '5:00','r' => '5:00-6:00'],
        6 => ['s' => '6:00','r' => '6:00-7:00'],7 => ['s' => '7:00','r' => '7:00-8:00'],
        8 => ['s' => '8:00','r' => '8:00-9:00'],9 => ['s' => '9:00','r' => '9:00-10:00'],
        10 => ['s' => '10:00','r' => '10:00-11:00'],11 => ['s' => '11:00','r' => '11:00-12:00'],
        12 => ['s' => '12:00','r' => '12:00-13:00'],13 => ['s' => '13:00','r' => '13:00-14:00'],
        14 => ['s' => '14:00','r' => '14:00-15:00'],15 => ['s' => '15:00','r' => '15:00-16:00'],
        16 => ['s' => '16:00','r' => '16:00-17:00'],17 => ['s' => '17:00','r' => '17:00-18:00'],
        18 => ['s' => '18:00','r' => '18:00-19:00'],19 => ['s' => '19:00','r' => '19:00-20:00'],
        20 => ['s' => '20:00','r' => '20:00-21:00'],21 => ['s' => '21:00','r' => '21:00-22:00'],
        22 => ['s' => '22:00','r' => '22:00-23:00'],23 => ['s' => '23:00','r' => '23:00-24:00'],
        ];
       

        return view('schedules/detail', [
            'events' => $events,
            'schedule_id' => $id,
            'event_start_date' => $event_start_date,
            'startym' => $startym,
            'startMonths' => $startMonths,
            'days' => $days,
            'startday' => $startday,
            'columns' => $columns,
            'hours' => $hours,
        ]);
    }
    
   
    
   public function createevent(int $id, Request $request)
    {
        DB::table('events')->where('schedule_id', $id)->delete();
        //dd($request->request);
        $columns = [0,1,2,3,4,5];
        $hours = ["0:00","1:00","2:00","3:00","4:00","5:00","6:00","7:00","8:00","9:00","10:00","11:00","12:00","13:00","14:00","15:00","16:00","17:00","18:00","19:00","20:00","21:00","22:00","23:00"];
        // 1日目から6日目まで繰り返す
        foreach($columns as $column){
          // 0:00から23:00まで繰り返す
          foreach($hours as $hour){
            $title="title".$column.$hour;
            $current_schedule = Schedule::find($id);
            $event = new Event();
            $event->schedule_id = $id;
            
            $event->event_title = $request->$title;
            if($event->event_title == null){
                break;
            }
            if(strlen($request->startD)==1){
                $d = "0".$request->startD;
            }
            else{
                $d = $request->startD;
            }
            $event->event_start_date = new Carbon($request->startM.$d);
            $day = $d + $column;
            if(strlen($day)==1){
                $day = "0".$day;
            }
            //dd($day);
            $event->event_date = new Carbon($request->startM.$day);
            $event->event_time = new Carbon($hour);
    
            $current_schedule->events()->save($event);
        
          }
        }
    
        return redirect()->route('schedules.index', [
            'id' => $id,
        ]);
    } 

    
}

