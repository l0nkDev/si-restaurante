<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;
use App\Models\Ordena;
use App\Models\Orden;
use App\Models\Producto;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class OrdenaController extends Controller
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
    public function create(Request $request): View
    {
        return view('ordenas.create', ['NumOrden' => $request->input('NumOrden')]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $ordena = new Ordena;
        $ordena->Cantidad = $request->input('Cantidad');
        $ordena->CodProd = $request->input('CodProd');
        $ordena->NumOrden = $request->input('NumOrden');
        $ordena->SubTotal = Producto::find($ordena->CodProd)->Precio * $ordena->Cantidad;

        $bitacora = new Bitacora;
        $bitacora->IP = $_SERVER['HTTP_X_FORWARDED_FOR'];
        $bitacora->Username = Auth::user()->name;
        $bitacora->Action = 'I';
        $bitacora->Table = 'Ordenas';

        $ordena->save();
        $bitacora->Row = "" . $ordena->NroOrdena . " (Orden " . $ordena->NumOrden . ")";
        $bitacora->save();
        return redirect()->route('ordens.show', Orden::find($ordena->NumOrden));
    }

    /**
     * Display the specified resource.
     */
    public function show(Ordena $ordena)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ordena $ordena)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ordena $ordena)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ordena $ordena): RedirectResponse
    {
        $tmp = $ordena->NumOrden;

        $bitacora = new Bitacora;
        $bitacora->IP = $_SERVER['HTTP_X_FORWARDED_FOR'];
        $bitacora->Username = Auth::user()->name;
        $bitacora->Action = 'D';
        $bitacora->Table = 'Ordenas';
        $bitacora->Row = "" . $ordena->NroOrdena . " (Orden " . $ordena->NumOrden . ")";

        $ordena->delete();
        $bitacora->save();
        return redirect()->route('ordens.show', Orden::find($tmp));
    }
}
