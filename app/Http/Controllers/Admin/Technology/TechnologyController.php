<?php

namespace App\Http\Controllers\Admin\Technology;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use App\Models\Frontend\Technology\Technology;
use App\Models\Frontend\Technology\TechnologyDivision;
use App\Models\Frontend\Technology\Version;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Technology::orderBy('id','desc')->paginate(50);
        return view('backend.technology.all',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $division = TechnologyDivision::orderBy('id','desc')->get();
        return view('backend.technology.add_technology',compact('division'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'division' => 'required|numeric',
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:technologies|max:255',
        ]);

        $data = [
            'technology_division_id' => $request->division,
            'name' => $request->name,
            'slug' => strtolower($request->slug),
        ];

        $store = Technology::create($data);
        if ($store)
        {
            notify()->success('Technology added successfully!','Successful');
            return back();
        }
        else
        {
            notify()->error('Failed to store Technology!','Failed');
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $find = Technology::whereId($id)->first();
        if ($find)
        {
            $versions = Version::orderBy('id','desc')->get();
            return view('backend.technology.show',compact('find','versions'));
        }
        else
        {
            notify()->error('Technology not found!','Not found');
            return back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $division = TechnologyDivision::orderBy('id','desc')->get();
        $find = Technology::whereId($id)->first();
        return view('backend.technology.edit',compact('find','division'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $find = Technology::whereId($id)->first();
        if ($find)
        {

                $request->validate([
                    'division' => 'required|numeric',
                    'name' => 'required|string|max:255',
                    'slug' => "required|string|unique:technologies,slug,$id|max:255",
                ]);

                $data = [
                    'technology_division_id' => $request->division,
                    'name' => $request->name,
                    'slug' => strtolower($request->slug),
                ];

                // update data
                $update = $find->update($data);
                if ($update)
                {
                    notify()->success('Technology updated successfully!','Successful');
                    return back();
                }
                else
                {
                    notify()->error('Failed to update Technology!','Failed');
                    return back();
                }

        }
        else
        {
            notify()->error('Technology not found!','Not found');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $decripted_id = Crypt::decryptString($id);

       $find = Technology::whereId($decripted_id)->first();
       if ($find)
       {
           try
           {
               $find->delete();
               notify()->success('Technology Devision deleted!','Successful');
               return back();
           }
           catch (\Throwable $th)
           {
               notify()->error('Failed to delete Technology Devision!','Failed');
               return back();
           }
       }
       else
       {
           notify()->error('Technology not found!','Not found');
           return back();
       }
    }
}
