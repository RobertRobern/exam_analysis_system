<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    public function gradescale(){
        return $this->hasMany(GradeScale::class);
    }

    public function exam(){
        return $this->belongsTo(Exam::class);
    }
}
