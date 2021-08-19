<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    // protected $guarded = [];

    // protected $primaryKey = 'code';
    // public $incrementing = false;
    // public $keyType = 'unsignedInteger';

    public function classes(){
        return $this->belongsTo(Classes::class);
    }

    public function subjectFamily(){
        return $this->belongsTo(SubjectFamily::class);
    }

    public function exam(){
        return $this->belongsTo(Exam::class);
    }

    public function students(){
        return $this->belongsToMany(Student::class)->withTimestamps();
    }

}
