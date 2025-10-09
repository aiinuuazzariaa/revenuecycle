<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;

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
            'data' => $customer::all()
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request, Categories $categories)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'customer_name' => 'required',
                'address' => 'required',
                'phone' => 'required'
            ]
        );

        if ($validator->fails()) {
            return Response()->json($validator->errors());
        }

        $store = $customer::create([
            'customer_name' => $request->customer_name,
            'address' => $request->address,
            'phone' => $request->phone
        ]);

        $data = $customer::where('customer_name', '=', $request->customer_name)->get();
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
    public function store(StoreCustomerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        if ($customer::where('customer_id', $customer)->exists()) {
            $data = $customer::where('customer.customer_id', '=', $customer)->get();

            return response()->json([
                'success' => true,
                'message' => 'Success show data!',
                'data' => $data
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
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        $delete = DB::table('customer_id')
            ->where('customer_id', '=', $customer)
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
