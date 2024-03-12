@extends('backend.layouts.app')

@section('pageName')
    Blogs
@endsection

@section('styles')
    <!-- Footable CSS -->
    <link href="{{ asset('/assets/backend/plugins/footable/css/footable.core.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('admin.blog.create') }}" class="btn btn-sm btn-primary">Add New</a>
                    <h6 class="card-subtitle"></h6>
                    <div class="table-responsive">
                        <table id="demo-foo-addrow" class="table m-t-30 table-hover contact-list" data-page-size="10">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Title</th>
                                    <th>Banner</th>
                                    <th>Thumbnail</th>
                                    <th>Created_At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($blogs as $blog)
                                    <tr>
                                        <td>{{ ($blogs->currentpage() - 1) * $blogs->perpage() + $loop->index + 1 }}</td>
                                        <td>{{ Str::limit($blog->title, 30) }}</td>
                                        <td>
                                            <img src="{{ asset('uploads/Blogs/banner/' . $blog->banner) }}" alt="banner"
                                                width="40" class="img-circle" />
                                        </td>
                                        <td>
                                            <img src="{{ asset('uploads/Blogs/thumbnail/' . $blog->thumbnail) }}"
                                                alt="thumbnail" width="40" class="img-circle" />
                                        </td>

                                        <td>{{ $blog->created_at->diffForHumans() }}</td>

                                        <td>
                                            <a href="{{ route('admin.blog.edit', $blog->id) }}" data-toggle="tooltip" data-original-title="Edit"
                                                style="background: transparent; border: none;">
                                                <i class="fa fa-pencil text-inverse m-r-10"></i> </a>

                                            <a href="#" name="{{ route('admin.blog.delete', $blog->id) }}" class="delete-confirm" data-toggle="tooltip" data-original-title="delete"
                                                style="background: transparent; border: none;">
                                                <i class="fa fa-close text-danger"></i> </a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    $('.delete-confirm').click(function() {
        Swal.fire({
            title: 'Are you sure?',
            text: "If you delete this, it will be gone forever !",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                var link = $(this).attr('name');
                window.location.href = link;
            }
        })
    });
</script>
@endsection
