<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SwdaController;
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


//! ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//! SWDA API ROUTE START
//! ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//*MAJOR API FOR CRUD APPLICATION FOR SWDA ADMIN FRONTEND
Route::get("swdalist", [SwdaController::class,'swdaIndex']); //WORKING GET ALL SWDA COLUMN AND ROW
Route::post("swdalist", [SwdaController::class,'swdaStore']); //WORKING CREATE NEW SWDA ROW
Route::get("swdalist/{ID}", [SwdaController::class,'swdaShow']); //WORKING GET SPECIFIC SWDA ROW BY GETTING ITS ID
Route::get("swdalist/{ID}/edit", [SwdaController::class,'swdaEdit']); //WORKING GET SPECIFIC ROW BUT USE FOR TESTING FOR PUT METHOD
Route::put("swdalist/{ID}/edit", [SwdaController::class,'swdaUpdate']); //WORKING EDIT SWDA SPECICIC ROW
Route::delete("swdalist/{ID}/delete", [SwdaController::class,'swdaArchive']); //WORKING SOFT DELETE/ARHIVE SWDA SPECICIC ROW

Route::get("swdaArchived", [SwdaController::class,'swdaGetArchived']); //WORKING GET ALL SWDA ARCHIVE DATA
Route::get("swdaArchived/{ID}", [SwdaController::class,'swdaArchiveFind']); //WORKING GET SPECIFIC SWDA ARCHIVE DATA
Route::post("swdaArchived/{ID}/restore", [SwdaController::class,'swdaRestore']); // WORKING RESTORE SPECIFIC ARCHIVE DATA

//*SPECIFICALLY USED FOR GETTING DATA FOR CHARTJS COMPONENTS IN FRONTEND
Route::get("cluster", [SwdaController::class,'cluster']);
Route::get("modeDelivery", [SwdaController::class,'modeDelivery']);
Route::get("sector", [SwdaController::class,'sector']);
Route::get("clientele", [SwdaController::class,'clientele']);
Route::get("regionaloperation", [SwdaController::class,'regionaloperation']);
Route::get("agencies", [SwdaController::class,'agencies']);
Route::get("agenciesName", [SwdaController::class,'agenciesName']);


//! ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//! SWDA API ROUTE END
//! ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////






//? ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//?  HR API ROUTE START
//? ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


//*MAJOR API FOR CRUD APPLICATION FOR HR ADMIN FRONTEND
Route::get("hrlist", [HrController::class,'hrIndex']); //WORKING GET ALL HR COLUMN AND ROW
Route::post("hrlist", [HrController::class,'hrStore']); //WORKING CREATE NEW HR ROW
Route::get("hrlist/{ID}", [HrController::class,'hrShow']); //WORKING GET SPECIFIC HR ROW BY GETTING ITS ID
Route::get("hrlist/{ID}/edit", [HrController::class,'hrEdit']); //WORKING GET SPECIFIC ROW BUT USE FOR TESTING FOR PUT METHOD
Route::put("hrlist/{ID}/edit", [HrController::class,'hrUpdate']); //WORKING EDIT HR SPECICIC ROW
Route::delete("hrlist/{ID}/delete", [HrController::class,'hrDestroy']); //WORKING DELETE HR SPECICIC ROW



//*SPECIFICALLY USED FOR GETTING DATA FOR CHARTJS COMPONENTS IN FRONTEND
Route::get("employmentStatus", [HrController::class,'employmentStatus']);
Route::get("employmentDetails", [HrController::class,'employmentDetails']);


//? ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//? HR API ROUTE END
//? ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
