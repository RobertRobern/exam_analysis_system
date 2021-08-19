<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function __construct(){
        // Check if the user have logged in
        $this->middleware(['auth']);
    }

    public function index(){
        // $guardians = Guardian::with('students')->get();
        // dd($guardians);
        // $grades = Grade::with('gradeScale')->find($id);
        $exams = Exam::with('cohortSession')->orderBy('id', 'DESC')->get();

        return view('exam', compact('exams'));
    }

    public function saveExam(Request $request){

        $request->validate([
            'examName' => 'required|unique:exams,name|string',
            'cohortSession' => 'required'
        ]);

        // |email:rfc,dns
        $exam = new Exam();
        $exam->name = $request->examName;
        $exam->cohort_session_id = $request->cohortSession;
        $exam->save();


        return back()->with('Exam_saved', 'Exam has been saved successfully');
    }

    public function editExam($id){
        $exams = Exam::with('cohortSession')->find($id);

        return view('edits.editexam', compact('exams'));
    }

    public function updateExam(Request $request){

        $exam = Exam::find($request->id);
        $exam->name = $request->examName;
        $exam->cohort_session_id = $request->cohortSession;
        $exam->save();


        return redirect()->route('exam')->with('Exam_updated', 'Exam has been updated succesfully');
    }


    public function deleteExam($id){
        Exam::find($id)->delete();
        return back()->with('Exam_deleted','Exam has been deleted succesfully');
    }
}
