@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Edit Account Number'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <form class="card-header pb-0" role="form" action="{{ route('account-number-update', $account->id) }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <h6 class="mb-0">Edit Account Number</h6>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="account_number" class="form-control-label">Account
                                                Number</label>
                                            <input class="form-control" type="text" name="account_number"
                                                value="{{ old('account_number', $account->account_number) }}"
                                                placeholder="Enter account number">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="account_name" class="form-control-label">Account Name</label>
                                            <input class="form-control" type="text" name="account_name"
                                                value="{{ old('account_name', $account->account_name) }}"
                                                placeholder="Enter account name">
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end" style="margin-right: 20px;">
                                    <a href="{{ route('account-number') }}" class="text-secondary font-weight-bold text-xs"
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
