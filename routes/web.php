<?php

use App\Http\Controllers\{Admin\BitacoraController,
    Admin\EmpleadoController,
    Admin\MenuController,
    Admin\ReporteController,
    Admin\RoleController,
    Admin\UsuarioController,
    Caja\ClienteController,
    Caja\FacturaController,
    Caja\IngresosTotalesController,
    Cocina\ContieneController,
    Cocina\IngredienteController,
    Cocina\SalidaCocinaController,
    Inventario\InventarioController,
    Inventario\ItemController,
    Inventario\NotaCompraController,
    Inventario\NotaSalidaController,
    Inventario\ProdEntranteController,
    Inventario\ProductoController,
    Inventario\ProveedorController,
    Lugar\EspacioController,
    Lugar\MesaController,
    Lugar\NotaVentaController,
    Lugar\OrdenaController,
    Lugar\OrdenController,
    ProfileController};
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('roles', RoleController::class)
    ->only(['index', 'create', 'store', 'edit', 'update', 'destroy'])
    ->middleware(['auth', 'verified']);

Route::resource('users', UsuarioController::class)
    ->only(['index', 'create', 'store', 'edit', 'update', 'destroy'])
    ->middleware(['auth', 'verified']);

Route::resource('empleados', EmpleadoController::class)
    ->only(['index', 'create', 'store', 'edit', 'update', 'destroy'])
    ->middleware(['auth', 'verified']);

Route::resource('clientes', ClienteController::class)
    ->only(['index', 'create', 'store', 'edit', 'update', 'destroy'])
    ->middleware(['auth', 'verified']);

Route::resource('mesas', MesaController::class)
    ->only(['index', 'create', 'store', 'edit', 'update', 'destroy'])
    ->middleware(['auth', 'verified']);

Route::resource('productos', ProductoController::class)
    ->only(['index', 'create', 'store', 'edit', 'update', 'destroy'])
    ->middleware(['auth', 'verified']);

Route::resource('nota_ventas', NotaVentaController::class)
    ->only(['index', 'create', 'store', 'edit', 'update', 'destroy', 'show'])
    ->middleware(['auth', 'verified']);

Route::resource('ordens', OrdenController::class)
    ->only(['index', 'create', 'store', 'edit', 'update', 'destroy', 'show'])
    ->middleware(['auth', 'verified']);

Route::resource('ordenas', OrdenaController::class)
    ->only(['index', 'create', 'store', 'edit', 'update', 'destroy', 'show'])
    ->middleware(['auth', 'verified']);

Route::resource('proveedors', ProveedorController::class)
    ->only(['index', 'create', 'store', 'edit', 'update', 'destroy', 'show'])
    ->middleware(['auth', 'verified']);

Route::resource('menu', MenuController::class)
    ->only(['index', 'create', 'store', 'edit', 'update', 'destroy', 'show'])
    ->middleware(['auth', 'verified']);

Route::resource('bitacora', BitacoraController::class)
    ->only(['index', 'create', 'store', 'edit', 'update', 'destroy', 'show'])
    ->middleware(['auth', 'verified']);

Route::resource('espacio', EspacioController::class)
    ->only(['index'])
    ->middleware(['auth', 'verified']);

Route::resource('ingresos', IngresosTotalesController::class)
    ->only(['index'])
    ->middleware(['auth', 'verified']);

Route::resource('ingredientes', IngredienteController::class)
    ->only(['index', 'create', 'store'])
    ->middleware(['auth', 'verified']);

Route::resource('contienes', ContieneController::class)
    ->only(['create', 'edit', 'store', 'update', 'destroy'])
    ->middleware(['auth', 'verified']);

Route::resource('nota_compra', NotaCompraController::class)
    ->only(['index', 'create', 'edit', 'store', 'update', 'destroy', 'show'])
    ->middleware(['auth', 'verified']);

Route::resource('producto_entrante', ProdEntranteController::class)
    ->only(['create', 'edit', 'store', 'update', 'destroy', 'show'])
    ->middleware(['auth', 'verified']);

Route::resource('salida_cocina', SalidaCocinaController::class)
    ->only(['index', 'store', 'create'])
    ->middleware(['auth', 'verified']);

Route::resource('factura', FacturaController::class)
    ->only(['show', 'store'])
    ->middleware(['auth', 'verified']);

Route::resource('inventario', InventarioController::class)
    ->only(['index'])
    ->middleware(['auth', 'verified']);

Route::resource('item', ItemController::class)
    ->only(['edit'])
    ->middleware(['auth', 'verified']);

Route::resource('nota_salida', NotaSalidaController::class)
    ->only(['index', 'show', 'create', 'store', 'destroy'])
    ->middleware(['auth', 'verified']);

Route::resource('reporte', ReporteController::class)
    ->only(['index', 'show', 'create', 'store'])
    ->middleware(['auth', 'verified']);

require __DIR__.'/auth.php';
