@extends('layouts.admin.master')
@section('title', 'Course')

@section('content')
    @include('admin.includes.message')

    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Edit course "{{ $course->name }}"</h5>
                <small class="text-muted float-end">
                    <a class="btn btn-primary" href="{{ route('admin.courses.index') }}"><i class="fa-solid fa-arrow-left"></i>
                        Back</a>
                </small>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.courses.update', $course->id) }}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="row">

                        <div class="mb-12">
                            <label class="form-label" for="basic-default-fullname">Name</label>
                            <input class="form-control @error('name') is-invalid @enderror" id="" type="text"
                                value="{{ old('name', $course->name) }}" name="name" placeholder="">
                            @error('name')
                                <div class="invalid-feedback" style="display: block;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Order</label>
                            <input class="form-control @error('order') is-invalid @enderror" id="" type="text"
                                name="order" value="{{ old('order', $course->order) }}" placeholder="">
                            @error('order')
                                <div class="invalid-feedback" style="display: block;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="basic-default-message">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror ckeditor" id="" name="description"
                                rows="8" placeholder="">{{ old('description', $course->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback" style="display: block;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="basic-default-message">Short Description</label>
                            <textarea class="form-control @error('short_description') is-invalid @enderror" id="" name="short_description"
                                rows="4" placeholder="">{{ old('short_description', $course->short_description) }}</textarea>
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
                                @if ($course->image)
                                    <img class="mt-2 old-image"
                                        src="{{ asset('admin/assets/img/course/' . $course->image) }}" width="100">
                                @endif
                                @error('image')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
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
