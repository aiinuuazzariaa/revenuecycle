<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePihutangRequest;
use App\Http\Requests\UpdatePihutangRequest;
use App\Models\AccountNumber;
use App\Models\Customer;
use App\Models\Income;
use App\Models\Pihutang;
use App\Models\JurnalUmum;
use App\Models\BukuBesar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class PihutangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Pihutang $pihutang): View
    {
        $data = $pihutang::all();
        return view('pages.pihutang.index', compact('data'));
        // return response()->json([
        //     'success' => true,
        //     'message' => 'Show all data',
        //     'data' => $pihutang::all(),
        // ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request, Pihutang $pihutang)
    {
        $incomes = Income::all();
        return view('pages.pihutang.create', compact('incomes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    private function generatePihutangNumber($account_number_id)
    {
        $date = date('Ymd');

        $account = AccountNumber::find($account_number_id);
        $account_number = $account ? $account->account_number : '1201';

        $prefix = $account_number . '-' . $date . '-';

        $lastPihutang = Pihutang::where('transaction_number', 'like', $prefix . '%')
            ->orderBy('id', 'desc')
            ->first();

        if (! $lastPihutang) {
            $number = 1;
        } else {
            $lastNumber = (int) substr($lastPihutang->transaction_number, -4);
            $number = $lastNumber + 1;
        }

        return $prefix . str_pad($number, 4, '0', STR_PAD_LEFT);
    }


    public function store(Request $request, Pihutang $pihutang)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'income_id' => 'required',
                'pihutang_name' => 'required',
                'nominal' => 'required',
            ]
        );

        if ($validator->fails()) {
            return Response()->json($validator->errors());
        }

        $transaction_number = $this->generatePihutangNumber($request->account_number_id);
        $nominal = preg_replace('/[^0-9]/', '', $request->nominal ?? 0);

        $store = $pihutang::create([
            'transaction_number' => $transaction_number,
            'income_id' => $request->income_id,
            'pihutang_name' => $request->pihutang_name,
            'nominal' => $request->nominal,
        ]);

        $data = $pihutang::where('pihutang_name', '=', $request->pihutang_name)->get();
        $income = Income::find($request->income_id);

        if ($income) {
            $customer = Customer::find($income->customer_id);

            if ($customer) {
                $customer->pihutang_balance = max(0, $customer->pihutang_balance - $request->nominal);
                $customer->save();
            }
        }

        $COA = AccountNumber::pluck('id', 'account_number')->toArray();

        JurnalUmum::create([
            'income_id' => $store->id,
            'account_number_id' => $COA['1101'],
            'name' => $request->pihutang_name,
            'debit' => $nominal,
            'credit' => null,
        ]);

        JurnalUmum::create([
            'income_id' => $store->id,
            'account_number_id' => $COA['1201'],
            'name' => $request->pihutang_name,
            'debit' => null,
            'credit' => $nominal,
        ]);

        foreach (
            [
                [
                    'account_number_id' => $COA['1101'],
                    'name' => $request->pihutang_name,
                    'debit' => $nominal,
                    'credit' => 0
                ],
                [
                    'account_number_id' => $COA['1201'],
                    'name' => $request->pihutang_name,
                    'debit' => 0,
                    'credit' => $nominal
                ]
            ] as $entry
        ) {
            $lastSaldo = BukuBesar::where('account_number_id', $entry['account_number_id'])
                ->orderBy('id', 'desc')
                ->value('saldo') ?? 0;

            $newSaldo = $lastSaldo + ($entry['debit'] - $entry['credit']);

            BukuBesar::create([
                'account_number_id' => $entry['account_number_id'],
                'income_id' => $store->id,
                'name' => $entry['name'],
                'debit' => $entry['debit'],
                'credit' => $entry['credit'],
                'saldo' => $newSaldo
            ]);

            AccountNumber::where('id', $entry['account_number_id'])
                ->update(['total' => $newSaldo]);
        }

        if ($pihutang) {
            return redirect()->route('pihutang')
                ->with('success', 'Success add pihutang payment!');
        } else {
            return redirect()->back()
                ->with('failed', 'Failed add pihutang payment!');
        }

        // if ($store) {
        //     return Response()->json([
        //         'status' => 1,
        //         'message' => 'Success create new data!',
        //         'data' => $data,
        //     ]);
        // } else {
        //     return Response()->json([
        //         'status' => 0,
        //         'message' => 'Failed create data!',
        //     ]);
        // }
    }

    /**
     * Display the specified resource.
     */
    public function show(Pihutang $pihutang, $id)
    {
        $pihutang = Pihutang::where('id', $id)->first();

        if ($pihutang) {
            return response()->json([
                'success' => true,
                'message' => 'Success show data!',
                'data' => $pihutang,
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Failed find the data!',
                'data' => '',
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pihutang $pihutang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pihutang $pihutang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pihutang $pihutang)
    {
        $delete = $pihutang
            ->delete();

        if ($delete) {
            return Response()->json([
                'status' => 1,
                'message' => 'Success delete data !',
            ]);
        } else {
            return Response()->json([
                'status' => 0,
                'message' => 'Failed delete data !',
            ]);
        }
    }
}
