<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class StudentSubject extends Pivot
{
    use HasFactory;

    protected $table = 'student_subject';

    public static function boot()
    {
        parent::boot();

        static::created(function($item){
            // listen to created events
            // dd($item);
        });

        static::deleted(function($item){
            // listen to deleted events
            // dd($item);
        });
    }
}
