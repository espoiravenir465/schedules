<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PhotosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $events= ['首里城見学'=>1,'沖縄そばランチ'=>2,'ダイアモンドヘッド見学'=>3,'アラモアナセンターでショッピング'=>4];
        
        foreach($events as $event_title =>$event_id){ 
        DB::table('photos')->insert([
        'event_id'=>$event_id,
        'event_title'=>$event_title,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(), 
         ]);
         
         
        }
            
    }
}
