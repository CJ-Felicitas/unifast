<?php

namespace App\Http\Controllers;

use App\Models\Hr;
use Illuminate\Http\Request;
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
            'NO' => 'max:999',
            'DIVISION' => 'max:999',
            'SECTION/UNIT' => 'max:999',
            'OFFICE_LOCATION' => 'max:999',
            'ITEM_NUMBER' => 'max:999',
            'DATE_POSITION' => 'max:999',
            'POSITION_TITLE' => 'max:999',
            'PARENTHETICAL_TITLE' => 'max:999',
            'POSITION_LEVEL' => 'max:999',
            'SG' => 'max:999',
            'SALARY_STEP_INCREMENT' => 'max:999',
            'MONTHLY_RATE' => 'max:999',
            'DESIGNATION' => 'max:999',
            'DATE_OF_DESIGNATION' => 'max:999',
            'SPECIAL_ORDER_NO.' => 'max:999',
            'OFFICE_BUREAU_SERVICE_PROGRAM' => 'max:999',
            'FUND_SOURCE_FOR_CONTRACTUAL' => 'max:999',
            'EMPLOYMENT_STATUS' => 'max:999',
            'STATUS_FILLED_UNFILLED' => 'max:999',
            'MODE_OF_ACCESSION' => 'max:999',
            'DATE_FILLED_UP_ASSUMPTION' => 'max:999',
            'FULL_NAME' => 'max:999',
            'LASTNAME' => 'max:999',
            'FIRST_NAME' => 'max:999',
            'MIDDLE_NAME' => 'max:999',
            'EXT.' => 'max:999',
            'DATE_OF_ORIGINAL_APPOINTMENT' => 'max:999',
            'DATE_OF_LAST_PROMOTION' => 'max:999',
            'ENTRY_DATE_IN_DSWD' => 'max:999',
            'ELIGIBILITY_CSC_and_other_eligibilities' => 'max:999',
            'ELIGIBILITY_License_RA_1080' => 'max:999',
            'LICENSE' => 'max:999',
            'HIGHEST_LVL_OF_ELIGIBILITY_1ST_AND_2ND' => 'max:999',
            'HIGHEST_EDUCATION_COMPLETED' => 'max:999',
            'DEGREE_AND_COURSE_1st_Course_Vocational' => 'max:999',
            'DEGREE_AND_COURSE_2nd Course' => 'max:999',
            'OTHER_COURSE' => 'max:999',
            'MASTERS_OR_DOCTORAL_DEGREE' => 'max:999',
            'GENDER' => 'max:999',
            'DATE_OF_BIRTH' => 'max:999',
            'AGE' => 'max:999',
            'CIVIL_STATUS' => 'max:999',
            'STREET_Current' => 'max:999',
            'PUROK/SUBDIVISION_Current' => 'max:999',
            'BARANGAY_Current' => 'max:999',
            'CITY/MUNICIPALITY_Current' => 'max:999',
            'PROVINCE_Current' => 'max:999',
            'PERMANENT_ADDRESS' => 'max:999',
            'PERMANENT_ADDRESS_Street' => 'max:999',
            'PERMANENT_ADDRESS_Purok' => 'max:999',
            'PERMANENT_ADDRESS_Subdivision_Community_Village' => 'max:999',
            'PERMANENT_ADDRESS_Barangay' => 'max:999',
            'PERMANENT_ADDRESS_Region' => 'max:999',
            'PERMANENT_ADDRESS_City_Municipality' => 'max:999',
            'PERMANENT_ADDRESS_Province' => 'max:999',
            'BD' => 'max:999',
            'INDICATE_WHETHER_SOLO_PARENT' => 'max:999',
            'INDICATE_WHETHER_SENIOR_CITIZEN' => 'max:999',
            'INDICATE_WHETHER_PWD' => 'max:999',
            'TYPE_OF_DISABILITY' => 'max:999',
            'INDICATE_IF_INDIGINOUS_GROUP' => 'max:999',
            'ACTIVE_AND_WORKING_EMAIL_ADDRESS' => 'max:999',
            'FORMER_INCUMBENT' => 'max:999',
            'MODE_OF_SEPARATION' => 'max:999',
            'DATE_VACATED' => 'max:999',
            'REMARKS_STATUS_OF_VACANT_POSITION' => 'max:999',
            'EMPLOYEE_ID_NO' => 'max:999',
            'BIR_TIN.NO.' => 'max:999',
            'PHILHEALTH_NUMBER' => 'max:999',
            'SSS_NUMBER' => 'max:999',
            'PAG-IBIG_NUMBER' => 'max:999',
            'GSIS_NUMBER' => 'max:999',
            'BLOOD_TYPE' => 'max:999',
            'HIGHEST_LEVEL_OF_ELIGIBILITY_1ST_AND_2ND' => 'max:999',
            'HIGHEST_LEVEL__ELIGIBILITY_1ST_AND_2ND' => 'max:999',
            'ELIGIBILITY_CSC_and_other eligibilities' => 'max:999',
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
                'data' => $Hr  // Use lowercase $hr here
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
                'HR' => $Hr  // Use lowercase $hr here
            ], 200);
        }
        else {
            return response()->json([
                'status' => 404,
                'message' => "No Data Found!"
            ], 404);
        }
    }

   //DELETE HR SPECICIC ROW
   function hrDestroy($ID) {
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








    //EDIT HR SPECICIC ROW
    function hrUpdate(Request $request, int $ID) {
        $validator = Validator::make($request->all(), [
            'NO' => 'max:999',
            'DIVISION' => 'max:999',
            'SECTION/UNIT' => 'max:999',
            'OFFICE_LOCATION' => 'max:999',
            'ITEM_NUMBER' => 'max:999',
            'DATE_POSITION' => 'max:999',
            'POSITION_TITLE' => 'max:999',
            'PARENTHETICAL_TITLE' => 'max:999',
            'POSITION_LEVEL' => 'max:999',
            'SG' => 'max:999',
            'SALARY_STEP_INCREMENT' => 'max:999',
            'MONTHLY_RATE' => 'max:999',
            'DESIGNATION' => 'max:999',
            'DATE_OF_DESIGNATION' => 'max:999',
            'SPECIAL_ORDER_NO.' => 'max:999',
            'OFFICE_BUREAU_SERVICE_PROGRAM' => 'max:999',
            'FUND_SOURCE_FOR_CONTRACTUAL' => 'max:999',
            'EMPLOYMENT_STATUS' => 'max:999',
            'STATUS_FILLED_UNFILLED' => 'max:999',
            'MODE_OF_ACCESSION' => 'max:999',
            'DATE_FILLED_UP_ASSUMPTION' => 'max:999',
            'FULL_NAME' => 'max:999',
            'LASTNAME' => 'max:999',
            'FIRST_NAME' => 'max:999',
            'MIDDLE_NAME' => 'max:999',
            'EXT.' => 'max:999',
            'DATE_OF_ORIGINAL_APPOINTMENT' => 'max:999',
            'DATE_OF_LAST_PROMOTION' => 'max:999',
            'ENTRY_DATE_IN_DSWD' => 'max:999',
            'ELIGIBILITY_CSC_and_other_eligibilities' => 'max:999',
            'ELIGIBILITY_License_RA_1080' => 'max:999',
            'LICENSE' => 'max:999',
            'HIGHEST_LVL_OF_ELIGIBILITY_1ST_AND_2ND' => 'max:999',
            'HIGHEST_EDUCATION_COMPLETED' => 'max:999',
            'DEGREE_AND_COURSE_1st_Course_Vocational' => 'max:999',
            'DEGREE_AND_COURSE_2nd Course' => 'max:999',
            'OTHER_COURSE' => 'max:999',
            'MASTERS_OR_DOCTORAL_DEGREE' => 'max:999',
            'GENDER' => 'max:999',
            'DATE_OF_BIRTH' => 'max:999',
            'AGE' => 'max:999',
            'CIVIL_STATUS' => 'max:999',
            'STREET_Current' => 'max:999',
            'PUROK/SUBDIVISION_Current' => 'max:999',
            'BARANGAY_Current' => 'max:999',
            'CITY/MUNICIPALITY_Current' => 'max:999',
            'PROVINCE_Current' => 'max:999',
            'PERMANENT_ADDRESS' => 'max:999',
            'PERMANENT_ADDRESS_Street' => 'max:999',
            'PERMANENT_ADDRESS_Purok' => 'max:999',
            'PERMANENT_ADDRESS_Subdivision_Community_Village' => 'max:999',
            'PERMANENT_ADDRESS_Barangay' => 'max:999',
            'PERMANENT_ADDRESS_Region' => 'max:999',
            'PERMANENT_ADDRESS_City_Municipality' => 'max:999',
            'PERMANENT_ADDRESS_Province' => 'max:999',
            'BD' => 'max:999',
            'INDICATE_WHETHER_SOLO_PARENT' => 'max:999',
            'INDICATE_WHETHER_SENIOR_CITIZEN' => 'max:999',
            'INDICATE_WHETHER_PWD' => 'max:999',
            'TYPE_OF_DISABILITY' => 'max:999',
            'INDICATE_IF_INDIGINOUS_GROUP' => 'max:999',
            'ACTIVE_AND_WORKING_EMAIL_ADDRESS' => 'max:999',
            'FORMER_INCUMBENT' => 'max:999',
            'MODE_OF_SEPARATION' => 'max:999',
            'DATE_VACATED' => 'max:999',
            'REMARKS_STATUS_OF_VACANT_POSITION' => 'max:999',
            'EMPLOYEE_ID_NO' => 'max:999',
            'BIR_TIN.NO.' => 'max:999',
            'PHILHEALTH_NUMBER' => 'max:999',
            'SSS_NUMBER' => 'max:999',
            'PAG-IBIG_NUMBER' => 'max:999',
            'GSIS_NUMBER' => 'max:999',
            'BLOOD_TYPE' => 'max:999',
            'HIGHEST_LEVEL_OF_ELIGIBILITY_1ST_AND_2ND' => 'max:999',
            'HIGHEST_LEVEL__ELIGIBILITY_1ST_AND_2ND' => 'max:999',
            'ELIGIBILITY_CSC_and_other eligibilities' => 'max:999',
        ]);


        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->errors()
            ], 422);
        }

        $Hr = Hr::find($ID);

        if (!$Hr) {
            return response()->json([
                'status' => 404,
                'message' => "No Data Found!"
            ], 404);
        }

        try {
            // Update the record with the request data
            $Hr->update($request->all());

            return response()->json([
                'status' => 200,
                'message' => 'HR record updated successfully',
                'data' => $Hr // Return the updated record
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => 'Error updating HR record: ' . $e->getMessage()
            ], 500);
        }
    }


    // THIS FUNCTIONS ARE USED FOR GETTING DATA FOR SELECTED TABLE COLOUMN SPECIFICALLY USED FOR VISUALIZATION ONLY
    function employmentStatus(){
        return Hr::select('EMPLOYMENT_STATUS')->get();
    }
    function employmentDetails(){
        return Hr::select('FULL_NAME', 'SECTION/UNIT')->get();
    }


}
