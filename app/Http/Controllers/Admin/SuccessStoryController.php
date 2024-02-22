<?php

namespace App\Http\Controllers\Admin;

use File;
use App\Models\SuccessStory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreSuccessStoryRequest;
use App\Http\Requests\Admin\UpdateSuccessStoryRequest;

class SuccessStoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $successstories = SuccessStory::paginate(10);
        return view('admin.successstory.index', compact('successstories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.successstory.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSuccessStoryRequest $request)
    {
        $input = $request->all();
        $input['image'] = $this->FileUpload($request, 'image');

        // dd($input);
        SuccessStory::create($input);
        return redirect()->route('admin.successstories.index')->with('message', 'Created Successfully');
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
    public function edit(SuccessStory $successstory)
    {
        return view('admin.successstory.edit', compact('successstory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSuccessStoryRequest $request, SuccessStory $successstory)
    {
        $old_image = $successstory->image;
        // dd($old_image);
        $input = $request->all();
        $image = $this->fileUpload($request, 'image');
        if ($image) {
            $this->removeFile($old_image);
            $input['image'] = $image;
        } else {
            unset($input['image']);
        }
        $successstory->update($input);
        return redirect()->route('admin.successstories.index')->with('message', 'Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SuccessStory $successstory)
    {
        $this->removeFile($successstory->image);
        $successstory->delete();
        return redirect()->route('admin.successstories.index')->with('message', 'Delete Successfully');
    }


    public function fileUpload(Request $request, $name)
    {
        $imageName = '';
        if ($image = $request->file($name)) {
            $destinationPath = public_path() . '/admin/assets/img/successstory';
            $imageName = date('YmdHis') . $name . "-" . $image->getClientOriginalName();
            $image->move($destinationPath, $imageName);
            $image = $imageName;
        }
        return $imageName;
    }

    public function removeFile($file)
    {
        $path = public_path() . '/admin/assets/img/successstory/' . $file;
        if (File::exists($path)) {
            File::delete($path);
        }
    }
}
