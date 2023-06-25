<?php

namespace App\Http\Controllers;

use App\Models\ReunionComite;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ReunionComiteController extends Controller
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
        ReunionComite::create([
            'comite_id' => $request->comite_id,
            'fecha' => $request->fecha,
            'detalle' => $request->detalle,
        ]);
        Alert::success('Listo', 'Reunion programada.');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(ReunionComite $reunionComite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ReunionComite $reunionComite)
    {
        //
        return view('reunion.edit', [
            'reunionComite' => $reunionComite,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ReunionComite $reunionComite)
    {
        //
        $reunionComite->update($request->all());
        Alert::success('Listo', 'Reunion actualizada.');
        return redirect()->route('comiteMixto.show', $reunionComite->comite_id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ReunionComite $reunionComite)
    {
        //
        $reunionComite->delete();
        Alert::success('Listo', 'Reunion eliminada.');
        return redirect()->back();
    }
}
