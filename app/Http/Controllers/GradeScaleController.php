<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\GradeScale;
use Illuminate\Http\Request;


class GradeScaleController extends Controller
{
    public function index(){
        // $guardians = Guardian::with('students')->get();
        // dd($guardians);
        $gradescales = GradeScale::with('grade')->orderBy('letter_grade', 'ASC')->get();

        return view('gradescale', compact('gradescales'));
    }

    public function saveGradeScale(Request $request){

        $request->validate([
            // 'gradeLetter' => 'required|unique:grade_scales,letter_grade|string',
            'gradeLetter' => 'required|string',
            'gradePoint' => 'required|integer',
            'minimumMarks' => 'required|integer',
            'maximumMarks' => 'required|integer',
            // 'grade_id' => 'required|integer',
            // 'gradeName' => 'required|integer'

        ]);

        // grade_scale

        // |email:rfc,dns
        $gradescale = new GradeScale();
        $gradescale->grade_id = $request->grade_id;
        $gradescale->letter_grade = $request->gradeLetter;
        $gradescale->grade_point = $request->gradePoint;
        $gradescale->min_mark = $request->minimumMarks;
        $gradescale->max_mark = $request->maximumMarks;
        $gradescale->save();

        // TESTING COLLECTION

        $collection = collect([
            // ['grade_id' => $request->grade_id, 'grade_letter' => $request->gradeLetter, 'grade_point' => $request->gradePoint, 'min_mark' => $request->minimumMarks, 'max_mark' => $request->maximumMarks]

            ]);


        // $grade = Grade::find($request->grade_id);
        // $grade->grade_scale = $collection->sync(['grade_id' => $request->grade_id,'grade_letter' => $request->gradeLetter, 'grade_point' => $request->gradePoint, 'min_mark' => $request->minimumMarks, 'max_mark' => $request->maximumMarks]);
        // $grade->save();


        // dd($request->input());

        return back()->with('GradeScale_saved', 'Grade Scale has been saved successfully');
    }

    public function editGradeScale($request, $id){
        $gradescales = GradeScale::with('grade')->find($id);
        $grades = Grade::with('gradescale')->find($request);


        return view('edits.editgradescale', compact('gradescales','grades'));
    }

    public function updateGradeScale(Request $request){

        $gradescale = GradeScale::find($request->id);
        $gradescale->grade_id = $request->gradeId;
        $gradescale->letter_grade = $request->gradeLetter;
        $gradescale->grade_point = $request->gradePoint;
        $gradescale->min_mark = $request->minimumMarks;
        $gradescale->max_mark = $request->maximumMarks;
        $gradescale->save();

        // dd($request->input());
        // return redirect()->route('grade/{{$request->gradeId}}')->with('GradeScale_updated', 'Grade Scale has been updated succesfully');
        // return redirect()->Route::get('/grade/{{$request->gradeId}}', [App\Http\Controllers\GradeController::class, 'findGradeScale']);
        // return redirect('/grade/{{$request->gradeId}}');

        return redirect()->route('grade.find',['id' => $request->gradeId ])->with('GradeScale_updated', 'Grade Scale has been updated succesfully');
    }


    public function deleteGradeScale($id){
        GradeScale::find($id)->delete();
        return back()->with('GradeScale_deleted','Grade Scale has been deleted succesfully');
    }
}
