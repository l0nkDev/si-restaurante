<?php

namespace App\Http\Controllers\Cocina;

use App\Http\Controllers\Controller;
use App\Models\Admin\Bitacora;
use App\Models\Cocina\Ingrediente;
use App\Models\Inventario\Item;
use App\Models\Inventario\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class IngredienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('cocina.ingredientes.index', [
            'productos' => Producto::All(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('cocina.ingredientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $item = new Item;
        $item->Nombre = $request->input('Nombre');
        $item->Disponible = 0;
        $item->Cantidad = null;
        $item->save();

        $ingrediente = new Ingrediente;
        $ingrediente->CodIngr = $item->CodItem;
        $ingrediente->save();

        $bitacora = new Bitacora;
        $bitacora->IP = Bitacora::IP();;
        $bitacora->Username = Auth::user()->name;
        $bitacora->Action = 'I';
        $bitacora->Table = 'Ingredientes';
        $bitacora->Row = $item->Nombre;
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
    public function destroy(Ingrediente $ingrediente)
    {
        //
    }
}
