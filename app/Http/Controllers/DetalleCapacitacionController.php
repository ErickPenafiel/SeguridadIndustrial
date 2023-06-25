<?php

namespace App\Http\Controllers;

use App\Models\DetalleCapacitacion;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Capacitacion;
use Barryvdh\DomPDF\Facade\Pdf;

class DetalleCapacitacionController extends Controller
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
    public function show(DetalleCapacitacion $detalleCapacitacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DetalleCapacitacion $detalleCapacitacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DetalleCapacitacion $detalleCapacitacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DetalleCapacitacion $detalleCapacitacion)
    {
        //
        $detalleCapacitacion->delete();
        Alert::success('Éxito', 'Se ha eliminado el detalle de dotación correctamente.');
        return redirect()->back();
    }

    public function registrarTrabajadores(Capacitacion $capacitacion) {
        $lista = session()->get('listaCapacitacion');        
        foreach($lista as $key => $elemento){
            $detalleCapacitacion = new DetalleCapacitacion();
            $detalleCapacitacion->id_capacitacion = $capacitacion->id;
            $detalleCapacitacion->id_trabajador = $elemento->id;
            $detalleCapacitacion->save();
            unset($lista[$key]);
        }
        session()->put('listaCapacitacion', $lista);
        Alert::success('Éxito', 'Se ha registrado el trabajador correctamente.');
        return redirect()->back();
    }

    public function pdf(Capacitacion $capacitacion)
    {
        $detalleCapacitacion = DetalleCapacitacion::where('id', $capacitacion->id)->get();
        $pdf = Pdf::loadView('detalle_capacitacion.pdf', [
            'detalleCapacitacion' => $detalleCapacitacion,
        ]);
        // $pdf->setPaper('Letter', 'landscape');
        return $pdf->download('detalleCapacitacion.pdf');
    }
}

