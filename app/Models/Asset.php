<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Asset extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'category_id',
        'asset_code',
        'name',
        'serial_number',
        'status',
        'purchase_date',
        'cost',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function assignments()
    {
        return $this->hasMany(AssetAssignment::class);
    }
}