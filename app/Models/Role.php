<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'active',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function permission(){
        return $this->belongsToMany(Permission::class)
        ->withTimestamps()
        ->using(PermissionRole::class);
    }
}
