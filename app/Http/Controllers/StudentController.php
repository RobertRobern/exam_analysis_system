<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Guardian;
use App\Models\Stream;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\StudentSubject;
use App\Models\Subject;

class StudentController extends Controller
{
    public function __construct(){
        // Check if the user have logged in
        $this->middleware(['auth']);
    }

    public function index(){
        // $students = Student::orderBy('id', 'DESC')->get();
        $students = Student::with('classes','guardian', 'subjects', 'stream')->orderBy('id', 'DESC')->get();
        $streams = Stream::with('student')->orderBy('id')->get();
        $classes = Classes::with('streamsMany')->orderBy('id', 'DESC')->get();
        $guardians = Guardian::orderBy('id')->get();

        $subjects = Subject::orderBy('name', 'ASC')->get();
        $name = Classes::where('name', 'Form 1');
        $test = Classes::all();

            // $class->id;
            // if ($classes->name == $name) {
            //     dd($classes->id);
            // }

        // dd($name);
        // dd($test);
        // dd($students->find(1)->guardian);
        // foreach ($students as $student) {
        //     // dd($student);
        //    foreach ($student->classes as $s) {
        //     dd($s);
        //     foreach ($s as $key => $value) {
        //         # code...
        //     }
        //    }
        // }

        foreach ($students as $student) {
            // dd($student->guardian->id);
        //    foreach ($student->guardian as $guardian) {
        //     var_dump($guardian->name);

        //    }
        }
        // dd($streams);

        return view('student', compact('students','streams', 'classes', 'guardians', 'subjects'));
    }

    public function saveStudent(Request $request){
        // dd($request);

        $request->validate([

            'admissionNumber' => 'required|unique:students,id|string',
            'studentname' => 'required|string|max:255',
            'dateOfbirth' => 'required|date',
            'dateOfEnrollment' => 'required|date',
            'gender' => 'required|string|max:255',
            // 'stream' => 'required|string|max:255',
            'parent' => 'required|string|max:255',
            'class' => 'required|string|max:255',
            'subject' => 'required'

            // yyyy-m-dd

        ]);

        // |email:rfc,dns

        $classes = new Classes();
        $streams = new Stream();
        $guardians = new Guardian();

        $classname = Classes::where('name', $request->input('class'))->get();
        $streamname = Stream::where('name', $request->stream);
        $guardianname = Stream::where('surname', $request->parent);


        $student = new Student();
        // $subject = new StudentSubject();
        $student->adminno = $request->admissionNumber;
        $student->guardian_id = $request->parent;
        $student->classes_id = $request->class;
        // $student->stream_id = $request->stream;
        $student->name = $request->studentname;
        $student->dob = $request->dateOfbirth;
        $student->enrollment = $request->dateOfEnrollment;
        $student->gender = $request->gender;
        // $subject->subjects = json_encode($request->subject);


        $student->save();

        // $subject = Subject::find($request->subject);
        // $student->subjects()->attach($subject);

        $subj = Student::orderBy('id', 'DESC')->first();
        $subj->subjects()->sync($request->subject);




        // return $request->input();

        // check on the streams field

        return back()->with('Student_saved', 'Student has been saved successfully');
    }

    public function editStudent($id){
        $students = Student::with('guardian','stream')->find($id);
        $streams = Stream::orderBy('name', 'ASC')->get();
        $guardians = Guardian::orderBy('name', 'ASC')->get();
        $studentsubjects = StudentSubject::orderBy('id', 'ASC');
        $classes = Classes::orderBy('id')->get();


        foreach($studentsubjects as $studentsubject){
            $studentId = $studentsubject->student_id;
            if ($studentId == $id) {

                $findsubjects = StudentSubject::find($id);
                break;

                return view('edits.editstudent', compact('students', 'classes',  'findsubjects'));
            }

        }

        // foreach ($students as $student) {
        //     foreach ($student->pivot->stream as $streams) {
        //         // dd($streams->id);
        //     }
        //     // dd($student);
        // }
        // dd($students);
        // $student_Assigned_Subjects = ;

        return view('edits.editstudent', compact('students', 'streams', 'classes'));
    }

    public function updateStudent(Request $request){

        $student = Student::find($request->id);
        $student->adminno = $request->admissionNumber;
        // $student->school_id = $request->defaultschool;
        $student->guardian_id = $request->parent;
        $student->classes_id = $request->class;
        $student->name = $request->studentname;
        $student->dob = $request->dateOfbirth;
        $student->enrollment = $request->dateOfEnrollment;
        $student->gender = $request->gender;
        $student->save();

        $subject = Subject::find($request->subject);
        $student->subjects()->sync($subject);

        // $students = Student::with('classes','guardian', 'subjects')->orderBy('id', 'DESC')->get();


        return redirect()->route('student')->with('Student_updated', 'Student has been updated succesfully');
    }


    public function deleteStudent($id){
        Student::find($id)->delete();

        $subject = Subject::find($id);
        $student = new Student();
        $student->subjects()->detach($subject);

        return back()->with('Student_deleted','Student has been deleted succesfully');
    }
}
