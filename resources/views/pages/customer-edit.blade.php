@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Edit Customer'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <form class="card-header pb-0" role="form" action="{{ route('customer-update', $customer->id) }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <h6 class="mb-0">Edit Customer</h6>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="customer_name" class="form-control-label">Customer Name</label>
                                            <input class="form-control" type="text" name="customer_name"
                                                value="{{ old('customer_name', $customer->customer_name) }}" placeholder="Enter customer name">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="phone" class="form-control-label">Phone</label>
                                            <input class="form-control" type="text" name="phone"
                                                value="{{ old('phone', $customer->phone) }}" placeholder="Enter phone">
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end" style="margin-right: 20px;">
                                    <a href="{{ route('customer') }}" class="text-secondary font-weight-bold text-xs"
                                        data-toggle="tooltip" data-original-title="Cancel customer">
                                        <span class="btn btn-xs text-sm bg-gradient-danger">Cancel</span>
                                    </a>
                                    <button type="submit" class="btn btn-xs text-sm bg-gradient-success ms-2"
                                        data-original-title="Save customer">
                                        Save
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
