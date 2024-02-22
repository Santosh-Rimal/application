@extends('layouts.admin.master')
@section('title', 'Service')

@section('content')
    @include('admin.includes.message')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Services ({{ $services->count() }})</h5>
            <small class="text-muted float-end">
                <a class="btn btn-primary" href="{{ route('admin.services.create') }}"><i class="fa-solid fa-plus"></i>
                    Create</a>
            </small>
        </div>

        <div class="table-responsive text-nowrap">
            @if ($services->isNotEmpty())
                <table class="table">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody class="table-border-bottom-0">

                        @foreach ($services as $service)
                            <tr>
                                <td><strong>{{ $loop->index + 1 }}</strong></td>
                                <td class="">

                                    <a data-fancybox data-caption="Single image"
                                        href="{{ asset('admin/assets/img/service/' . $service->image) }}">
                                        <img src="{{ asset('admin/assets/img/service/' . $service->image) }}" height="50"
                                            alt="mypioc">
                                    </a>

                                </td>
                                <td><strong>{{ $service->name ?? '' }}</strong></td>

                                <td>
                                    <a class="btn btn-sm btn-primary"
                                        href="{{ route('admin.services.edit', $service->id) }}"
                                        style="float: left;margin-right: 5px;"><i class="fa-solid fa-pen-to-square"></i>
                                        Edit</a>
                                    <form class="delete-form" action="{{ route('admin.services.destroy', $service->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger delete_service mr-2" id=""
                                            data-type="confirm" type="submit" title="Delete"><i class="fa fa-trash"></i>
                                            Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
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
        $('.delete_service').click(function(e) {
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
