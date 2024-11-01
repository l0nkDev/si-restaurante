<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;
use App\Models\NotaVenta;
use App\Models\Mesa;
use App\Models\Empleado;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class NotaVentaController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $nota = new NotaVenta;
        $nota->Total = 0;
        $nota->FechaHora = date('Y-m-d H:i:s');
        $nota->FuePagado = 0;
        $nota->NroMesa = $request->input('NroMesa');
        $nota->IdEmpleado = Auth::user()->IdEmpleado;

        $bitacora = new Bitacora;
        $bitacora->IP = $_SERVER['HTTP_X_FORWARDED_FOR'];
        $bitacora->Username = Auth::user()->name;
        $bitacora->Action = 'I';
        $bitacora->Table = 'nota_ventas';
        $nota->save();
        $bitacora->Row = "" . $nota->IDVenta . " (Mesa " . $nota->NroMesa . ")";
        $bitacora->save();

        return redirect()->route('nota_ventas.show', $nota);
    }

    /**
     * Display the specified resource.
     */
    public function show(NotaVenta $notaVenta): View
    {
        return view('nota_ventas.show', [
            'notaVenta' => $notaVenta
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NotaVenta $notaVenta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, NotaVenta $notaVenta): RedirectResponse
    {
        $notaVenta->Total = $request->input('total');
        $notaVenta->FuePagado = 1;

        $bitacora = new Bitacora;
        $bitacora->IP = $_SERVER['HTTP_X_FORWARDED_FOR'];
        $bitacora->Username = Auth::user()->name;
        $bitacora->Action = 'E';
        $bitacora->Table = 'nota_ventas';
        $bitacora->Row = "" . $notaVenta->IDVenta . " (Mesa " . $notaVenta->NroMesa . ")";

        $notaVenta->save();
        $bitacora->save();
        return redirect()->route('mesas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NotaVenta $notaVenta)
    {
        //
    }
}
