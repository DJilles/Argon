<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\Example\AnimalController;
use App\Http\Controllers\Example\CategoryController;
use App\Http\Controllers\Example\PostController;
use App\Http\Controllers\Example\ProductController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CarrerController;
use App\Http\Controllers\CheckInLogController;
use App\Http\Controllers\DeviceInventoryController;
use App\Http\Controllers\DeviceTypeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserDevController;
use App\Livewire\Products\ProductList;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::prefix('/profile')->group(function () {
        Route::get('/', [ProfileController::class, 'index'])->name('profile.index');
        Route::get('/edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/update', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/destroy', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    //rutas de ejemplo sin controlador con prefijo
    Route::prefix('/ejemplo')->group(function () {
        Route::get('/index', fn() => view('examples.ejemplo.index'))->name('ejemplo.index');
        Route::get('/create', fn() => view('examples.ejemplo.create'))->name('ejemplo.create');
        Route::get('/edit', fn() => view('examples.ejemplo.edit'))->name('ejemplo.edit');
        Route::get('/show', fn() => view('examples.ejemplo.show'))->name('ejemplo.show');
    });



    // Add the route for DeviceTypeController
    Route::prefix('/devices_types')->group(function(){
        Route::get('/',[DeviceTypeController::class, 'index'])->name('devices_types.index');
        Route::get('/create', [DeviceTypeController::class, 'create'])->name('devices_types.create');
        Route::post('/', [DeviceTypeController::class, 'store'])->name('devices_types.store');
        Route::get('/{device}/edit', [DeviceTypeController::class, 'edit'])->name('devices_types.edit');
        Route::put('/{device}', [DeviceTypeController::class, 'update'])->name('devices_types.update');
        Route::delete('/{device}', [DeviceTypeController::class, 'destroy'])->name('devices_types.destroy');
        Route::get('/{device}', [DeviceTypeController::class, 'show'])->name('devices_types.show');
    });

    //Add the route for BrandController
    Route::prefix('/brands')->group(function(){
        Route::get('/',[BrandController::class, 'index'])->name('brands.index');
        Route::get('/create', [BrandController::class, 'create'])->name('brands.create');
        Route::post('/', [BrandController::class, 'store'])->name('brands.store');
        Route::get('/{brand}/edit', [BrandController::class, 'edit'])->name('brands.edit');
        Route::put('/{brand}', [BrandController::class, 'update'])->name('brands.update');
        Route::delete('/{brand}', [BrandController::class, 'destroy'])->name('brands.destroy');
        Route::get('/{brand}', [BrandController::class, 'show'])->name('brands.show');
    });

    //Add the route for DeviceInventoryController
    Route::prefix('/devices_inventories')->group(function(){
        Route::get('/',[DeviceInventoryController::class, 'index'])->name('devices_inventories.index');
        Route::get('/create', [DeviceInventoryController::class, 'create'])->name('devices_inventories.create');
        Route::post('/', [DeviceInventoryController::class, 'store'])->name('devices_inventories.store');
        Route::get('/{device_inventory}/edit', [DeviceInventoryController::class, 'edit'])->name('devices_inventories.edit');
        Route::put('/{device_inventory}', [DeviceInventoryController::class, 'update'])->name('devices_inventories.update');
        Route::delete('/{device_inventory}', [DeviceInventoryController::class, 'destroy'])->name('devices_inventories.destroy');
        Route::get('/{device_inventory}', [DeviceInventoryController::class, 'show'])->name('devices_inventories.show');
    });

    //Add the route for UserDevController
    Route::prefix('/users_devs')->group(function(){
        Route::get('/',[UserDevController::class, 'index'])->name('users_devs.index');
        Route::get('/create', [UserDevController::class, 'create'])->name('users_devs.create');
        Route::post('/', [UserDevController::class, 'store'])->name('users_devs.store');
        Route::get('/{device_inventory}/edit', [UserDevController::class, 'edit'])->name('users_devs.edit');
        Route::put('/{device_inventory}', [UserDevController::class, 'update'])->name('users_devs.update');
        Route::delete('/{device_inventory}', [UserDevController::class, 'destroy'])->name('users_devs.destroy');
        Route::get('/{device_inventory}', [UserDevController::class, 'show'])->name('users_devs.show');
    });

    //Add the route for CheckInLogController
    Route::prefix('/check_in_logs')->group(function(){
        Route::get('/',[CheckInLogController::class, 'index'])->name('check_in_logs.index');
        Route::get('/create', [CheckInLogController::class, 'create'])->name('check_in_logs.create');
        Route::post('/', [CheckInLogController::class, 'store'])->name('check_in_logs.store');
        Route::get('/{check_in_log}/edit', [CheckInLogController::class, 'edit'])->name('check_in_logs.edit');
        Route::put('/{check_in_log}', [CheckInLogController::class, 'update'])->name('check_in_logs.update');
        Route::delete('/{check_in_log}', [CheckInLogController::class, 'destroy'])->name('check_in_logs.destroy');
        Route::get('/{check_in_log}', [CheckInLogController::class, 'show'])->name('check_in_logs.show');
    });


    //rutas de posts de tipo resource


    // Route::resource('/categories', CategoryController::class);
    // Route::resource('/animals', AnimalController::class);
});

require __DIR__ . '/auth.php';
