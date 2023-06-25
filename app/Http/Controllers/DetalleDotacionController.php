<?php

namespace App\Http\Controllers;

use App\Models\DetalleDotacion;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\DotacionEPP;
use App\Models\Insumo;
use App\Models\User;
use App\Events\StockEvent;
use Barryvdh\DomPDF\Facade\Pdf;

class DetalleDotacionController extends Controller
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
    public function show(DetalleDotacion $detalleDotacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DetalleDotacion $detalleDotacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DetalleDotacion $detalleDotacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DetalleDotacion $detalleDotacion)
    {
        //
        $detalleDotacion->delete();
        Alert::success('Éxito', 'Se ha eliminado el detalle de dotación correctamente.');
        return redirect()->back();
    }

    public function registrarInsumos(DotacionEPP $dotacion) {
        $lista = session()->get('lista');
        if(count($lista) > 0 && $lista != NULL){
            foreach($lista as $key => $elemento){
                $id_insumo = $elemento['insumo']->id;
                $cantidad = $elemento['cantidad'];
                // dd($elemento['insumo']->cantidad);
                if($cantidad < $elemento['insumo']->cantidad){
                    $elemento['insumo']->cantidad = $elemento['insumo']->cantidad - $cantidad;
                    $elemento['insumo']->save();
                    $insumo = $elemento['insumo'];
                    $detalleDotacion = new DetalleDotacion();
                    $detalleDotacion->id_dotacion = $dotacion->id;
                    $detalleDotacion->id_insumo = $id_insumo;
                    $detalleDotacion->cantidad = $cantidad;
                    $detalleDotacion->save();
                    unset($lista[$key]);
                } else {
                    Alert::error('Error', 'No hay suficiente stock de '.$elemento['insumo']->nombre.'.');
                    return redirect()->back();
                }                

                if($insumo->cantidad <= 15){
                    event(new StockEvent($insumo));
                }
            }
            session()->put('lista', $lista);
            Alert::success('Éxito', 'Se ha registrado la dotación correctamente.');
        } else {
            Alert::error('Error', 'No hay insumos en la lista.');
        }

        return redirect()->back();
    }

    public function pdf(DotacionEPP $dotacion)
    {
        $detalleDotacion = DetalleDotacion::where('id', $dotacion->id)->get();
        $pdf = Pdf::loadView('detalle_dotacion.pdf', [
            'detalleDotacion' => $detalleDotacion,
        ]);
        // $pdf->setPaper('Letter', 'landscape');
        return $pdf->download('detalleDotacion.pdf');
    }
}
