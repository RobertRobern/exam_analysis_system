<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CohortSession extends Model
{
    use HasFactory;
    public function exams(){
        return $this->hasMany(Exam::class);
    }
    public function sessionType(){
        return $this->belongsTo(SessionType::class);
    }

    public function marksThrough(){
        return $this->hasManyThrough(Marks::class,Exam::class);
    }
    public function classes(){
        return $this->hasMany(Classes::class);
    }
}
