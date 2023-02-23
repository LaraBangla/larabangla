<?php

namespace App\Http\Controllers\Admin\Chapters;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Frontend\Technology\Chapter;
use App\Models\Frontend\Technology\Version;

class ChapterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($slug)
    {
        $version = Version::whereSlug($slug)->first();
        if ($version)
        {
            return view('backend.chapters.add', compact('version'));
        }
        else
        {
            notify()->error('Version not found!', 'Not found');
            return back();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $slug)
    {

        $version = Version::whereSlug($slug)->first();

        if ($version)
        {
            $request->validate([
                'name' => 'required|string|max:255',
                'slug' => 'required|regex:/^[A-Za-z.-]+$/|string|max:255',
                'keywords' => 'nullable|string|max:255',
            ]);


            // generate slug
            $get_slug = strtolower($request->slug);
            $req_slug = Str::slug($get_slug, '-');

            // first check into database that, is slug available?
            //
            $check_slug = Chapter::withTrashed()->where('slug', $req_slug)->first();
            if (!isset($check_slug) && $check_slug == null)
            {
                $slug = $req_slug;
            }
            else
            {
                // if not available then
                $slug_with_tech_slug = $req_slug . '-' . strtolower($version->technology->slug);
                // check into database that, is req_slug available?
                $check_slug = Chapter::withTrashed()->where('slug', $slug_with_tech_slug)->first();
                if (!isset($check_slug) && $check_slug == null)
                {
                    $slug = $slug_with_tech_slug;
                }
                else
                {

                    // if not available then make slug with req_slug-technology name and version name
                    $slug_with_version_slug = $req_slug . '-' . strtolower($version->technology->slug) . '-' . strtolower($version->slug);
                    // check into database that, is slug available?
                    $check_slug = Chapter::withTrashed()->where('slug', $slug_with_version_slug)->first();
                    if (!isset($check_slug) && $check_slug == null)
                    {
                        $slug = $slug_with_version_slug;
                    }
                    else
                    {
                        // auto generate slug
                        $number = 1;
                        while (!empty($check_slug))
                        {
                            $generate_slug =  $req_slug . '-' . strtolower($version->technology->slug) . '-' . strtolower($version->slug) . '-' . $number;
                            $check_slug = Chapter::withTrashed()->where('slug', $generate_slug)->first();
                            $number++;
                        }
                        $slug = $generate_slug;
                    }
                }
            }

            // generate chapter id
            $last_chapter = Chapter::withTrashed()->orderBy('id', 'desc')->first();
            $last_chapter != null ? $chapter_id = $last_chapter->id + 1 : $chapter_id = 1;

            $data = [
                'name' => $request->name,
                'slug' => $slug,
                'version_id' => $version->id,
                'technology_id' => $version->technology_id,
                'order' => $chapter_id,
                'keywords' => $request->keywords,
            ];

            // store data
            $store = Chapter::create($data);
            if ($store)
            {
                notify()->success('Chapter added successfully!', 'Successful');
                return back();
            }
            else
            {
                notify()->error('Failed to store Chapter!', 'Failed');
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $find = Chapter::whereSlug($slug)->first();
        if ($find)
        {
            return view('backend.chapters.show', compact('find'));
        }
        else
        {
            notify()->error('Chapter not found!', 'Not found');
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
        $find = Chapter::whereSlug($slug)->first();
        if ($find)
        {

            return view('backend.chapters.edit', compact('find'));
        }
        else
        {
            notify()->error('Chapter not found!', 'Not found');
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
        $find = Chapter::whereSlug($slug)->first();
        if ($find)
        {

            $request->validate([
                'name' => 'required|string|max:255',
                'slug' => 'required|regex:/^[A-Za-z.-]+$/|string|max:255',
                'keywords' => 'nullable|string|max:255',
                'order' => 'required|numeric|min:1'
            ]);
            $data = array();

            if ($request->keywords != $find->keywords)
            {
                $data['keywords'] = $request->keywords;
            }
            // generate slug
            $get_slug = strtolower($request->slug);
            $slug = Str::slug($get_slug, '-');

            // first check request slug and old slug same or not! if not same then regenerate slug
            if ($slug != $find->slug)
            {
                // first check into database that, is slug available?
                $check_slug = Chapter::withTrashed()->where('id', '!=', $find->id)->where('slug', $slug)->first();
                if (!isset($check_slug) && $check_slug == null)
                {
                    $slug = $slug;
                }
                else
                {
                    $is_already_slug = Str::of($find->slug)->endsWith(strtolower($find->technology->slug));
                    if ($is_already_slug != true)
                    {
                        // if not available then
                        $slug_with_tech_slug = $slug . '-' . strtolower($find->technology->slug);
                        // check into database that, is slug available?
                        $check_slug = Chapter::withTrashed()->where('id', '!=', $find->id)->where('slug', $slug_with_tech_slug)->first();
                        if (!isset($check_slug) && $check_slug == null)
                        {
                            $slug = $slug_with_tech_slug;
                        }
                        else
                        {
                            // auto generate slug
                            $number = 1;
                            while (!empty($check_slug))
                            {
                                $generate_slug = $slug . '-' . $number;
                                $check_slug = Chapter::withTrashed()->where('id', '!=', $find->id)->where('slug', $generate_slug)->first();
                                $number++;
                            }
                            $slug = $generate_slug;
                        }
                    }

                    else
                    {
                        // auto generate slug
                        $number = 1;
                        while (!empty($check_slug))
                        {
                            $generate_slug = $slug . '-' . $number;
                            $check_slug = Chapter::withTrashed()->where('id', '!=', $find->id)->where('slug', $generate_slug)->first();
                            $number++;
                        }
                        $slug = $generate_slug;
                    }
                }
            }



            if ($request->name != $find->name)
            {
                $data['name'] = $request->name;
            }

            if ($slug != $find->slug)
            {
                $data['slug'] = $slug;
            }

            if ($request->order != $find->order)
            {
                $data['order'] = $request->order;
            }

            // if data exists in array for update then update
            if ($data != null && isset($data))
            {
                $update = $find->update($data);
                if ($update)
                {
                    notify()->success('Chapter updated successfully!', 'Successful');
                    return to_route('admin.edit.chapter', ['slug' => $find->slug]);
                }
                else
                {
                    notify()->error('Failed to store Chapter!', 'Failed');
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
            notify()->error('Chapter not found!', 'Not found');
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
        $find = Chapter::whereSlug($slug)->first();
        if ($find)
        {
            $delete = $find->delete();
            if ($delete)
            {
                notify()->success('Successfully deleted', 'Deleted');
                return back();
            }
            else
            {
                notify()->error('Failed to delete!', 'Failed');
                return back();
            }
        }
        else
        {
            notify()->error('Chapter not found!', 'Not found');
            return back();
        }
    }
}
