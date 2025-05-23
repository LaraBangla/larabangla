<?php

namespace App\Models\Frontend\Technology;

use Illuminate\Database\Eloquent\Model;
use App\Models\Frontend\Technology\Chapter;
use App\Models\Frontend\Technology\Version;
use App\Models\Frontend\Technology\Technology;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lesson extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'technology_id',
        'version_id',
        'chapter_id',
        'order',
        'name',
        'slug',
        'title',
        'file',
        'status',
        'keywords',
        'description',
    ];



    // get single technology
    public function technology()
    {
        return $this->belongsTo(Technology::class, 'technology_id', 'id');
    }

    //get chapter
    public function chapter()
    {
        return $this->belongsTo(Chapter::class, 'chapter_id', 'id');
    }

    //get single version
    public function version()
    {
        return $this->belongsTo(Version::class, 'version_id', 'id');
    }
}
