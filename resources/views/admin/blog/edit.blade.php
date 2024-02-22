@extends('layouts.admin.master')
@section('title', 'Blogs')

@section('content')
    @include('admin.includes.message')

    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Edit Blog "{{ $blog->title }}"</h5>
                <small class="text-muted float-end">
                    <a class="btn btn-primary" href="{{ route('admin.blogs.index') }}"><i class="fa-solid fa-arrow-left"></i>
                        Back</a>
                </small>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.blogs.update', $blog->id) }}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-md-8">
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Title</label>
                                <input class="form-control @error('title') is-invalid @enderror" id=""
                                    type="text" value="{{ old('title', $blog->title) }}" name="title" placeholder="">
                                @error('title')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Date</label>
                                <input class="form-control flatpicker @error('date') is-invalid @enderror" id=""
                                    type="text" value="{{ old('date', $blog->date) }}" name="date" placeholder="">
                                @error('date')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="basic-default-message">Description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror ckeditor" id="" name="description"
                                    rows="8" placeholder="">{{ old('description', $blog->description) }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="basic-default-message">Short Description</label>
                                <textarea class="form-control @error('short_description') is-invalid @enderror" id="" name="short_description"
                                    rows="4" placeholder="">{{ old('short_description', $blog->short_description) }}</textarea>
                                @error('short_description')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3 row">
                                <div class="col-md-6">
                                    <label class="form-label" for="basic-default-message">Image</label>
                                    <input class="form-control @error('image') is-invalid @enderror image" id=""
                                        type="file" name="image">
                                    <img class="view-image mt-2" src="" height="60" alt="">
                                    @if ($blog->image)
                                        <img class="mt-2 old-image"
                                            src="{{ asset('admin/assets/img/blog/' . $blog->image) }}" width="100">
                                    @endif
                                    @error('image')
                                        <div class="invalid-feedback" style="display: block;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label" for="basic-default-message">Banner Image <span
                                            class="fw-bold">(1465 x
                                            450px)</span></label>
                                    <input class="form-control @error('banner_image') is-invalid @enderror image"
                                        id="" type="file" name="banner_image">
                                    <img class="view-image mt-2" src="" height="60" alt="">
                                    @if ($blog->banner_image)
                                        <img class="mt-2 old-image"
                                            src="{{ asset('admin/assets/img/blog/' . $blog->banner_image) }}"
                                            width="100">
                                    @endif
                                    @error('banner_image')
                                        <div class="invalid-feedback" style="display: block;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card card-body seo my-3 shadow br-8 p-4">
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">Seo Title</label>
                                    <input class="form-control @error('seo_title') is-invalid @enderror" id=""
                                        type="text" name="seo_title" value="{{ old('seo_title', $blog->seo_title) }}"
                                        placeholder="">
                                    @error('seo_title')
                                        <div class="invalid-feedback" style="display: block;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">Meta Description</label>
                                    <textarea class="form-control @error('meta_description') is-invalid @enderror" id="" name="meta_description"
                                        rows="8">{{ old('meta_description', $blog->meta_description) }}</textarea>
                                    @error('meta_description')
                                        <div class="invalid-feedback" style="display: block;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">Seo Schema</label>
                                    <textarea class="form-control @error('seo_schema') is-invalid @enderror" id="" name="seo_schema"
                                        rows="8">{{ old('seo_schema', $blog->seo_schema) }}</textarea>
                                    @error('seo_schema')
                                        <div class="invalid-feedback" style="display: block;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">Meta Keywords</label>
                                    <input class="form-control @error('meta_keywords') is-invalid @enderror"
                                        id="" type="text" name="meta_keywords"
                                        value="{{ old('meta_keywords', $blog->meta_keywords) }}" placeholder="">
                                    @error('meta_keywords')
                                        <div class="invalid-feedback" style="display: block;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-primary" type="submit"><i class="fa-solid fa-rotate"></i> Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(".image").change(function() {
            input = this;
            var nthis = $(this);

            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    nthis.siblings('.old-image').hide();
                    nthis.siblings('.view-image').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        });
    </script>
@endsection
