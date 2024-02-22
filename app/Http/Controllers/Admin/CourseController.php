<?php

namespace App\Http\Controllers\Admin;

use File;
use App\Models\Course;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCourseRequest;
use App\Http\Requests\Admin\UpdateCourseRequest;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::oldest('order')->paginate(1);
        return view('admin.courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.courses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCourseRequest $request)
    {
        $input = $request->all();
        $input['image'] = $this->fileUpload($request, 'image');

        $course =  Course::create($input);
        $course->update(['slug' => Str::slug($request->title)]);
        return redirect()->route('admin.courses.index')->with('message', 'Created Successfully');
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
    public function edit(Course $course)
    {
        return view('admin.courses.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCourseRequest $request, Course $course)
    {
        $old_image = $course->image;
        // dd($old_image);
        $input = $request->all();
        $image = $this->fileUpload($request, 'image');
        if ($image) {
            $this->removeFile($old_image);
            $input['image'] = $image;
        } else {
            unset($input['image']);
        }


        $input['slug'] = Str::slug($request->name);
        $course->update($input);
        return redirect()->route('admin.courses.index')->with('message', 'Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $this->removeFile($course->image);
        $course->delete();
        return redirect()->route('admin.courses.index')->with('message', 'Delete Successfully');
    }


    public function FileUpload($request, $name)
    {
        $imageName = "";
        if ($image = $request->file($name)) {
            $destinationPath = public_path() . '/admin/assets/img/course';
            $imageName = date('YmdHis') . $name . "-" . $image->getClientOriginalName();
            $image->move($destinationPath, $imageName);
            $image = $imageName;
        }
        return $imageName;
    }
    public function removeFile($file)
    {
        $path = public_path() . '/admin/assets/img/course/' . $file;
        // dd($path);
        if (File::exists($path)) {
            File::delete($path);
        }
    }
}
