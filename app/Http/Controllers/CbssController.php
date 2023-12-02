<?php

namespace App\Http\Controllers;

use App\Models\Cbss;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CbssController extends Controller
{
       // GET ALL OF THE TABLE COLUMNS IN CBSS TABLE
       function cbssIndex(){
        $Cbss = Cbss::all();
        if($Cbss->count() > 0){
            return response()->json([
                'status' => 200,
                'Cbss' =>  $Cbss
            ], 200);
        }
        else{
            return response()->json([
                'status' => 404,
                'Cbss' =>  'No Record Found'
            ], 404);
        }
    }

    // STORE INPUT IN ALL OF THE TABLE COLUMNS IN CBSS TABLE
    function cbssStore(Request $request) {
        $validator = Validator::make($request->all(), [
            // ! NEED TO INPUT VALIDATOR
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->errors()
            ], 422);
        }
           // Create a new Cbss record with all validated fields
        else{
            $Cbss = Cbss::create($request->all());

            return response()->json([
                'status' => 200,
                'message' => 'Cbss record created successfully',
                'data' => $Cbss
            ], 200);
        }
    }

    //FIND CBSS RECORD THROUGH ITS ID
    function cbssShow($ID){
        $Cbss = Cbss::find($ID);
        if($Cbss){
            return response()->json([
                'status' => 200,
                'message' => 'Cbss record found!',
                'data' => $Cbss  // Return the record found
            ], 200);
        }
        else {
            return response()->json([
                'status' => 404,
                'message' => "No Data Found!"
            ], 404);
        }
    }

    //GET SPECIFIC ROW BUT USE FOR TESTING FOR PUT METHOD
    function cbssEdit($ID){
        $Cbss = Cbss::find($ID);
        if($Cbss){
            return response()->json([
                'status' => 200,
                'message' => 'Cbss record found!',
                'Cbss' => $Cbss
            ], 200);
        }
        else {
            return response()->json([
                'status' => 404,
                'message' => "No Data Found!"
            ], 404);
        }
    }

    //EDIT CBSS SPECICIC ROW
    function cbssUpdate(Request $request, int $ID) {
        $validator = Validator::make($request->all(), [
            // ! NEED TO INPUT VALIDATOR
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->errors()
            ], 422);
        }

        $Cbss = Cbss::find($ID);

        if (!$Cbss) {
            return response()->json([
                'status' => 404,
                'message' => "No Data Found!"
            ], 404);
        }

        try {
            // Update the record with the request data
            $Cbss->update($request->all());

            return response()->json([
                'status' => 200,
                'message' => 'Cbss record updated successfully',
                'data' => $Cbss // Return the updated record
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => 'Error updating Cbss record: ' . $e->getMessage()
            ], 500);
        }
    }

    //ARHIVE CBSS SPECICIC ROW
    function cbssArchive($ID) {
        $Cbss = Cbss::find($ID);

        if ($Cbss) {
            $Cbss->delete(); // This line will perform a soft delete
            return response()->json([
                'status' => 200,
                'message' => 'Cbss record archived successfully'
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => "No Data Found!"
            ], 404);
        }
    }


    //FIND CBSS ARCHIVE RECORD THROUGH ITS ID
    function cbssArchiveFind($ID){
        $Cbss = Cbss::onlyTrashed()->find($ID);
        if($Cbss){
            return response()->json([
                'status' => 200,
                'message' => 'Cbss archive record found!',
                'data' => $Cbss
            ], 200);
        }
        else {
            return response()->json([
                'status' => 404,
                'message' => "No Data Found!"
            ], 404);
        }
    }


    //GET ALL ARCHIVED DATA
    function cbssGetArchived() {
        $onlySoftDeletedRecords = Cbss::onlyTrashed()->get(); // Execute the query to retrieve records
        if ($onlySoftDeletedRecords->count() > 0) {
            return response()->json([
                'status' => 200,
                'ArchivedCbss' => $onlySoftDeletedRecords
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'ArchivedCbss' => 'No Record Found'
            ], 404);
        }
    }

    //RESTORE SPECIFIC ARCHIVE DATA
    function cbssRestore($ID){
        $Cbss = Cbss::withTrashed()->find($ID);

        if ($Cbss) {
            $Cbss->restore(); // This line will restore the specific ID from archived to active data
            return response()->json([
                'status' => 200,
                'message' => 'Cbss archived restored successfully'
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => "No Data Found! No Data to be Restored!"
            ], 404);
        }
    }






    function totalClientServed(){
        $Cbss = Cbss::select('ID', 'NAME')->get();
        if($Cbss->count() > 0){
            return response()->json([
                'status' => 200,
                'Cbss' =>  $Cbss
            ], 200);
        }
        else{
            return response()->json([
                'status' => 404,
                'Cbss' =>  'No Record Found'
            ], 404);
        }
    }

    function financialAmountGiven(){
        $totalAmount = Cbss::sum('AMOUNT');

        if($totalAmount > 0){
            return response()->json([
                'status' => 200,
                'totalAmount' =>  $totalAmount
            ], 200);
        }
        else{
            return response()->json([
                'status' => 404,
                'message' =>  'No Record Found'
            ], 404);
        }
    }


    function genderClientServed(){
        $Cbss = Cbss::select('ID', 'SEX')->get();
        if($Cbss->count() > 0){
            return response()->json([
                'status' => 200,
                'Sex' =>  $Cbss
            ], 200);
        }
        else{
            return response()->json([
                'status' => 404,
                'Sex' =>  'No Record Found'
            ], 404);
        }
    }


    function modeOfAdmission(){
        $Cbss = Cbss::select('ID', 'MODE_OF_ADMISSION')->get();
        if($Cbss->count() > 0){
            return response()->json([
                'status' => 200,
                'ModeOfAdmission' =>  $Cbss
            ], 200);
        }
        else{
            return response()->json([
                'status' => 404,
                'ModeOfAdmission' =>  'No Record Found'
            ], 404);
        }
    }


    function numberCaseCategories(){
        $Cbss = Cbss::select('ID', 'CASE_CATEGORY')->get();
        if($Cbss->count() > 0){
            return response()->json([
                'status' => 200,
                'NumberCaseCategories' =>  $Cbss
            ], 200);
        }
        else{
            return response()->json([
                'status' => 404,
                'NumberCaseCategories' =>  'No Record Found'
            ], 404);
        }
    }

    function numberNonMonetaryServices(){
        $Cbss = Cbss::select('ID', 'NON_MONETARY_SERVICES')->get();
        if($Cbss->count() > 0){
            return response()->json([
                'status' => 200,
                'NumberNonMonetaryServices' =>  $Cbss
            ], 200);
        }
        else{
            return response()->json([
                'status' => 404,
                'NumberNonMonetaryServices' =>  'No Record Found'
            ], 404);
        }
    }



    function clientsServedPerQuarter(){
        $Cbss = Cbss::select('ID', 'DATE')->get();

        if($Cbss->count() > 0){
            $quarters = ['Quarter1' => 0, 'Quarter2' => 0, 'Quarter3' => 0, 'Quarter4' => 0];

            foreach ($Cbss as $client) {
                $month = date('n', strtotime($client->DATE));
                $quarter = 'Quarter' . ceil($month / 3);
                $quarters[$quarter]++;
            }

            return response()->json([
                'status' => 200,
                'clientsServedPerQuarter' =>  $quarters
            ], 200);
        }
        else{
            return response()->json([
                'status' => 404,
                'clientsServedPerQuarter' =>  'No Record Found'
            ], 404);
        }
    }


    function clientServedPerAgeAndSex(){
        $Cbss = Cbss::select('ID', 'SEX', 'AGE')->get();

        if($Cbss->count() > 0){
            $ageGroups = [
                'AGE:0-4' => range(0, 4),
                'AGE:5-17' => range(5, 17),
                'AGE:18-28' => range(18, 28),
                'AGE:29-39' => range(29, 39),
                'AGE:40-50' => range(40, 50),
                'AGE:51-61' => range(51, 61),
                'AGE:61 and Above' => range(62, 150)
            ];

            $result = ['MALE' => [], 'FEMALE' => [], 'NULL' => []];

            foreach ($ageGroups as $ageGroup => $ages) {
                $result['MALE'][$ageGroup] = 0;
                $result['FEMALE'][$ageGroup] = 0;
                $result['NULL'][$ageGroup] = 0;
            }

            foreach ($Cbss as $client) {
                $sex = $client->SEX ? $client->SEX : 'NULL';
                foreach ($ageGroups as $ageGroup => $ages) {
                    if (in_array($client->AGE, $ages)) {
                        $result[$sex][$ageGroup]++;
                    }
                }
            }

            return response()->json([
                'status' => 200,
                'clientServedPerAgeAndSex' =>  $result
            ], 200);
        }
        else{
            return response()->json([
                'status' => 404,
                'clientServedPerAgeAndSex' =>  'No Record Found'
            ], 404);
        }
    }


    function financialAmountServed(){
        $Cbss = Cbss::select('ID', 'CASE_CATEGORY', 'AMOUNT')->get();
        if($Cbss->count() > 0){
            return response()->json([
                'status' => 200,
                'FinancialAmountServed' =>  $Cbss
            ], 200);
        }
        else{
            return response()->json([
                'status' => 404,
                'FinancialAmountServed' =>  'No Record Found'
            ], 404);
        }
    }


}
