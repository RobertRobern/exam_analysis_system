<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;

    // protected $guarded = ['created_at','updated_at'];

    public function students(){
        return $this->hasMany(Student::class);
        // return $this->hasMany('App\Models\Student', 'school_id','id');
    }
}
