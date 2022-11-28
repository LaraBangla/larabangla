<?php

namespace App\Models\Frontend\Technology;

use Illuminate\Database\Eloquent\Model;
use App\Models\Frontend\Technology\Technology;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Chapter extends Model
{
    use HasFactory;
    protected $fillable = [
        'technology_id',
        'version_id',
        'order',
        'name',
        'slug',
    ];

    public function version()
    {
        return $this->belongsTo(Version::class,'version_id','id' );
    }

    // get single technology
    public function technology()
    {
        return $this->belongsTo(Technology::class, 'technology_id', 'id');
    }



}
