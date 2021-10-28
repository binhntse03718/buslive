<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GaragesController;
use App\Http\Controllers\EmployeeController;

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



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    if (Auth::user()->role) {
        return redirect('admin/dashboard');
    } else {
        return view('welcome');
    }
})->name('dashboard');

Route::group(['middleware' => ['auth:sanctum', 'verified', 'permission.manager']], function () {
    Route::group(['prefix' => 'admin'], function () {

        Route::get('/dashboard', [AdminController::class, 'viewDashBoard']);
        Route::get('/profile', [AdminController::class, 'viewProfile']);

        Route::group(['prefix' => 'employee'], function () {
            Route::get('/', [EmployeeController::class, 'viewEmployee']);
            Route::post('/add', [EmployeeController::class, 'addEmployee']);
            Route::post('/edit', [EmployeeController::class, 'editEmployee']);
            Route::post('/delete', [EmployeeController::class, 'deleteEmployee']);
        });

        Route::group(['prefix' => 'garages'], function () {
            Route::get('/', [GaragesController::class, 'viewGarages']);
            Route::post('/add', [GaragesController::class, 'addGarages']);
            Route::post('/edit', [GaragesController::class, 'editGarages']);
            Route::post('/delete', [GaragesController::class, 'deleteGarages']);
        });          
    });
});

Route::group(['middleware' => ['permission.visiter']], function () {
    Route::get('/', function () {
        return view('welcome');
    });
});
