<?php

namespace App\Models\Frontend\Technology;

use Illuminate\Database\Eloquent\Model;
use App\Models\Frontend\Technology\Lesson;
use App\Models\Frontend\Technology\Version;
use App\Models\Frontend\Technology\Technology;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Chapter extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'technology_id',
        'version_id',
        'order',
        'name',
        'slug',
        'keywords',
    ];

    public function version()
    {
        return $this->belongsTo(Version::class, 'version_id', 'id');
    }

    // get single technology
    public function technology()
    {
        return $this->belongsTo(Technology::class, 'technology_id', 'id');
    }

    // get that chapter lessons
    public function lessons()
    {
        return $this->hasMany(Lesson::class, 'chapter_id', 'id')->orderBy('id', 'asc');     // 'foreign_key', 'local_key'
    }
}
