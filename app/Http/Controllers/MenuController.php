<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Item;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('menu.index', [
            'menus' => Menu::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('menu.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $menu = new Menu();
        $menu->CodProd = $request->input('CodProd');
        $menu->save();
        return redirect()->route('menu.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu): RedirectResponse
    {
        $item = Item::find($menu->CodProd);
        $item->Disponible = $item->Disponible == 0 ? 1 : 0;
        $item->save();
        return redirect()->route('menu.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu): RedirectResponse
    {
        $menu->delete();
        return redirect()->route('menu.index');
    }
}
