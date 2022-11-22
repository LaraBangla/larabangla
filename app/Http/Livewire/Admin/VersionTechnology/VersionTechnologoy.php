<?php

namespace App\Http\Livewire\Admin\VersionTechnology;

use App\Models\Frontend\Technology\Technology;
use App\Models\Frontend\Technology\TechnologyDivision;
use Livewire\Component;

class VersionTechnologoy extends Component
{
    public $division;
    public $technologies;

    public function mount()
    {
        $division = TechnologyDivision::orderBy('id','desc')->get();
        $this->division = $division;
    }

    public function get_technology($id)
    {

        $technologies = Technology::where('technology_division_id',$id)->orderBy('id','desc')->get();
        $this->technologies = $technologies;
    }

    public function render()
    {
        return view('livewire.admin.version-technology.version-technologoy');
    }
}
