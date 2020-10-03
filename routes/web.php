<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Traditional CRUD routes
Route::resource('contacts', ContactController::class)->shallow();

// Route::get('contacts', [ContactController::class, 'index']);
// Route::post('contacts', [ContactController::class, 'index']);
// Route::put('contacts', [ContactController::class, 'index']);
// Route::delete('contacts', [ContactController::class, 'index']);