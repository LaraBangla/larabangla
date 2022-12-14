<?php

namespace App\Models\Frontend\Technology;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TechnologyDivision extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name',
        'slug',
        'order',
    ];

    public function technologies()
    {
        return $this->hasMany(Technology::class, 'technology_division_id', 'id')->orderBy('name', 'asc');     // 'foreign_key', 'local_key'
    }
}
