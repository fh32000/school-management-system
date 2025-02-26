<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\GradeRequest;
use App\Http\Requests\StoreGrades;
use App\Models\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $grades= request()->user()->school->grades;
        return view('pages.grades.index', compact('grades'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(GradeRequest $request)
    {
        $input = $request->only((new Grade())->getFillable());
        $input['name'] = ['en' => $request->name_en, 'ar' => $request->name_ar];
        $grades= request()->user()->school->grades();
        $grades->create($input);
        toastr()->success(__('messages.success'));
        return redirect()->route('grades.index');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     * @return Response
     */
    public function update(GradeRequest $request)
    {
        $grades= request()->user()->school->grades();
        $grade =  $grades->findOrFail($request->id);
        $input = $request->only((new Grade())->getFillable());
        $input['name'] = ['en' => $request->name_en, 'ar' => $request->name_ar];
        $grade->update($input);
        toastr()->success(__('messages.update'));
        return redirect()->route('grades.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy(Request $request)
    {
        $grades= request()->user()->school->grades();
        $grade =  $grades->withCount('classrooms')->findOrFail($request->id);
        if ($grade->classrooms_count == 0) {
            $grade->delete();
            toastr()->error(__('messages.delete'));
            return redirect()->route('grades.index');
        } else {
            toastr()->error(__('grade.delete_grade_error'));
            return redirect()->route('grades.index');

        }


    }

}
