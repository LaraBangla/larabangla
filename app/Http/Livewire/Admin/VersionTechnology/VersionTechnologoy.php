<?php

namespace App\Http\Livewire\Admin\VersionTechnology;

use App\Models\Frontend\Technology\Technology;
use App\Models\Frontend\Technology\TechnologyDivision;
use App\Models\Frontend\Technology\Version;
use Livewire\Component;

class VersionTechnologoy extends Component
{
    public $division;
    public $technologies;
    public $version;

    public function mount($version_id)
    {
        $division = TechnologyDivision::orderBy('id','desc')->get();
        $this->division = $division;

        $version = Version::whereId($version_id)->first();
        $this->version = $version;

        if (isset($version))
        {
            $technologies = Technology::where('technology_division_id',$version->division_id)->get();
            $this->technologies = $technologies;
        }
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
