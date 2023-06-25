<?php

namespace App\Http\Controllers;

use App\Models\FotoAuditoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;


class FotoAuditoriaController extends Controller
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
    public function store(Request $request, $auditoria_id)
    {
        //
        $maxsize = (int)ini_get('upload_max_filesize') * 10240;
        $files = $request->file('fotos');
        foreach ($files as $file) {
            if(Storage::putFileAs('/public/images/fotoauditorias/' . $auditoria_id , $file, $file->getClientOriginalName())){
                FotoAuditoria::create([
                    'foto' => $file->getClientOriginalName(),
                    'auditoria_id' => $auditoria_id,
                ]);
            }
        }
        Alert::success('Listo', 'El archivo se ha subido correctamente.');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(FotoAuditoria $fotoAuditoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FotoAuditoria $fotoAuditoria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FotoAuditoria $fotoAuditoria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FotoAuditoria $fotoAuditoria)
    {
        //
        $fotoAuditoria->foto;
        if(Storage::exists('/public/images/fotoauditorias/' . $fotoAuditoria->auditoria_id . '/' . $fotoAuditoria->foto)){
            Storage::delete('/public/images/fotoauditorias/' . $fotoAuditoria->auditoria_id . '/' . $fotoAuditoria->foto);
            Alert::success('Listo', 'El archivo se ha eliminado correctamente.');
        } else {
            Alert::error('Error', 'El archivo no existe.');
        }
        $fotoAuditoria->delete();
        return back();
    }
}
