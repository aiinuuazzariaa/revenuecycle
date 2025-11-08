<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Product $product): View
    {
        $data = $product::all();
        return view('pages.product.index', compact('data'));

        // return response()->json([
        //     'success' => true,
        //     'message' => 'Show all data',
        //     'data' => $product::all(),
        // ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('pages.product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Product $product)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'product_name' => 'required',
                'price' => 'required',
            ]
        );

        if ($validator->fails()) {
            return Response()->json($validator->errors());
        }

        $store = $product::create([
            'product_name' => $request->product_name,
            'price' => $request->price,
        ]);

        $data = $product::where('product_name', '=', $request->product_name)->get();
        if ($product) {
            return redirect()->route('product')
                ->with('success', 'Success add product!');
        } else {
            return redirect()->back()
                ->with('failed', 'Failed add product!');
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
    public function show(Product $product, $id): View
    {
        return view('pages.product.edit', [
            'product' => $product::where('id', $id)->first(),
        ]);
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
    public function update(Request $request, Product $product, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'product_name' => 'required',
                'price' => 'required',
            ]
        );

        if ($validator->fails()) {
            return Response()->json($validator->errors());
        }

        $update = $product::where('id', $id)->update([
            'product_name' => $request->product_name,
            'price' => $request->price,
        ]);

        if ($product) {
            return redirect()->route('product')
                ->with('success', 'Success update product!');
        } else {
            return redirect()->back()
                ->with('failed', 'Failed update product!');
        }

        // if ($update) {
        //     return Response()->json([
        //         'status' => 1,
        //         'message' => 'Success updating data !',
        //         'data' => $product::where('id', $id)->get(),
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
    public function destroy(Product $product, $id)
    {
        $delete = $product::where('id', $id)->delete();

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
