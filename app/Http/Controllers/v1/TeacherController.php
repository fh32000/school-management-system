<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTeachers;
use App\Http\Requests\TeacherRequest;
use App\Models\Gender;
use App\Models\Specialization;
use App\Models\Teacher;
use App\Repository\TeacherRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    public function index()
    {
        $school = request()->user()->school;
        $teachers = $school->teachers;
        return view('pages.teachers.teachers', compact('teachers'));
    }

    public function create()
    {
        $specializations = specialization::all();
        $genders = Gender::all();
        return view('pages.teachers.create', compact('specializations', 'genders'));
    }

    public function store(TeacherRequest $request)
    {
        $input = $request->only((new Teacher())->getFillable());
        $input['name'] = ['en' => $request->name_en, 'ar' => $request->name_ar];
        $input['password'] = bcrypt($request->password);
        $school = request()->user()->school;
        $teacher = $school->teachers()->create($input);
        toastr()->success(__('messages.success'));
        return redirect()->route('teachers.index');
    }


    public function edit($id)
    {
        $school = request()->user()->school;
        $teacher = $school->teachers()->findOrFail($id);
        $specializations = specialization::all();
        $genders = Gender::all();
        return view('pages.teachers.edit', compact('teacher', 'specializations', 'genders'));
    }


    public function update(TeacherRequest $request)
    {

        $school = request()->user()->school;
        $teacher = $school->teachers()->findOrFail($request->id);

        $input = $request->only((new Teacher())->getFillable());
        $input['name'] = ['ar' => $request->name_ar, 'en' => $request->name_en];
        if ($request->has('password')) {
            $input['password'] = bcrypt($request->password);
        }
        $teacher->update($input);

        toastr()->success(__('messages.update'));
        return redirect()->route('teachers.index');

    }


    public function destroy(Request $request)
    {
        $school = request()->user()->school;
        $teacher = $school->teachers()->findOrFail($request->id)->delete();
        toastr()->error(__('messages.delete'));
        return redirect()->route('teachers.index');
    }
}
