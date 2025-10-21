<?php

namespace App\Http\Controllers;

use App\Models\Pihutang;
use App\Http\Requests\StorePihutangRequest;
use App\Http\Requests\UpdatePihutangRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PihutangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Pihutang $pihutang)
    {
        return response()->json([
            'success' => true,
            'message' => 'Show all data',
            'data' => $pihutang::all()
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request, Pihutang $pihutang)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'account_number_id' => 'required',
                'income_id' => 'required',
                'total' => 'required',
                'status' => 'required'
            ]
        );

        if ($validator->fails()) {
            return Response()->json($validator->errors());
        }

        $store = $pihutang::create([
            'account_number_id' => $request->account_number_id,
            'income_id' => $request->income_id,
            'total' => $request->total,
            'status' => $request->status
        ]);

        $data = $pihutang::where('income_id', '=', $request->income_id)->get();
        if ($store) {
            return Response()->json([
                'status' => 1,
                'message' => 'Success create new data!',
                'data' => $data
            ]);
        } else {
            return Response()->json([
                'status' => 0,
                'message' => 'Failed create data!'
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePihutangRequest $request)
    {
        //
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
                'data' => $pihutang
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Failed find the data!',
                'data' => ''
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
    public function update(UpdatePihutangRequest $request, Pihutang $pihutang)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'account_number_id' => 'required',
                'income_id' => 'required',
                'total' => 'required',
                'status' => 'required'
            ]
        );

        if ($validator->fails()) {
            return Response()->json($validator->errors());
        }

        $update = $d
            ->update([
                'account_number_id' => $request->account_number_id,
                'income_id' => $request->income_id,
                'total' => $request->total,
                'status' => $request->status
            ]);

        if ($update) {
            return Response()->json([
                'status' => 1,
                'message' => 'Success updating data !',
                'data' => $Income
            ]);
        } else {
            return Response()->json([
                'status' => 0,
                'message' => 'Failed updating data !'
            ]);
        }
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
                'message' => 'Success delete data !'
            ]);
        } else {
            return Response()->json([
                'status' => 0,
                'message' => 'Failed delete data !'
            ]);
        }
    }
}
