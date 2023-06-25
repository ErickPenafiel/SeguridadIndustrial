<?php

namespace App\Http\Controllers;

use App\Models\ExamenMedico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Trabajador;

class ExamenMedicoController extends Controller
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
    public function store(Request $request, Trabajador $trabajador_id)
    {
        //
        $maxsize = (int)ini_get('upload_max_filesize') * 10240;
        $files = $request->file('examenes');
        foreach ($files as $file) {
            if(Storage::putFileAs('/public/documents/examenesMedicos/' . $trabajador_id->nombre . '_' . $trabajador_id->apellido , $file, $file->getClientOriginalName())){
                ExamenMedico::create([
                    'documento' => $file->getClientOriginalName(),
                    'trabajador_id' => $trabajador_id->id,
                ]);
            }
        }
        Alert::success('Listo', 'El archivo se ha subido correctamente.');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(ExamenMedico $examenMedico)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ExamenMedico $examenMedico)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ExamenMedico $examenMedico)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ExamenMedico $examenMedico)
    {
        //
        $examenMedico->documento;
        $nombreCompleto = $examenMedico->trabajador->nombre . "_" . $examenMedico->trabajador->apellido;
        if(Storage::exists('/public/documents/examenesMedicos/' . $nombreCompleto . '/' . $examenMedico->documento)){
            Storage::delete('/public/documents/examenesMedicos/' . $nombreCompleto . '/' . $examenMedico->documento);
            Alert::success('Listo', 'El archivo se ha eliminado correctamente.');
        } else {
            Alert::error('Error', 'El archivo no existe.');
        }
        $examenMedico->delete();
        return back();
    }
}
