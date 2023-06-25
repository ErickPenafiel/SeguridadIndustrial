<?php

namespace App\Http\Controllers;

use App\Models\Capacitacion;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Charts\CapacitacionesChart;
use App\Models\Trabajador;
use App\Models\DetalleCapacitacion;
use Barryvdh\DomPDF\Facade\Pdf;

class CapacitacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $chart = new CapacitacionesChart;

        // Obtener todos los accidentes por meses
        $capacitacionMes = collect([]);
        for ($i=1; $i <= 12; $i++) { 
            $capacitacionMes->push(Capacitacion::whereMonth('created_at', $i)->whereRaw('YEAR(created_at)=?', [now()->format('Y')])->count());
        }
        // Obtener los meses
        $meses = collect([]);
        for ($i=1; $i <= 12; $i++) { 
            $meses->push(date('F', mktime(0, 0, 0, $i, 1)));
        }

        $chart->labels($meses);
        $chart->dataset('Capacitaciones', 'bar', $capacitacionMes)->options([
            'fill' => 'true',
            'borderColor' => '#51C1C0'
        ]);

        return view('capacitacion.index', [
            'capacitaciones' => Capacitacion::orderBy('fechaInicio', 'desc')->orderBy('fechaFin', 'desc')->paginate(8),
            'chart' => $chart,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('capacitacion.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nombre' => 'required',
            'contenido' => 'required',
            'fechaInicio' => 'required|date|before:fechaFin',
            'fechaFin' => 'required|date|after:fechaInicio',
        ]);
        Capacitacion::create($request->all());
        Alert::success('Registrado Correctamente', 'La capacitacion fue registrada con exito');
        return redirect()->route('capacitacion.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Capacitacion $capacitacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Capacitacion $capacitacion)
    {
        //
        return view('capacitacion.edit', [
            'capacitacion' => $capacitacion,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Capacitacion $capacitacion)
    {
        //
        $capacitacion->update($request->all());
        return redirect()->route('capacitacion.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Capacitacion $capacitacion)
    {
        //
        $capacitacion->delete();
        return redirect()->route('capacitacion.index');
    }

    public function grafico()
    {
        //
        $chart = new CapacitacionesChart;

        // Obtener todos los accidentes por meses
        $capacitacionMes = collect([]);
        for ($i=1; $i <= 12; $i++) { 
            $capacitacionMes->push(Capacitacion::whereMonth('created_at', $i)->whereRaw('YEAR(created_at)=?', [now()->format('Y')])->count());
        }
        // Obtener los meses
        $meses = collect([]);
        for ($i=1; $i <= 12; $i++) { 
            $meses->push(date('F', mktime(0, 0, 0, $i, 1)));
        }

        $chart->labels($meses);
        $chart->dataset('Capacitaciones', 'bar', $capacitacionMes)->options([
            'fill' => 'true',
            'borderColor' => '#51C1C0'
        ]);

        return view('capacitacion.grafico', [
            'capacitaciones' => Capacitacion::orderBy('fechaInicio', 'desc')->orderBy('fechaFin', 'desc')->paginate(8),
            'chart' => $chart,
        ]);
    }

    public function lista(Capacitacion $capacitacion){
        return view('capacitacion.lista', [
            'capacitacion' => $capacitacion,
            'trabajadores' => Trabajador::all(),
        ]);
    }

    public function verDetalle(Capacitacion $capacitacion){
        return view('capacitacion.detalle', [
            'capacitacion' => $capacitacion,
            'detalleCapacitacion' => DetalleCapacitacion::where('id_capacitacion', $capacitacion->id)->paginate(10),
        ]);
    }

    public function pdf()
    {
        $capacitaciones = Capacitacion::all();
        $pdf = Pdf::loadView('capacitacion.pdf', [
            'capacitaciones' => $capacitaciones,
        ]);
        // $pdf->setPaper('Letter', 'landscape');
        return $pdf->download('capacitaciones.pdf');
    }
}
