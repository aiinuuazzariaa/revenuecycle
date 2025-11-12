@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Add Pihutang'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <form class="card-header pb-0" role="form" action="{{ route('pihutang-store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div>
                            <h6 class="mb-0">Add Pihutang</h6>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="income_id" class="form-control-label">Invoice Number</label>
                                            <select class="form-control" name="income_id" required>
                                                <option value="">-- Select Invoice Number --</option>
                                                @foreach ($incomes as $income)
                                                    <option value="{{ $income->id }}">
                                                        {{ $income->income_invoice_number }}
                                                        — {{ $income->customer->customer_name ?? 'Not found' }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="pihutang_name" class="form-control-label">Pihutang Name</label>
                                            <input class="form-control" type="text" name="pihutang_name"
                                                value="{{ old('pihutang_name') }}" placeholder="Enter pihutang name">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="nominal" class="form-control-label">Nominal</label>
                                            <input class="form-control" type="number" name="nominal" id="nominal"
                                                min="0" value="0">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end" style="margin-right: 20px;">
                            <a href="{{ route('pihutang') }}" class="text-secondary font-weight-bold text-xs"
                                data-toggle="tooltip" data-original-title="Cancel pihutang">
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
