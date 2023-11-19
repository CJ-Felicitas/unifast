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




}
