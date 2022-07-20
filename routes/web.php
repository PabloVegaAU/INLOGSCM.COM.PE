<?php

use App\Http\Controllers\admin\InventoryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Operario\InventoryController as OpInvController;
use App\Http\Controllers\Operario\DoneInventoryController;
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

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::resource('/users', UserController::class)->names('admin.users');
Route::resource('/inventory', InventoryController::class)->names('admin.inventories');
Route::resource('/operario', OpInvController::class)->names('operario.inventories');
Route::resource('/done', DoneInventoryController::class)->names('operario.done');
//ADMIN CONTROLLER
Route::group(['middleware' => ['can:cms']], function () {
});
