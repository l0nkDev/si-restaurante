<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Bitacora;
use App\Models\Admin\Reporte;
use App\Models\Inventario\Item;
use App\Models\Lugar\NotaVenta;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReporteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.reporte.index', ['reportes' => Reporte::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.reporte.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $reporte = new Reporte();
        $reporte->Tipo = $request->input('Tipo');
        $reporte->FirstDat = $request->input('FirstDat');
        $reporte->LastDat = $request->input('LastDat');
        $reporte->FechaHra = date('Y-m-d H:i:s');
        if ($request->input('Tipo') == 'bitacoras') {
            $reporte->First = Bitacora::where('created_at', '>=', $request->input('FirstDat'))->first()->id;
            $reporte->Last = Bitacora::where('created_at', '<=', $request->input('LastDat'))->orderBy('created_at', 'desc')->first()->id;
        }
        $reporte->save();

        $bitacora = new Bitacora;
        $bitacora->IP = Bitacora::IP();
        $bitacora->Username = Auth::user()->name;
        $bitacora->Action = 'I';
        $bitacora->Table = 'reportes';
        $bitacora->Row = $reporte->IDReporte;
        $bitacora->save();

        return redirect()->route('reporte.show', $reporte);
    }

    /**
     * Display the specified resource.
     */
    public function show(Reporte $reporte)
    {
        return Pdf::loadview('admin.reporte.bitacora', ['reporte' => $reporte])->stream();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reporte $reporte)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reporte $reporte)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reporte $reporte)
    {
        //
    }
}
