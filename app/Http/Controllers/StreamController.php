<?php

namespace App\Http\Controllers;

use App\Models\Stream;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StreamController extends Controller
{
    //
    public function __construct(){
        // Check if the user have logged in
        $this->middleware(['auth']);
    }
    public function index(){
        // $school = School::with('students')->get();
        // dd($school);
        $streams = Stream::orderBy('id', 'DESC')->get();
        // dd($streams);

        return view('stream', compact('streams'));
    }

    public function saveStream(Request $request){

        $request->validate([
            'streamName' => 'required|string|unique:streams,name|max:255',

        ]);

        $request->old('sessionType');

        $streams = new Stream();
        $streams->name = $request->streamName;
        $streams->save();

        return back()->with('Stream_saved', 'New Stream has been saved succesfully');

        // return $request->input();
    }

    public function editStream($id){
        $streams = Stream::find($id);
        return view('edits.editstream', compact('streams'));

    }

    public function updateStream(Request $request){



        $streams = Stream::find($request->id);
        $streams->name = $request->streamName;
        $streams->save();

        return redirect()->route('streams')->with('Stream_updated', 'Stream has been updated succesfully');

    }

    public function deleteStream($id){

        DB::table('streams')->where('id', $id)->delete();

        return back()->with('Stream_deleted', 'Stream has been deleted succesfully');

    }
}
