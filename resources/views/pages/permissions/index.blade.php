@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Permissions'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Permissions Table</h6>
                    </div>
                    <div class="d-flex justify-content-end" style="margin-right: 40px;">
                        @can('permission.create')
                            <a href="{{ route('permission-create') }}" class="text-secondary font-weight-bold text-xs"
                                data-toggle="tooltip" data-original-title="Add account number">
                                <span class="btn btn-xs text-sm bg-gradient-warning">Add Permission</span>
                            </a>
                        @endcan
                    </div>
                    <div id="alert">
                        @include('components.alert')
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            No</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Name</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($permissions as $permission)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm ps-2">{{ $permission->id }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">{{ $permission->name }}</p>
                                            </td>
                                            <td class="align-middle d-flex gap-1">
                                                @can('permission.edit')
                                                    <a href="{{ route('permission-edit', $permission->id) }}"
                                                        class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                                        data-original-title="Edit permission">
                                                        <span class="btn btn-xs text-sm bg-gradient-warning">Edit</span>
                                                    </a>
                                                @endcan
                                                @can('permission.delete')
                                                    <form action="{{ route('permission-destroy', $permission->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="btn btn-xs text-sm bg-gradient-danger text-white font-weight-bold"
                                                            data-toggle="tooltip" data-original-title="Delete permission">
                                                            Delete
                                                        </button>
                                                    </form>
                                                @endcan
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-3 px-3">
                            {{ $permissions->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth.footer')
    </div>
@endsection
