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
*/

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::resource('/users', UserController::class)->names('admin.users')->middleware('auth');
    Route::resource('/inventory', InventoryController::class)->names('admin.inventories')->middleware('auth');
    Route::resource('/operario', OpInvController::class)->names('operario.inventories')->middleware('auth');
    Route::resource('/done', DoneInventoryController::class)->names('operario.done')->middleware('auth');
    Route::get('', function () {
        return view('dashboard');
    })->middleware('auth');
});


//ADMIN CONTROLLER
Route::group(['middleware' => ['can:cms']], function () {
});
