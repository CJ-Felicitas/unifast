<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\http\Controllers\HrController;
use App\Http\Controllers\OsdController;
use App\Http\Controllers\CbssController;
use App\Http\Controllers\SwdaController;
use App\Http\Controllers\AdminController;
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

//TEST LOGIN ADMIN AND USER
Route::get("getAdmin", [AdminController::class,'index']);
Route::get("getAdmin/{id}", [AdminController::class,'show']);
Route::post("storeAdmin", [AdminController::class,'store']);
Route::put("getAdmin/{ID}/edit", [AdminController::class,'update']);
Route::post('adminLogin', [AdminController::class, 'login']);



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


Route::get("swdaVersion", [SwdaController::class,'swdaVersion']); //WORKING GET ALL SWDA VERSION COLUMN AND ROW
Route::get("swdaVersion/{ID}", [SwdaController::class,'swdaVersionShow']); //WORKING GET SPECIFIC SWDA ROW BY GETTING ITS ID
Route::get("swdaVersion/{ID}/view", [SwdaController::class,'swdaVersionShowID']); //WORKING GET SPECIFIC SWDA ROW BY GETTING ITS ID

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
Route::delete("hrlist/{ID}/delete", [HrController::class,'hrArchive']); //WORKING DELETE HR SPECICIC ROW

Route::get("hrArchived", [HrController::class,'hrGetArchived']); //WORKING GET ALL HR ARCHIVE DATA
Route::get("hrArchived/{ID}", [HrController::class,'hrArchiveFind']); //WORKING GET SPECIFIC HR ARCHIVE DATA
Route::post("hrArchived/{ID}/restore", [HrController::class,'hrRestore']); // WORKING RESTORE SPECIFIC ARCHIVE DATA

//*SPECIFICALLY USED FOR GETTING DATA FOR CHARTJS COMPONENTS IN FRONTEND
Route::get("employmentStatus", [HrController::class,'employmentStatus']);
Route::get("employmentDetails", [HrController::class,'employmentDetails']);


//? ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//? HR API ROUTE END
//? ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



//* ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//* CBSS API ROUTE END
//* ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

Route::get("cbsslist", [CbssController::class,'cbssIndex']); //WORKING GET ALL HR COLUMN AND ROW
Route::post("cbsslist", [CbssController::class,'cbssStore']); //WORKING CREATE NEW HR ROW
Route::get("cbsslist/{ID}", [CbssController::class,'cbssShow']); //WORKING GET SPECIFIC HR ROW BY GETTING ITS ID
Route::get("cbsslist/{ID}/edit", [CbssController::class,'cbssEdit']); //WORKING GET SPECIFIC ROW BUT USE FOR TESTING FOR PUT METHOD
Route::put("cbsslist/{ID}/edit", [CbssController::class,'cbssUpdate']); //WORKING EDIT HR SPECICIC ROW
Route::delete("cbsslist/{ID}/delete", [CbssController::class,'cbssArchive']); //WORKING DELETE HR SPECICIC ROW

Route::get("cbssArchived", [CbssController::class,'cbssGetArchived']); //WORKING GET ALL HR ARCHIVE DATA
Route::get("cbssArchived/{ID}", [CbssController::class,'cbssArchiveFind']); //WORKING GET SPECIFIC HR ARCHIVE DATA
Route::post("cbssrArchived/{ID}/restore", [CbssController::class,'cbssRestore']); // WORKING RESTORE SPECIFIC ARCHIVE DATA




//* ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//* CBSS API ROUTE END
//* ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


//! ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//! OSD API ROUTE START
//! ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
Route::get("osdlist", [OsdController::class,'osdIndex']); //WORKING GET ALL OSD COLUMN AND ROW
Route::post("osdlist", [OsdController::class,'osdStore']); //WORKING CREATE NEW OSD ROW
Route::get("osdlist/{ID}", [OsdController::class,'osdShow']); //WORKING GET SPECIFIC OSD ROW BY GETTING ITS ID
Route::get("osdlist/{ID}/edit", [OsdController::class,'osdEdit']); //WORKING GET SPECIFIC ROW BUT USE FOR TESTING FOR PUT METHOD
Route::put("osdlist/{ID}/edit", [OsdController::class,'osdUpdate']); //WORKING EDIT OSD SPECICIC ROW
Route::delete("osdlist/{ID}/delete", [OsdController::class,'osdArchive']); //WORKING SOFT DELETE/ARHIVE OSD SPECICIC ROW


Route::get("osdArchived", [OsdController::class,'osdGetArchived']); //WORKING GET ALL OSD ARCHIVE DATA
Route::get("osdArchived/{ID}", [OsdController::class,'osdArchiveFind']); //WORKING GET SPECIFIC OSD ARCHIVE DATA
Route::post("osdArchived/{ID}/restore", [OsdController::class,'osdRestore']); // WORKING RESTORE SPECIFIC ARCHIVE DATA
//! ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//! OSD API ROUTE START
//! ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
