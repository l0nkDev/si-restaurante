<?php

namespace App\Http\Controllers\Caja;

use App\Http\Controllers\Controller;
use App\Models\Admin\Bitacora;
use App\Models\Admin\Persona;
use App\Models\Caja\Cliente;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('caja.clientes.index', [
            'clientes' => Cliente::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('caja.clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $persona = new Persona;
        $persona->Nombre = $request->input('Nombre');
        $persona->CI = $request->input('CI');
        $persona->save();
        $cliente = new Cliente;
        $cliente->IdCliente = $persona->IdPersona;
        $cliente->save();

        $bitacora = new Bitacora;
        $bitacora->IP = Bitacora::IP();
        $bitacora->Username = Auth::user()->name;
        $bitacora->Action = 'I';
        $bitacora->Table = 'Clientes';
        $bitacora->Row = $persona->Nombre;
        $bitacora->save();

        return redirect()->route('clientes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente): View
    {
        return view('caja.clientes.edit', [
            'cliente' => $cliente
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $cliente): RedirectResponse
    {
        $persona = Persona::find($cliente->IdCliente);
        $persona->Nombre = $request->input('Nombre');
        $persona->CI = $request->input('CI');
        $persona->save();

        $bitacora = new Bitacora;
        $bitacora->IP = Bitacora::IP();
        $bitacora->Username = Auth::user()->name;
        $bitacora->Action = 'E';
        $bitacora->Table = 'Clientes';
        $bitacora->Row = $persona->Nombre;
        $bitacora->save();

        return redirect()->route('clientes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente): RedirectResponse
    {
        $persona = Persona::find($cliente->IdCliente);

        $bitacora = new Bitacora;
        $bitacora->IP = Bitacora::IP();
        $bitacora->Username = Auth::user()->name;
        $bitacora->Action = 'D';
        $bitacora->Table = 'Clientes';
        $bitacora->Row = $persona->Nombre;

        $cliente->delete();
        $persona->delete();
        $bitacora->save();

        return redirect()->route('clientes.index');
    }
}
