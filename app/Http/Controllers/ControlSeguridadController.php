<?php

namespace App\Http\Controllers;

use App\Models\ControlSeguridad;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Barryvdh\DomPDF\Facade\Pdf;

class ControlSeguridadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('controlseguridad.index', [
            'controlseguridads' => ControlSeguridad::paginate(8),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('controlseguridad.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $puntaje = $request->pregunta1 + $request->pregunta2 + $request->pregunta3 + $request->pregunta4 + $request->pregunta5 + $request->pregunta6 + $request->pregunta7 + $request->pregunta8;        
        ControlSeguridad::create([
            'id_trabajador' => $request->id_trabajador,
            'id_area' => $request->id_area,
            'puntaje' => $puntaje,
        ]);
        Alert::success('¡Éxito!', 'Control de seguridad registrado.');
        return redirect()->route('controlseguridad.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(ControlSeguridad $controlSeguridad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ControlSeguridad $controlseguridad)
    {
        //
        return view('controlseguridad.edit', [
            'controlseguridad' => $controlseguridad,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ControlSeguridad $controlseguridad)
    {
        //
        $controlseguridad->update($request->all());
        Alert::success('¡Éxito!', 'Control de seguridad actualizado.');
        return redirect()->route('controlseguridad.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ControlSeguridad $controlseguridad)
    {
        //
        $controlseguridad->delete();
        Alert::success('¡Éxito!', 'Control de seguridad eliminado.');
        return redirect()->route('controlseguridad.index');
    }

    public function pdf()
    {
        $controlseguridads = ControlSeguridad::all();
        $pdf = Pdf::loadView('controlseguridad.pdf', [
            'controlseguridads' => $controlseguridads,
        ]);
        // $pdf->setPaper('Letter', 'landscape');
        return $pdf->download('controlseguridads.pdf');
    }
}
