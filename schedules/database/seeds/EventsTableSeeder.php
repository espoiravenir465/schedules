<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        


    
$events = ['首里城見学'=>'10:00:00','沖縄そばランチ'=>'12:00:00'];


    foreach($events as $event_title=>$event_time){ 
    DB::table('events')->insert([
   'schedule_id'=>1,
    'event_title'=>$event_title,
    'event_time'=>$event_time,
    'created_at' => Carbon::now(),
    'updated_at' => Carbon::now(),
    ]);
    }
    


$events = ['ダイアモンドヘッド見学'=>'10:00:00','アラモアナセンターでショッピング'=>'14:00:00'];

    foreach($events as $event_title=>$event_time){
   DB::table('events')->insert([
       'schedule_id'=>2,
        'event_title'=>$event_title,
        'event_time'=>$event_time,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),

    ]);
    
    
    


        }
    }
}
