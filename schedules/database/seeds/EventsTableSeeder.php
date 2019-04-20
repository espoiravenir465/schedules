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
        
$events = [
            ['首里城見学','10:00:00','20190501','20190501'],
            ['沖縄そばランチ','12:00:00','20190503','20190501'],
            ['海水浴','18:00:00','20190504','20190501']
        ];
         
        foreach($events as $vals){ 
            DB::table('events')->insert([
                'schedule_id'=>1,
                'event_title'=>$vals[0],
                'event_date'=>$vals[2],
                'event_start_date'=>$vals[3],
                'event_time'=>$vals[1],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    
        $events = [
            ['ダイアモンドヘッド見学','10:00:00','20190801','20190801'],
            ['アラモアナセンターでショッピング','12:00:00','20190803','20190801'],
        ];
        foreach($events as $vals){ 
            DB::table('events')->insert([
                'schedule_id'=>2,
                'event_title'=>$vals[0],
                'event_date'=>$vals[2],
                'event_start_date'=>$vals[3],
                'event_time'=>$vals[1],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }


    }
}
