<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJurnalUmumRequest;
use App\Http\Requests\UpdateJurnalUmumRequest;
use App\Models\JurnalUmum;
use Illuminate\View\View;


class JurnalUmumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(JurnalUmum $jurnalUmum): View
    {
        $data = $jurnalUmum::all();
        return view('pages.jurnal-umum.index', compact('data'));
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
    public function store(StoreJurnalUmumRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(JurnalUmum $jurnalUmum)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JurnalUmum $jurnalUmum)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJurnalUmumRequest $request, JurnalUmum $jurnalUmum)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JurnalUmum $jurnalUmum)
    {
        //
    }
}
