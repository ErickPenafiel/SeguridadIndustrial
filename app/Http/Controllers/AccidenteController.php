<?php

namespace App\Http\Controllers;

use App\Models\Accidente;
use Illuminate\Http\Request;
use App\Charts\AccidentesCharts;
use App\Models\Trabajador;
use App\Models\Area;
use Barryvdh\DomPDF\Facade\Pdf;

class AccidenteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $chart = new AccidentesCharts;

        // Obtener todos los accidentes por meses
        $accidentesMes = collect([]);
        for ($i=1; $i <= 12; $i++) { 
            $accidentesMes->push(Accidente::whereMonth('fecha', $i)->whereRaw('YEAR(fecha)=?', [2022])->count());
        }
        // Obtener los meses
        $meses = collect([]);
        for ($i=1; $i <= 12; $i++) { 
            $meses->push(date('F', mktime(0, 0, 0, $i, 1)));
        }

        $chart->labels($meses);
        $chart->dataset('Accidentes', 'bar', $accidentesMes)->options([
            'fill' => 'true',
            'borderColor' => '#51C1C0'
        ]);
        
        return view('accidente.index', [
            'accidentes' => Accidente::paginate(8),
            'chart' => $chart,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('accidente.create', [
            'trabajadores' => Trabajador::all(),
            'areas' => Area::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        Accidente::create($request->all());
        return redirect()->route('accidente.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Accidente $accidente)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Accidente $accidente)
    {
        //
        return view('accidente.edit', [
            'accidente' => $accidente,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Accidente $accidente)
    {
        //
        $accidente->update($request->all());
        return redirect()->route('accidente.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Accidente $accidente)
    {
        //
        $accidente->delete();
        return redirect()->route('accidente.index');
    }

    public function grafico() {
        
        $chart = new AccidentesCharts;

        // Obtener todos los accidentes por meses
        $accidentesMes = collect([]);
        for ($i=1; $i <= 12; $i++) { 
            $accidentesMes->push(Accidente::whereMonth('fecha', $i)->whereRaw('YEAR(fecha)=?', [now()->format('Y')])->count());
        }
        // Obtener los meses
        $meses = collect([]);
        for ($i=1; $i <= 12; $i++) { 
            $meses->push(date('F', mktime(0, 0, 0, $i, 1)));
        }

        $chart->labels($meses);
        $chart->dataset('Accidentes', 'bar', $accidentesMes)->options([
            'fill' => 'true',
            'borderColor' => '#51C1C0'
        ]);

        $chartMeses = new AccidentesCharts;
        // Obtner los accidentes de un mes por dias
        $accidentesDia = collect([]);
        for ($i=1; $i <= now()->daysInMonth; $i++) { 
            $accidentesDia->push(Accidente::whereDay('fecha', $i)->whereMonth('fecha', now()->format('m'))->whereRaw('YEAR(fecha)=?', [now()->format('Y')])->count());
        }

        $chartMeses->labels(range(1, now()->daysInMonth));
        $chartMeses->dataset('Accidentes', 'line', $accidentesDia)->options([
            'fill' => 'true',
            'borderColor' => '#51C1C0'
        ]);

        return view('accidente.grafico', [
            'chart' => $chart,
            'chartMeses' => $chartMeses
        ]);
    }

    public function pdf()
    {
        $accidentes = Accidente::all();
        $pdf = Pdf::loadView('accidente.pdf', [
            'accidentes' => $accidentes,
        ]);
        $pdf->setPaper('Letter', 'landscape');
        return $pdf->download('accidentes.pdf');
    }

}
