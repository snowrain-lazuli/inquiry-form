<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\UserController;
use App\Models\Contact;

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


Route::get('/', [ContactController::class, 'index']);

Route::get('/contacts/confirm', [ContactController::class, 'confirm']);
Route::post('/contacts/confirm', [ContactController::class, 'confirm']);

Route::post('/contacts', [ContactController::class, 'store']);
Route::middleware('auth')->group(function () {
    Route::get('/admin', [UserController::class, 'admin']);
});
Route::post('admin', [UserController::class, 'admin']);
Route::get('/store', [UserController::class, 'store']);
Route::post('/store', [UserController::class, 'store']);
Route::get('/contents/register', [UserController::class, 'register']);
Route::post('/contents/register', [UserController::class, 'register']);

Route::get('/find', [UserController::class, 'find']);
Route::post('/find', [UserController::class, 'search']);
Route::delete('/delete', [UserController::class, 'destroy']);