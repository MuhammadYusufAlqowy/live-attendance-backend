<?php

namespace App\Http\Controllers;

use App\Charts\AttendanceChart;
use App\Models\Attendance;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $totalAdmin = User::where('is_admin','1')->count();
        $totalUser = User::count();
        
        $chart = new AttendanceChart;
        $chart->labels(['In','Out','Total User']);
        $chart->dataset('In', 'doughnut', [Attendance::countAttendance(false), Attendance::countAttendance(true), Attendance::countAttendance(true)])->backgroundColor(['rgb(255, 99, 132)','rgb(54, 162, 235)','rgb(255, 205, 86)']);

        return view('dashboard',['totalAdmin'=>$totalAdmin,'totalUser'=>$totalUser, 'type_menu'=>'dashboard', 'chart'=>$chart]);
    }
}
