<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trabajador;

class ListaCapacitacionController extends Controller
{
    //
    public function agregarTrabajador(Request $request, Trabajador $trabajador) {
        $lista = session()->get('listaCapacitacion', []);
        array_push($lista, $trabajador);
        session()->put('listaCapacitacion', $lista);

        return redirect()->back()->with('success', 'Trabajador agregado correctamente a la capacitacion.');
    }

    public function eliminarListaCapacitacion(){
        session()->forget('listaCapacitacion');
        return redirect()->back()->with('success', 'El insumo se ha eliminado del carrito correctamente.');
    }

    public function eliminarTrabajador(Request $request) {
        $indice = $request->indice; // Índice o identificador del elemento a eliminar
        $lista = session()->get('listaCapacitacion', []);
    
        // Buscar el elemento en la lista y eliminarlo
        foreach ($lista as $key => $elemento) {
            if ($key == $indice) {
                unset($lista[$key]);
                break; // Salir del bucle después de encontrar y eliminar el elemento
            }
        }
    
        session()->put('listaCapacitacion', $lista);
        return redirect()->back()->with('success', 'El elemento se ha eliminado correctamente.');
    }
}
