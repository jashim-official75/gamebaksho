@extends('backend.layouts.app')

@section('pageName')
    Admin Register
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8 m-auto">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-subtitle"></h6>
                    <form action="{{ route('admin.register.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="">Name</label>
                            <input type="text" name="name" id="name" class="form-control">
                            @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="">Email</label>
                            <input type="text" name="email" id="email" class="form-control">
                            @error('email')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="">Password</label>
                            <input type="password" name="password" id="password" class="form-control" autocomplete="new-password">
                            @error('password')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="role" class="">Role</label>
                            <select name="role" id="role" class="form-control">
                                <option value="">-select-</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                            @error('role')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                           <button class="btn btn-primary">Save</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
