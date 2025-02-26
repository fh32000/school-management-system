<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Grade;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{


    public function index()
    {
        $school = request()->user()->school;
        $teachers = $school->teachers;
        $grades = $school->grades()->with(['sections', 'sections.classroom'])->get();
        return view('pages.attendances.sections', compact('grades', 'teachers'));
    }


    public function store(Request $request)
    {


        foreach ($request->attendences as $studentid => $attendence) {

            if ($attendence == 'presence') {
                $status = true;
            } else if ($attendence == 'absent') {
                $status = false;
            }

            Attendance::create([
                'student_id' => $studentid,
                'section_id' => $request->section_id,
                'day' => date('Y-m-d'),
                'status' => $status
            ]);

        }

        toastr()->success(__('messages.success'));
        return redirect()->back();

    }


    public function show($id)
    {
        $students = Student::with('attendance')->where('section_id', $id)->get();
        return view('pages.attendances.index', compact('students'));
    }

}
