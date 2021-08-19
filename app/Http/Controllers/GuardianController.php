<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guardian;

class GuardianController extends Controller
{
    //
    public function __construct(){
        // Check if the user have logged in
        $this->middleware(['auth']);
    }

    public function index(){
        // $guardians = Guardian::with('students')->get();
        // dd($guardians);
        $guardians = Guardian::orderBy('id', 'DESC')->get();

        return view('guardian', compact('guardians'));
    }

    public function saveGuardian(Request $request){

        $request->validate([
            'idNumber' => 'required|unique:guardians,id|integer',
            'surname' => 'required|string|max:255',
            'firstName' => 'required|string|max:255',
            'otherName' => 'required|string|max:255',
            'profession' => 'required|string|max:255',
            'phoneNumber' => 'required|unique:guardians,tel_number',
            'email' => 'required|string|unique:guardians,email',
            'gender' => 'required',
        ]);

        // |email:rfc,dns
        $guardian = new Guardian();
        $guardian->idnumber = $request->idNumber;
        $guardian->surname = $request->surname;
        $guardian->fname = $request->firstName;
        $guardian->oname = $request->otherName;
        $guardian->profession = $request->profession;
        $guardian->tel_number = $request->phoneNumber;
        $guardian->email = $request->email;
        $guardian->gender = $request->gender;
        $guardian->save();


        return back()->with('Guardian_saved', 'Parent/Guardian has been saved successfully');
    }

    public function editGuardian($id){
        $guardians = Guardian::find($id);

        return view('edits.editguardian', compact('guardians'));
    }

    public function updateGuardian(Request $request){

        $guardian = Guardian::find($request->id);
        $guardian->idnumber = $request->idNumber;
        $guardian->surname = $request->surname;
        $guardian->fname = $request->firstName;
        $guardian->oname = $request->otherName;
        $guardian->profession = $request->profession;
        $guardian->tel_number = $request->phoneNumber;
        $guardian->email = $request->email;
        $guardian->gender = $request->gender;
        $guardian->save();


        return redirect()->route('guardian')->with('Guardian_updated', 'Parent/Guardian has been updated succesfully');
    }


    public function deleteGuardian($id){
        Guardian::find($id)->delete();
        return back()->with('Guardian_deleted','Parent/Guardian has been deleted succesfully');
    }
}
