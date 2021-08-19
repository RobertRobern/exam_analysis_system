<?php

namespace App\Http\Controllers;

use App\Models\SubjectFamily;
use Illuminate\Http\Request;

class SubjectFamilyController extends Controller
{
    //
    public function __construct(){
        // Check if the user have logged in
        $this->middleware(['auth']);
    }

    public function index(){
        // $students = Student::orderBy('id', 'DESC')->get();
        $subjectfamilys = SubjectFamily::orderBy('name', 'ASC')->get();
        // dd($subjectfamilys->all());

        return view('subj-family', compact( 'subjectfamilys'));
    }

    public function saveSubjectFamily(Request $request){

        $request->validate([
            'subjectFamily' => 'required|unique:subject_families,name|string',
            // yyyy-m-dd

        ]);

        $subjectfamilys = new SubjectFamily();
        $subjectfamilys->name = $request->subjectFamily;
        $subjectfamilys->save();

        return back()->with('SubjectFamily_saved', 'Subject Family has been saved successfully');
    }

    public function editSubjectFamily($id){
        $subjectfamilys = SubjectFamily::find($id);

        // dd($subjects->code);

        return view('edits.editsubjfamily', compact('subjectfamilys'));
    }

    public function updateSubjectFamily(Request $request){

        $subjectfamilys = SubjectFamily::find($request->id);
        $subjectfamilys->name = $request->subjectFamily;
        $subjectfamilys->save();


        return redirect()->route('subj-family')->with('Subject Family_updated', 'Subject Family has been updated succesfully');
    }


    public function deleteSubjectFamily($id){
        SubjectFamily::find($id)->delete();
        return back()->with('SubjectFamily_deleted','Subject Family has been deleted succesfully');
    }


}
