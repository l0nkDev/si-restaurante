<?php

namespace App\Http\Controllers\Caja;

use App\Http\Controllers\Controller;
use App\Models\Lugar\NotaVenta;
use App\Models\Caja\IngresosTotales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class IngresosTotalesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('caja.ingresos.index', [
            'items' => DB::select('	select Nombre, Precio, sum(ordenas.Cantidad) Cantidad, sum(Precio*ordenas.Cantidad) Total
	                                        from productos, items, ordens, ordenas, nota_ventas
	                                        where
		                                        productos.CodProd = items.CodItem and
		                                        productos.CodProd = ordenas.CodProd and
		                                        ordenas.NumOrden = ordens.NumOrden and
		                                        ordens.IDVenta = nota_ventas.IDVenta
	                                        group by productos.CodProd, Nombre, Precio')
            ]
        );
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
    public function show(IngresosTotales $ingresosTotales)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(IngresosTotales $ingresosTotales)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, IngresosTotales $ingresosTotales)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(IngresosTotales $ingresosTotales)
    {
        //
    }
}
