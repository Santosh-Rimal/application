@extends('layouts.admin.master')
@section('title', 'Sliders')

@section('content')
    @include('admin.includes.message')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Sliders ({{ $sliders->count() }})</h5>
            <small class="text-muted float-end">
                <a class="btn btn-primary" href="{{ route('admin.sliders.create') }}"><i class="fa-solid fa-plus"></i>
                    Create</a>
            </small>
        </div>

        <div class="table-responsive text-nowrap">
            @if ($sliders->isNotEmpty())
                <table class="table">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Slogan</th>
                            <th>Title</th>
                            <th>Link</th>
                            <th>Image</th>
                            <th>order</th>
                        </tr>
                    </thead>

                    <tbody class="table-border-bottom-0">
                        @foreach ($sliders as $key => $slider)
                            <tr>
                                <td><strong>{{ $key + $sliders->firstItem() }}</strong></td>
                                <td>{{ $slider->slogan ?? '' }}</td>
                                <td><strong>{{ $slider->title ?? '' }}</strong></td>
                                <td>{{ $slider->link ?? '' }}</td>
                                <td>
                                    <a data-fancybox data-caption="Single image"
                                        href="{{ asset('admin/assets/img/slider/' . $slider->image) }}">
                                        <img src="{{ asset('admin/assets/img/slider/' . $slider->image) }}" height="50"
                                            alt="mypioc">
                                    </a>

                                </td>
                                <td>{{ $slider->order ?? '' }}</td>
                                <td>
                                    <a class="btn btn-sm btn-primary" href="{{ route('admin.sliders.edit', $slider->id) }}"
                                        style="float: left;margin-right: 5px;"><i class="fa-solid fa-pen-to-square"></i>
                                        Edit</a>

                                    <form class="delete-form" action="{{ route('admin.sliders.destroy', $slider->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger slider_delete mr-2" id=""
                                            data-type="confirm" type="submit" title="Delete"><i class="fa fa-trash"></i>
                                            Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                {{ $sliders->links() }}
            @else
                <div class="card-body">
                    <h6>No Data Found!</h6>
                </div>
            @endif
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $('.slider_delete').click(function(e) {
            e.preventDefault();
            swal({
                    title: `Are you sure?`,
                    text: "If you delete this, it will be gone forever.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $(this).closest("form").submit();
                    }
                });

        });
    </script>
@endsection
