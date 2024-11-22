<?php

namespace App\Http\Controllers\Inventario;

use App\Http\Controllers\Controller;
use App\Models\Admin\Bitacora;
use App\Models\Inventario\NotaCompra;
use App\Models\Inventario\ProdEntrante;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProdEntranteController extends Controller
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
    public function create(Request $request)
    {
        return view('inventario.prod_entrantes.create', ['IdCompra' => $request->input('IdCompra')]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $entrada = new ProdEntrante;
        $entrada->IdCompra = $request->input('IdCompra');
        $entrada->Cantidad = $request->input('Cantidad');
        $entrada->CodItem = $request->input('CodItem');
        $entrada->Costo = $request->input('Costo');

        $bitacora = new Bitacora;
        $bitacora->IP = Bitacora::IP();
        $bitacora->Username = Auth::user()->name;
        $bitacora->Action = 'I';
        $bitacora->Table = 'prod_entrantes';

        $entrada->save();

        $bitacora->Row = "" . $entrada->NroCompra . " (Compra " . $entrada->IdCompra . ")";
        $bitacora->save();
        return redirect()->route('nota_compra.show', NotaCompra::find($entrada->IdCompra));
    }

    /**
     * Display the specified resource.
     */
    public function show(ProdEntrante $prodEntrante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProdEntrante $prodEntrante)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProdEntrante $prodEntrante)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProdEntrante $producto_entrante): RedirectResponse
    {
        $tmp = $producto_entrante->IdCompra;

        $bitacora = new Bitacora;
        $bitacora->IP = Bitacora::IP();
        $bitacora->Username = Auth::user()->name;
        $bitacora->Action = 'D';
        $bitacora->Table = 'prod_entrantes';
        $bitacora->Row = "" . $producto_entrante->NroOrdena . " (Compra " . $producto_entrante->IdCompra . ")";

        $producto_entrante->delete();
        $bitacora->save();
        return redirect()->route('nota_compra.show', NotaCompra::find($tmp));
    }
}
