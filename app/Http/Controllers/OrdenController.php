<?php

namespace App\Http\Controllers;

use App\Models\Orden;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class OrdenController extends Controller
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
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $orden = new Orden;
        $orden->FechaHra = date('Y-m-d H:i:s');
        $orden->IDVenta = $request->input('IDVenta');
        $orden->IdEmpleado = Auth::user()->IdEmpleado;
        $orden->IdEstado = 5;
        $orden->save();
        return redirect()->route('ordens.show', $orden);
    }

    /**
     * Display the specified resource.
     */
    public function show(Orden $orden): View
    {
        return view('ordens.show', [
            'orden' => $orden
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Orden $orden)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Orden $orden)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Orden $orden)
    {
        //
    }
}
