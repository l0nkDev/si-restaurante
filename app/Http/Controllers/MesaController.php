<?php

namespace App\Http\Controllers;

use App\Models\Mesa;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MesaController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(): View
    {
        return view('mesas.index', [
            'mesas' => Mesa::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('mesas.create');
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $mesa = new Mesa;
        $mesa->NroMesa = $request->input('NroMesa');
        $mesa->Capacidad = $request->input('Capacidad');
        $mesa->save();
        return redirect()->route('mesas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mesa $mesa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mesa $mesa): View
    {
        return view('mesas.edit', [
            'mesa' => $mesa,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mesa $mesa): RedirectResponse
    {
        $mesa->update($request->only(['NroMesa', 'Capacidad']));
        return redirect()->route('mesas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mesa $mesa): RedirectResponse
    {
        $mesa->delete();
        return redirect(route('mesas.index'));
    }
}
