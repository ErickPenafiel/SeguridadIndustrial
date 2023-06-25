<?php

namespace App\Http\Controllers;

use App\Models\FotoMonitoreo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class FotoMonitoreoController extends Controller
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
    public function store(Request $request, $monitoreo_id)
    {
        //
        $maxsize = (int)ini_get('upload_max_filesize') * 10240;
        $files = $request->file('fotos');
        foreach ($files as $file) {
            if(Storage::putFileAs('/public/images/fotomonitoreos/' . $monitoreo_id , $file, $file->getClientOriginalName())){
                FotoMonitoreo::create([
                    'foto' => $file->getClientOriginalName(),
                    'monitoreo_id' => $monitoreo_id,
                ]);
                Alert::success('Listo', 'El archivo se ha subido correctamente.');
            }
        }
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(FotoMonitoreo $fotoMonitoreo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FotoMonitoreo $fotoMonitoreo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FotoMonitoreo $fotoMonitoreo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FotoMonitoreo $fotoMonitoreo)
    {
        //
        if(Storage::exists('/public/images/fotomonitoreos/' . $fotoMonitoreo->monitoreo_id . '/' . $fotoMonitoreo->foto)){
            Storage::delete('/public/images/fotomonitoreos/' . $fotoMonitoreo->monitoreo_id . '/' . $fotoMonitoreo->foto);
            Alert::success('Listo', 'El archivo se ha eliminado correctamente.');
        } else {
            Alert::error('Error', 'El archivo no existe.');
        }
        $fotoMonitoreo->delete();
        return back();
    }
}
