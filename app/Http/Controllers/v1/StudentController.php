<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;
use App\Models\BloodType;
use App\Models\Classroom;
use App\Models\Gender;
use App\Models\Grade;
use App\Models\Guardian;
use App\Models\Nationality;
use App\Models\Section;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    public function index()
    {
        $school= request()->user()->school;
        $students= $school->students;
        return view('pages.students.index', compact('students'));
    }

    public function edit($id)
    {
        $school= request()->user()->school;
        $student= $school->students()->findOrFail($id);;
        $data['grades'] =   request()->user()->school->grades;

        $data['guardians'] = Guardian::all();
        $data['genders'] = Gender::all();
        $data['nationalities'] = Nationality::all();
        $data['blood_types'] = BloodType::all();
        return view('pages.students.edit', $data, compact('student'));
    }

    public function update(StudentRequest $request)
    {
        $school= request()->user()->school;
        $student= $school->students()->findOrFail($request->id);
        $input = $request->only((new Student())->getFillable());
        $input['name'] = ['ar' => $request->name_ar, 'en' => $request->name_en];
        if ($request->has('password')) {
            $input['password'] = bcrypt($request->password);
        }

        if ($request->has('attachments')) {

            $student->addMultipleMediaFromRequest(['attachments'])
                ->each(function ($fileAdder) {
                    $fileAdder->toMediaCollection('attachments');
                });
        }

        $student->update($input);
        toastr()->success(__('messages.success'));
        return redirect()->route('students.show', $request->id);


    }


    public function create()
    {
        $data['grades'] = request()->user()->school->grades;

        $data['guardians'] = Guardian::all();
        $data['genders'] = Gender::all();
        $data['nationalities'] = Nationality::all();
        $data['blood_types'] = BloodType::all();
        $data['classrooms'] = Classroom::all();
        $data['sections'] = Section::all();

        return view('pages.students.add', $data);

    }

    public function show($id)
    {
        $school= request()->user()->school;
        $student= $school->students()->findOrFail($id);
        return view('pages.students.show', compact('student'));
    }


    public function store(StudentRequest $request)
    {
        $input = $request->only((new Student())->getFillable());
        $input['name'] = ['en' => $request->name_en, 'ar' => $request->name_ar];
        $input['password'] = bcrypt($request->password);
        $student = Student::create($input);

        if ($request->has('attachments')) {

            $student->addMultipleMediaFromRequest(['attachments'])
                ->each(function ($fileAdder) {
                    $fileAdder->toMediaCollection('attachments');
                });
        }

        toastr()->success(__('messages.success'));
        return redirect()->route('students.show', $student->id);

    }

    public function destroy(Request $request)
    {
        Student::destroy($request->id);
        toastr()->error(__('messages.delete'));
        return redirect()->route('students.index');
    }

}
