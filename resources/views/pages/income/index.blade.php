@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Income'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Income Table</h6>
                    </div>
                    <div class="d-flex justify-content-end" style="margin-right: 40px;">
                        @can('income.create')
                            <a href="{{ route('income-create') }}" class="text-secondary font-weight-bold text-xs"
                                data-toggle="tooltip" data-original-title="Add income">
                                <span class="btn btn-xs text-sm bg-gradient-warning">Add Income</span>
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
                                            Transaction Number</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Account Number</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Customer</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Income Name</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Product</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Total</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Payment Type</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Nominal</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Payment Due Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $income)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm ps-2">{{ $income->id }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">
                                                    {{ $income->income_invoice_number }}</p>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">
                                                    {{ $income->AccountNumber->account_name }}</p>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">
                                                    {{ $income->Customer->customer_name }}</p>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">{{ $income->income_name }}</p>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">
                                                    {{ optional($income->Product)->product_name ?? '-' }}</p>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">Rp.
                                                    {{ number_format($income->total, 0, ',', '.') }}.000</p>
                                            </td>
                                            <td class="align-middle">
                                                @if ($income->payment_type == 'cash')
                                                    <span class="btn btn-xs text-sm bg-gradient-success text-white">
                                                        {{ ucfirst($income->payment_type) }}
                                                    </span>
                                                @else
                                                    <span class="btn btn-xs text-sm bg-gradient-danger text-white">
                                                        {{ ucfirst($income->payment_type) }}
                                                    </span>
                                                @endif
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">Rp.
                                                    {{ number_format($income->nominal, 0, ',', '.') }}.000</p>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">
                                                    {{ $income->payment_due_date ? \Carbon\Carbon::parse($income->payment_due_date)->format('d-m-Y') : '-' }}
                                                </p>
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
