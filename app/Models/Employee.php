<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;
    
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
