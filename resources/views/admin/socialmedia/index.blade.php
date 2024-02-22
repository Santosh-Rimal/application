@extends('layouts.admin.master')
@section('title', 'SocialMedias')

@section('content')
    @include('admin.includes.message')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Social Medias ({{ $socialmedias->count() }})</h5>
            <small class="text-muted float-end">
                <a class="btn btn-primary" href="{{ route('admin.socialmedias.create') }}"><i class="fa-solid fa-plus"></i>
                    Create</a>
            </small>
        </div>

        <div class="table-responsive text-nowrap">
            @if ($socialmedias->isNotEmpty())
                <table class="table">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Title</th>
                            <th>Link</th>
                            <th>Image</th>
                            <th>order</th>
                        </tr>
                    </thead>

                    <tbody class="table-border-bottom-0">
                        @foreach ($socialmedias as $key => $socialmedia)
                            <tr>
                                <td><strong>{{ $key + $socialmedias->firstItem() }}</strong></td>

                                <td><strong>{{ $socialmedia->title ?? '' }}</strong></td>
                                <td><strong>{{ $socialmedia->link ?? '' }}</strong></td>
                                <td>
                                    <a data-fancybox data-caption="Single image"
                                        href="{{ asset('admin/assets/img/socialmedia/' . $socialmedia->image) }}">
                                        <img src="{{ asset('admin/assets/img/socialmedia/' . $socialmedia->image) }}"
                                            height="50" alt="mypioc">
                                    </a>

                                </td>
                                <td>{{ $socialmedia->order ?? '' }}</td>
                                <td>
                                    <a class="btn btn-sm btn-primary"
                                        href="{{ route('admin.socialmedias.edit', $socialmedia->id) }}"
                                        style="float: left;margin-right: 5px;"><i class="fa-solid fa-pen-to-square"></i>
                                        Edit</a>

                                    <form class="delete-form"
                                        action="{{ route('admin.socialmedias.destroy', $socialmedia->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger socialmedia_delete mr-2" id=""
                                            data-type="confirm" type="submit" title="Delete"><i class="fa fa-trash"></i>
                                            Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                {{ $socialmedias->links() }}
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
        $('.socialmedia_delete').click(function(e) {
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
