@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Create Role'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <form class="card-header pb-0" role="form" action="{{ route('role-store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div>
                            <h6 class="mb-0">Create Role</h6>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="name" class="form-control-label">Role Name</label>
                                            <input class="form-control" type="text" name="name"
                                                value="{{ old('name') }}" placeholder="Enter roles name">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="permissions" class="form-control-label">Permission</label>
                                            <br>
                                            @foreach ($allPermissions as $permission)
                                                <input type="checkbox" name="permissions[]" value="{{ $permission->name }}">
                                                {{ $permission->name }} <br>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end" style="margin-right: 20px;">
                                    <a href="{{ route('roles') }}" class="text-secondary font-weight-bold text-xs"
                                        data-toggle="tooltip" data-original-title="Cancel role">
                                        <span class="btn btn-xs text-sm bg-gradient-danger">Cancel</span>
                                    </a>
                                    <button type="submit" class="btn btn-xs text-sm bg-gradient-success ms-2"
                                        data-original-title="Update role">
                                        Update
                                    </button>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth.footer')
    </div>
@endsection
