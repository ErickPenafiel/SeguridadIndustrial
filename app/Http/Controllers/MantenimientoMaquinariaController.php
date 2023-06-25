<?php

namespace App\Http\Controllers;

use App\Models\MantenimientoMaquinaria;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Maquinaria;
use App\Models\Trabajador;

class MantenimientoMaquinariaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('mantenimiento_maquinaria.index', [
            'mantenimiento_maquinarias' => MantenimientoMaquinaria::paginate(8)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('mantenimiento_maquinaria.create', [
            'maquinarias' => Maquinaria::all(),
            'trabajadores' => Trabajador::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        MantenimientoMaquinaria::create($request->all());
        return redirect()->route('mantenimiento_maquinaria.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(MantenimientoMaquinaria $mantenimientoMaquinaria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MantenimientoMaquinaria $mantenimiento)
    {
        //
        return view('mantenimiento_maquinaria.edit', [
            'mantenimiento_maquinaria' => $mantenimiento
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MantenimientoMaquinaria $mantenimiento)
    {
        //
        $mantenimiento->update($request->all());
        return redirect()->route('mantenimiento_maquinaria.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MantenimientoMaquinaria $mantenimiento)
    {
        //
        $mantenimiento->delete();
        return redirect()->route('mantenimiento_maquinaria.index');
    }

    public function pdf(){
        $mantenimiento_maquinarias = MantenimientoMaquinaria::all();
        $pdf = Pdf::loadView('mantenimiento_maquinaria.pdf', [
            'mantenimiento_maquinarias' => $mantenimiento_maquinarias,
        ]);
        // $pdf->setPaper('Legal', 'landscape');
        return $pdf->download('mantenimiento_maquinarias.pdf');
    }
}
