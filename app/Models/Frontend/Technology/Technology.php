<?php

namespace App\Models\Frontend\Technology;

use Illuminate\Database\Eloquent\Model;
use App\Models\Frontend\Technology\TechnologyDivision;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        return $this->belongsTo(TechnologyDivision::class, 'technology_division_id', 'id');
    }


    // public function lastVersion()
    // {
    //     return $this->hasMany(Version::class, 'technology_id', 'id')->orderBy('id', 'desc')->take(1);
    // }

    // public function firstChapter()
    // {
    //     return $this->hasMany(Chapter::class, 'technology_id', 'id')->orderBy('id', 'asc')->take(1);
    // }

    // public function firstLesson()
    // {
    //     return $this->hasMany(Lesson::class, 'technology_id', 'id')->orderBy('id', 'asc')->take(1);
    // }
}
