<?php

namespace App\Http\Controllers\Admin\Technology;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use App\Models\Frontend\Technology\Version;
use App\Models\Frontend\Technology\Technology;
use App\Models\Frontend\Technology\TechnologyDivision;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Technology::orderBy('id', 'desc')->paginate(50);
        return view('backend.technology.all', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $division = TechnologyDivision::orderBy('id', 'desc')->get();
        return view('backend.technology.add_technology', compact('division'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate(
            [
                'division' => 'required|numeric',
                'name' => 'required|string|max:255',
                'slug' => 'required|string|unique:technologies|max:255',
                'path_folder_name' => 'required|string|unique:technologies|max:50',
                'keywords' => 'nullable|string|max:256',
                'image' => 'required|image|max:5120',
            ],
            [
                'image.max' => 'Image file size should not be greater than 5MB',
            ]
        );

        // Technology image optimize and resize
        $image = $request->file('image');
        //image
        $image_name = $image->hashName();
        $image = Image::make($image);
        // resize the image to a width of 300 and constrain aspect ratio (auto height)
        $image->resize(400, null, function ($constraint)
        {
            $constraint->aspectRatio();
        });
        Storage::disk('tech_images')->put($image_name, (string) $image->encode());



        $folderName =  strtolower(Str::studly($request->path_folder_name));

        // generate order for shorting
        $last = Technology::orderBy('id', 'desc')->first();
        $last != null ? $last_id = $last->id + 1 : $last_id = 1;

        $data = [
            'technology_division_id' => $request->division,
            'name' => $request->name,
            'slug' => strtolower($request->slug),
            'path_folder_name' => $folderName,
            'keywords' => $request->keywords ?? null,
            'order' => $last_id,
            'image' => $image_name,
        ];

        $store = Technology::create($data);
        if ($store)
        {
            notify()->success('Technology added successfully!', 'Successful');
            return back();
        }
        else
        {
            notify()->error('Failed to store Technology!', 'Failed');
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $find = Technology::whereSlug($slug)->first();
        if ($find)
        {
            $versions = Version::where('technology_id', $find->id)->orderBy('id', 'desc')->get();
            return view('backend.technology.show', compact('find', 'versions'));
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

        $find = Technology::whereSlug($slug)->first();
        if ($find)
        {
            $division = TechnologyDivision::orderBy('id', 'desc')->get();
            return view('backend.technology.edit', compact('find', 'division'));
        }
        else
        {

            notify()->error('Technology not found!', 'Not found');
            return back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $find = Technology::whereSlug($slug)->first();
        if ($find)
        {

            $request->validate(
                [
                    'division' => 'required|numeric',
                    'name' => 'required|string|max:255',
                    'slug' => "required|string|unique:technologies,slug,$find->id|max:255",
                    'path_folder_name' => "nullable|string|unique:technologies,path_folder_name,$find->id|max:50",
                    'keywords' => 'nullable|string|max:256',
                    'image' => 'image|max:5120',
                ],
                [
                    'image.max' => 'Image file size should not be greater than 5MB',
                ]
            );
            $data = array();

            $image = $request->file('image');

            $old_image = null;
            if ($image != null)
            {
                $old_image = $find->image;
                //image
                $image_name = $image->hashName();
                $image = Image::make($image);
                // resize the image to a width of 300 and constrain aspect ratio (auto height)
                $image->resize(400, null, function ($constraint)
                {
                    $constraint->aspectRatio();
                });
                Storage::disk('tech_images')->put($image_name, (string) $image->encode());
                $data['image'] = $image_name;
            }



            if ($request->division != $find->technology_division_id)
            {
                $data['technology_division_id'] = $request->division;
            }

            if ($request->name != $find->name)
            {
                $data['name'] = $request->name;
            }

            if ($request->slug != $find->slug)
            {
                $data['slug'] = strtolower($request->slug);
            }

            if ($request->keywords != $find->keywords)
            {
                $data['keywords'] = strtolower($request->keywords);
            }

            // check current request folder name and old folder name same or not, if not, then keep that data into array
            $folderName = strtolower(Str::studly($request->path_folder_name));
            if ($find->lesson == null && $request->path_folder_name != null && $folderName != $find->path_folder_name)
            {
                $data['path_folder_name'] = $folderName;
            }

            if ($data != null && isset($data))
            {
                // update data
                $update = $find->update($data);
                if ($update)
                {
                    // remove old tech image
                    if ($image != null && Storage::disk('tech_images')->exists($old_image))
                    {
                        Storage::disk('tech_images')->delete($old_image);
                    }

                    notify()->success('Technology updated successfully!', 'Successful');
                    return to_route('admin.edit.technology', ['slug' => $find->slug]);
                }
                else
                {
                    notify()->error('Failed to update Technology!', 'Failed');
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
            notify()->error('Technology not found!', 'Not found');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $find = Technology::whereSlug($slug)->first();
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
            notify()->error('Technology not found!', 'Not found');
            return back();
        }
    }
}
