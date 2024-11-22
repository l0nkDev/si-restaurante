<?php

namespace App\Http\Controllers\Cocina;

use App\Http\Controllers\Controller;
use App\Models\Admin\Bitacora;
use App\Models\Cocina\SalidaCocina;
use App\Models\Inventario\Proveedor;
use App\Models\Lugar\Orden;
use App\Models\Lugar\Ordena;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SalidaCocinaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('cocina.salida_cocina.index', ['ordens' => Orden::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $orden = Orden::find($request->input('NumOrden'));
        $orden->IdEstado = $request->input('IdEstado');
        $orden->save();

        $bitacora = new Bitacora;
        $bitacora->IP = Bitacora::IP();;
        $bitacora->Username = Auth::user()->name;
        $bitacora->Action = 'E';
        $bitacora->Table = 'ordens';
        $bitacora->Row = $request->input('NumOrden');
        $bitacora->save();

        return redirect()->route('salida_cocina.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $orden = Orden::find($request->input('NumOrden'));
        $orden->IdEstado = 4;
        $orden->save();

        $bitacora = new Bitacora;
        $bitacora->IP = Bitacora::IP();;
        $bitacora->Username = Auth::user()->name;
        $bitacora->Action = 'E';
        $bitacora->Table = 'ordens';
        $bitacora->Row = $request->input('NumOrden');
        $bitacora->save();

        foreach (Ordena::All() as $ordena) {
            if ($ordena->NumOrden == $request->input('NumOrden')) {
                $salida = new SalidaCocina;
                $salida->FechaHra = date('Y-m-d H:i:s');
                $salida->Cantidad = $ordena->Cantidad;
                $salida->CodProd = $ordena->CodProd;
                $salida->save();

                $bitacora = new Bitacora;
                $bitacora->IP = Bitacora::IP();
                $bitacora->Username = Auth::user()->name;
                $bitacora->Action = 'I';
                $bitacora->Table = 'salida_cocinas';
                $bitacora->Row = $salida->NroSalida;
                $bitacora->save();
            }
        }
        return redirect()->route('salida_cocina.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(SalidaCocina $salidaCocina)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SalidaCocina $salidaCocina)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SalidaCocina $salidaCocina)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SalidaCocina $salidaCocina)
    {
        //
    }
}
