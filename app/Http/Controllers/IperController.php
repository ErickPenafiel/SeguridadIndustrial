<?php

namespace App\Http\Controllers;

use App\Models\Iper;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Area;
use Barryvdh\DomPDF\Facade\Pdf;

class IperController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('iper.index', [
            'ipers' => Iper::orderBy('created_at', 'desc')->paginate(8),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('iper.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $valorProbabilidad = $request->equipos + $request->procedimientos + $request->capacitaciones + $request->personasExpuestas + $request->frecuencia;
        if($valorProbabilidad >= 5 && $valorProbabilidad <= 12){
            $indiceProbabilidad = 'Muy Bajo';
            $ip = 1;
        } else if($valorProbabilidad >= 13 && $valorProbabilidad <= 22){
            $indiceProbabilidad = 'Baja';
            $ip = 2;
        } else if($valorProbabilidad >= 23 && $valorProbabilidad <= 28){
            $indiceProbabilidad = 'Media';
            $ip = 3;
        } else if($valorProbabilidad >= 29 && $valorProbabilidad <= 39){
            $indiceProbabilidad = 'Alta';
            $ip = 4;
        } else if($valorProbabilidad >= 40 && $valorProbabilidad <= 50){
            $indiceProbabilidad = 'Muy Alta';
            $ip = 5;
        }

        $indiceRiesgo = $ip * $request->severidad;
        if($indiceRiesgo >= 1 && $indiceRiesgo <= 3){  
            $valoracion = 'Trivial';
        } else if($indiceRiesgo >= 4 && $indiceRiesgo <= 6){
            $valoracion = 'Bajo';
        } else if($indiceRiesgo >= 7 && $indiceRiesgo <= 10){
            $valoracion = 'Moderado';
        } else if($indiceRiesgo >= 11 && $indiceRiesgo <= 16){
            $valoracion = 'Importante';
        } else if($indiceRiesgo >= 17 && $indiceRiesgo <= 25){
            $valoracion = 'Severo';
        }

        Iper::create([
            'area_id' => $request->area_id,
            'sector' => $request->sector,
            'actividad' => $request->actividad,
            'peligro' => $request->peligro,
            'riesgo' => $request->riesgo,
            'daño' => $request->daño,
            'medidas' => $request->medidas,
            'equipos' => $request->equipos,
            'procedimientos' => $request->procedimientos,
            'capacitaciones' => $request->capacitaciones,
            'personasExpuestas' => $request->personasExpuestas,
            'frecuencia' => $request->frecuencia,
            'valorProbabilidad' => $valorProbabilidad,
            'indiceProbabilidad' => $indiceProbabilidad,
            'severidad' => $request->severidad,
            'indiceRiesgo' => $indiceRiesgo,
            'valoracion' => $valoracion,
            'medidasControl' => $request->medidasControl,
            'jerarquiaControl' => $request->jerarquiaControl,
            'responsables' => $request->responsables,
        ]);

        Alert::success('Exito', 'IPER creado con éxito');
        return redirect()->route('iper.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Iper $iper)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Iper $iper)
    {
        //
        return view('iper.edit', [
            'iper' => $iper,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Iper $iper)
    {
        //
        $valorProbabilidad = $request->equipos + $request->procedimientos + $request->capacitaciones + $request->personasExpuestas + $request->frecuencia;
        if($valorProbabilidad >= 5 && $valorProbabilidad <= 12){
            $indiceProbabilidad = 'Muy Bajo';
            $ip = 1;
        } else if($valorProbabilidad >= 13 && $valorProbabilidad <= 22){
            $indiceProbabilidad = 'Bajo';
            $ip = 2;
        } else if($valorProbabilidad >= 23 && $valorProbabilidad <= 28){
            $indiceProbabilidad = 'Medio';
            $ip = 3;
        } else if($valorProbabilidad >= 29 && $valorProbabilidad <= 39){
            $indiceProbabilidad = 'Alto';
            $ip = 4;
        } else if($valorProbabilidad >= 40 && $valorProbabilidad <= 50){
            $indiceProbabilidad = 'Muy Alto';
            $ip = 5;
        }

        $indiceRiesgo = $valorProbabilidad * $request->severidad;
        if($indiceRiesgo >= 1 && $indiceRiesgo <= 3){  
            $valoracion = 'Trivial';
        } else if($indiceRiesgo >= 4 && $indiceRiesgo <= 6){
            $valoracion = 'Bajo';
        } else if($indiceRiesgo >= 7 && $indiceRiesgo <= 10){
            $valoracion = 'Moderado';
        } else if($indiceRiesgo >= 11 && $indiceRiesgo <= 16){
            $valoracion = 'Importante';
        } else if($indiceRiesgo >= 17 && $indiceRiesgo <= 25){
            $valoracion = 'Severo';
        }

        $iper->update([
            'area_id' => $request->area_id,
            'sector' => $request->sector,
            'actividad' => $request->actividad,
            'peligro' => $request->peligro,
            'riesgo' => $request->riesgo,
            'daño' => $request->daño,
            'medidas' => $request->medidas,
            'equipos' => $request->equipos,
            'procedimientos' => $request->procedimientos,
            'capacitaciones' => $request->capacitaciones,
            'personasExpuestas' => $request->personasExpuestas,
            'frecuencia' => $request->frecuencia,
            'valorProbabilidad' => $valorProbabilidad,
            'indiceProbabilidad' => $indiceProbabilidad,
            'severidad' => $request->severidad,
            'indiceRiesgo' => $indiceRiesgo,
            'valoracion' => $valoracion,
            'medidasControl' => $request->medidasControl,
            'jerarquiaControl' => $request->jerarquiaControl,
            'responsables' => $request->responsables,
        ]);

        Alert::success('Exito', 'IPER actualizado con éxito');
        return redirect()->route('iper.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Iper $iper)
    {
        //
        $iper->delete();
        Alert::success('Exito', 'IPER eliminado con éxito');
        return redirect()->route('iper.index');
    }

    public function area(Area $area) {
        return view('iper.area', [
            'ipers' => Iper::where('area_id', $area->id)->orderBy('created_at', 'desc')->paginate(8), 
        ]);
    }

    public function pdf(){
        $ipers = Iper::all();
        $pdf = Pdf::loadView('iper.pdf', [
            'ipers' => $ipers,
        ]);
        $pdf->setPaper('Legal', 'landscape');
        return $pdf->download('ipers.pdf');
    }
}
