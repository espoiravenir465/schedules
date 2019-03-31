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
        
        $titles = ['GW沖縄旅行', '夏のハワイ旅行'];

        foreach ($titles as $title) {
            DB::table('schedules')->insert([
                'title' => $title,
                'owner_id' => $user->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
