<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marks extends Model
{
    use HasFactory;

    public function student(){
        return $this->belongsTo(Student::class);
    }

    public function exam(){
        return $this->belongsTo(Exam::class);
    }

    // public function grade(){
    //     return $this->belongsTo(Grade::class);
    // }

    public function classes(){
        return $this->hasManyThrough(Classes::class, Student::class);
    }

    // public function cohortThrough(){
    //     return $this->hasManyThrough(CohortSession::class,Exam::class);
    // }
}
