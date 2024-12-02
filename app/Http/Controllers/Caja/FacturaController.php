<?php

namespace App\Http\Controllers\Caja;

use App\Http\Controllers\Controller;
use App\Models\Admin\Bitacora;
use App\Models\Caja\Factura;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FacturaController extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $factura = new Factura;
        $factura->IDVenta = $request->input('IDVenta');
        $factura->FechaHra = date('Y-m-d H:i:s');
        $factura->Monto = $request->input('Monto');
        $factura->CodigoControl = "PROBANDOTEST";
        $factura->save();

        $bitacora = new Bitacora;
        $bitacora->IP = Bitacora::IP();
        $bitacora->Username = Auth::user()->name;
        $bitacora->Action = 'I';
        $bitacora->Table = 'facturas';
        $bitacora->Row = $factura->IDFactura;
        $bitacora->save();

        return redirect()->route('factura.show', $factura);
    }

    /**
     * Display the specified resource.
     */
    public function show(Factura $factura)
    {
        //return view('caja.factura.show', ['factura' => $factura]);
        return Pdf::loadview('caja.factura.show', ['factura' => $factura])->stream($factura->CodigoControl . '.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Factura $factura)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Factura $factura)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Factura $factura)
    {
        //
    }
}
