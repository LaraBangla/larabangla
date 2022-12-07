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

    // store division
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:technology_divisions|max:255',
        ]);

        // generate order for shorting
        $last_lesson = TechnologyDivision::orderBy('id', 'desc')->first();
        $last_lesson != null ? $last_id = $last_lesson->id + 1 : $last_id = 1;

        $data = [
            'name' => $request->name,
            'slug' => strtolower($request->slug),
            'order' => $last_id,
        ];

        $store = TechnologyDivision::create($data);
        if ($store)
        {
            notify()->success('Technology Devision added successfully!', 'Successful');
            return back();
        }
        else
        {
            notify()->error('Failed to store Technology Devision!', 'Failed');
            return back();
        }
    }

    // show all division
    public function show()
    {
        $data = TechnologyDivision::orderBy('id', 'desc')->paginate(50);

        return view('backend.division.all', compact('data'));
    }

    // edit division
    public function edit($id)
    {
        try
        {
            $find = TechnologyDivision::whereId($id)->first();
            return view('backend.division.edit', compact('find'));
        }
        catch (\Throwable $th)
        {
            notify()->error('Not found or something went wrong!', 'Failed');
            return back();
        }
    }

    // update division
    public function update(Request $request, $id)
    {
        $find = TechnologyDivision::whereId($id)->first();
        if ($find)
        {

            $request->validate([
                'name' => 'required|string|max:255',
                'slug' => "required|string|unique:technology_divisions,slug,$id|max:255",
                'order' => 'required|numeric',

            ]);

            $data = [
                'name' => $request->name,
                'slug' => strtolower($request->slug),
                'order' => $request->order,
            ];

            // update data
            $update = $find->update($data);
            if ($update)
            {
                notify()->success('Technology Division updated successfully!', 'Successful');
                return back();
            }
            else
            {
                notify()->error('Failed to update Technology Division!', 'Failed');
                return back();
            }
        }
        else
        {
            notify()->error('Division not found!', 'Not found');
            return back();
        }
    }

    // delete division
    public function destroy($id)
    {
        $find = TechnologyDivision::whereId($id)->first();
        if ($find)
        {
            try
            {
                $find->delete();
                notify()->success('Technology Division deleted!', 'Successful');
                return back();
            }
            catch (\Throwable $th)
            {
                notify()->error('Failed to delete Technology Division!', 'Failed');
                return back();
            }
        }
        else
        {
            notify()->error('Division not found!', 'Not found');
            return back();
        }
    }
}
