<?php

namespace App\Http\Controllers;

use App\Models\Monitoreo;
use Illuminate\Http\Request;
use App\Models\FotoMonitoreo;
use Barryvdh\DomPDF\Facade\Pdf;


class MonitoreoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('monitoreo.index', [
            'monitoreos' => Monitoreo::paginate(8)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('monitoreo.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        Monitoreo::create($request->all());
        return redirect()->route('monitoreo.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Monitoreo $monitoreo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Monitoreo $monitoreo)
    {
        //
        return view('monitoreo.edit', [
            'monitoreo' => $monitoreo
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Monitoreo $monitoreo)
    {
        //
        $monitoreo->update($request->all());
        return redirect()->route('monitoreo.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Monitoreo $monitoreo)
    {
        //
        $monitoreo->delete();
        return redirect()->route('monitoreo.index');
    }

    public function fotos(Monitoreo $monitoreo)
    {
        return view('monitoreo.fotos', [
            'monitoreo' => FotoMonitoreo::where('monitoreo_id', $monitoreo->id)->paginate(8),
            'monitoreo_id' => $monitoreo->id
        ]);
    }

    public function pdf(){
        $monitoreos = Monitoreo::all();
        $pdf = Pdf::loadView('monitoreo.pdf', [
            'monitoreos' => $monitoreos,
        ]);
        // $pdf->setPaper('Legal', 'landscape');
        return $pdf->download('monitoreos.pdf');
    }
}
