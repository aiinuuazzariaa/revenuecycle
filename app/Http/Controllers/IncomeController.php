<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIncomeRequest;
use App\Http\Requests\UpdateIncomeRequest;
use App\Models\AccountNumber;
use App\Models\Income;
use App\Models\Customer;
use App\Models\JurnalUmum;
use App\Models\BukuBesar;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Income $income): View
    {
        $data = $income::all();
        return view('pages.income.index', compact('data'));
        // return response()->json([
        //     'success' => true,
        //     'message' => 'Show all data',
        //     'data' => $income::all(),
        // ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request, Income $income): View
    {
        $account_numbers = AccountNumber::all();
        $customers = Customer::all();
        $products = Product::all();
        return view('pages.income.create', compact('account_numbers', 'customers', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    private function generateTransactionNumber($account_number_id, $product_id)
    {
        $date = date('Ymd');

        $account = AccountNumber::find($account_number_id);
        $account_number = $account ? $account->account_number : '0000';

        $product = Product::find($product_id);
        $productCode = $product ? str_pad($product->id, 2, '0', STR_PAD_LEFT) : '00';

        $prefix = $account_number . '-' . $date . '-' . $productCode . '-';

        $lastIncome = Income::where('income_invoice_number', 'like', $prefix . '%')
            ->orderBy('id', 'desc')
            ->first();

        if (!$lastIncome) {
            $number = 1;
        } else {
            $lastNumber = (int) substr($lastIncome->income_invoice_number, -4);
            $number = $lastNumber + 1;
        }

        return $prefix . str_pad($number, 4, '0', STR_PAD_LEFT);
    }


    public function store(Request $request, Income $income)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'account_number_id' => 'required',
                'customer_id' => 'required',
                'income_name' => 'required',
                'total' => 'required',
                'payment_type' => 'required',
            ]
        );

        if ($validator->fails()) {
            return Response()->json($validator->errors());
        }

        $total = preg_replace('/[^0-9]/', '', $request->total);
        $nominal = preg_replace('/[^0-9]/', '', $request->nominal ?? 0);

        $transaction_number = $this->generateTransactionNumber($request->account_number_id, $request->product_id ?? null);

        $store = $income::create([
            'income_invoice_number' => $transaction_number,
            'account_number_id' => $request->account_number_id,
            'customer_id' => $request->customer_id,
            'income_name' => $request->income_name,
            'product_id' => $request->product_id ?: null,
            'total' =>  $request->total,
            'payment_type' => strtolower($request->payment_type),
            'nominal' => $request->nominal ?: 0,
            'payment_due_date' => $request->payment_due_date ?: null,
        ]);

        $data = $income::where('income_name', '=', $request->income_name)->get();
        $account = AccountNumber::find($request->account_number_id);
        if ($request->payment_type == 'credit') {
            $request->merge([
                'nominal' => $request->total,
                'payment_due_date' => null
            ]);
        }

        if (strtolower($request->payment_type) == 'credit') {
            $pihutang = $total - $nominal;
            Customer::where('id', $request->customer_id)
                ->increment('pihutang_balance', $pihutang);
        }

        $COA = AccountNumber::pluck('id', 'account_number')->toArray();

        $acc = AccountNumber::find($request->account_number_id);

        $pendapatanAkun = $COA['4101'];

        if ($request->account_number_id == $COA['4201']) {
            $pendapatanAkun = $COA['4201'];
        }

        if (strtolower($request->payment_type) == 'cash') {

            JurnalUmum::create([
                'income_id' => $store->id,
                'account_number_id' => $COA['1101'],
                'name' => $request->income_name,
                'debit' => $total,
                'credit' => null,
            ]);

            JurnalUmum::create([
                'income_id' => $store->id,
                'account_number_id' => $pendapatanAkun,
                'name' => $request->income_name,
                'debit' => null,
                'credit' => $total,
            ]);
        }

        if (strtolower($request->payment_type) == 'credit') {

            if ($nominal > 0) {
                JurnalUmum::create([
                    'income_id' => $store->id,
                    'account_number_id' => $COA['1101'],
                    'name' => $request->income_name,
                    'debit' => $nominal,
                    'credit' => null,
                ]);
            }

            if ($pihutang > 0) {
                JurnalUmum::create([
                    'income_id' => $store->id,
                    'account_number_id' => $COA['1201'],
                    'name' => $request->income_name,
                    'debit' => $pihutang,
                    'credit' => null,
                ]);
            }

            JurnalUmum::create([
                'income_id' => $store->id,
                'account_number_id' => $pendapatanAkun,
                'name' => $request->income_name,
                'debit' => null,
                'credit' => $total,
            ]);
        }

        $jurnal = JurnalUmum::where('income_id', $store->id)->get();
        $totalPendapatan = JurnalUmum::where('income_id', $store->id)->sum('credit');

        foreach ($jurnal as $row) {

            $lastSaldo = BukuBesar::where('account_number_id', $row->account_number_id)
                ->orderBy('id', 'DESC')
                ->value('saldo') ?? 0;

            $newSaldo = $lastSaldo + (($row->debit ?? 0) - ($row->credit ?? 0));

            BukuBesar::create([
                'account_number_id' => $row->account_number_id,
                'income_id' => $row->income_id,
                'pihutang_id' => $row->pihutang_id ?? null,
                'name' => $row->name,
                'debit' => $row->debit,
                'credit' => $row->credit,
                'saldo' => $newSaldo,
            ]);
        }

        if ($income) {
            return redirect()->route('income')
                ->with('success', 'Success add income!');
        } else {
            return redirect()->back()
                ->with('failed', 'Failed add income!');
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
        //
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
