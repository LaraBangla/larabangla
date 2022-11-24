<?php

namespace App\Http\Controllers\Admin\Versions;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Frontend\Technology\Chapter;
use App\Models\Frontend\Technology\Technology;
use Illuminate\Support\Facades\Crypt;
use App\Models\Frontend\Technology\Version;

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
    public function create($id)
    {
        $decripted_id = Crypt::decryptString($id);
        $technology = Technology::whereId($decripted_id)->first();
        if ($technology)
        {
            return view('backend.versions.add',compact('technology'));
        }
        else
        {
            notify()->error('Technology not found!','Not found');
           return back();
        }


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        $decripted_id = Crypt::decryptString($id);
        $technology = Technology::whereId($decripted_id)->first();

        if ($technology)
        {
            $request->validate([
                'name' => 'required|string|max:255',
                'slug' => 'required|string|unique:versions|max:255',
            ]);

            $data = [
                'name' => $request->name,
                'slug' => strtolower($request->slug),
                'technology_id' => $technology->id,
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
        else
        {
            notify()->error('Technology not found!','Not found');
           return back();
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($technology_id,$version_id)
    {
        $tech_id = Crypt::decryptString($technology_id);
        $v_id = Crypt::decryptString($version_id);

        $find = Version::whereId($v_id)->whereTechnology_id($tech_id)->first();

        if ($find)
        {

            $chapters = Chapter::whereVersion_id($v_id)->whereTechnology_id($tech_id)->orderBy('id','desc')->get();

            return view('backend.versions.show',compact('find','chapters'));
        }
        else
        {
            notify()->error('Version not found!','Not found');
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
        $decripted_id = Crypt::decryptString($id);

        $find = Version::whereId($decripted_id)->first();
        if ($find)
        {

            $request->validate([
                'name' => 'required|string|max:255',
                'slug' => "required|string|unique:versions,slug,$id|max:255",
            ]);

            $data = [
                'name' => $request->name,
                'slug' => strtolower($request->slug),
            ];
                // update data
                $update = $find->update($data);
                if ($update)
                {
                    notify()->success('Version updated successfully!','Successful');
                    return back();
                }
                else
                {
                    notify()->error('Failed to update Version!','Failed');
                    return back();
                }

        }
        else
        {
            notify()->error('Version not found!','Not found');
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

       $find = Version::whereId($decripted_id)->first();
       if ($find)
       {
           try
           {
               $find->delete();
               notify()->success('Version deleted!','Successful');
               return back();
           }
           catch (\Throwable $th)
           {
               notify()->error('Failed to delete Version!','Failed');
               return back();
           }
       }
       else
       {
           notify()->error('Version not found!','Not found');
           return back();
       }
    }

}
