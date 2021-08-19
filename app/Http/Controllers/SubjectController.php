<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\SubjectFamily;
use Facade\FlareClient\Http\Response;

class SubjectController extends Controller
{
    public function __construct(){
        // Check if the user have logged in
        $this->middleware(['auth']);
    }

    public function index(){
        // $students = Student::orderBy('id', 'DESC')->get();
        $subjects = Subject::with('subjectFamily')->orderBy('id', 'DESC')->get();
        $subjectfamilys = SubjectFamily::orderBy('name', 'ASC')->get();
        // dd($subjectfamilys->all());

        return view('subject', compact('subjects', 'subjectfamilys'));
    }

    public function saveSubject(Request $request){

        $request->validate([
            'subjectCode' => 'required|unique:subjects,code|string',
            'subjectName' => 'required|string|max:255',
            'subjectFamily' => 'required|string|max:255',
            // yyyy-m-dd
        ]);

        $subject = new Subject();
        $subject->code = $request->subjectCode;
        $subject->name = $request->subjectName;
        $subject->subject_family_id = $request->subjectFamily;
        $subject->save();

        //  check on the streams field

        return back()->with('Subject_saved', 'Subject has been saved successfully');


        // Start of testing of Ajax programming

        // $data = $request->validate([
        //     'subjectCode' => 'required|unique:subjects,code|string',
        //     'subjectName' => 'required|string|max:255',
        //     'subjectFamily' => 'required|string|max:255',
        //     // yyyy-m-dd
        // ]);
        // $subjects = Subject::create($data);
        // return response()->json(array($subjects));

        // End of testing of Ajax programming
    }

    public function editSubject($id){
        $subjects = Subject::with('subjectFamily')->find($id);

        // dd($subjects->code);

        return view('edits.editsubject', compact('subjects'));
    }

    public function updateSubject(Request $request){

        $subject = Subject::find($request->id);
        $subject->code = $request->subjectCode;
        $subject->name = $request->subjectName;
        $subject->subject_family_id = $request->subjectFamily;
        $subject->save();


        return redirect()->route('subjects')->with('Subject_updated', 'Subject has been updated succesfully');
    }


    public function deleteSubject($id){
        Subject::find($id)->delete();
        return back()->with('Subject_deleted','Subject has been deleted succesfully');
    }


    public function subjFamily(){
        return view('subj-family');
    }
}
