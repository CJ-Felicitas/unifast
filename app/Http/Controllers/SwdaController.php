<?php

namespace App\Http\Controllers;

use App\Models\Swda;
use Illuminate\Http\Request;
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
            'Type' => 'max:999',
            'Sector' => 'max:999',
            'Cluster' => 'max:999',
            'Agency' => 'max:999',
            'Address' => 'max:999',
            'Former_Name' => 'max:999',
            'Contact_Number' => 'max:999',
            'Fax' => 'max:999',
            'Email' => 'max:999',
            'Website' => 'max:999',
            'Contact_Person' => 'max:999',
            'Position' => 'max:999',
            'Mobile_Number' => 'max:999',
            'Registered' => 'max:999',
            'Licensed' => 'max:999',
            'Accredited' => 'max:999',
            'Services_Offered' => 'max:999',
            'Simplified_Services' => 'max:999',
            'Area_of_Operation' => 'max:999',
            'Regional_Operation' => 'max:999',
            'Specified_Areas_of_Operation' => 'max:999',
            'Mode_of_Delivery' => 'max:999',
            'Clientele' => 'max:999',
            'Registration_ID' => 'max:999',
            'Registration_Date' => 'max:999',
            'Registration_Expiration' => 'max:999',
            'Registration_Status' => 'max:999',
            'Licensed_ID' => 'max:999',
            'License_Date_Issued' => 'max:999',
            'License_Expiration' => 'max:999',
            'License_Status' => 'max:999',
            'Accreditation_ID' => 'max:999',
            'Accreditation_Date_Issued' => 'max:999',
            'Accreditation_Expiration' => 'max:999',
            'Accreditation_Status' => 'max:254',
            'Remarks' => 'max:999',
            'License_Days_Left' => 'integer',
            'Licensure_Overdue' => 'integer',
            'Accreditation_Days_Left' => 'integer',
            'Accreditation_Overdue' => 'integer',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->errors()
            ], 422);
        }
           // Create a new Swda record with all validated fields
        else{
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

    //EDIT SWDA SPECICIC ROW
    function swdaUpdate(Request $request, int $ID) {
        $validator = Validator::make($request->all(), [
            'Type' => 'max:999',
            'Sector' => 'max:999',
            'Cluster' => 'max:999',
            'Agency' => 'max:999',
            'Address' => 'max:999',
            'Former_Name' => 'max:999',
            'Contact_Number' => 'max:999',
            'Fax' => 'max:999',
            'Email' => 'max:999',
            'Website' => 'max:999',
            'Contact_Person' => 'max:999',
            'Position' => 'max:999',
            'Mobile_Number' => 'max:999',
            'Registered' => 'max:999',
            'Licensed' => 'max:999',
            'Accredited' => 'max:999',
            'Services_Offered' => 'max:999',
            'Simplified_Services' => 'max:999',
            'Area_of_Operation' => 'max:999',
            'Regional_Operation' => 'max:999',
            'Specified_Areas_of_Operation' => 'max:999',
            'Mode_of_Delivery' => 'max:999',
            'Clientele' => 'max:999',
            'Registration_ID' => 'max:999',
            'Registration_Date' => 'max:999',
            'Registration_Expiration' => 'max:999',
            'Registration_Status' => 'max:999',
            'Licensed_ID' => 'max:999',
            'License_Date_Issued' => 'max:999',
            'License_Expiration' => 'max:999',
            'License_Status' => 'max:999',
            'Accreditation_ID' => 'max:999',
            'Accreditation_Date_Issued' => 'max:999',
            'Accreditation_Expiration' => 'max:999',
            'Accreditation_Status' => 'max:254',
            'Remarks' => 'max:999',
            'License_Days_Left' => 'integer',
            'Licensure_Overdue' => 'integer',
            'Accreditation_Days_Left' => 'integer',
            'Accreditation_Overdue' => 'integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->errors()
            ], 422);
        }

        $Swda = Swda::find($ID);

        if (!$Swda) {
            return response()->json([
                'status' => 404,
                'message' => "No Data Found!"
            ], 404);
        }

        try {
            // Update the record with the request data
            $Swda->update($request->all());

            return response()->json([
                'status' => 200,
                'message' => 'Swda record updated successfully',
                'data' => $Swda // Return the updated record
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => 'Error updating Swda record: ' . $e->getMessage()
            ], 500);
        }
    }

    //DELETE SWDA SPECICIC ROW
    function swdaDestroy($ID) {
        $swda = Swda::find($ID);

        if ($swda) {
            $swda->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Swda record deleted successfully'
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => "No Data Found!"
            ], 404);
        }
    }



    // THIS FUNCTIONS ARE USED FOR GETTING DATA FOR SELECTED TABLE COLOUMN SPECIFICALLY USED FOR VISUALIZATION ONLY
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




}
