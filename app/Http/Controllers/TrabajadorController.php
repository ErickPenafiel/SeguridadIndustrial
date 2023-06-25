<?php

namespace App\Http\Controllers;

use App\Models\Trabajador;
use Illuminate\Http\Request;
use App\Models\ExamenMedico;
use Barryvdh\DomPDF\Facade\Pdf;

class TrabajadorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('trabajador.index', [
            'trabajadores' => Trabajador::paginate(8),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('trabajador.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        /* $trabajador = new Trabajador();
        $trabajador->nombre = $request->nombre;
        $trabajador->apellido = $request->apellido;
        $trabajador->ci = $request->ci;
        $trabajador->fechaNacimiento = $request->fechaNacimiento;
        $trabajador->id_area = $request->id_area;
        $trabajador->save(); */
        Trabajador::create($request->all());
        return redirect()->route('trabajador.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Trabajador $trabajador)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Trabajador $trabajador)
    {
        //
        return view('trabajador.edit', [
            'trabajador' => $trabajador,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Trabajador $trabajador)
    {
        //
        $trabajador->update($request->all());
        return redirect()->route('trabajador.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Trabajador $trabajador)
    {
        //
        $trabajador->delete();
        return redirect()->route('trabajador.index');
    }

    public function examenes(Trabajador $trabajador)
    {
        return view('trabajador.examenes', [
            'trabajador' => ExamenMedico::where('trabajador_id', $trabajador->id)->paginate(8),
            'trabajador_datos' => $trabajador,
        ]);
    }

    public function pdf()
    {
        $trabajadores = Trabajador::all();
        $pdf = Pdf::loadView('trabajador.pdf', [
            'trabajadores' => $trabajadores,
        ]);
        return $pdf->download('trabajador.pdf');
    }
}
