<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    public function cohortSession(){
        return $this->belongsTo(CohortSession::class);
    }

    public function subjects(){
        return $this->hasMany(Subject::class);
    }

    public function marks(){
        return $this->hasMany(Marks::class);
    }
    public function grades(){
        return $this->hasMany(Grade::class);
    }
}
