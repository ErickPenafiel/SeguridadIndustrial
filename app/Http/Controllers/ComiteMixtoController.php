<?php

namespace App\Http\Controllers;

use App\Models\ComiteMixto;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\HistorialComite;
use App\Models\ReunionComite;
use Barryvdh\DomPDF\Facade\Pdf;

class ComiteMixtoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('comiteMixto.index', [
            'comiteMixtos' => ComiteMixto::paginate(8)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('comiteMixto.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        ComiteMixto::create($request->all());
        return redirect()->route('comiteMixto.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(ComiteMixto $comiteMixto)
    {
        //
        return view('comiteMixto.reuniones', [
            'comiteMixto' => $comiteMixto,
            'reunionesComite' => ReunionComite::where('comite_id', $comiteMixto->id)->orderBy('fecha', 'desc')->paginate(8),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ComiteMixto $comiteMixto)
    {
        //
        return view('comiteMixto.edit', [
            'comiteMixto' => $comiteMixto
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ComiteMixto $comiteMixto)
    {
        //
        HistorialComite::create([
            'comite_id' => $comiteMixto->id,
            'miembro1' => $comiteMixto->miembro1,
            'miembro2' => $comiteMixto->miembro2,
            'miembro3' => $comiteMixto->miembro3,
            'miembro4' => $comiteMixto->miembro4,
            'fecha' => $comiteMixto->fecha,
            'detalle' => $comiteMixto->detalle,
            'observaciones' => $comiteMixto->observaciones,
        ]);

        $comiteMixto->update($request->all());
        return redirect()->route('comiteMixto.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ComiteMixto $comiteMixto)
    {
        //
        $comiteMixto->delete();
        return redirect()->route('comiteMixto.index');
    }

    public function historial(ComiteMixto $comiteMixto)
    {
        //
        return view('comiteMixto.historial', [
            'comiteMixto' => $comiteMixto,
            'historialComites' => HistorialComite::where('comite_id', $comiteMixto->id)->paginate(8),
        ]);
    }

    public function reuniones()
    {
        //
        
    }

    public function pdf()
    {
        $comiteMixtos = ComiteMixto::all();
        $pdf = Pdf::loadView('comiteMixto.pdf', [
            'comiteMixtos' => $comiteMixtos,
        ]);
        // $pdf->setPaper('Letter', 'landscape');
        return $pdf->download('comiteMixtos.pdf');
    }
}
