<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guardian extends Model
{
    use HasFactory;

    // protected $primaryKey = 'idno';
    // public $incrementing = false;
    // public $keyType = 'unsignedInteger';

    public function students(){
        return $this->hasMany(Student::class);
        // return $this->belongsTo('App\Models\School');
    }
}
