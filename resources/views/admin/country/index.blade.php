@extends('layouts.admin.master')
@section('title', 'Country')

@section('content')
    @include('admin.includes.message')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Country ({{ $countries->total() }})</h5>
            <small class="text-muted float-end">
                <a class="btn btn-primary" href="{{ route('admin.countries.create') }}"><i class="fa-solid fa-plus"></i>
                    Create</a>
            </small>
        </div>

        <div class="table-responsive text-nowrap">
            @if ($countries->isNotEmpty())
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

                        @foreach ($countries as $key => $country)
                            <tr>
                                <td><strong>{{ $key + $countries->firstItem() }}</strong></td>
                                <td class="">
                                    <a data-fancybox data-caption="Single image"
                                        href="{{ asset('admin/assets/img/country/' . $country->image) }}">
                                        <img src="{{ asset('admin/assets/img/country/' . $country->image) }}" height="50"
                                            alt="mypioc">
                                    </a>

                                </td>
                                <td><strong>{{ $country->name ?? '' }}</strong></td>

                                <td>
                                    <a class="btn btn-sm btn-primary"
                                        href="{{ route('admin.countries.edit', $country->id) }}"
                                        style="float: left;margin-right: 5px;"><i class="fa-solid fa-pen-to-square"></i>
                                        Edit</a>
                                    <form class="delete-form" action="{{ route('admin.countries.destroy', $country->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger delete_country mr-2" id=""
                                            data-type="confirm" type="submit" title="Delete"><i class="fa fa-trash"></i>
                                            Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                {{ $countries->links() }}
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
        $('.delete_country').click(function(e) {
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
