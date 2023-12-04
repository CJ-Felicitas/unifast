<?php

namespace App\Http\Controllers;

use App\Models\Hr;
use App\Models\HrVersion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class HrController extends Controller
{

    // GET ALL OF THE TABLE COLUMNS IN HR TABLE
    function hrIndex(){
        $Hr = Hr::all();
        if($Hr->count() > 0){
            return response()->json([
                'status' => 200,
                'Hr' =>  $Hr
            ], 200);
        }
        else{
            return response()->json([
                'status' => 404,
                'Hr' =>  'No Record Found'
            ], 404);
        }
    }

    // STORE INPUT IN ALL OF THE TABLE COLUMNS IN HR TABLE
    function hrStore(Request $request) {
        $validator = Validator::make($request->all(), [
            'request_date' => 'max:254',
            'requesting_employee_name' => 'max:254',
            'employee_position' => 'max:254',
            'employment_status' => 'max:254',
            'office_unit' => 'max:254',
            'request_category' => 'max:254',
            'brief_interview' => 'max:254',
            'remarks' => 'max:254',
            'assistance_provided' => 'max:254',
        ]);


        // Check if validation fails
        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->errors()
            ], 422);
        }
           // Create a new HR record with all validated fields
        else{
            $Hr = Hr::create($request->all());

            return response()->json([
                'status' => 200,
                'message' => 'HR record created successfully',
                'data' => $Hr
            ], 200);
        }
    }

    //FIND HR RECORD THROUGH ITS ID
    function hrShow($ID){
        $Hr = Hr::find($ID);
        if($Hr){
            return response()->json([
                'status' => 200,
                'message' => 'Hr record found!',
                'data' => $Hr
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
    function hrEdit($ID){
        $Hr = Hr::find($ID);
        if($Hr){
            return response()->json([
                'status' => 200,
                'message' => 'Hr record found!',
                'Hr' => $Hr
            ], 200);
        }
        else {
            return response()->json([
                'status' => 404,
                'message' => "No Data Found!"
            ], 404);
        }
    }

    // UPDATE HR SPECICIC ROW
    function hrUpdate(Request $request, int $ID) {
        $validator = Validator::make($request->all(), [
            'request_date' => 'max:254',
            'requesting_employee_name' => 'max:254',
            'employee_position' => 'max:254',
            'employment_status' => 'max:254',
            'office_unit' => 'max:254',
            'request_category' => 'max:254',
            'brief_interview' => 'max:254',
            'remarks' => 'max:254',
            'assistance_provided' => 'max:254',
            'quantity_unit' => 'max:254',
            'date_received' => 'max:254',

        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            // Begin a transaction
            DB::beginTransaction();

            $Hr = Hr::find($ID);

            if (!$Hr) {
                return response()->json([
                    'status' => 404,
                    'message' => "No Data Found!"
                ], 404);
            }

            // Store the current version before updating
            $oldHr = $Hr->toArray();

            // Update the record with the request data
            $Hr->fill($request->all()); // Fill the model attributes
            $Hr->save(); // Save the updated data

            // Store the previous and updated versions in the version control table which is the hr_versions
            HrVersion::create([
                'hr_id' => $ID,
                'request_date' => $oldHr['request_date'],
                'requesting_employee_name' => $oldHr['requesting_employee_name'],
                'employee_position' => $oldHr['employee_position'],
                'employment_status' => $oldHr['employment_status'],
                'office_unit' => $oldHr['office_unit'],
                'request_category' => $oldHr['request_category'],
                'brief_interview' => $oldHr['brief_interview'],
                'remarks' => $oldHr['remarks'],
                'assistance_provided' => $oldHr['assistance_provided'],
                'quantity_unit' => $oldHr['quantity_unit'],
                'date_received' => $oldHr['date_received'],

                // Map other columns accordingly
                'previous_version' => json_encode($oldHr),
                'updated_version' => json_encode($Hr->toArray())
                // Other necessary fields like timestamps, user ID, etc.
            ]);

            // Commit the transaction
            DB::commit();

            return response()->json([
                'status' => 200,
                'message' => 'Hr record updated successfully',
                'data' => $Hr // Return the updated record
            ], 200);
        } catch (\Exception $e) {
            // Rollback the transaction in case of an error
            DB::rollback();

            return response()->json([
                'status' => 500,
                'message' => 'Error updating Hr record: ' . $e->getMessage()
            ], 500);
        }
    }

   //ARCHIVE HR SPECICIC ROW
   function hrArchive($ID) {
    $Hr = Hr::find($ID);

    if ($Hr) {
        $Hr->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Hr record deleted successfully'
        ], 200);
    } else {
        return response()->json([
            'status' => 404,
            'message' => "No Data Found!"
        ], 404);
    }
    }

    //FIND HR ARCHIVE RECORD THROUGH ITS ID
    function hrArchiveFind($ID){
        $hr = Hr::onlyTrashed()->find($ID);
        if($hr){
            return response()->json([
                'status' => 200,
                'message' => 'Hr archive record found!',
                'data' => $hr
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
    function hrGetArchived() {
        $onlySoftDeletedRecords = Hr::onlyTrashed()->get(); // Execute the query to retrieve records
        if ($onlySoftDeletedRecords->count() > 0) {
            return response()->json([
                'status' => 200,
                'ArchivedHr' => $onlySoftDeletedRecords
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'ArchivedHr' => 'No Record Found'
            ], 404);
        }
    }

    //RESTORE SPECIFIC ARCHIVE DATA
    function hrRestore($ID){
        $hr = Hr::withTrashed()->find($ID);

        if ($hr) {
            $hr->restore(); // This line will restore the specific ID from archived to active data
            return response()->json([
                'status' => 200,
                'message' => 'Hr archived restored successfully'
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => "No Data Found! No Data to be Restored!"
            ], 404);
        }
    }

    // ! NOT YET IMPLEMENTED VERSION CONTROL HR
    // ! NOT YET IMPLEMENTED VERSION CONTROL HR
    // ! NOT YET IMPLEMENTED VERSION CONTROL HR
    // // GET ALL OF THE TABLE COLUMNS IN SWDA VERSION TABLE
    function hrVersion(){
        $Hr = HrVersion::all();
        if($Hr->count() > 0){
            return response()->json([
                'status' => 200,
                'Hr' =>  $Hr
            ], 200);
        }
        else{
            return response()->json([
                'status' => 404,
                'Hr' =>  'No Record Found'
            ], 404);
        }
    }


        //FIND SWDA VERSION RECORD THROUGH ITS ID
        function hrVersionShowID($ID){
            $hr = HrVersion::find($ID);
            if($hr){
                return response()->json([
                    'status' => 200,
                    'message' => 'Hr Version History record found!',
                    'Hr' => $hr
                ], 200);
            }
            else {
                return response()->json([
                    'status' => 404,
                    'message' => "No Data Found!"
                ], 404);
            }
        }


        //FIND SWDA VERSION RECORD THROUGH ITS SWDA_ID
        function hrVersionShow($hr_id){
            $hr = HrVersion::where('hr_id', $hr_id)->get();
            if($hr->isNotEmpty()){
                return response()->json([
                    'status' => 200,
                    'message' => 'Hr Version History record found!',
                    'HrEditHistory' => $hr
                ], 200);
            }
            else {
                return response()->json([
                    'status' => 404,
                    'message' => "No Data Found!"
                ], 404);
            }
        }

    // ! NOT YET IMPLEMENTED VERSION CONTROL HR
    // ! NOT YET IMPLEMENTED VERSION CONTROL HR
    // ! NOT YET IMPLEMENTED VERSION CONTROL HR










}
