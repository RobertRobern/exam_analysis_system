<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\ClassStream;
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
    public function classStreamInnerJoin(){
        $innerJoin = DB::statement(" SELECT `classes`.`name` AS classname, `streams`.`name`
        AS streamname, `classes_stream`.`classes_id` AS classid, `classes_stream`.`stream_id`
        AS streamid FROM `classes_stream`
        INNER JOIN `classes` ON `classes_stream`.`classes_id` = `classes`.`id`
        INNER JOIN `streams` ON `classes_stream`.`stream_id` = `streams`.`id` ");

        return $innerJoin;
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

        $classstreams = ClassStream::with('classes','stream')->get();
        $user= Classes::where('name','Form 1')->get();
        // dd($user);
        foreach ($classstreams as $cs) {
            // var_dump($cs->stream->name);

            if ($cs->classes->name) {
                # code...
            } else {
                # code...
            }

        }
        foreach($streams as $stream){
            // var_dump($stream->name);
        }
        $innerJoin = DB::select(" SELECT `classes`.`name` AS classname, `streams`.`name`
        AS streamname, `classes_stream`.`classes_id` AS classid, `classes_stream`.`stream_id`
        AS streamid FROM `classes_stream`
        INNER JOIN `classes` ON `classes_stream`.`classes_id` = `classes`.`id`
        INNER JOIN `streams` ON `classes_stream`.`stream_id` = `streams`.`id` ");
        // dd($innerJoin);
        


        return view('classes', compact('classes', 'streams', 'studymodes', 'cohorts', 'innerJoin'));
    }

    public function saveClasses(Request $request){
        // dd($request->input());

        $request->validate([
            'classname' => 'required|string|max:255',
            'cohortType' => 'required',
            'startDate' => 'required|date',
            'endDate' => 'required|date',
            'modeOfStudy' => 'required',
            'stream' => 'required'
        ]);

        $innerJoin = DB::select(" SELECT `classes`.`name` AS classname, `streams`.`name`
        AS streamname, `classes_stream`.`classes_id` AS classid, `classes_stream`.`stream_id`
        AS streamid FROM `classes_stream`
        INNER JOIN `classes` ON `classes_stream`.`classes_id` = `classes`.`id`
        INNER JOIN `streams` ON `classes_stream`.`stream_id` = `streams`.`id` ");

        // foreach($innerJoin as $join){
        //     if ($join->classname == $request->classname && $join->streamname == $request->stream) {

        //         var_dump('Record already exists');
        //         return back();
        //     } else {

        //         $classes = new Classes();
        //         $classes->name = $request->classname;
        //         $classes->cohort_session_id = $request->cohortType;
        //         $classes->start_date = $request->startDate;
        //         $classes->end_date = $request->endDate;
        //         $classes->study_mode_id = $request->modeOfStudy;
        //         $classes->notes = $request->notes;
        //         $classes->save();

        //         $stream = Stream::find($request->stream);
        //         $classes->streamsMany()->sync($stream);

        //         return back()->with('Classes_saved', 'New Class has been saved succesfully');
        //     }

        // }

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
