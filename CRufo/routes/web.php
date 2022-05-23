<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\issueController;
use App\Http\Controllers\usersController;


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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/', [librosController::class, 'index'])->name('libros.index');


/*********************************** RUTAS PARA LOS LIBROS ***********************************/
/* Ver todas las incidencias */
Route::get('/incidencias', [issueController::class, 'index'])->name('incidencias.index');
Route::post('/incidencias', [issueController::class, 'storeComment'])->name('incidencias.storeComment')->middleware(['auth']);


/* Crear una incidencia */
Route::get('/incidencias/crear', [issueController::class, 'create'])->name('incidencias.create')->middleware(['auth']);
Route::post('/incidencias/crear', [issueController::class, 'store'])->name('incidencias.store')->middleware(['auth']);

/* Editar una incidencia (por ID) */
Route::get('/incidencia/editar/{id}', [issueController::class, 'edit'])->name('incidencias.edit')->middleware(['auth']);
Route::put('/incidencia/editar/{id}', [issueController::class, 'update'])->name('incidencias.update')->middleware(['auth']);

Route::get('/incidencia/ver/{id}', [issueController::class, 'view'])->name('incidencias.view')->middleware(['auth']);

Route::get('/incidencia/borrar/{id}', [issueController::class, 'destroy'])->name('incidencias.destroy')->middleware(['auth']);

Route::get('/usuario/borrar/{id}', [usersController::class, 'destroy'])->name('usuarios.destroy')->middleware(['auth']);

/*********************************** RUTAS PARA LOS LIBROS ***********************************/
Route::get('/perfil', [issueController::class, 'user'])->name('usuarios.index')->middleware(['auth']);

// Route::get('/administracion/incidencias', [issueController::class, 'index'])->name('incidencias.admin');
Route::get('/usuarios', [usersController::class, 'admin'])->name('usuarios.admin');


/************************************* RUTAS PARA LOS PDF ************************************/
Route::get('/libros/PDF', [librosController::class, 'librosPDF']);
Route::get('/libros/PDF/{id}', [librosController::class, 'libroPDF']);
/*********************************************************************************************/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
