<?php

namespace App\Http\Controllers\Admin\Versions;

use App\Http\Controllers\Controller;
use App\Models\Frontend\Technology\Version;
use Illuminate\Http\Request;

class VersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Version::orderBy('id','desc')->paginate(50);
        return view('backend.versions.all',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.versions.add');
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
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:versions|max:255',
            'division' => 'required|numeric',
            'technology' => 'required|numeric',
        ]);

        $data = [
            'name' => $request->name,
            'slug' => strtolower($request->slug),
            'division_id' => $request->division,
            'technology_id' => $request->technology,
        ];

        $store = Version::create($data);
        if ($store)
        {
            notify()->success('Version added successfully!','Successful');
            return back();
        }
        else
        {
            notify()->error('Failed to store Version!','Failed');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $find = Version::whereId($id)->first();
        return view('backend.versions.edit',compact('find'));

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
