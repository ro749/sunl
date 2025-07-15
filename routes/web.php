<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\TableTestController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SubproductsController;
use App\Http\Controllers\InventoryController;

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::get('/logout', function (Request $request) {
    auth()->logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/');
})->name('logout');
Route::middleware(['auth'])->group(function () {
    Route::get('/products', [ProductsController::class, 'index']);
    Route::get('/subproducts', [SubproductsController::class, 'index']);
    Route::get('/inventory', [InventoryController::class, 'index']);
    // Todas estas rutas requieren estar logueado
});