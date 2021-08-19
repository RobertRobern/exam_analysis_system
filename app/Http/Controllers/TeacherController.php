<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherController extends Controller
{
    //
    public function __construct(){
        // Check if the user have logged in
        $this->middleware(['auth']);
    }
    public function index(){
        return view('teacher');
    }
}
