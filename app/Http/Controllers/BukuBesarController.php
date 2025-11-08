<?php

namespace App\Http\Controllers;

use App\Models\BukuBesar;
use App\Models\AccountNumber;
use App\Http\Requests\StoreBukuBesarRequest;
use App\Http\Requests\UpdateBukuBesarRequest;
use Illuminate\View\View;

class BukuBesarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(BukuBesar $bukuBesar): View
    {
        $accounts = AccountNumber::with(['bukuBesar' => function ($q) {
            $q->orderBy('created_at', 'asc');
        }])->orderBy('account_number')->get();
        return view('pages.buku-besar.index', compact('accounts'));
        // return response()->json([
        //     'success' => true,
        //     'message' => 'Show all data',
        //     'data' => $income::all(),
        // ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBukuBesarRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(BukuBesar $bukuBesar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BukuBesar $bukuBesar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBukuBesarRequest $request, BukuBesar $bukuBesar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BukuBesar $bukuBesar)
    {
        //
    }
}
