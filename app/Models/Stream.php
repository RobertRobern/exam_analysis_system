<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stream extends Model
{
    use HasFactory;
    public function classes(){
        // return $this->belongsTo(Classes::class);
    }

    public function classesMany(){
        return $this->belongsToMany(Classes::class)->withTimestamps()
        ->using(ClassStream::class);
    }

    public function student(){
        return $this->hasManyThrough(Student::class,ClassStream::class, 'stream_id','classes_id','id','classes_id');
    }


}
