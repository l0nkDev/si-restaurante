<?php

namespace App\Http\Controllers\Inventario;

use App\Http\Controllers\Controller;
use App\Models\Admin\Bitacora;
use App\Models\Inventario\NotaCompra;
use App\Models\Inventario\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotaCompraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('inventario.nota_compras.index', [
            'notacompras' => NotaCompra::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $notacompra = new NotaCompra;
        $notacompra->CodProv = $request->input('CodProv');
        $notacompra->FechaHra = date('Y-m-d');
        $notacompra->Total = 0;
        $notacompra->save();

        $bitacora = new Bitacora;
        $bitacora->IP = Bitacora::IP();;
        $bitacora->Username = Auth::user()->name;
        $bitacora->Action = 'I';
        $bitacora->Table = 'nota_compras';
        $bitacora->Row = Proveedor::find($notacompra->CodProv)->Descripcion;
        $bitacora->save();

        return redirect()->route('nota_compra.show', $notacompra);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     */
    public function show(NotaCompra $notaCompra)
    {
        return view('inventario.nota_compras.show', [
            'notaCompra' => $notaCompra
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NotaCompra $notaCompra)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, NotaCompra $notaCompra)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NotaCompra $notaCompra)
    {
        //
    }
}
