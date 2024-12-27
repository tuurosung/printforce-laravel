<?php

namespace App\Http\Controllers;

use App\Models\OperatingAccountHeader;
use Illuminate\Http\Request;

class OperatingAccountHeaderController extends Controller
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
    public function show(OperatingAccountHeader $operatingAccountHeader)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OperatingAccountHeader $operatingAccountHeader)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OperatingAccountHeader $operatingAccountHeader)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OperatingAccountHeader $operatingAccountHeader)
    {
        //
    }


    static function allHeaders()
    {
        $headers = new OperatingAccountHeader();
        $account_headers = $headers->all();
        return $headers;
    }
}
