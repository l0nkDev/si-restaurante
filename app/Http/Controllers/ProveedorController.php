<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('proveedors.index', [
            'proveedors' => Proveedor::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('proveedors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $proveedor = new Proveedor;
        $proveedor->Descripcion = $request->input('Descripcion');
        $proveedor->Ubicacion = $request->input('Ubicacion');
        $proveedor->Telefono = $request->input('Telefono');
        $proveedor->save();
        return redirect()->route('proveedors.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Proveedor $proveedor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Proveedor $proveedor): View
    {
        return view('proveedors.edit', [
            'proveedor' => $proveedor
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Proveedor $proveedor): RedirectResponse
    {
        $proveedor->Descripcion = $request->input('Descripcion');
        $proveedor->Ubicacion = $request->input('Ubicacion');
        $proveedor->Telefono = $request->input('Telefono');
        $proveedor->save();
        return redirect()->route('proveedors.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Proveedor $proveedor): RedirectResponse
    {
        $proveedor->delete();
        return redirect()->route('proveedors.index');
    }
}
