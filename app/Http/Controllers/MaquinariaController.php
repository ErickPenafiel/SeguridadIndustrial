<?php

namespace App\Http\Controllers;

use App\Models\Maquinaria;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Barryvdh\DomPDF\Facade\Pdf;

class MaquinariaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('maquinaria.index', [
            'maquinarias' => Maquinaria::paginate(5),
        ]);
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
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'area_id' => 'required',
        ]);

        Maquinaria::create($request->all());
        Alert::success('Registrado Correctamente', 'La maquinaria fue registrada con exito');
        return redirect()->route('maquinaria.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Maquinaria $maquinaria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Maquinaria $maquinarium)
    {
        //
        return view('maquinaria.edit', [
            'maquinaria' => $maquinarium,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Maquinaria $maquinarium)
    {
        //
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'area_id' => 'required',
        ]);
        $maquinarium->update($request->all());
        Alert::success('Actualizado Correctamente', 'La maquinaria fue actualizada con exito');
        return redirect()->route('maquinaria.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Maquinaria $maquinarium)
    {
        //
        $maquinarium->delete();
        Alert::success('Eliminado Correctamente', 'La maquinaria fue eliminada con exito');
        return redirect()->route('maquinaria.index');
    }

    public function pdf(){
        $maquinarias = Maquinaria::all();
        $pdf = Pdf::loadView('maquinaria.pdf', [
            'maquinarias' => $maquinarias,
        ]);
        // $pdf->setPaper('Legal', 'landscape');
        return $pdf->download('maquinarias.pdf');
    }
}
