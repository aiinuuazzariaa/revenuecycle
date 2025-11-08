@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Buku Besar'])
    <div class="container-fluid py-4">
        @foreach ($accounts as $acc)
            @php
                $runningSaldo = 0;
                $no = 1;
            @endphp
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>Buku Besar Table</h6>
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
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Date</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Account Number</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Account Name</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Name</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Debit</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Credit</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Saldo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $runningSaldo = 0;
                                            $no = 1;
                                        @endphp
                                        @foreach ($acc->bukuBesar as $bukuBesar)
                                            {{-- @php
                                                if (in_array($acc->account_number, ['1101', '1201'])) {
                                                    $runningSaldo += ($bukuBesar->debit ?? 0) - ($bukuBesar->credit ?? 0);
                                                } else {
                                                    $runningSaldo += ($bukuBesar->credit ?? 0) - ($bukuBesar->debit ?? 0);
                                                }
                                            @endphp --}}
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm ps-2">{{ $no++ }}</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm ps-2">
                                                                {{ preg_match('/\d{8}/', $bukuBesar->income->income_invoice_number, $matches)
                                                                    ? \Carbon\Carbon::createFromFormat('Ymd', $matches[0])->format('d-m-Y')
                                                                    : '-' }}
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0">
                                                        {{ $bukuBesar->AccountNumber->account_number }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0">
                                                        {{ $bukuBesar->AccountNumber->account_name }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0">
                                                        {{ $bukuBesar->Income->income_name ?? $bukuBesar->name }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0">Rp.
                                                        {{ number_format($bukuBesar->debit, 0, ',', '.') }}.000</p>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0">Rp.
                                                        {{ number_format($bukuBesar->credit, 0, ',', '.') }}.000</p>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0">Rp.
                                                        {{ number_format($runningSaldo, 0, ',', '.') }}.000</p>
                                                </td>
                                            </tr>
                                        @endforeach
                                        <tr class="text-success font-weight-bold">
                                            <td colspan="5" class="text-center">Total</td>
                                            <td></td>
                                            <td></td>
                                            <td>Rp. {{ number_format($runningSaldo, 0, ',', '.') }}.000</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        @include('layouts.footers.auth.footer')
    </div>
@endsection
