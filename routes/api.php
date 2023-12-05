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


Route::get("hrVersion", [HrController::class,'hrVersion']); //WORKING GET ALL SWDA VERSION COLUMN AND ROW
Route::get("hrVersion/{ID}", [HrController::class,'hrVersionShow']); //WORKING GET SPECIFIC SWDA ROW BY GETTING ITS ID
Route::get("hrVersion/{ID}/view", [HrController::class,'hrVersionShowID']); //WORKING GET SPECIFIC SWDA ROW BY GETTING ITS ID


Route::get("numberOfRecordsPerMonth", [HrController::class,'numberOfRecordsPerMonth']); //NUMBER OF RECORDS PER MONTH
Route::get("numberOfRecordsPerMonth/{year}", [HrController::class,'numberOfRecordsPerMonthYear']);
Route::get("numberOfRecordsPerMonth/{month}/{year}", [HrController::class,'numberOfRecordsPerMonthYearfilter']);





Route::get("totalNumberOfCategoryRequest", [HrController::class,'totalNumberOfCategoryRequest']); //TOTAL NUMBER OF CATEGORIES REQUEST
Route::get("totalNumberOfCategoryRequest/{year}", [HrController::class,'numberOfCategoryRequestsPerYear']);
Route::get("totalNumberOfCategoryRequest/{month}/{year}", [HrController::class,'numberOfCategoryRequestsPerMonthYear']);

Route::get("percentageOfRequestingEmployee", [HrController::class,'percentageOfRequestingEmployee']); //PERCENTAGE OF REQUESTING EMPLOYEE
Route::get("percentageOfRequestingEmployee/{year}", [HrController::class,'percentageOfRequestingEmployeeYear']);
Route::get("percentageOfRequestingEmployee/{month}/{year}", [HrController::class,'percentageOfRequestingEmployeeMonthYear']);


Route::get("detailsOfRequestingEmployee", [HrController::class,'detailsOfRequestingEmployee']);
Route::get("detailsOfRequestingEmployee/{year}", [HrController::class,'detailsOfRequestingEmployeeYear']);
Route::get("detailsOfRequestingEmployee/{month}/{year}", [HrController::class,'detailsOfRequestingEmployeeMonthYear']);
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
Route::post("cbssArchived/{ID}/restore", [CbssController::class,'cbssRestore']); // WORKING RESTORE SPECIFIC ARCHIVE DATA


Route::get("cbssVersion", [CbssController::class,'cbssVersion']); //WORKING GET ALL SWDA VERSION COLUMN AND ROW
Route::get("cbssVersion/{ID}", [CbssController::class,'cbssVersionShow']); //WORKING GET SPECIFIC SWDA ROW BY GETTING ITS ID
Route::get("cbssVersion/{ID}/view", [CbssController::class,'cbssVersionShowID']); //WORKING GET SPECIFIC SWDA ROW BY GETTING ITS ID



Route::get("totalClientServed", [CbssController::class,'totalClientServed']); //TOTAL NUMBER OF CLIENT SERVED
Route::get("financialAmountGiven", [CbssController::class,'financialAmountGiven']); //TOTAL FINANCIAL AMOUNT GIVEN
Route::get("genderClientServed", [CbssController::class,'genderClientServed']); //GENDER OF CLIENTS SERVED
Route::get("modeOfAdmission", [CbssController::class,'modeOfAdmission']); //MODE OF ADMISSIONS
Route::get("numberCaseCategories", [CbssController::class,'numberCaseCategories']); //NUMBER OF CASE CATEGORIES
Route::get("numberNonMonetaryServices", [CbssController::class,'numberNonMonetaryServices']); //NUMBER OF NON MONETORY SERVICES
Route::get("clientsServedPerQuarter", [CbssController::class,'clientsServedPerQuarter']); //CLIENTS SERVED PER QUARTER
Route::get("clientServedPerAgeAndSex", [CbssController::class,'clientServedPerAgeAndSex']);  //CLIENTS SERVED PER AGE AND SEX
Route::get("financialAmountServed", [CbssController::class,'financialAmountServed']); //FINANCIAL AMOUNT SERVED
Route::get("subCategoriesServed", [CbssController::class,'subCategoriesServed']); //SUB CATEGORIES SERVED
Route::get("totalNumberOfClientServed", [CbssController::class,'totalNumberOfClientServed']); //TOTAL NUMBER OF CLIENT SERVED
Route::get("totalNumberOfCategoriesServed", [CbssController::class,'totalNumberOfCategoriesServed']); //TOTAL NUMBER OF CASE CATEGORIES SERVED
Route::get("subCategoriesServedChart", [CbssController::class,'subCategoriesServedChart']); // FOR CHARTJS COMPONENTS IN FRONTEND
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

Route::get("osdVersion", [OsdController::class,'osdVersion']); //WORKING GET ALL SWDA VERSION COLUMN AND ROW
Route::get("osdVersion/{ID}", [OsdController::class,'osdVersionShow']); //WORKING GET SPECIFIC SWDA ROW BY GETTING ITS ID
Route::get("osdVersion/{ID}/view", [OsdController::class,'osdVersionShowID']); //WORKING GET SPECIFIC SWDA ROW BY GETTING ITS ID

//*SPECIFICALLY USED FOR GETTING DATA FOR CHARTJS COMPONENTS IN FRONTEND
Route::get("employmentStatus", [OsdController::class,'employmentStatus']);
Route::get("employmentDetails", [OsdController::class,'employmentDetails']);
//! ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//! OSD API ROUTE START
//! ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



