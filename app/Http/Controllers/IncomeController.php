<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIncomeRequest;
use App\Http\Requests\UpdateIncomeRequest;
use App\Models\AccountNumber;
use App\Models\BukuBesar;
use App\Models\Income;
use App\Models\JurnalUmum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Income $income)
    {
        return response()->json([
            'success' => true,
            'message' => 'Show all data',
            'data' => $income::all(),
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    private function generateTransactionNumber($account_number_id, $product_id)
    {
        $date = date('Ymd');

        $account = AccountNumber::find($account_number_id);
        $account_number = $account ? $account->account_number : '0000';

        $lastIncome = Income::where('income_invoice_number', 'like', $account_number.'-'.$date.'-'.$product_id.'-%')
            ->orderBy('id', 'desc')
            ->first();

        if (! $lastIncome) {
            $number = 1;
        } else {
            $lastNumber = (int) substr($lastIncome->income_invoice_number, -4);
            $number = $lastNumber + 1;
        }

        return $account_number.'-'.$date.'-'.$product_id.'-'.str_pad($number, 4, '0', STR_PAD_LEFT);
    }

    public function create(Request $request, Income $income)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'account_number_id' => 'required',
                'customer_id' => 'required',
                'income_name' => 'required',
                'product_id' => 'required',
                'total' => 'required',
                'payment_type' => 'required',
            ]
        );

        if ($validator->fails()) {
            return Response()->json($validator->errors());
        }

        $transaction_number = $this->generateTransactionNumber($request->account_number_id, $request->product_id);

        $debit = $request->total;
        $credit = $request->total;

        $store = $income::create([
            'income_invoice_number' => $transaction_number,
            'account_number_id' => $request->account_number_id,
            'customer_id' => $request->customer_id,
            'income_name' => $request->income_name,
            'product_id' => $request->product_id,
            'total' => $request->total,
            'payment_type' => $request->payment_type,
            'debit' => $debit,
            'credit' => $credit,
        ]);

        $data = $income::where('income_name', '=', $request->income_name)->get();
        $account = AccountNumber::find($request->account_number_id);

        if ($store && $account) {
            $date = now();

            $income_name = $store->income_name;
            $debit = $store->debit ?? 0;
            $credit = $store->credit ?? 0;

            $jurnal = JurnalUmum::create([
                'income_id' => $store->id,
                'transaction_number' => $transaction_number,
                'date' => $date,
                'name' => $income_name,
                'debit' => $debit,
                'credit' => $credit,
            ]);

            $previousLedger = BukuBesar::where('jurnal_umum_id', $jurnal->id)
                ->orderBy('id')
                ->first();

            $previousSaldo = $previousLedger ? (float)$previousLedger->saldo : 0;

            $saldoBaru = $previousSaldo + (float)$credit;

            BukuBesar::create([
                'jurnal_umum_id' => $jurnal -> id,
                'name' => $income_name,
                'debit' => $debit,
                'credit' => $credit,
                'saldo' => $saldoBaru,
            ]);

            if ($store) {
                return Response()->json([
                    'status' => 1,
                    'message' => 'Success create new data!',
                    'data' => $data,
                ]);
            } else {
                return Response()->json([
                    'status' => 0,
                    'message' => 'Failed create data!',
                ]);
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreIncomeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Income $income, $id)
    {
        $income = Income::where('id', $id)->first();

        if ($income) {
            return response()->json([
                'success' => true,
                'message' => 'Success show data!',
                'data' => $income,
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
    public function edit(Income $income)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateIncomeRequest $request, Income $income, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'account_number_id' => 'required',
                'customer_id' => 'required',
                'income_name' => 'required',
                'product_id' => 'required',
                'total' => 'required',
                'payment_type' => 'required',
                'debit' => 'required',
                'credit' => 'required',
            ]
        );

        if ($validator->fails()) {
            return Response()->json($validator->errors());
        }

        $update = $income::where('id', $id)->update([
            'account_number_id' => $request->account_number_id,
            'customer_id' => $request->customer_id,
            'income_name' => $request->income_name,
            'product_id' => $request->product_id,
            'total' => $request->total,
            'payment_type' => $request->payment_type,
            'debit' => $request->debit,
            'credit' => $request->credit,
        ]);

        if ($update) {
            return Response()->json([
                'status' => 1,
                'message' => 'Success updating data !',
                'data' => $income::where('id', $id)->get(),
            ]);
        } else {
            return Response()->json([
                'status' => 0,
                'message' => 'Failed updating data !',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Income $income, $id)
    {
        $delete = $income::where('id', $id)->delete();

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
