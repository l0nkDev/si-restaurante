<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;
use App\Models\Role;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(): View
    {
        return view('roles.index', [
            'roles' => Role::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('roles.create');
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $role = new Role;
        $role->nombre = $request->input('nombre');
        $role->save();

        $bitacora = new Bitacora;
        $bitacora->IP = $_SERVER['HTTP_X_FORWARDED_FOR'];;
        $bitacora->Username = Auth::user()->name;
        $bitacora->Action = 'I';
        $bitacora->Table = 'Roles';
        $bitacora->Row = $role->nombre;
        $bitacora->save();

        return redirect()->route('roles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role): View
    {
        return view('roles.edit', [
            'role' => $role,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role): RedirectResponse
    {

        $bitacora = new Bitacora;
        $bitacora->IP = $_SERVER['HTTP_X_FORWARDED_FOR'];;
        $bitacora->Username = Auth::user()->name;
        $bitacora->Action = 'E';
        $bitacora->Table = 'Roles';
        $bitacora->Row = $request->input("nombre");
        $bitacora->save();

        $role->update($request->only(['nombre']));
        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role):RedirectResponse
    {
        $bitacora = new Bitacora;
        $bitacora->IP = $_SERVER['HTTP_X_FORWARDED_FOR'];;
        $bitacora->Username = Auth::user()->name;
        $bitacora->Action = 'D';
        $bitacora->Table = 'Roles';
        $bitacora->Row = $role->nombre;
        $bitacora->save();
        $role->delete();
        return redirect(route('roles.index'));
    }
}
