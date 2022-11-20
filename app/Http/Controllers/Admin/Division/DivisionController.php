<?php

namespace App\Http\Controllers\Admin\Division;

use App\Http\Controllers\Controller;
use App\Models\Frontend\Technology\TechnologyDivision;
use Illuminate\Http\Request;

class DivisionController extends Controller
{
    public function create()
    {
        return view('backend.division.add_devision');
    }

    // store devision
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required|unique:technology_divisions|max:255',
        ]);

        $data = [
            'name' => $request->name,
            'slug' => strtolower($request->slug),
        ];

        $store = TechnologyDivision::create($data);
        if ($store)
        {
            notify()->success('Technology Devision added successfully!','Successful');
            return back();
        }
        else
        {
            notify()->error('Failed to store Technology Devision!','Failed');
            return back();
        }

    }

    // show all division
    public function show()
    {
        $data = TechnologyDivision::orderBy('id','desc')->paginate(50);

        return view('backend.division.all',compact('data'));
    }

    // edit division
    public function edit($id)
    {
        try
        {
            $find = TechnologyDivision::whereId($id)->first();
            return view('backend.division.edit',compact('find'));
        }
        catch (\Throwable $th)
        {
            notify()->error('Not found or something went wrong!','Failed');
            return back();
        }
    }

    // update division
    public function update(Request $request,$id)
    {
        $find = TechnologyDivision::whereId($id)->first();
        if ($find)
        {

                $request->validate([
                    'name' => 'required|max:255',
                    'slug' => "required|unique:technology_divisions,slug,$id|max:255",
                ]);

                $data = [
                    'name' => $request->name,
                    'slug' => strtolower($request->slug),
                ];

                // update data
                $update = $find->update($data);
                if ($update)
                {
                    notify()->success('Technology Devision updated successfully!','Successful');
                    return back();
                }
                else
                {
                    notify()->error('Failed to update Technology Devision!','Failed');
                    return back();
                }

        }
        else
        {
            notify()->error('Division not found!','Not found');
            return back();
        }


    }
}
