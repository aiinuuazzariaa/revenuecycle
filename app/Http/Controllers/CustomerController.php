<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Customer $customer)
    {
        return response()->json([
            'success' => true,
            'message' => 'Show all data',
            'data' => $customer::all(),
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request, Customer $customer)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'customer_name' => 'required',
                'phone' => 'required',
            ]
        );

        if ($validator->fails()) {
            return Response()->json($validator->errors());
        }

        $store = $customer::create([
            'customer_name' => $request->customer_name,
            'phone' => $request->phone,
        ]);

        $data = $customer::where('customer_name', '=', $request->customer_name)->get();
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

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer, $id)
    {
        $customer = Customer::where('id', $id)->first();

        if ($customer) {
            return response()->json([
                'success' => true,
                'message' => 'Success show data!',
                'data' => $customer,
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
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, Customer $customer, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'customer_name' => 'required',
                'phone' => 'required',
            ]
        );

        if ($validator->fails()) {
            return Response()->json($validator->errors());
        }

        $update = $customer::where('id', $id)->update([
            'customer_name' => $request->customer_name,
            'phone' => $request->phone,
        ]);

        if ($update) {
            return Response()->json([
                'status' => 1,
                'message' => 'Success updating data !',
                'data' => $customer::where('id', $id)->get(),
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
    public function destroy(Customer $customer, $id)
    {
        $delete = $customer::where('id', $id)->delete();

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
