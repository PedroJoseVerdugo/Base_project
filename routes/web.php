<?php

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

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\AsignaturaController;
use App\Http\Controllers\MatriculaController;

            

Route::get('/', function () {return redirect('sign-in');})->middleware('guest');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');
Route::get('/welcome',function(){return view('welcome');})->name('welcome');
Route::get('sign-up', [RegisterController::class, 'create'])->middleware('guest')->name('register');
Route::post('sign-up', [RegisterController::class, 'store'])->middleware('guest');
Route::get('sign-in', [SessionsController::class, 'create'])->middleware('guest')->name('login');
Route::post('sign-in', [SessionsController::class, 'store'])->middleware('guest');
Route::post('verify', [SessionsController::class, 'show'])->middleware('guest');
Route::post('reset-password', [SessionsController::class, 'update'])->middleware('guest')->name('password.update');
Route::get('verify', function () {
	return view('sessions.password.verify');
})->middleware('guest')->name('verify'); 
Route::get('/reset-password/{token}', function ($token) {
	return view('sessions.password.reset', ['token' => $token]);
})->middleware('guest')->name('password.reset');

Route::post('sign-out', [SessionsController::class, 'destroy'])->middleware('auth')->name('logout');
Route::get('profile', [ProfileController::class, 'create'])->middleware('auth')->name('profile');
Route::post('user-profile', [ProfileController::class, 'update'])->middleware('auth');
Route::group(['middleware' => 'auth'], function () {
	Route::get('billing', function () {
		return view('pages.billing');
	})->name('billing');
	Route::get('tables', function () {
		return view('pages.tables',['name'=>'Marta']);
	})->name('tables');
	Route::get('rtl', function () {
		return view('pages.rtl');
	})->name('rtl');
	Route::get('virtual-reality', function () {
		return view('pages.virtual-reality');
	})->name('virtual-reality');
	Route::get('notifications', function () {
		return view('pages.notifications');
	})->name('notifications');
	Route::get('static-sign-in', function () {
		return view('pages.static-sign-in');
	})->name('static-sign-in');
	Route::get('static-sign-up', function () {
		return view('pages.static-sign-up');
	})->name('static-sign-up');
	Route::get('user-management', function () {
		return view('pages.laravel-examples.user-management');
	})->name('user-management');
	Route::get('user-profile', function () {
		return view('pages.laravel-examples.user-profile');
	})->name('user-profile');
});
Route::resource('alumnos', App\Http\Controllers\AlumnoController::class);

//ruta dela tabla asignaturas

Route::resource('asignaturas', App\Http\Controllers\AsignaturaController::class);

Route::get('/asignaturas', [AsignaturaController::class, 'index'])->name('asignaturas.index');
Route::get('/asignaturas/create', [AsignaturaController::class, 'create'])->name('asignaturas.create');
Route::post('/asignaturas', [AsignaturaController::class, 'store'])->name('asignaturas.store');


//ruta d ela tabla matriculas
Route::resource('matriculas', App\Http\Controllers\MatriculaController::class);
// Rutas para mostrar la lista y el formulario de creación
Route::get('matriculas', [MatriculaController::class, 'index'])->name('matriculas.index');
Route::get('matriculas/create', [MatriculaController::class, 'create'])->name('matriculas.create');
// Rutas para procesar la creación y visualización de matrículas
Route::post('matriculas', [MatriculaController::class, 'store'])->name('matriculas.store');

Route::middleware(['auth'])->group(function () {
Route::get('matriculas/{matricula}', [MatriculaController::class, 'show'])->name('matriculas.show');

// Rutas para la edición y actualización de matrículas
Route::get('matriculas/{matricula}/edit', [MatriculaController::class, 'edit'])->name('matriculas.edit');
Route::put('matriculas/{matricula}', [MatriculaController::class, 'update'])->name('matriculas.update');

// Ruta para eliminar matrículas
Route::delete('matriculas/{matricula}', [MatriculaController::class, 'destroy'])->name('matriculas.destroy'); 
Route::get('/asignaturas/{asignatura}', 'AsignaturaController@show')->name('asignaturas.show');


Route::post('/matriculas', 'MatriculaController@store')->name('matriculas.store');
});