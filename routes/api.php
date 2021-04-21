<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/company', [CompanyController::class, 'index']);
Route::prefix('/company')->group(function() {
    Route::post('/store', [CompanyController::class, 'store']);
    Route::put('/{id}', [CompanyController::class, 'update']);
    Route::delete('/{id}', [CompanyController::class, 'destroy']);
    Route::get('/{id}', [CompanyController::class, 'show']);
    }
);

Route::get('/employee', [EmployeeController::class, 'index']);
Route::prefix('/employee')->group(function(){
    Route::post('/store', [EmployeeController::class, 'store']);
    Route::put('/{id}', [EmployeeController::class, 'update']);
    Route::delete('/{id}', [EmployeeController::class, 'destroy']);
    Route::get('/{id}', [EmployeeController::class, 'show']);
    Route::get('/showByCompany/{id}', [EmployeeController::class, 'showByCompany']);
    }
);