<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Customer $customer): View
    {
        $data = $customer::all();
        return view('pages.customer.index', compact('data'));

        // return response()->json([
        //     'success' => true,
        //     'message' => 'Show all data',
        //     'data' => $customer::all(),
        // ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('pages.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Customer $customer)
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
        if ($customer) {
            return redirect()->route('customer')
                ->with('success', 'Success add customer!');
        } else {
            return redirect()->back()
                ->with('failed', 'Failed add customer!');
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
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer, $id): View
    {
        return view('pages.customer.edit', [
            'customer' => $customer::where('id', $id)->first(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer, $id)
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

        if ($customer) {
            return redirect()->route('customer')
                ->with('success', 'Success update customer!');
        } else {
            return redirect()->back()
                ->with('failed', 'Failed update customer!');
        }

        // if ($update) {
        //     return Response()->json([
        //         'status' => 1,
        //         'message' => 'Success updating data !',
        //         'data' => $customer::where('id', $id)->get(),
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
