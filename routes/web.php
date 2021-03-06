<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubmitController;
use App\Http\Controllers\TaskController;

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

Route::get('/form', [SubmitController::class, 'index']);
Route::post('/submit', [SubmitController::class, 'store'])->name('submission');
Route::get('/salon', [SubmitController::class, 'salon']);

Route::get('tasks', [TaskController::class, 'index'])->name('tasks');
Route::get('tasks/create', [TaskController::class, 'create'])->name('tasks.create');
Route::post('tasks', [TaskController::class, 'store'])->name('tasks.store');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
