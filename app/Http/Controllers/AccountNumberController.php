<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateAccountNumberRequest;
use App\Models\AccountNumber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class AccountNumberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(AccountNumber $account_number): View
    {
        $data = $account_number::all();
        return view('pages.account-number.index', compact('data'));

        // return response()->json([
        //     'success' => true,
        //     'message' => 'Show all data',
        //     'data' => $account_number::all(),
        // ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('pages.account-number.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, AccountNumber $account_number)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'account_number' => 'required|integer|unique:account_numbers,account_number',
                'account_name' => 'required',
            ]
        );

        if ($validator->fails()) {
            return Response()->json($validator->errors());
        }

        $store = $account_number::create([
            'account_number' => $request->account_number,
            'account_name' => $request->account_name,
        ]);

        $data = $account_number::where('account_name', '=', $request->account_name)->get();
        if ($account_number) {
            return redirect()->route('account-number')
                ->with('success', 'Success add account number!');
        } else {
            return redirect()->back()
                ->with('error', 'Failed add account number!');
        }

        // if ($account_number) {
        //     return response()->json([
        //         'success' => true,
        //         'message' => 'Success add data!',
        //         'data' => $account_number,
        //     ], 200);
        // } else {
        //     return response()->json([
        //         'success' => false,
        //         'message' => 'Failed add the data!',
        //         'data' => '',
        //     ], 404);
        // }
    }

    /**
     * Display the specified resource.
     */
    public function show(AccountNumber $account_number, $id): View
    {
        return view('pages.account-number.update', [
            'account' => $account_number::where('id', $id)->first(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AccountNumber $account_number)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAccountNumberRequest $request, AccountNumber $account_number, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'account_number' => 'required',
                'account_name' => 'required',
            ]
        );

        if ($validator->fails()) {
            return Response()->json($validator->errors());
        }

        $update = $account_number::where('id', $id)->update([
            'account_number' => $request->account_number,
            'account_name' => $request->account_name,
        ]);

        if ($account_number) {
            return redirect()->route('account-number')
                ->with('success', 'Success update account number!');
        } else {
            return redirect()->back()
                ->with('error', 'Failed update account number!');
        }

        // if ($update) {
        //     return Response()->json([
        //         'status' => 1,
        //         'message' => 'Success updating data !',
        //         'data' => $account_number::where('id', $id)->get(),
        //     ]);
        // } else {
        //     return Response()->json([
        //         'status' => 0,
        //         'message' => 'Failed updating data !',
        //     ]);
        // }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AccountNumber $account_number, $id)
    {
        $delete = $account_number::where('id', $id)->delete();

        if ($account_number) {
            return redirect()->route('account-number')
                ->with('success', 'Success delete account number!');
        } else {
            return redirect()->back()
                ->with('error', 'Failed delete account number!');
        }

        // if ($delete) {
        //     return Response()->json([
        //         'status' => 1,
        //         'message' => 'Success delete data !',
        //     ]);
        // } else {
        //     return Response()->json([
        //         'status' => 0,
        //         'message' => 'Failed delete data !',
        //     ]);
        // }
    }
}
