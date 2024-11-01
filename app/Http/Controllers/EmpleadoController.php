<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;
use App\Models\Empleado;
use App\Models\Persona;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('empleados.index', [
            'empleados' => Empleado::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('empleados.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $persona = new Persona();
        $empleado = new Empleado();
        $persona->CI = $request->input("CI");
        $persona->Nombre = $request->input("Nombre");
        $persona->save();
        $empleado->Telefono = $request->input('Telefono');
        $empleado->IdEmpleado = $persona->IdPersona;
        $empleado->save();

        $bitacora = new Bitacora;
        $bitacora->IP = $_SERVER['HTTP_X_FORWARDED_FOR'];
        $bitacora->Username = Auth::user()->name;
        $bitacora->Action = 'I';
        $bitacora->Table = 'Empleados';
        $bitacora->Row = $persona->Nombre;
        $bitacora->save();

        return redirect()->route('empleados.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Empleado $empleado): View
    {
        return view('empleados.edit', [
            'empleado' => $empleado,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Empleado $empleado): RedirectResponse
    {
        $persona = Persona::find($empleado->IdEmpleado);
        $persona->CI = $request->input("CI");
        $persona->Nombre = $request->input("Nombre");
        $persona->save();
        $empleado->Telefono = $request->input('Telefono');
        $empleado->save();

        $bitacora = new Bitacora;
        $bitacora->IP = $_SERVER['HTTP_X_FORWARDED_FOR'];
        $bitacora->Username = Auth::user()->name;
        $bitacora->Action = 'E';
        $bitacora->Table = 'Empleados';
        $bitacora->Row = $persona->Nombre;
        $bitacora->save();

        return redirect()->route('empleados.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Empleado $empleado)
    {
        $persona = Persona::find($empleado->IdEmpleado);

        $bitacora = new Bitacora;
        $bitacora->IP = $_SERVER['HTTP_X_FORWARDED_FOR'];
        $bitacora->Username = Auth::user()->name;
        $bitacora->Action = 'D';
        $bitacora->Table = 'Empleados';
        $bitacora->Row = $persona->Nombre;

        $empleado->delete();
        $persona ->delete();
        $bitacora->save();
        return redirect(route('empleados.index'));
    }
}
