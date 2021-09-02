<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'description',
        'active',
    ];

    public function role(){
        return $this->belongsToMany(Role::class)
        ->withTimestamps()
        ->using(PermissionRole::class);
    }
}
