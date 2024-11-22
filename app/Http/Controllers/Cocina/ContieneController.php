<?php

namespace App\Http\Controllers\Cocina;

use App\Http\Controllers\Controller;
use App\Models\Admin\Bitacora;
use App\Models\Cocina\Contiene;
use App\Models\Cocina\Ingrediente;
use App\Models\Inventario\Item;
use App\Models\Inventario\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class ContieneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        return view('cocina.contienes.create', ['CodProd' => $request->input('CodProd')]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $contiene = new Contiene;
        $contiene->CodProd = $request->input('CodProd');
        $contiene->CodIngr = $request->input('CodIngr');
        $contiene->Cantidad = $request->input('Cantidad');
        $contiene->Unidad = $request->input('Unidad');
        $contiene->save();

        $bitacora = new Bitacora;
        $bitacora->IP = Bitacora::IP();;
        $bitacora->Username = Auth::user()->name;
        $bitacora->Action = 'I';
        $bitacora->Table = 'Contienes';
        $bitacora->Row = Item::find($contiene->CodProd)->Nombre;
        $bitacora->save();

        return redirect()->route('ingredientes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ingrediente $ingrediente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ingrediente $ingrediente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ingrediente $ingrediente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contiene $contiene)
    {
        $bitacora = new Bitacora;
        $bitacora->IP = Bitacora::IP();;
        $bitacora->Username = Auth::user()->name;
        $bitacora->Action = 'D';
        $bitacora->Table = 'Contienes';
        $bitacora->Row = Item::find($contiene->CodProd)->Nombre;
        $bitacora->save();

        $contiene->delete();

        return redirect()->route('ingredientes.index');
    }
}
