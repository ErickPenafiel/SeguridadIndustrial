<?php

namespace App\Http\Controllers;

use App\Models\Auditoria;
use App\Models\FotoAuditoria;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class AuditoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('auditoria.index', [
            'auditorias' => Auditoria::paginate(8)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('auditoria.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        Auditoria::create($request->all());
        return redirect()->route('auditoria.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Auditoria $auditoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Auditoria $auditorium)
    {
        //
        return view('auditoria.edit', [
            'auditoria' => $auditorium
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Auditoria $auditorium)
    {
        //
        $auditorium->update($request->all());
        return redirect()->route('auditoria.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Auditoria $auditorium)
    {
        //
        $auditorium->delete();
        return redirect()->route('auditoria.index');
    }

    public function fotos(Auditoria $auditorium)
    {
        return view('auditoria.fotos', [
            'auditoria' => FotoAuditoria::where('auditoria_id', $auditorium->id)->paginate(8),
            'auditoria_id' => $auditorium->id
        ]);
    }

    public function pdf()
    {
        $auditorias = Auditoria::all();
        $pdf = Pdf::loadView('auditoria.pdf', [
            'auditorias' => $auditorias,
        ]);
        // $pdf->setPaper('Letter', 'landscape');
        return $pdf->download('auditorias.pdf');
    }
}
