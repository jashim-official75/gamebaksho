@extends('backend.layouts.app')

@section('pageName')
    Roles
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-subtitle"></h6>
                    <div class="table-responsive">
                        <table id="demo-foo-addrow" class="table m-t-30 table-hover contact-list" data-page-size="10">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Created_At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $key=>$role)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td>{{ $role->created_at->diffForHumans() }}</td>
                                        <td>
                                            <a href="#" data-toggle="tooltip"
                                                data-original-title="Edit" style="background: transparent; border: none;">
                                                <i class="fa fa-pencil text-inverse m-r-10"></i> </a>

                                            <form action="#" method="post"
                                                style="display: inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" data-toggle="tooltip" data-original-title="Delete"
                                                    style="background: transparent; border: none;"
                                                    onclick="return confirm('Are you sure you want to delete this item?');">
                                                    <i class="fa fa-close text-danger"></i>
                                                </button>
                                            </form>
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