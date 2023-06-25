<?php

namespace App\Http\Controllers;

use App\Models\HistorialComite;
use Illuminate\Http\Request;

class HistorialComiteController extends Controller
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
    public function show(HistorialComite $historialComite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HistorialComite $historialComite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HistorialComite $historialComite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HistorialComite $historialComite)
    {
        //
        $historialComite->delete();
        return redirect()->route('comiteMixto.index');
    }
}
