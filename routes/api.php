<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\http\Controllers\SwdaController;
use App\http\Controllers\HrController;
use App\http\Controllers\TblEmployeeController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// LOGIN API ROUTE START
Route::get("loginCredentials", [TblEmployeeController::class,'loginCredentials']);
// LOGIN API ROUTE END



// SWDA API ROUTE START
Route::get("list", [SwdaController::class,'list']);

Route::get("cluster", [SwdaController::class,'cluster']);

Route::get("modeDelivery", [SwdaController::class,'modeDelivery']);

Route::get("sector", [SwdaController::class,'sector']);

Route::get("clientele", [SwdaController::class,'clientele']);

Route::get("regionaloperation", [SwdaController::class,'regionaloperation']);

Route::get("agencies", [SwdaController::class,'agencies']);

Route::get("agenciesName", [SwdaController::class,'agenciesName']);



// SWDA API ROUTE END

// HR API ROUTE START
Route::get("employmentStatus", [HrController::class,'employmentStatus']);

Route::get("employmentDetails", [HrController::class,'employmentDetails']);

// HR API ROUTE END
