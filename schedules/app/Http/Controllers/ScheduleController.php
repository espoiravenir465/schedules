<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schedule;

class ScheduleController extends Controller
{
    public function index(int $id)
    {
        $schedules = Schedule::where('owner_id',$id)->get();

        return view('schedules/index', [
            'schedules' => $schedules,
        ]);
    }
}
