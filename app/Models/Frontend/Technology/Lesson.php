<?php

namespace App\Models\Frontend\Technology;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;
    protected $fillable = [
        'technology_id',
        'version_id',
        'order',
        'name',
        'slug',
    ];
}
