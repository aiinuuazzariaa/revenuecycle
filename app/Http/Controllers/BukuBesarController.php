<?php

namespace App\Http\Controllers;

use App\Models\BukuBesar;
use App\Models\AccountNumber;
use App\Http\Requests\StoreBukuBesarRequest;
use App\Http\Requests\UpdateBukuBesarRequest;
use Illuminate\View\View;
use Carbon\Carbon;

class BukuBesarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(BukuBesar $bukuBesar): View
    {
        $accounts = AccountNumber::with(['bukuBesar.income.customer'])->get();

        $bukuBesarPiutang = BukuBesar::whereHas('accountNumber', function ($q) {
            $q->where('account_number', '1201');
        })
            ->with(['income.customer'])
            ->orderBy('id')
            ->get();

        $piutangPerCustomer = $bukuBesarPiutang->groupBy(function ($item) {
            return $item->income->customer->id ?? 'Not found';
        })->map(function ($items) {
            $saldo = 0;
            $transaksi = [];

            foreach ($items as $row) {
                $debit = $row->debit ?? 0;
                $credit = $row->credit ?? 0;
                $saldo += $debit - $credit;

                $tanggal = null;
                $invoice = $row->income->income_invoice_number ?? '';
                if (preg_match('/\d{8}/', $invoice, $matches)) {
                    $tanggal = Carbon::createFromFormat('Ymd', $matches[0])->format('d-m-Y');
                }

                $transaksi[] = [
                    'tanggal' => $tanggal,
                    'debit' => $debit,
                    'credit' => $credit,
                    'saldo' => $saldo,
                ];
            }

            return [
                'customer' => $items->first()->income->customer ?? null,
                'transaksi' => $transaksi,
                'saldo_akhir' => $saldo,
            ];
        });

        return view('pages.buku-besar.index', [
            'accounts' => $accounts,
            'piutangPerCustomer' => $piutangPerCustomer,
        ]);

        // return response()->json([
        //     'success' => true,
        //     'message' => 'Show all data',
        //     'data' => $income::all(),
        // ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBukuBesarRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(BukuBesar $bukuBesar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BukuBesar $bukuBesar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBukuBesarRequest $request, BukuBesar $bukuBesar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BukuBesar $bukuBesar)
    {
        //
    }
}
