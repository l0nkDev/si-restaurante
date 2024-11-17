<?php

namespace App\Http\Controllers\Lugar;

use App\Http\Controllers\Controller;
use App\Models\Admin\Bitacora;
use App\Models\Lugar\Mesa;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class MesaController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(): View
    {
        return view('lugar.mesas.index', [
            'mesas' => Mesa::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('lugar.mesas.create');
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $mesa = new Mesa;
        $mesa->NroMesa = $request->input('NroMesa');
        $mesa->Capacidad = $request->input('Capacidad');

        $bitacora = new Bitacora;
        $bitacora->IP = Bitacora::IP();
        $bitacora->Username = Auth::user()->name;
        $bitacora->Action = 'I';
        $bitacora->Table = 'Mesas';
        $bitacora->Row = $mesa->NroMesa;

        $mesa->save();
        $bitacora->save();
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
        return view('lugar.mesas.edit', [
            'mesa' => $mesa,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mesa $mesa): RedirectResponse
    {

        $bitacora = new Bitacora;
        $bitacora->IP = Bitacora::IP();
        $bitacora->Username = Auth::user()->name;
        $bitacora->Action = 'E';
        $bitacora->Table = 'Mesas';
        $bitacora->Row = $mesa->NroMesa;

        $mesa->update($request->only(['NroMesa', 'Capacidad']));
        $bitacora->save();
        return redirect()->route('mesas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mesa $mesa): RedirectResponse
    {

        $bitacora = new Bitacora;
        $bitacora->IP = Bitacora::IP();
        $bitacora->Username = Auth::user()->name;
        $bitacora->Action = 'D';
        $bitacora->Table = 'Mesas';
        $bitacora->Row = $mesa->NroMesa;

        $mesa->delete();
        $bitacora->save();
        return redirect(route('mesas.index'));
    }
}
