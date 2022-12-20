<?php

namespace App\Http\Controllers\Admin\Versions;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use App\Models\Frontend\Technology\Chapter;
use App\Models\Frontend\Technology\Version;
use App\Models\Frontend\Technology\Technology;

class VersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Version::orderBy('id', 'desc')->paginate(50);
        return view('backend.versions.all', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $decrypted_id = Crypt::decryptString($id);
        $technology = Technology::whereId($decrypted_id)->first();
        if ($technology)
        {
            return view('backend.versions.add', compact('technology'));
        }
        else
        {
            notify()->error('Technology not found!', 'Not found');
            return back();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $decrypted_id = Crypt::decryptString($id);
        $technology = Technology::whereId($decrypted_id)->first();

        if ($technology)
        {
            $request->validate([
                'name' => 'required|string|max:255',
                'slug' => 'required|string|unique:versions|max:255',
                'path_folder_name' => 'required|string|max:50',
                'keywords' => 'nullable|string|max:255',
            ]);

            // make studly folder name || remove word space and make as My folder => MyFolder
            $folderName =  strtolower(Str::studly($request->path_folder_name));

            // generate order for shorting
            $last = Version::orderBy('id', 'desc')->first();
            $last != null ? $last_id = $last->id + 1 : $last_id = 1;

            $data = [
                'name' => $request->name,
                'slug' => strtolower($request->slug),
                'technology_id' => $technology->id,
                'path_folder_name' => $folderName,
                'keywords' => $request->keywords,
                'order' => $last_id,
            ];

            $store = Version::create($data);
            if ($store)
            {
                notify()->success('Version added successfully!', 'Successful');
                return back();
            }
            else
            {
                notify()->error('Failed to store Version!', 'Failed');
                return back();
            }
        }
        else
        {
            notify()->error('Technology not found!', 'Not found');
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($technology_slug, $version_slug)
    {

        // find technology
        $find_technology = Technology::whereSlug($technology_slug)->first();
        if ($find_technology)
        {
            // find version
            $find = Version::whereSlug($version_slug)->whereTechnology_id($find_technology->id)->first();

            if ($find)
            {

                $chapters = Chapter::whereVersion_id($find->id)->whereTechnology_id($find_technology->id)->orderBy('id', 'asc')->get();

                return view('backend.versions.show', compact('find', 'chapters'));
            }
            else
            {
                notify()->error('Version not found!', 'Not found');
                return back();
            }
        }
        else
        {
            notify()->error('Technology not found!', 'Not found');
            return back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $find = Version::whereSlug($slug)->first();
        return view('backend.versions.edit', compact('find'));
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
        $decrypted_id = Crypt::decryptString($id);

        $find = Version::whereId($decrypted_id)->first();
        if ($find)
        {

            $request->validate([
                'name' => 'required|string|max:255',
                'slug' => "required|string|unique:versions,slug,$decrypted_id|max:255",
                'path_folder_name' => "required|string|max:50",
                'keywords' => 'nullable|string|max:255',
                'order' => 'required|numeric',
            ]);

            // make studly folder name || remove word space and make as My folder => MyFolder
            $folderName =  strtolower(Str::studly($request->path_folder_name));

            // generate order for shorting
            $last = Version::orderBy('id', 'desc')->first();
            $last != null ? $last_id = $last->id + 1 : $last_id = 1;

            $data = array();

            if ($request->name != $find->name)
            {
                $data['name'] = $request->name;
            }

            if (strtolower($request->slug) != $find->slug)
            {
                $data['slug'] = $request->slug;
            }


            // if lesson doesn't exists and request folder name not like old one then keep new folder name into variable
            if (!isset($find->lesson) && $folderName != $find->path_folder_name)
            {
                $data['path_folder_name'] = $folderName;
            }

            if ($request->keywords != $find->keywords)
            {
                $data['keywords'] = $request->keywords;
            }

            if ($request->order != $find->order)
            {
                $data['order'] = $request->order;
            }

            // if data have then update
            if ($data != null && isset($data))
            {
                // update data
                $update = $find->update($data);
                if ($update)
                {
                    notify()->success('Version updated successfully!', 'Successful');
                    return back();
                }
                else
                {
                    notify()->error('Failed to update Version!', 'Failed');
                    return back();
                }
            }
            else
            {
                notify()->error('Nothing to update!', 'Failed');
                return back();
            }
        }
        else
        {
            notify()->error('Version not found!', 'Not found');
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
        $decrypted_id = Crypt::decryptString($id);

        $find = Version::whereId($decrypted_id)->first();
        if ($find)
        {
            try
            {
                $find->delete();
                notify()->success('Version deleted!', 'Successful');
                return back();
            }
            catch (\Throwable $th)
            {
                notify()->error('Failed to delete Version!', 'Failed');
                return back();
            }
        }
        else
        {
            notify()->error('Version not found!', 'Not found');
            return back();
        }
    }
}
