@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'User'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>User Table</h6>
                    </div>
                    <div class="d-flex justify-content-end" style="margin-right: 40px;">
                        <a href="{{ route('user-create') }}" class="text-secondary font-weight-bold text-xs"
                            data-toggle="tooltip" data-original-title="Add user">
                            <span class="btn btn-xs text-sm bg-gradient-warning">Add User</span>
                        </a>
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
                                            Email</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Role</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $user)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm ps-2">{{ $user->id }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">{{ $user->name }}</p>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">{{ $user->email }}</p>
                                            </td>
                                            <td>
                                                @if ($user->roles)
                                                    @foreach ($user->roles as $role)
                                                        <span
                                                            class="badge badge-sm bg-gradient-success">{{ $role->name }}</span>
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td class="align-middle d-flex gap-1">
                                                <a href="{{ route('user-edit', $user->id) }}"
                                                    class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                                    data-original-title="Edit user">
                                                    <span class="btn btn-xs text-sm bg-gradient-warning">Edit</span>
                                                </a>
                                                <form action="{{ route('user-destroy', $user->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="btn btn-xs text-sm bg-gradient-danger text-white font-weight-bold"
                                                        data-toggle="tooltip" data-original-title="Delete role">
                                                        Delete
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
        @include('layouts.footers.auth.footer')
    </div>
@endsection
