<?php

namespace App\Http\Controllers;

use App\Models\Insumo;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Barryvdh\DomPDF\Facade\Pdf;

class InsumoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('insumo.index', [
            'insumos' => Insumo::paginate(5),
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
            'cantidad' => 'required',
        ]);

        Alert::success('Registrado Correctamente', 'El insumo fue registrado con exito');
        Insumo::create($request->all());
        return redirect()->route('insumo.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Insumo $insumo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Insumo $insumo)
    {
        //
        return view('insumo.edit', [
            'insumo' => $insumo,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Insumo $insumo)
    {
        //
        $request->validate([
            'nombre' => 'required',
            'cantidad' => 'required|numeric|min:1',
        ]);

        Alert::success('Actualizado Correctamente', 'El insumo fue actualizado con exito');
        $insumo->update($request->all());
        return redirect()->route('insumo.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Insumo $insumo)
    {
        //
        $insumo->delete();
        Alert::success('Eliminado Correctamente', 'El insumo fue eliminado con exito');
        return redirect()->route('insumo.index');
    }

    public function pdf(){
    
        $insumos = Insumo::all();
        $pdf = Pdf::loadView('insumo.pdf', [
            'insumos' => $insumos,
        ]);
        // $pdf->setPaper('Letter', 'landscape');
        return $pdf->download('insumos.pdf');
    }
}
