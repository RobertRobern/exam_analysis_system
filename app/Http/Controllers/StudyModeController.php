<?php

namespace App\Http\Controllers;

use App\Models\StudyMode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudyModeController extends Controller
{
    //
    public function __construct(){
        // Check if the user have logged in
        $this->middleware(['auth']);
    }
    public function index(){
        $studymodes = StudyMode::orderBy('id', 'DESC')->get();

        return view('studymode', compact('studymodes'));
    }

    public function saveStudyMode(Request $request){

        $request->validate([
            'studyMode' => 'required|string|unique:study_modes,name|max:255',

        ]);

        $request->old('studyMode');

        $studymodes = new StudyMode();
        $studymodes->name = $request->studyMode;
        $studymodes->save();

        return back()->with('StudyMode_saved', 'New Study Mode has been saved succesfully');
    }

    public function editStudyMode($id){
        $studymodes = StudyMode::find($id);
        // $cohortsessions = CohortSession::find($id)->with('sessionType')->get();
        // $cohortsessions = StudyMode::with('sessionType')->find($id);
        // dd($cohortsessions);
        return view('edits.editstudymode', compact('studymodes'));

    }

    public function updateStudyMode(Request $request){



        $studymodes = StudyMode::find($request->id);
        $studymodes->name = $request->studyMode;
        $studymodes->save();

        return redirect()->route('studymode')->with('StudyMode_updated', 'Study Mode has been updated succesfully');

    }

    public function deleteStudyMode($id){

        DB::table('study_modes')->where('id', $id)->delete();

        return back()->with('StudyMode_deleted', 'Study Mode has been deleted succesfully');

    }
}
