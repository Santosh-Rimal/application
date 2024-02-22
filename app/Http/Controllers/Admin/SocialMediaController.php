<?php

namespace App\Http\Controllers\Admin;

use File;
use App\Models\SocialMedia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreSocialMediaRequest;
use App\Http\Requests\Admin\UpdateSocialMediaRequest;

class SocialMediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $socialmedias = SocialMedia::paginate(10);
        return view('admin.socialmedia.index', compact('socialmedias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.socialmedia.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSocialMediaRequest $request)
    {
        $input = $request->all();
        $input['image'] = $this->FileUpload($request, 'image');
        SocialMedia::create($input);
        return redirect()->route('admin.socialmedias.index')->with('message', 'Created Successfully');
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
    public function edit(SocialMedia $socialmedia)
    {
        return view('admin.socialmedia.edit', compact('socialmedia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSocialMediaRequest $request, SocialMedia $socialmedia)
    {
        $old_image = $socialmedia->image;
        // dd($old_image);
        $input = $request->all();
        $image = $this->fileUpload($request, 'image');
        if ($image) {
            $this->removeFile($old_image);
            $input['image'] = $image;
        } else {
            unset($input['image']);
        }
        $socialmedia->update($input);
        return redirect()->route('admin.socialmedias.index')->with('message', 'Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SocialMedia $socialmedia)
    {
        $this->removeFile($socialmedia->image);
        $socialmedia->delete();
        return redirect()->route('admin.socialmedias.index')->with('message', 'Delete Successfully');
    }


    public function fileUpload(Request $request, $name)
    {
        $imageName = '';
        if ($image = $request->file($name)) {
            $destinationPath = public_path() . '/admin/assets/img/socialmedia';
            $imageName = date('YmdHis') . $name . "-" . $image->getClientOriginalName();
            $image->move($destinationPath, $imageName);
            $image = $imageName;
        }
        return $imageName;
    }

    public function removeFile($file)
    {
        $path = public_path() . '/admin/assets/img/socialmedia/' . $file;
        if (File::exists($path)) {
            File::delete($path);
        }
    }
}
