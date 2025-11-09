@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Edit Permission'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <form class="card-header pb-0" role="form" action="{{ route('permission-update', $permission->id) }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div>
                            <h6 class="mb-0">Edit Permission</h6>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="name" class="form-control-label">Permission Name</label>
                                            <input class="form-control" type="text" name="name"
                                                value="{{ old('name', $permission->name) }}"
                                                placeholder="Enter permission name">
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end" style="margin-right: 20px;">
                                    <a href="{{ route('permissions') }}" class="text-secondary font-weight-bold text-xs"
                                        data-toggle="tooltip" data-original-title="Cancel account number">
                                        <span class="btn btn-xs text-sm bg-gradient-danger">Cancel</span>
                                    </a>
                                    <button type="submit" class="btn btn-xs text-sm bg-gradient-success ms-2"
                                        data-original-title="Update account number">
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
