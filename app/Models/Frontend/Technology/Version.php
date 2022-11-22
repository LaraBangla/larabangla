<?php

namespace App\Models\Frontend\Technology;

use Illuminate\Database\Eloquent\Model;
use App\Models\Frontend\Technology\TechnologyDivision;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Version extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'division_id',
        'technology_id'
    ];

    // get single division
    public function division()
    {
        return $this->hasOne(TechnologyDivision::class, 'id','division_id');
    }

    // get single technology
    public function technology()
    {
        return $this->hasOne(Technology::class, 'id','technology_id');
    }

}
