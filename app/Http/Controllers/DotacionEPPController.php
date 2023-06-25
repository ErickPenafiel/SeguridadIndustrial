<?php

namespace App\Http\Controllers;

use App\Models\DotacionEPP;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Insumo;
use App\Models\DetalleDotacion;
use Barryvdh\DomPDF\Facade\Pdf;

class DotacionEPPController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('dotacionepp.index', [
            'dotacionepps' => DotacionEPP::paginate(8),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('dotacionepp.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        DotacionEPP::create($request->all());
        return redirect()->route('dotacionepp.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(DotacionEPP $dotacionEPP)
    {
        //        
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DotacionEPP $dotacionepp)
    {
        //
        return view('dotacionepp.edit', [
            'dotacionepp' => $dotacionepp,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DotacionEPP $dotacionepp)
    {
        //
        $dotacionepp->update($request->all());
        return redirect()->route('dotacionepp.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DotacionEPP $dotacionepp)
    {
        //
        $dotacionepp->delete();
        return redirect()->route('dotacionepp.index');
    }

    public function lista(DotacionEPP $dotacionepp){
        return view('dotacionepp.lista', [
            'dotacionepp' => $dotacionepp,
            'insumos' => Insumo::all(),
        ]);
    }

    public function verDetalle(DotacionEPP $dotacionepp){
        return view('dotacionepp.detalle', [
            'dotacionepp' => $dotacionepp,
            'detalleDotacion' => DetalleDotacion::where('id_dotacion', $dotacionepp->id)->paginate(10),
        ]);
    }

    public function pdf(){
    
        $dotacionepps = DotacionEPP::all();
        $pdf = Pdf::loadView('dotacionepp.pdf', [
            'dotacionepps' => $dotacionepps,
        ]);
        // $pdf->setPaper('Letter', 'landscape');
        return $pdf->download('dotacionepps.pdf');
    }
}
