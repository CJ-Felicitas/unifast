<?php

namespace App\Http\Controllers;

use App\Models\Swda;
use App\Models\SwdaVersion;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SwdaController extends Controller
{

    // GET ALL OF THE TABLE COLUMNS IN SWDA TABLE
    function swdaIndex(){
        $Swda = Swda::all();
        if($Swda->count() > 0){
            return response()->json([
                'status' => 200,
                'Swda' =>  $Swda
            ], 200);
        }
        else{
            return response()->json([
                'status' => 404,
                'Swda' =>  'No Record Found'
            ], 404);
        }
    }

    // STORE INPUT IN ALL OF THE TABLE COLUMNS IN SWDA TABLE
    function swdaStore(Request $request) {
        $validator = Validator::make($request->all(), [
            'Type' => 'max:254',
            'Sector' => 'max:254',
            'Cluster' => 'max:254',
            'Agency' => 'max:254',
            'Address' => 'max:254',
            'Former_Name' => 'max:254',
            'Contact_Number' => 'max:254',
            'Fax' => 'max:254',
            'Email' => 'max:254',
            'Website' => 'max:254',
            'Contact_Person' => 'max:254',
            'Position' => 'max:254',
            'Mobile_Number' => 'max:254',
            'Registered' => 'max:254',
            'Licensed' => 'max:254',
            'Accredited' => 'max:254',
            'Services_Offered' => 'max:254',
            'Simplified_Services' => 'max:254',
            'Area_of_Operation' => 'max:254',
            'Regional_Operation' => 'max:254',
            'Specified_Areas_of_Operation' => 'max:254',
            'Mode_of_Delivery' => 'max:254',
            'Clientele' => 'max:254',
            'Registration_ID' => 'max:254',
            'Registration_Date' => 'max:254',
            'Registration_Expiration' => 'max:254',
            'Registration_Status' => 'max:254',
            'Licensed_ID' => 'max:254',
            'License_Date_Issued' => 'max:254',
            'License_Expiration' => 'max:254',
            'License_Status' => 'max:254',
            'Accreditation_ID' => 'max:254',
            'Accreditation_Date_Issued' => 'max:254',
            'Accreditation_Expiration' => 'max:254',
            'Accreditation_Status' => 'max:254',
            'Remarks' => 'max:254',
            'responsible_admin' => 'max:254',
            // 'License_Days_Left' => 'integer',
            // 'Licensure_Overdue' => 'integer',
            // 'Accreditation_Days_Left' => 'integer',
            // 'Accreditation_Overdue' => 'integer',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->errors()
            ], 422);
        }

        else{

            // Calculate the days left and overdue
            $licenseDaysLeft = Carbon::now()->diffInDays(Carbon::parse($request->License_Expiration), false);
            $licensureOverdue = $licenseDaysLeft < 0 ? abs($licenseDaysLeft) : 0;
            $accreditationDaysLeft = Carbon::now()->diffInDays(Carbon::parse($request->Accreditation_Expiration), false);
            $accreditationOverdue = $accreditationDaysLeft < 0 ? abs($accreditationDaysLeft) : 0;

            // Add the calculated fields to the request data
            $request->merge([
                'License_Days_Left' => $licenseDaysLeft > 0 ? $licenseDaysLeft : 0,
                'Licensure_Overdue' => $licensureOverdue,
                'Accreditation_Days_Left' => $accreditationDaysLeft > 0 ? $accreditationDaysLeft : 0,
                'Accreditation_Overdue' => $accreditationOverdue,
            ]);

            // Create a new Swda record with all validated fields
            $Swda = Swda::create($request->all());

            return response()->json([
                'status' => 200,
                'message' => 'Swda record created successfully',
                'data' => $Swda
            ], 200);
        }
    }

    //FIND SWDA RECORD THROUGH ITS ID
    function swdaShow($ID){
        $swda = Swda::find($ID);
        if($swda){
            return response()->json([
                'status' => 200,
                'message' => 'Swda record found!',
                'data' => $swda  // Use lowercase $swda here
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
    function swdaEdit($ID){
        $swda = Swda::find($ID);
        if($swda){
            return response()->json([
                'status' => 200,
                'message' => 'Swda record found!',
                'Swda' => $swda  // Use lowercase $swda here
            ], 200);
        }
        else {
            return response()->json([
                'status' => 404,
                'message' => "No Data Found!"
            ], 404);
        }
    }

    // UPDATE SWDA SPECIFIC ROW
    function swdaUpdate(Request $request, int $ID) {
        $validator = Validator::make($request->all(), [
            'Type' => 'max:254',
            'Sector' => 'max:254',
            'Cluster' => 'max:254',
            'Agency' => 'max:254',
            'Address' => 'max:254',
            'Former_Name' => 'max:254',
            'Contact_Number' => 'max:254',
            'Fax' => 'max:254',
            'Email' => 'max:254',
            'Website' => 'max:254',
            'Contact_Person' => 'max:254',
            'Position' => 'max:254',
            'Mobile_Number' => 'max:254',
            'Registered' => 'max:254',
            'Licensed' => 'max:254',
            'Accredited' => 'max:254',
            'Services_Offered' => 'max:254',
            'Simplified_Services' => 'max:254',
            'Area_of_Operation' => 'max:254',
            'Regional_Operation' => 'max:254',
            'Specified_Areas_of_Operation' => 'max:254',
            'Mode_of_Delivery' => 'max:254',
            'Clientele' => 'max:254',
            'Registration_ID' => 'max:254',
            'Registration_Date' => 'max:254',
            'Registration_Expiration' => 'max:254',
            'Registration_Status' => 'max:254',
            'Licensed_ID' => 'max:254',
            'License_Date_Issued' => 'max:254',
            'License_Expiration' => 'max:254',
            'License_Status' => 'max:254',
            'Accreditation_ID' => 'max:254',
            'Accreditation_Date_Issued' => 'max:254',
            'Accreditation_Expiration' => 'max:254',
            'Accreditation_Status' => 'max:254',
            'Remarks' => 'max:254',
            'License_Days_Left' => 'integer',
            'Licensure_Overdue' => 'integer',
            'Accreditation_Days_Left' => 'integer',
            'Accreditation_Overdue' => 'integer',
            'responsible_admin' => 'max:254',
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

            $Swda = Swda::find($ID);

            if (!$Swda) {
                return response()->json([
                    'status' => 404,
                    'message' => "No Data Found!"
                ], 404);
            }

            // Store the current version before updating
            $oldSwda = $Swda->toArray();

            // Update the record with the request data
            $Swda->fill($request->all()); // Fill the model attributes
            $Swda->save(); // Save the updated data

            // ! NEED FURTHER TESTING FOR THIS PART OF THE CODE
            // // Compare the previous and updated versions
            // $newSwda = $Swda->toArray();
            // $changes = [];

            // foreach ($oldSwda as $key => $value) {
            //     if ($value !== $newSwda[$key]) {
            //         $changes[$key] = ['old' => $value, 'new' => $newSwda[$key]];
            //     }
            // }

            // // Now $changes contains the keys of all edited columns and their old and new values

            // //  store $changes in the version control table
            // SwdaVersion::create([
            //     // ...
            //     'changes' => json_encode($changes),
            //     // ...
            // ]);
            // ! NEED FURTHER TESTING FOR THIS PART OF THE CODE

            // Store the previous and updated versions in the version control table which is the swda_versions
            SwdaVersion::create([
                'swda_id' => $ID,
                'Type' => $oldSwda['Type'],
                'Sector' => $oldSwda['Sector'],
                'Cluster' => $oldSwda['Cluster'],
                'Agency' => $oldSwda['Agency'],
                'Address' => $oldSwda['Address'],
                'Former_Name' => $oldSwda['Former_Name'],
                'Contact_Number' => $oldSwda['Contact_Number'],
                'Fax' => $oldSwda['Fax'],
                'Email' => $oldSwda['Email'],
                'Website' => $oldSwda['Website'],
                'Contact_Person' => $oldSwda['Contact_Person'],
                'Position' => $oldSwda['Position'],
                'Mobile_Number' => $oldSwda['Mobile_Number'],
                'Registered' => $oldSwda['Registered'],
                'Licensed' => $oldSwda['Licensed'],
                'Accredited' => $oldSwda['Accredited'],
                'Services_Offered' => $oldSwda['Services_Offered'],
                'Simplified_Services' => $oldSwda['Simplified_Services'],
                'Area_of_Operation' => $oldSwda['Area_of_Operation'],
                'Regional_Operation' => $oldSwda['Regional_Operation'],
                'Specified_Areas_of_Operation' => $oldSwda['Specified_Areas_of_Operation'],
                'Mode_of_Delivery' => $oldSwda['Mode_of_Delivery'],
                'Clientele' => $oldSwda['Clientele'],
                'Registration_ID' => $oldSwda['Registration_ID'],
                'Registration_Date' => $oldSwda['Registration_Date'],
                'Registration_Expiration' => $oldSwda['Registration_Expiration'],
                'Registration_Status' => $oldSwda['Registration_Status'],
                'Licensed_ID' => $oldSwda['Licensed_ID'],
                'License_Date_Issued' => $oldSwda['License_Date_Issued'],
                'License_Expiration' => $oldSwda['License_Expiration'],
                'License_Status' => $oldSwda['License_Status'],
                'Accreditation_ID' => $oldSwda['Accreditation_ID'],
                'Accreditation_Date_Issued' => $oldSwda['Accreditation_Date_Issued'],
                'Accreditation_Expiration' => $oldSwda['Accreditation_Expiration'],
                'Accreditation_Status' => $oldSwda['Accreditation_Status'],
                'Remarks' => $oldSwda['Remarks'],
                'License_Days_Left' => $oldSwda['License_Days_Left'],
                'Licensure_Overdue' => $oldSwda['Licensure_Overdue'],
                'Accreditation_Days_Left' => $oldSwda['Accreditation_Days_Left'],
                'Accreditation_Overdue' => $oldSwda['Accreditation_Overdue'],
                'responsible_admin' => $oldSwda['responsible_admin'],

                // Map other columns accordingly
                'previous_version' => json_encode($oldSwda),
                'updated_version' => json_encode($Swda->toArray())
                // Other necessary fields like timestamps, user ID, etc.
            ]);

            // Commit the transaction
            DB::commit();

            return response()->json([
                'status' => 200,
                'message' => 'Swda record updated successfully',
                'data' => $Swda // Return the updated record
            ], 200);
        } catch (\Exception $e) {
            // Rollback the transaction in case of an error
            DB::rollback();

            return response()->json([
                'status' => 500,
                'message' => 'Error updating Swda record: ' . $e->getMessage()
            ], 500);
        }
    }

    //ARCHIVE SWDA SPECICIC ROW
    function swdaArchive($ID) {
        $swda = Swda::find($ID);

        if ($swda) {
            $swda->delete(); // This line will perform a soft delete
            return response()->json([
                'status' => 200,
                'message' => 'Swda record archived successfully'
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => "No Data Found!"
            ], 404);
        }
    }

    //FIND SWDA ARCHIVE RECORD THROUGH ITS ID
    function swdaArchiveFind($ID){
        $swda = Swda::onlyTrashed()->find($ID);
        if($swda){
            return response()->json([
                'status' => 200,
                'message' => 'Swda archive record found!',
                'data' => $swda
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
    function swdaGetArchived() {
        $onlySoftDeletedRecords = Swda::onlyTrashed()->get(); // Execute the query to retrieve records
        if ($onlySoftDeletedRecords->count() > 0) {
            return response()->json([
                'status' => 200,
                'ArchivedSwda' => $onlySoftDeletedRecords
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'ArchivedSwda' => 'No Record Found'
            ], 404);
        }
    }

    //RESTORE SPECIFIC ARCHIVE DATA
    function swdaRestore($ID){
        $swda = Swda::withTrashed()->find($ID);

        if ($swda) {
            $swda->restore(); // This line will restore the specific ID from archived to active data
            return response()->json([
                'status' => 200,
                'message' => 'Swda archived restored successfully'
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => "No Data Found! No Data to be Restored!"
            ], 404);
        }
    }

    // GET ALL OF THE TABLE COLUMNS IN SWDA VERSION TABLE
    function swdaVersion(){
            $Swda = SwdaVersion::all();
            if($Swda->count() > 0){
                return response()->json([
                    'status' => 200,
                    'Swda' =>  $Swda
                ], 200);
            }
            else{
                return response()->json([
                    'status' => 404,
                    'Swda' =>  'No Record Found'
                ], 404);
            }
    }

    //FIND SWDA VERSION RECORD THROUGH ITS ID
    function swdaVersionShowID($ID){
        $swda = SwdaVersion::find($ID);
        if($swda){
            return response()->json([
                'status' => 200,
                'message' => 'Swda Version History record found!',
                'Swda' => $swda
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
    function swdaVersionShow($swda_id){
        $swda = SwdaVersion::where('swda_id', $swda_id)->get();
        if($swda->isNotEmpty()){
            return response()->json([
                'status' => 200,
                'message' => 'Swda Version History record found!',
                'SwdaEditHistory' => $swda
            ], 200);
        }
        else {
            return response()->json([
                'status' => 404,
                'message' => "No Data Found!"
            ], 404);
        }
    }




    //! THIS FUNCTIONS ARE USED FOR GETTING DATA FOR SELECTED TABLE COLOUMN SPECIFICALLY USED FOR VISUALIZATION ONLY
    //! THIS FUNCTIONS ARE USED FOR GETTING DATA FOR SELECTED TABLE COLOUMN SPECIFICALLY USED FOR VISUALIZATION ONLY
    //! THIS FUNCTIONS ARE USED FOR GETTING DATA FOR SELECTED TABLE COLOUMN SPECIFICALLY USED FOR VISUALIZATION ONLY
    function cluster(){
        return Swda::select('Cluster')->get();
    }
    function modeDelivery(){
        return Swda::select('Mode_of_Delivery', 'Registration_Status')->get();
    }
    function sector(){
        return Swda::select('Sector')->get();
    }
    function clientele(){
        return Swda::select('Clientele')->get();
    }
    function regionaloperation(){
        return Swda::select('Regional_Operation')->get();
    }
    function agencies(){
        return Swda::select('Registration_Status', 'Registered', 'Licensed', 'Accredited', 'Mode_of_Delivery')->get();
    }
    function agenciesName(){
        $Swda = Swda::select('Agency',  'Registration_Status', 'License_Status', 'Accreditation_Status','Sector', 'Cluster', 'Type', 'Address', 'Contact_Number', 'Email', 'Website', 'Contact_Person', 'Position', 'Mobile_Number', 'Services_Offered', 'Clientele', 'Mode_of_Delivery', 'Specified_Areas_of_Operation', 'Registration_ID', 'Registration_Date', 'Registration_Expiration', 'Remarks', 'Licensed_ID', 'License_Date_Issued', 'License_Expiration', 'Licensure_Overdue', 'Accreditation_ID', 'Accreditation_Date_Issued', 'Accreditation_Expiration',  'Accreditation_Overdue')->get();
        if($Swda->count() > 0){
            return response()->json([
                'status' => 200,
                'Swda Agencies' =>  $Swda
            ], 200);
        }
        else{
            return response()->json([
                'status' => 404,
                'Swda Agencies' =>  'No Record Found'
            ], 404);
        }
    }
    //! THIS FUNCTIONS ARE USED FOR GETTING DATA FOR SELECTED TABLE COLOUMN SPECIFICALLY USED FOR VISUALIZATION ONLY
    //! THIS FUNCTIONS ARE USED FOR GETTING DATA FOR SELECTED TABLE COLOUMN SPECIFICALLY USED FOR VISUALIZATION ONLY
    //! THIS FUNCTIONS ARE USED FOR GETTING DATA FOR SELECTED TABLE COLOUMN SPECIFICALLY USED FOR VISUALIZATION ONLY



}
