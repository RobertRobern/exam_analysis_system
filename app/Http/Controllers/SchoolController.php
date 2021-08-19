<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\School;
use Illuminate\Support\Facades\DB;

class SchoolController extends Controller
{
    //
    public function __construct(){
        // Check if the user have logged in
        $this->middleware(['auth']);
    }
    public function index(){
        // $school = School::with('students')->get();
        // dd($school);
        $schools = School::orderBy('id', 'DESC')->get();

        return view('school', compact('schools'));
    }

    public function addSchool(){
        return view('school');

    }

    public function saveSchool(Request $request){

        $request->validate([
            'school_name' => 'required|string|unique:schools,name|max:255',
            'county' => 'required|string',
            'subcounty' => 'required|string',
            'postal_address' => 'required',
            'postal_code' => 'required',
            'tel_number' => 'required|',
            'email' => 'required|string|unique:schools,email|email:rfc,dns'
        ]);

        $request->old('school_name');

        $school = new School();
        $school->name = $request->name;
        $school->county = $request->county;
        $school->subcounty = $request->subcounty;
        $school->postal_address = $request->postal_address;
        $school->postal_code = $request->postal_code;
        $school->tel_number = $request->tel_number;
        $school->email = $request->email;
        $school->save();

        return back()->with('School_saved', 'New School has been saved succesfully');
    }

    public function editSchool($id){
        $schools = School::find($id);
        return view('editschool', compact('schools'));

    }

    public function updateSchool(Request $request){



        // $school = School::find($request->id);
        // $school->name = $request->name;
        // $school->county = $request->county;
        // $school->subcounty = $request->subcounty;
        // $school->postal_address = $request->postal_address;
        // $school->postal_code = $request->postal_code;
        // $school->tel_number = $request->tel_number;
        // $school->email = $request->email;
        // $school->save();

        DB::table('schools')->where('id', $request->id)->update([
            'name' => $request->name,
            'county' => $request->county,
            'subcounty' => $request->subcounty,
            'postal_address' => $request->postal_address,
            'postal_code' => $request->postal_code,
            'tel_number' => $request->tel_number,
            'email' => $request->email
        ]);


        return redirect()->route('school')->with('School_updated', 'School has been updated succesfully');

    }

    public function deleteSchool($id){

        DB::table('schools')->where('id', $id)->delete();

        return back()->with('School_deleted', 'School has been deleted succesfully');

    }
}
