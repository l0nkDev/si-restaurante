<?php

namespace App\Http\Controllers\Inventario;

use App\Http\Controllers\Controller;
use App\Models\Admin\Bitacora;
use App\Models\Inventario\Item;
use App\Models\Inventario\NotaSalida;
use App\Models\Inventario\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotaSalidaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('inventario.nota_salida.index', [
            'notasalidas' => NotaSalida::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('inventario.nota_salida.create', ['CodItem' => $request->input('CodItem')]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $nota = new NotaSalida();
        $nota->Cantidad = $request->input('Cantidad');
        $nota->FechaHra = date('Y-m-d H:i:s');
        $nota->CodItem = $request->input('CodItem');
        $nota->save();

        $item = Item::find($nota->CodItem);
        $item->Cantidad -= $nota->Cantidad;
        $item->save();

        $bitacora = new Bitacora;
        $bitacora->IP = Bitacora::IP();;
        $bitacora->Username = Auth::user()->name;
        $bitacora->Action = 'I';
        $bitacora->Table = 'nota_salidas';
        $bitacora->Row = $nota->NroSalida;
        $bitacora->save();

        return redirect()->route('inventario.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(NotaSalida $notaSalida)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NotaSalida $notaSalida)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, NotaSalida $notaSalida)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NotaSalida $notaSalida)
    {
        $tmp = $notaSalida->NroSalida;
        $item = Item::find($notaSalida->CodItem);
        $item->Cantidad += $notaSalida->Cantidad;
        $item->save();
        $notaSalida->delete();



        $bitacora = new Bitacora;
        $bitacora->IP = Bitacora::IP();;
        $bitacora->Username = Auth::user()->name;
        $bitacora->Action = 'D';
        $bitacora->Table = 'nota_salidas';
        $bitacora->Row = $tmp;
        $bitacora->save();

        return redirect()->route('nota_salida.index');
    }
}
