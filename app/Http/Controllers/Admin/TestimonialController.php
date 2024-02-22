<?php

namespace App\Http\Controllers\admin;

use App\Models\Testimonial;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreTestiminialRequest;
use App\Http\Requests\Admin\UpdateTestiminialRequest;
use File;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = Testimonial::paginate(10);
        return view('admin.testimonial.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.testimonial.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTestiminialRequest $request)
    {
        $input = $request->all();
        $input['slug'] = Str::slug($request->name);
        $input['image'] = $this->FileUpload($request, 'image');

        // dd($input);
        Testimonial::create($input);
        return redirect()->route('admin.testimonials.index')->with('message', 'Created Successfully');
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
    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonial.edit', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTestiminialRequest $request, Testimonial $testimonial)
    {
        $old_image = $testimonial->image;
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
        $testimonial->update($input);
        return redirect()->route('admin.testimonials.index')->with('message', 'Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimonial $testimonial)
    {
        $this->removeFile($testimonial->image);
        $testimonial->delete();
        return redirect()->route('admin.testimonials.index')->with('message', 'Delete Successfully');
    }


    public function FileUpload($request, $name)
    {
        $imageName = '';
        if ($image = $request->file($name)) {
            $destinationPath = public_path() . '/admin/assets/img/testimonial';
            $imageName = date('YmdHis') . $name . "-" . $image->getClientOriginalName();
            $image->move($destinationPath, $imageName);
            $image = $imageName;
        }
        return $imageName;
    }
    public function removeFile($file)
    {
        $path = public_path() . '/admin/assets/img/testimonial/' . $file;
        // dd($path);
        if (File::exists($path)) {
            File::delete($path);
        }
    }
}
