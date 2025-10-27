@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Edit Product'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <form class="card-header pb-0" role="form" action="{{ route('product-update', $product->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div>
                            <h6 class="mb-0">Edit Product</h6>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="product_name" class="form-control-label">Product Name</label>
                                            <input class="form-control" type="text" name="product_name"
                                                value="{{ old('product_name', $product->product_name) }}" placeholder="Enter product name">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="price" class="form-control-label">Price</label>
                                            <input class="form-control" type="text" name="price"
                                                value="{{ old('price', $product->price) }}" placeholder="Enter price">
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end" style="margin-right: 20px;">
                                    <a href="{{ route('product') }}" class="text-secondary font-weight-bold text-xs"
                                        data-toggle="tooltip" data-original-title="Cancel product">
                                        <span class="btn btn-xs text-sm bg-gradient-danger">Cancel</span>
                                    </a>
                                    <button type="submit" class="btn btn-xs text-sm bg-gradient-success ms-2"
                                        data-original-title="Save account number">
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
