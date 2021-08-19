<?php

namespace App\Http\Controllers;

use App\Models\SessionType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SessionTypeController extends Controller
{
    public function __construct(){
        // Check if the user have logged in
        $this->middleware(['auth']);
    }
    public function index(){
        // $school = School::with('students')->get();
        // dd($school);
        $sessiontypes = SessionType::orderBy('id', 'DESC')->get();

        return view('sessiontype', compact('sessiontypes'));
    }

    public function saveSessionType(Request $request){

        $request->validate([
            'sessionType' => 'required|string|unique:session_types,name|max:255',

        ]);

        $request->old('sessionType');

        $sessiontypes = new SessionType();
        $sessiontypes->name = $request->sessionType;
        $sessiontypes->save();

        return back()->with('SessionType_saved', 'New Session Type has been saved succesfully');

        // return $request->input();
    }

    public function editSessionType($id){
        $sessiontypes = SessionType::find($id);
        return view('edits.editsessiontype', compact('sessiontypes'));

    }

    public function updateSessionType(Request $request){



        $sessiontypes = SessionType::find($request->id);
        $sessiontypes->name = $request->sessionType;
        $sessiontypes->save();

        return redirect()->route('sessiontype')->with('SessionType_updated', 'Session Type has been updated succesfully');

    }

    public function deleteSessionType($id){

        DB::table('session_types')->where('id', $id)->delete();

        return back()->with('SessionType_deleted', 'Session Type has been deleted succesfully');

    }

}
