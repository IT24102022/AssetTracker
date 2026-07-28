<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    
    protected $fillable = [
        'emp_code',
        'name',
        'email',
        'department',
        'is_active'
    ];

    public function assignments()
    {
        return $this->hasMany(AssetAssignment::class);
    }
}
