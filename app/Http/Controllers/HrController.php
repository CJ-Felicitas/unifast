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
            'division' => 'max:999',
            'section_unit' => 'max:999',
            'office_location' => 'max:999',
            'item_number' => 'max:999',
            'date_position' => 'max:999',
            'position_title' => 'max:999',
            'parenthetical_title' => 'max:999',
            'position_level' => 'max:999',
            'sg' => 'max:999',
            'salary_step_increment' => 'max:999',
            'monthly_rate' => 'max:999',
            'designation' => 'max:999',
            'date_of_designation' => 'max:999',
            'special_order_no' => 'max:999',
            'office_bureau_service_program' => 'max:999',
            'fund_source_for_contractual' => 'max:999',
            'employment_status' => 'max:999',
            'status_filled_unfilled' => 'max:999',
            'mode_of_accession' => 'max:999',
            'date_filled_up_assumption' => 'max:999',
            'full_name' => 'max:999',
            'last_name' => 'max:999',
            'first_name' => 'max:999',
            'middle_name' => 'max:999',
            'ext' => 'max:999',
            'date_of_original_appointment' => 'max:999',
            'date_of_last_promotion' => 'max:999',
            'entry_date_in_dswd' => 'max:999',
            'eligibility_csc_and_other_eligibilities' => 'max:999',
            'eligibility_license_ra_1080' => 'max:999',
            'license' => 'max:999',
            'highest_level_of_eligibility_1st_2nd' => 'max:999',
            'highest_education_completed' => 'max:999',
            'degree_and_course_1st_course_vocational' => 'max:999',
            'degree_and_course_2nd_course' => 'max:999',
            'other_course' => 'max:999',
            'masters_or_doctoral_degree' => 'max:999',
            'gender' => 'max:999',
            'date_of_birth' => 'max:999',
            'age' => 'max:999',
            'civil_status' => 'max:999',
            'street_current' => 'max:999',
            'purok_subdivision_current' => 'max:999',
            'barangay_current' => 'max:999',
            'city_municipality_current' => 'max:999',
            'province_current' => 'max:999',
            'permanent_address' => 'max:999',
            'permanent_address_street' => 'max:999',
            'permanent_address_purok' => 'max:999',
            'permanent_address_subdivision_community_village' => 'max:999',
            'permanent_address_barangay' => 'max:999',
            'permanent_address_region' => 'max:999',
            'permanent_address_city_municipality' => 'max:999',
            'permanent_address_province' => 'max:999',
            'bd' => 'max:999',
            'indicate_whether_solo_parent' => 'max:999',
            'indicate_whether_senior_citizen' => 'max:999',
            'indicate_whether_pwd' => 'max:999',
            'type_of_disability' => 'max:999',
            'indicate_if_indigenous_group' => 'max:999',
            'active_and_working_email_address' => 'max:999',
            'former_incumbent' => 'max:999',
            'mode_of_separation' => 'max:999',
            'date_vacated' => 'max:999',
            'remarks_status_of_vacant_position' => 'max:999',
            'employee_id_no' => 'max:999',
            'bir_tin_number' => 'max:999',
            'philhealth_number' => 'max:999',
            'sss_number' => 'max:999',
            'pagibig_number' => 'max:999',
            'gsis_number' => 'max:999',
            'blood_type' => 'max:999',
            'highest_level_of_eligibility_1st_and_2nd' => 'max:999',
            'highest_level_eligibility_1st_and_2nd' => 'max:999',
            'eligibility_csc_and_other_eligibilities_eligibilities' => 'max:999'
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

   //EDIT HR SPECICIC ROW
   function hrUpdate(Request $request, int $ID) {
    $validator = Validator::make($request->all(), [
        'division' => 'max:999',
        'section_unit' => 'max:999',
        'office_location' => 'max:999',
        'item_number' => 'max:999',
        'date_position' => 'max:999',
        'position_title' => 'max:999',
        'parenthetical_title' => 'max:999',
        'position_level' => 'max:999',
        'sg' => 'max:999',
        'salary_step_increment' => 'max:999',
        'monthly_rate' => 'max:999',
        'designation' => 'max:999',
        'date_of_designation' => 'max:999',
        'special_order_no' => 'max:999',
        'office_bureau_service_program' => 'max:999',
        'fund_source_for_contractual' => 'max:999',
        'employment_status' => 'max:999',
        'status_filled_unfilled' => 'max:999',
        'mode_of_accession' => 'max:999',
        'date_filled_up_assumption' => 'max:999',
        'full_name' => 'max:999',
        'last_name' => 'max:999',
        'first_name' => 'max:999',
        'middle_name' => 'max:999',
        'ext' => 'max:999',
        'date_of_original_appointment' => 'max:999',
        'date_of_last_promotion' => 'max:999',
        'entry_date_in_dswd' => 'max:999',
        'eligibility_csc_and_other_eligibilities' => 'max:999',
        'eligibility_license_ra_1080' => 'max:999',
        'license' => 'max:999',
        'highest_level_of_eligibility_1st_2nd' => 'max:999',
        'highest_education_completed' => 'max:999',
        'degree_and_course_1st_course_vocational' => 'max:999',
        'degree_and_course_2nd_course' => 'max:999',
        'other_course' => 'max:999',
        'masters_or_doctoral_degree' => 'max:999',
        'gender' => 'max:999',
        'date_of_birth' => 'max:999',
        'age' => 'max:999',
        'civil_status' => 'max:999',
        'street_current' => 'max:999',
        'purok_subdivision_current' => 'max:999',
        'barangay_current' => 'max:999',
        'city_municipality_current' => 'max:999',
        'province_current' => 'max:999',
        'permanent_address' => 'max:999',
        'permanent_address_street' => 'max:999',
        'permanent_address_purok' => 'max:999',
        'permanent_address_subdivision_community_village' => 'max:999',
        'permanent_address_barangay' => 'max:999',
        'permanent_address_region' => 'max:999',
        'permanent_address_city_municipality' => 'max:999',
        'permanent_address_province' => 'max:999',
        'bd' => 'max:999',
        'indicate_whether_solo_parent' => 'max:999',
        'indicate_whether_senior_citizen' => 'max:999',
        'indicate_whether_pwd' => 'max:999',
        'type_of_disability' => 'max:999',
        'indicate_if_indigenous_group' => 'max:999',
        'active_and_working_email_address' => 'max:999',
        'former_incumbent' => 'max:999',
        'mode_of_separation' => 'max:999',
        'date_vacated' => 'max:999',
        'remarks_status_of_vacant_position' => 'max:999',
        'employee_id_no' => 'max:999',
        'bir_tin_number' => 'max:999',
        'philhealth_number' => 'max:999',
        'sss_number' => 'max:999',
        'pagibig_number' => 'max:999',
        'gsis_number' => 'max:999',
        'blood_type' => 'max:999',
        'highest_level_of_eligibility_1st_and_2nd' => 'max:999',
        'highest_level_eligibility_1st_and_2nd' => 'max:999',
        'eligibility_csc_and_other_eligibilities_eligibilities' => 'max:999'
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
            'message' => 'Hr record updated successfully',
            'data' => $Hr // Return the updated record
        ], 200);
    } catch (\Exception $e) {
        return response()->json([
            'status' => 500,
            'message' => 'Error updating Hr record: ' . $e->getMessage()
        ], 500);
    }
}


   //DELETE HR SPECICIC ROW
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











    // THIS FUNCTIONS ARE USED FOR GETTING DATA FOR SELECTED TABLE COLOUMN SPECIFICALLY USED FOR VISUALIZATION ONLY
    function employmentStatus(){
        return Hr::select('EMPLOYMENT_STATUS')->get();
    }
    function employmentDetails(){
        return Hr::select('FULL_NAME', 'SECTION/UNIT')->get();
    }


}
