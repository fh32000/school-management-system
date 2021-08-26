<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Models\Section;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;

class DashboardController extends Controller
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
     * @return Renderable
     */
    public function index()
    {
        $data = [];
        $students_count = Student::count();
        $sections_count = Section::count();

        $count_this_month = Student::whereMonth('created_at', '=', Carbon::now()->month)
            ->count();
        $data['students']['count_this_month']=$count_this_month;
        $data['sections']['count']=$sections_count;
        $data['students']['count']=$students_count;
        $data['students']['growth'] =round($count_this_month/($students_count-$count_this_month),2)*100;
        $data_collect=collect($data);


        return view('dashboards.dashboard',compact('data_collect'));
    }
}
