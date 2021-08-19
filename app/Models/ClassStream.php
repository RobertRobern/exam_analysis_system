<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ClassStream extends Pivot
{
    use HasFactory;
    protected $table = 'classes_stream';

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

    public function stream(){
        return $this->belongsTo(Stream::class);
    }

    public function classes(){
        return $this->belongsTo(Classes::class);
    }

    public function students(){
        return $this->hasManyThrough(Student::class, Classes::class);
    }
}
