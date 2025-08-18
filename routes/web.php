<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\TableTestController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SubproductsController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\SalepointController;

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::get('/logout', function (Request $request) {
    auth()->logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/');
})->name('logout');
Route::middleware(['auth'])->group(function () {
    Route::get('/products', [InventoryController::class, 'products'])->name('inventory');
    Route::get('/subproducts', [InventoryController::class, 'subproducts']);
    Route::get('/inventory', [InventoryController::class, 'inventory']);
    Route::get('/venta', [SalepointController::class, 'index'])->name('venta');
    // Todas estas rutas requieren estar logueado
});