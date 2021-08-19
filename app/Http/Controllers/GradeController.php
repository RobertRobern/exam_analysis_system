<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use Illuminate\Http\Request;
use App\Models\Grade;
use App\Models\GradeScale;
use Illuminate\Support\Collection;

class GradeController extends Controller
{
    public function __construct(){
        // Check if the user have logged in
        $this->middleware(['auth']);
    }

    public function index(){
        $grades = Grade::with('gradeScale', 'exam')->orderBy('id', 'DESC')->get();
        $exams = Exam::with('grades')->orderBy('id', 'DESC')->get();

        // $collection = new Collection([[67,34,89,56,23],[67,34,89,56,23]]);
        // $collection = Collect([[67,34,89,56,23],[67,34,89,56,23]]);
        // $marks = collect([
        //     ['ID' => '011176644', 'marks' => ['CSE401' => 87, 'CSE409' => 88]],
        //     ['ID' => '011176645', 'marks' => ['CSE402' => 69, 'CSE409' => 75]],
        //     ]);

        // dd($grades);

        return view('grade', compact('grades', 'exams'));
    }

    public function findGradeScale($id){
        $gradescales = GradeScale::with('grade')->get();
        $grades = Grade::with('gradescale')->find($id);

        // dd($grades->gradescale->id);
        return view('gradescale', compact('gradescales', 'grades'));
    }

    public function saveGrade(Request $request){

        $request->validate([
            'gradeName' => 'required|unique:grades,name|string',
        ]);

        $grade = new Grade();
        $grade->name = $request->gradeName;
        $grade->exam_id = $request->examId;
        // $grade->grade_scale = collect([]);
        $grade->save();


        return back()->with('GradeScale_saved', 'Grade Scale has been saved successfully');
    }

    public function editGrade($id){
        $grades = Grade::with('gradeScale')->find($id);

        return view('edits.editgrade', compact('grades'));
    }

    public function updateGrade(Request $request){

        $grade = Grade::find($request->id);
        $grade->name = $request->gradeName;
        $grade->save();


        return redirect()->route('grade')->with('GradeScale_updated', 'Grade Scale has been updated succesfully');
    }


    public function deleteGrade($id){
        Grade::find($id)->delete();
        return back()->with('GradeScale_deleted','Grade Scale has been deleted succesfully');
    }

}
