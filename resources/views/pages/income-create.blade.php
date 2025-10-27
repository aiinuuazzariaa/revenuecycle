@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Add Income'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <form class="card-header pb-0" role="form" action="{{ route('income-create') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div>
                            <h6 class="mb-0">Add Income</h6>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="account_number_id" class="form-control-label">Account Number</label>
                                            <select name="account_number_id" id="account_number_id" class="form-control">
                                                <option value="">-- Select Account --</option>
                                                @foreach ($data as $acc)
                                                    <option value="{{ $acc->id }}"
                                                        {{ old('account_number_id') == $acc->id ? 'selected' : '' }}>
                                                        {{ $acc->account_name }}
                                                    </option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="income_name" class="form-control-label">Income Name</label>
                                            <input class="form-control" type="text" name="income_name"
                                                value="{{ old('income_name') }}" placeholder="Enter income name">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="price" class="form-control-label">Price</label>
                                            <input class="form-control" type="text" name="price"
                                                value="{{ old('price') }}" placeholder="Enter price">
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end" style="margin-right: 20px;">
                                    <a href="{{ route('income') }}" class="text-secondary font-weight-bold text-xs"
                                        data-toggle="tooltip" data-original-title="Cancel income">
                                        <span class="btn btn-xs text-sm bg-gradient-danger">Cancel</span>
                                    </a>
                                    <a href="{{ route('income-store') }}"
                                        class="text-secondary font-weight-bold text-xs ms-2" data-toggle="tooltip"
                                        data-original-title="Save income">
                                        <span class="btn btn-xs text-sm bg-gradient-success">Save</span>
                                    </a>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth.footer')
    </div>
@endsection
