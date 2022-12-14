<?php

namespace App\Models\Frontend\Technology;

use Illuminate\Database\Eloquent\Model;
use App\Models\Frontend\Technology\Lesson;
use App\Models\Frontend\Technology\Chapter;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Frontend\Technology\Technology;
use App\Models\Frontend\Technology\TechnologyDivision;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Version extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name',
        'slug',
        'division_id',
        'technology_id',
        'path_folder_name',
        'order',
        'keywords',
    ];

    // get single division || fixed
    public function division()
    {
        return $this->belongsTo(TechnologyDivision::class, 'division_id', 'id');
    }

    // get single technology
    public function technology()
    {
        return $this->belongsTo(Technology::class, 'technology_id', 'id');
    }

    // get chapters
    public function chapters()
    {
        return $this->hasMany(Chapter::class, 'version_id', 'id')->orderBy('order', 'asc');     // 'foreign_key', 'local_key'

    }

    // get single lesson
    public function lesson()
    {
        return $this->hasOne(Lesson::class, 'version_id', 'id');
    }

    // get single chapter
    public function chapter()
    {
        return $this->hasOne(Chapter::class, 'version_id', 'id');
    }
}
