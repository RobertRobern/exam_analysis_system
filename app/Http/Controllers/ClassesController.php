<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\CohortSession;
use App\Models\Stream;
use App\Models\StudyMode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClassesController extends Controller
{
    //
    public function __construct(){
        // Check if the user have logged in
        $this->middleware(['auth']);
    }

    public function index(){
        // $school = School::with('students')->get();
        // dd($school);
        $streams = Stream::with('classesMany')->orderBy('id', 'DESC')->get();
        $classes = Classes::with('studyMode', 'streamsMany', 'cohortSession')->orderBy('id', 'DESC')->get();
        $studymodes = StudyMode::orderBy('name', 'ASC')->get();
        $cohorts = CohortSession::orderBy('name', 'ASC')->get();
        // dd($classes->find(1));
        foreach ($classes as $class) {
            # code...
            // dd($class->cohortSession->name);
            foreach ($class->streamsMany as $studyMode) {
                # code...
                // dd($studyMode);
            }
        }
        // dd($streams);

        return view('classes', compact('classes', 'streams', 'studymodes', 'cohorts'));
    }

    public function saveClasses(Request $request){

        $request->validate([
            'classname' => 'required|string|unique:classes,name|max:255',
            'cohortType' => 'required',
            'startDate' => 'required|date',
            'endDate' => 'required|date',
            'modeOfStudy' => 'required',
            'stream' => 'required'
        ]);

        $request->old('classname');

        $classes = new Classes();
        $classes->name = $request->classname;
        $classes->cohort_session_id = $request->cohortType;
        $classes->start_date = $request->startDate;
        $classes->end_date = $request->endDate;
        $classes->study_mode_id = $request->modeOfStudy;
        $classes->notes = $request->notes;
        $classes->save();

        $stream = Stream::find($request->stream);
        $classes->streamsMany()->sync($stream);

        return back()->with('Classes_saved', 'New Class has been saved succesfully');
    }

    public function editClasses($id){
        $classes = Classes::with('cohortSession', 'studyMode', 'streamsMany')->find($id);
        $cohortsessions = CohortSession::orderBy('name','ASC')->get();
        $studymodes = StudyMode::orderBy('name','ASC')->get();
        $streams = Stream::orderBy('name','ASC')->get();


        // foreach ($classes->streamsMany as $stream) {
        //     # code...
        //     dd($stream->name);
        // }
        return view('edits.editclasses', compact('classes', 'cohortsessions','studymodes','streams'));

    }

    public function updateClasses(Request $request){
        // dd($request->input());

        $classes = Classes::find($request->id);
        $classes->name = $request->classname;
        $classes->cohort_session_id = $request->cohortType;
        $classes->start_date = $request->startDate;
        $classes->end_date = $request->endDate;
        $classes->study_mode_id = $request->modeOfStudy;
        $classes->notes = $request->notes;
        $classes->save();

        $stream = Stream::find($request->stream);
        $classes->streamsMany()->sync($stream);


        return redirect()->route('classes')->with('Classes_updated', 'Class has been updated succesfully');

    }

    public function deleteClasses($id){

        DB::table('classes')->where('id', $id)->delete();

        $stream = Stream::find($id);
        $classes = new Classes();
        $classes->streamsMany()->sync($stream);

        return back()->with('Classes_deleted', 'Class has been deleted succesfully');

    }


}
