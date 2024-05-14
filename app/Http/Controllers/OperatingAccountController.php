<?php

namespace App\Http\Controllers;

use App\Models\OperatingAccount;
use Illuminate\Http\Request;

class OperatingAccountController extends Controller
{
    private $active_subscriber = '187635294';

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
    public function show(OperatingAccount $operatingAccount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OperatingAccount $operatingAccount)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OperatingAccount $operatingAccount)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OperatingAccount $operatingAccount)
    {
        //
    }


    public function allAccounts()
    {
        return OperatingAccount::whereSubscriberId($this->active_subscriber)
            ->whereStatus('active')->get();
    }
}
