<?php

namespace App\Models\Frontend\Technology;

use Illuminate\Database\Eloquent\Model;
use App\Models\Frontend\Technology\TechnologyDivision;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Technology extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'technology_division_id',
        'name',
        'slug',
        'status',
        'path_folder_name',
        'order',
        'keywords',
        'image',
    ];

    public function division()
    {
        return $this->belongsTo(TechnologyDivision::class, 'technology_division_id', 'id');
    }

    // get single lesson
    public function lesson()
    {
        return $this->hasOne(Lesson::class, 'technology_id', 'id');
    }
}
