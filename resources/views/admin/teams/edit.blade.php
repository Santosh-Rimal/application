@extends('layouts.admin.master')
@section('title', 'Teams')

@section('content')
    @include('admin.includes.message')

    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Edit Teams "{{ $team->name }}"</h5>
                <small class="text-muted float-end">
                    <a class="btn btn-primary" href="{{ route('admin.teams.index') }}"><i class="fa-solid fa-arrow-left"></i>
                        Back</a>
                </small>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.teams.update', $team->id) }}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Name</label>
                                <input class="form-control @error('name') is-invalid @enderror" id=""
                                    type="text" value="{{ old('name', $team->name) }}" name="name" placeholder="">
                                @error('name')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Order</label>
                                <input class="form-control @error('order') is-invalid @enderror" id=""
                                    type="text" name="order" value="{{ old('order', $team->order) }}" placeholder="">
                                @error('order')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="basic-default-message">Short Description</label>
                                <textarea class="form-control @error('short_description') is-invalid @enderror" id="" name="short_description"
                                    rows="8" placeholder="">{{ old('short_description', $team->short_description) }}</textarea>
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
                                    @if ($team->image)
                                        <img class="mt-2 old-image"
                                            src="{{ asset('admin/assets/img/teams/' . $team->image) }}" width="100">
                                    @endif
                                    @error('image')
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
