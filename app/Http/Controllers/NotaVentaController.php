<?php

namespace App\Http\Controllers;

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
    public function create(Request $request): RedirectResponse
    {
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
        $nota->save();
        error_log($request);
        error_log("Siguiente^^");
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
        $notaVenta->save();
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
