<?php


namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClassroomRequest;
use App\Http\Requests\StoreClassroom;
use App\Models\Classroom;
use App\Models\Customer;
use App\Models\Grade;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ClassroomController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $school= request()->user()->school;
        $classrooms= $school->classrooms;
        $grades= $school->grades;
        return view('pages.classrooms.index', compact('classrooms', 'grades'));

    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(ClassroomRequest $request)
    {
        foreach ($request->classrooms as $classroom) {
            $input[] = [
                'id' => (string)Str::uuid(),
                'name' => json_encode(['en' => $classroom['name_en'], 'ar' => $classroom['name_ar']]),
                'grade_id' => $classroom['grade_id']
            ];
        }

        $classrooms = Classroom::insert($input);

        toastr()->success(__('messages.success'));
        return redirect()->route('classrooms.index');

    }


    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     * @return Response
     */
    public function update(ClassroomRequest $request)
    {
        $school= request()->user()->school;
        $classroom =$school->classrooms()->findOrFail($request->id);
        $input = $request->only((new Classroom())->getFillable());
        $input['name'] = ['en' => $request->name_ar, 'ar' => $request->name_en];

        $classroom->update($input);
        toastr()->success(__('messages.update'));
        return redirect()->route('classrooms.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy(Request $request)
    {
        $school= request()->user()->school;
        $classroom =$school->classrooms()->findOrFail($request->id)->destroy($request->id);
        toastr()->error(__('messages.delete'));
        return redirect()->route('classrooms.index');

    }


    public function deleteAll(Request $request)
    {
        $delete_all_id = explode(",", $request->delete_all_id);

        Classroom::whereIn('id', $delete_all_id)->Delete();
        toastr()->error(__('messages.delete'));
        return redirect()->route('classrooms.index');
    }


    public function Filter_Classes(Request $request)
    {
        $grades= request()->user()->school->grades;
        $Search = Classroom::select('*')->where('grade_id', '=', $request->grade_id)->get();
        return view('pages.classrooms.index', compact('grades'))->withDetails($Search);

    }


}

?>
