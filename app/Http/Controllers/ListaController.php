<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Insumo;

class ListaController extends Controller
{
    public function agregarLista(Request $request, Insumo $insumo) {
        $lista = session()->get('lista', []);
        $elemento = array(
            'insumo' => $insumo,
            'cantidad' => $request->cantidad,
        );
        array_push($lista, $elemento);
        session()->put('lista', $lista);

        return redirect()->back()->with('success', 'El insumo se ha agregado al carrito correctamente.');
    }

    public function eliminarLista(){
        session()->forget('lista');
        return redirect()->back()->with('success', 'El insumo se ha eliminado del carrito correctamente.');
    }

    public function eliminarElemento(Request $request) {
        $indice = $request->indice; // Índice o identificador del elemento a eliminar
        $lista = session()->get('lista', []);
    
        // Buscar el elemento en la lista y eliminarlo
        foreach ($lista as $key => $elemento) {
            if ($key == $indice) {
                unset($lista[$key]);
                break; // Salir del bucle después de encontrar y eliminar el elemento
            }
        }
    
        session()->put('lista', $lista);
        return redirect()->back()->with('success', 'El elemento se ha eliminado correctamente.');
    }
}
