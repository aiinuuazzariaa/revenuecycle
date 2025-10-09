<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Product $product)
    {
         return response()->json([
            'success' => true,
            'message' => 'Show all data',
            'data' => $product::all()
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request, Product $product)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'product_name' => 'required',
                'price' => 'required'
            ]
        );

        if ($validator->fails()) {
            return Response()->json($validator->errors());
        }

        $store = $product::create([
            'product_name' => $request->product_name,
            'price' => $request->price
        ]);

        $data = $product::where('product_name', '=', $request->product_name)->get();
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
    public function store(StoreProductRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product, $id)
    {
        $product = Product::where('product_id', $id)->first();

        if ($product) {
            return response()->json([
                'success' => true,
                'message' => 'Success show data!',
                'data' => $product
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
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'product_name' => 'required',
                'price' => 'required'
            ]
        );

        if ($validator->fails()) {
            return Response()->json($validator->errors());
        }

        $update = $product
            ->update([
                'product_name' => $request->product_name,
                'price' => $request->price
            ]);

        if ($update) {
            return Response()->json([
                'status' => 1,
                'message' => 'Success updating data !',
                'data' => $product
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
    public function destroy(Product $product)
    {
        $delete = $product
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
