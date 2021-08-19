<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;

    public function students(){
        return $this->hasMany(Student::class);
    }

    public function term(){
        return $this->belongsTo(Term::class);
    }

    public function subjects(){
        return $this->hasMany(Subject::class);
    }

    // public function streams(){
    //     // return $this->hasMany(Stream::class);
    // }
    public function streamsMany(){
        return $this->belongsToMany(Stream::class)
        ->withTimestamps()
        ->using(ClassStream::class);
    }

    public function cohortSession(){
        return $this->belongsTo(CohortSession::class);
    }

    public function studyMode(){
        return $this->belongsTo(StudyMode::class);
    }
}
