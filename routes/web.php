<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\ProfileController;


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
    return view('home');
});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/actividad/{evento}', [HomeController::class, 'showEvento'])->name('actividad'); // formulario para asistencia
Route::get('/asistente/{cedula}', [HomeController::class, 'getDatosPorCedula']); // Autocompletado con cédula
Route::post('/actividad', [HomeController::class, 'store'])->name('actividad.store'); // Logica que añade un asistente
Route::get('/asistencia/{evento}', [HomeController::class, 'showAsistencia'])->name('asistencia'); // Vista de asistencia por dia de evento


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [EventoController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/create', [EventoController::class, 'create'])->name('dashboard.create'); // Formulario para crear evento
    Route::post('/dashboard', [EventoController::class, 'store'])->name('dashboard.store'); // Logica que añade el evento a la base de datos
    Route::get('/dashboard/{evento}/edit', [EventoController::class, 'edit'])->name('dashboard.edit'); // Formulario para editar el evento
    Route::put('/dashboard/{evento}', [EventoController::class, 'update'])->name('dashboard.update'); // logica que actualiza la informacion del evento
    Route::delete('/dashboard/{evento}', [EventoController::class, 'destroy'])->name('dashboard.destroy'); // Logica que elimina el evento

    Route::get('/dashboard/actividad/{evento}', [EventoController::class, 'showEvento'])->name('actividad.admin'); // Formulario para crear evento
    Route::post('/dashboard/actividad/', [EventoController::class, 'add'])->name('actividad.add'); // Logica que añade el evento a la base de datos
});

//Route::resource('eventos', EventoController::class)->middleware('auth');

require __DIR__.'/auth.php';
