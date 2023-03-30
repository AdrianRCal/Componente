<?php

use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/* 
Route::get('/', [FrutaController::class, 'index']);
Route::get('/compra/{id}', [FrutaController::class, 'compra']);
Route::get('/reponer', [FrutaController::class, 'reponer']);
Route::get('/inserta', [FrutaController::class, 'inserta']);
Route::get('/carrito/{id}', [FrutaController::class, 'carrito']); */

Route::get('/', [IndexController::class, 'index']);
Route::get('/dashboard', [IndexController::class, 'dashboard']);
Route::post('/insertar', [IndexController::class, 'insertar']);
Route::get('/delete/{id}', [IndexController::class, 'delete']);
Route::get('/modify/{id}', [IndexController::class, 'modify']);
Route::post('/update', [IndexController::class, 'update']);
Route::get('/comprar/{id}', [IndexController::class, 'comprar']);

Route::get('/shop', [IndexController::class, 'comprarShow']);
Route::get('/borrarProducto/{id}', [IndexController::class, 'borrarShow']);

Route::post('/welcome', [IndexController::class, 'comprarDelete']);


/* Route::post('/comprar', [IndexController::class, 'shop']);
 */


/* Route::get('/', function () {
    return view('welcome');
}); */



Route::get('/export', [IndexController::class, 'exportToExcel']);


/* Route::get('/dashboard', function () {
    return view('dashboard');
});
 */
/* Route::middleware(['auth', 'admin'])->group(function () {
    return view('dashboard');
}); */

/* Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        if (Auth::user()->role) {
            return view('admin_dashboard');
        } else {
            return view('user_dashboard');
        }
    })->name('dashboard');
}); */


/* 
Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
 */
require __DIR__.'/auth.php';


/* protected function redirectTo() {
    if (auth()->user()->role == 'admin') {
        return route('admin.dashboard');
    } else {
        return route('user.dashboard');
    }
}

<!-- Mostrar este enlace solo si el usuario es admin -->
@auth
    @if(auth()->user()->role == 'admin')
        <a href="{{ route('admin.dashboard') }}">Panel de control de admin</a>
    @endif
@endauth
 */