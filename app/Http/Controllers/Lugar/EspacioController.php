<?php

namespace App\Http\Controllers\Lugar;

use App\Http\Controllers\Controller;
use App\Models\Espacio;
use App\Models\Lugar\Mesa;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EspacioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('lugar.espacio.index', [
            'mesas' => Mesa::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Espacio $espacio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Espacio $espacio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Espacio $espacio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Espacio $espacio)
    {
        //
    }
}
