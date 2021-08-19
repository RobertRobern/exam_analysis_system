<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    // protected $guarded = [];

    public function school(){
        return $this->belongsTo(School::class);
        // return $this->belongsTo('App\Models\School');
    }

    public function guardian(){
        // return $this->belongsTo(Guardian::class, 'idno');
        return $this->belongsTo(Guardian::class);
    }

    public function classes(){
        return $this->belongsTo(Classes::class);
    }

    public function marks(){
        return $this->hasMany(Marks::class);
    }

    public function subjects(){
        return $this->belongsToMany(Subject::class)
        ->using(StudentSubject::class)
        ->withTimestamps();
    }

    public function classStream(){
        return $this->hasManyThrough(Stream::class, Classes::class);
    }

    public function stream(){
        return $this->hasManyThrough(Stream::class,ClassStream::class, 'classes_id','id','id', 'stream_id');
    }


}
