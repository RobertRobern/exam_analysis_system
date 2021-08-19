<?php

namespace App\Http\Controllers;

use App\Models\CohortSession;
use App\Models\SessionType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CohortSessionController extends Controller
{

    public function __construct(){
        // Check if the user have logged in
        $this->middleware(['auth']);
    }
    public function index(){
        // $school = School::with('students')->get();
        // dd($school);
        $cohortsessions = CohortSession::with('sessionType')->orderBy('id', 'DESC')->get();
        $sessiontypes = SessionType::orderBy('id', 'DESC')->get();

        return view('cohortsession', compact('cohortsessions', 'sessiontypes'));
    }

    public function saveCohortSession(Request $request){

        $request->validate([
            'sessionName' => 'required|string|unique:cohort_sessions,name|max:255',
            'academicYear' => 'required|integer',
            'sessionType' => 'required|string|max:255',
            'startdate' => 'required|date',
            'enddate' => 'required|date',

        ]);

        $request->old('sessionName');

        $cohortsessions = new CohortSession();
        $cohortsessions->session_type_id = $request->sessionType;
        $cohortsessions->name = $request->sessionName;
        $cohortsessions->academic_year =  $request->academicYear;
        $cohortsessions->start_date = $request->startdate;
        $cohortsessions->end_date = $request->enddate;
        $cohortsessions->save();

        return back()->with('CohortSessions_saved', 'New Session Type has been saved succesfully');
    }

    public function editCohortSession($id){
        // $cohortsession = CohortSession::find($id);
        // $cohortsessions = CohortSession::find($id)->with('sessionType')->get();
        $cohortsessions = CohortSession::with('sessionType')->find($id);
        // dd($cohortsessions);
        return view('edits.editcohortsession', compact('cohortsessions'));

    }

    public function updateCohortSession(Request $request){



        $cohortsessions = CohortSession::find($request->id);
        $cohortsessions->session_type_id = $request->sessionType;
        $cohortsessions->name = $request->sessionName;
        $cohortsessions->academic_year =  $request->academicYear;
        $cohortsessions->start_date = $request->startdate;
        $cohortsessions->end_date = $request->enddate;
        $cohortsessions->save();

        return redirect()->route('cohortsession')->with('CohortSessions_updated', 'Session Type has been updated succesfully');

    }

    public function deleteCohortSession($id){

        DB::table('cohort_sessions')->where('id', $id)->delete();

        return back()->with('CohortSessions_deleted', 'Session Type has been deleted succesfully');

    }
}
