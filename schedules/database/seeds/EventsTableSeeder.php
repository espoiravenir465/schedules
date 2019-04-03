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
        


    
$event_titles = ['首里城見学','沖縄そばランチ'];

    foreach($event_titles as $event_title){ 
    DB::table('events')->insert([
   'schedule_id'=>1,
    'event_title'=>$event_title,
    'created_at' => Carbon::now(),
    'updated_at' => Carbon::now(),
    ]);
    }
    


$event_titles = ['ダイアモンドヘッド見学','アラモアナセンターでショッピング'];

    foreach($event_titles as $event_title){
   DB::table('events')->insert([
       'schedule_id'=>2,
        'event_title'=>$event_title,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),

    ]);
    
    
    


        }
    }
}
