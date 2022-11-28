<?php

namespace App\Models\Frontend\Technology;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    use HasFactory;
    protected $fillable = [
        'technology_division_id',
        'name',
        'slug',
        'status',
    ];

    public function division()
    {
        return $this->belongsTo(TechnologyDivision::class, 'technology_division_id','id');
    }
}
