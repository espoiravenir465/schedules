<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SchedulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $user = DB::table('users')->first();
        
         DB::table('schedules')->insert([
                'title' => 'GW沖縄旅行',
                'owner_id' => $user->id,
                'go_date'=>'20190501',
                'return_date'=>'20190505',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
    
    
           DB::table('schedules')->insert([
                'title' => '夏のハワイ旅行',
                'owner_id' => $user->id,
                'go_date'=>'20190810',
                'return_date'=>'20190817',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        
    }
}
