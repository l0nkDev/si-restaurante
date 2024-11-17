<?php

namespace App\Http\Controllers\Inventario;

use App\Http\Controllers\Controller;
use App\Models\Admin\Bitacora;
use App\Models\Inventario\Item;
use App\Models\Inventario\Producto;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('inventario.productos.index', [
            'productos' => Producto::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('inventario.productos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $item = new Item;
        $item->Nombre = $request->input('Nombre');
        $item->Disponible = $request->input('Disponible') == 'on' ? 1 : 0;
        $item->Cantidad = $request->input('Cantidad');
        $item->save();
        $producto = new Producto;
        $producto->CodProd = $item->CodItem;
        $producto->Precio = $request->input('Precio');
        $producto->save();

        $bitacora = new Bitacora;
        $bitacora->IP = Bitacora::IP();;
        $bitacora->Username = Auth::user()->name;
        $bitacora->Action = 'I';
        $bitacora->Table = 'Productos';
        $bitacora->Row = $item->Nombre;
        $bitacora->save();

        return redirect()->route('productos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producto $producto): View
    {
        return view('inventario.productos.edit', [
            'producto' => $producto,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $producto)
    {
        $item = Item::find($producto->CodProd);
        $disp = $request->input('Disponible') == 'on' ? 1 : 0;
        $producto->update($request->only(['Precio']));
        $item->update($request->only(['Nombre', 'Cantidad']));
        $item->Disponible = $disp;
        $item->save();

        $bitacora = new Bitacora;
        $bitacora->IP = Bitacora::IP();;
        $bitacora->Username = Auth::user()->name;
        $bitacora->Action = 'E';
        $bitacora->Table = 'Productos';
        $bitacora->Row = $item->Nombre;
        $bitacora->save();

        return redirect()->route('productos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        $item = Item::find($producto->IdProd);

        $bitacora = new Bitacora;
        $bitacora->IP = Bitacora::IP();;
        $bitacora->Username = Auth::user()->name;
        $bitacora->Action = 'D';
        $bitacora->Table = 'Productos';
        $bitacora->Row = $item->Nombre;
        $bitacora->save();

        $producto->delete();
        $item->delete();
        return redirect(route('productos.index'));
    }
}
