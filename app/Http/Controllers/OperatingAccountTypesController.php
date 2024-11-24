<?php

namespace App\Http\Controllers;

use App\Models\OperatingAccountTypes;
use Illuminate\Http\Request;

class OperatingAccountTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(OperatingAccountTypes $operatingAccountTypes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OperatingAccountTypes $operatingAccountTypes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OperatingAccountTypes $operatingAccountTypes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OperatingAccountTypes $operatingAccountTypes)
    {
        //
    }

    public function accountTypes()
    {
        return OperatingAccountTypes::all();
    }
}
