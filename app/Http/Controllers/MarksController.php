<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\CohortSession;
use App\Models\Exam;
use App\Models\Grade;
use App\Models\Marks;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

class MarksController extends Controller
{
    public function __construct(){
        // Check if the user have logged in
        $this->middleware(['auth']);
    }

    // public function show(Marks $marks)
    // {
    //     $classes = $marks->classes()->get();
    //     $cohorts = $marks->cohortThrough()->get();

    //     return view('mark', compact('classes', 'cohorts'));
    // }


    public function index(){

        return view('mark');

    }

    public function saveMark(Request $request){

        // $request->validate([
        //     'studentName' => 'required|unique:exams,name|string',
        //     'cohortSession' => 'required'
        // ]);

        // |email:rfc,dns
        $mark = new Marks();
        $mark->exam_id = $request->examName;
        // $mark->subject_grade = $request->gradeName;
        $mark->student_id = $request->studentName;
        $mark->subject_id = $request->subjectName;
        $mark->save();
        dd($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Data inserted successfully'
        ]);


        // return back()->with('Mark_saved', 'Mark has been saved successfully');
    }

    public function editMark($id){
        $marks = Marks::with('student', 'exams', 'grade')->find($id);

        return view('edits.editmark', compact('marks'));
    }

    public function updateMark(Request $request){

        $mark = Marks::find($request->id);
        $mark->name = $request->examName;
        $mark->cohort_session_id = $request->cohortSession;
        $mark->save();


        return redirect()->route('mark')->with('Mark_updated', 'Mark has been updated succesfully');
    }


    public function deleteMark($id){
        Marks::find($id)->delete();
        return back()->with('Mark_deleted','Mark has been deleted succesfully');
    }

    public function search(Request $request){
        $marks = DB::table('students');
        if ($request->input('studentName')) {
            $marks = $marks->where('surname','LIKE', "%" .$request->studentName. "%");
        }

        $marks = $marks->paginate(5);
        return view('mark', compact('marks'));


        // $results = Student::where('surname', 'LIKE', '%{$request->studentName}%')->get();
        // foreach ($results as $res) {
        //     # code...
        //     dd($res->surname);
        // }
        // dd($results);
        // return $request->input();
        // return route('mark', compact('results'));
    }
}
