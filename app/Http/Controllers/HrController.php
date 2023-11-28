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
            'division' => 'max:254',
            'section_unit' => 'max:254',
            'office_location' => 'max:254',
            'item_number' => 'max:254',
            'date_position' => 'max:254',
            'position_title' => 'max:254',
            'parenthetical_title' => 'max:254',
            'position_level' => 'max:254',
            'sg' => 'max:254',
            'salary_step_increment' => 'max:254',
            'monthly_rate' => 'max:254',
            'designation' => 'max:254',
            'date_of_designation' => 'max:254',
            'special_order_no' => 'max:254',
            'office_bureau_service_program' => 'max:254',
            'fund_source_for_contractual' => 'max:254',
            'employment_status' => 'max:254',
            'status_filled_unfilled' => 'max:254',
            'mode_of_accession' => 'max:254',
            'date_filled_up_assumption' => 'max:254',
            'full_name' => 'max:254',
            'last_name' => 'max:254',
            'first_name' => 'max:254',
            'middle_name' => 'max:254',
            'ext' => 'max:254',
            'date_of_original_appointment' => 'max:254',
            'date_of_last_promotion' => 'max:254',
            'entry_date_in_dswd' => 'max:254',
            'eligibility_csc_and_other_eligibilities' => 'max:254',
            'eligibility_license_ra_1080' => 'max:254',
            'license' => 'max:254',
            'highest_level_of_eligibility_1st_2nd' => 'max:254',
            'highest_education_completed' => 'max:254',
            'degree_and_course_1st_course_vocational' => 'max:254',
            'degree_and_course_2nd_course' => 'max:254',
            'other_course' => 'max:254',
            'masters_or_doctoral_degree' => 'max:254',
            'gender' => 'max:254',
            'date_of_birth' => 'max:254',
            'age' => 'max:254',
            'civil_status' => 'max:254',
            'street_current' => 'max:254',
            'purok_subdivision_current' => 'max:254',
            'barangay_current' => 'max:254',
            'city_municipality_current' => 'max:254',
            'province_current' => 'max:254',
            'permanent_address' => 'max:254',
            'permanent_address_street' => 'max:254',
            'permanent_address_purok' => 'max:254',
            'permanent_address_subdivision_community_village' => 'max:254',
            'permanent_address_barangay' => 'max:254',
            'permanent_address_region' => 'max:254',
            'permanent_address_city_municipality' => 'max:254',
            'permanent_address_province' => 'max:254',
            'bd' => 'max:254',
            'indicate_whether_solo_parent' => 'max:254',
            'indicate_whether_senior_citizen' => 'max:254',
            'indicate_whether_pwd' => 'max:254',
            'type_of_disability' => 'max:254',
            'indicate_if_indigenous_group' => 'max:254',
            'active_and_working_email_address' => 'max:254',
            'former_incumbent' => 'max:254',
            'mode_of_separation' => 'max:254',
            'date_vacated' => 'max:254',
            'remarks_status_of_vacant_position' => 'max:254',
            'employee_id_no' => 'max:254',
            'bir_tin_number' => 'max:254',
            'philhealth_number' => 'max:254',
            'sss_number' => 'max:254',
            'pagibig_number' => 'max:254',
            'gsis_number' => 'max:254',
            'blood_type' => 'max:254',
            'highest_level_of_eligibility_1st_and_2nd' => 'max:254',
            'highest_level_eligibility_1st_and_2nd' => 'max:254',
            'eligibility_csc_and_other_eligibilities_eligibilities' => 'max:254'
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

    // UPDATE HR SPECICIC ROW
    function hrUpdate(Request $request, int $ID) {
        $validator = Validator::make($request->all(), [
            'division' => 'max:254',
            'section_unit' => 'max:254',
            'office_location' => 'max:254',
            'item_number' => 'max:254',
            'date_position' => 'max:254',
            'position_title' => 'max:254',
            'parenthetical_title' => 'max:254',
            'position_level' => 'max:254',
            'sg' => 'max:254',
            'salary_step_increment' => 'max:254',
            'monthly_rate' => 'max:254',
            'designation' => 'max:254',
            'date_of_designation' => 'max:254',
            'special_order_no' => 'max:254',
            'office_bureau_service_program' => 'max:254',
            'fund_source_for_contractual' => 'max:254',
            'employment_status' => 'max:254',
            'status_filled_unfilled' => 'max:254',
            'mode_of_accession' => 'max:254',
            'date_filled_up_assumption' => 'max:254',
            'full_name' => 'max:254',
            'last_name' => 'max:254',
            'first_name' => 'max:254',
            'middle_name' => 'max:254',
            'ext' => 'max:254',
            'date_of_original_appointment' => 'max:254',
            'date_of_last_promotion' => 'max:254',
            'entry_date_in_dswd' => 'max:254',
            'eligibility_csc_and_other_eligibilities' => 'max:254',
            'eligibility_license_ra_1080' => 'max:254',
            'license' => 'max:254',
            'highest_level_of_eligibility_1st_2nd' => 'max:254',
            'highest_education_completed' => 'max:254',
            'degree_and_course_1st_course_vocational' => 'max:254',
            'degree_and_course_2nd_course' => 'max:254',
            'other_course' => 'max:254',
            'masters_or_doctoral_degree' => 'max:254',
            'gender' => 'max:254',
            'date_of_birth' => 'max:254',
            'age' => 'max:254',
            'civil_status' => 'max:254',
            'street_current' => 'max:254',
            'purok_subdivision_current' => 'max:254',
            'barangay_current' => 'max:254',
            'city_municipality_current' => 'max:254',
            'province_current' => 'max:254',
            'permanent_address' => 'max:254',
            'permanent_address_street' => 'max:254',
            'permanent_address_purok' => 'max:254',
            'permanent_address_subdivision_community_village' => 'max:254',
            'permanent_address_barangay' => 'max:254',
            'permanent_address_region' => 'max:254',
            'permanent_address_city_municipality' => 'max:254',
            'permanent_address_province' => 'max:254',
            'bd' => 'max:254',
            'indicate_whether_solo_parent' => 'max:254',
            'indicate_whether_senior_citizen' => 'max:254',
            'indicate_whether_pwd' => 'max:254',
            'type_of_disability' => 'max:254',
            'indicate_if_indigenous_group' => 'max:254',
            'active_and_working_email_address' => 'max:254',
            'former_incumbent' => 'max:254',
            'mode_of_separation' => 'max:254',
            'date_vacated' => 'max:254',
            'remarks_status_of_vacant_position' => 'max:254',
            'employee_id_no' => 'max:254',
            'bir_tin_number' => 'max:254',
            'philhealth_number' => 'max:254',
            'sss_number' => 'max:254',
            'pagibig_number' => 'max:254',
            'gsis_number' => 'max:254',
            'blood_type' => 'max:254',
            'highest_level_of_eligibility_1st_and_2nd' => 'max:254',
            'highest_level_eligibility_1st_and_2nd' => 'max:254',
            'eligibility_csc_and_other_eligibilities eligibilities' => 'max:254'
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
                'division' => $oldHr['division'],
                'section_unit' => $oldHr['section_unit'],
                'office_location' => $oldHr['office_location'],
                'item_number' => $oldHr['item_number'],
                'date_position' => $oldHr['date_position'],
                'position_title' => $oldHr['position_title'],
                'parenthetical_title' => $oldHr['parenthetical_title'],
                'position_level' => $oldHr['position_level'],
                'sg' => $oldHr['sg'],
                'salary_step_increment' => $oldHr['salary_step_increment'],
                'monthly_rate' => $oldHr['monthly_rate'],
                'designation' => $oldHr['designation'],
                'date_of_designation' => $oldHr['date_of_designation'],
                'special_order_no' => $oldHr['special_order_no'],
                'office_bureau_service_program' => $oldHr['office_bureau_service_program'],
                'fund_source_for_contractual' => $oldHr['fund_source_for_contractual'],
                'employment_status' => $oldHr['employment_status'],
                'status_filled_unfilled' => $oldHr['status_filled_unfilled'],
                'mode_of_accession' => $oldHr['mode_of_accession'],
                'date_filled_up_assumption' => $oldHr['date_filled_up_assumption'],
                'full_name' => $oldHr['full_name'],
                'last_name' => $oldHr['last_name'],
                'first_name' => $oldHr['first_name'],
                'middle_name' => $oldHr['middle_name'],
                'ext' => $oldHr['ext'],
                'date_of_original_appointment' => $oldHr['date_of_original_appointment'],
                'date_of_last_promotion' => $oldHr['date_of_last_promotion'],
                'entry_date_in_dswd' => $oldHr['entry_date_in_dswd'],
                'eligibility_csc_and_other_eligibilities' => $oldHr['eligibility_csc_and_other_eligibilities'],
                'eligibility_license_ra_1080' => $oldHr['eligibility_license_ra_1080'],
                'license' => $oldHr['license'],
                'highest_level_of_eligibility_1st_2nd' => $oldHr['highest_level_of_eligibility_1st_2nd'],
                'highest_education_completed' => $oldHr['highest_education_completed'],
                'degree_and_course_1st_course_vocational' => $oldHr['degree_and_course_1st_course_vocational'],
                'degree_and_course_2nd_course' => $oldHr['degree_and_course_2nd_course'],
                'other_course' => $oldHr['other_course'],
                'masters_or_doctoral_degree' => $oldHr['masters_or_doctoral_degree'],
                'gender' => $oldHr['gender'],
                'date_of_birth' => $oldHr['date_of_birth'],
                'age' => $oldHr['age'],
                'civil_status' => $oldHr['civil_status'],
                'street_current' => $oldHr['street_current'],
                'purok_subdivision_current' => $oldHr['purok_subdivision_current'],
                'barangay_current' => $oldHr['barangay_current'],
                'city_municipality_current' => $oldHr['city_municipality_current'],
                'province_current' => $oldHr['province_current'],
                'permanent_address' => $oldHr['permanent_address'],
                'permanent_address_street' => $oldHr['permanent_address_street'],
                'permanent_address_purok' => $oldHr['permanent_address_purok'],
                'permanent_address_subdivision_community_village' => $oldHr['permanent_address_subdivision_community_village'],
                'permanent_address_barangay' => $oldHr['permanent_address_barangay'],
                'permanent_address_region' => $oldHr['permanent_address_region'],
                'permanent_address_city_municipality' => $oldHr['permanent_address_city_municipality'],
                'permanent_address_province' => $oldHr['permanent_address_province'],
                'bd' => $oldHr['bd'],
                'indicate_whether_solo_parent' => $oldHr['indicate_whether_solo_parent'],
                'indicate_whether_senior_citizen' => $oldHr['indicate_whether_senior_citizen'],
                'indicate_whether_pwd' => $oldHr['indicate_whether_pwd'],
                'type_of_disability' => $oldHr['type_of_disability'],
                'indicate_if_indigenous_group' => $oldHr['indicate_if_indigenous_group'],
                'active_and_working_email_address' => $oldHr['active_and_working_email_address'],
                'former_incumbent' => $oldHr['former_incumbent'],
                'mode_of_separation' => $oldHr['mode_of_separation'],
                'date_vacated' => $oldHr['date_vacated'],
                'remarks_status_of_vacant_position' => $oldHr['remarks_status_of_vacant_position'],
                'employee_id_no' => $oldHr['employee_id_no'],
                'bir_tin_number' => $oldHr['bir_tin_number'],
                'philhealth_number' => $oldHr['philhealth_number'],
                'sss_number' => $oldHr['sss_number'],
                'pagibig_number' => $oldHr['pagibig_number'],
                'gsis_number' => $oldHr['gsis_number'],
                'blood_type' => $oldHr['blood_type'],
                'highest_level_of_eligibility_1st_and_2nd' => $oldHr['highest_level_of_eligibility_1st_and_2nd'],
                'highest_level_eligibility_1st_and_2nd' => $oldHr['highest_level_eligibility_1st_and_2nd'],
                'eligibility_csc_and_other_eligibilities eligibilities' => $oldHr['eligibility_csc_and_other_eligibilities eligibilities'],

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

//    function hrUpdate(Request $request, int $ID) {
//     $validator = Validator::make($request->all(), [
//         'division' => 'max:254',
//         'section_unit' => 'max:254',
//         'office_location' => 'max:254',
//         'item_number' => 'max:254',
//         'date_position' => 'max:254',
//         'position_title' => 'max:254',
//         'parenthetical_title' => 'max:254',
//         'position_level' => 'max:254',
//         'sg' => 'max:254',
//         'salary_step_increment' => 'max:254',
//         'monthly_rate' => 'max:254',
//         'designation' => 'max:254',
//         'date_of_designation' => 'max:254',
//         'special_order_no' => 'max:254',
//         'office_bureau_service_program' => 'max:254',
//         'fund_source_for_contractual' => 'max:254',
//         'employment_status' => 'max:254',
//         'status_filled_unfilled' => 'max:254',
//         'mode_of_accession' => 'max:254',
//         'date_filled_up_assumption' => 'max:254',
//         'full_name' => 'max:254',
//         'last_name' => 'max:254',
//         'first_name' => 'max:254',
//         'middle_name' => 'max:254',
//         'ext' => 'max:254',
//         'date_of_original_appointment' => 'max:254',
//         'date_of_last_promotion' => 'max:254',
//         'entry_date_in_dswd' => 'max:254',
//         'eligibility_csc_and_other_eligibilities' => 'max:254',
//         'eligibility_license_ra_1080' => 'max:254',
//         'license' => 'max:254',
//         'highest_level_of_eligibility_1st_2nd' => 'max:254',
//         'highest_education_completed' => 'max:254',
//         'degree_and_course_1st_course_vocational' => 'max:254',
//         'degree_and_course_2nd_course' => 'max:254',
//         'other_course' => 'max:254',
//         'masters_or_doctoral_degree' => 'max:254',
//         'gender' => 'max:254',
//         'date_of_birth' => 'max:254',
//         'age' => 'max:254',
//         'civil_status' => 'max:254',
//         'street_current' => 'max:254',
//         'purok_subdivision_current' => 'max:254',
//         'barangay_current' => 'max:254',
//         'city_municipality_current' => 'max:254',
//         'province_current' => 'max:254',
//         'permanent_address' => 'max:254',
//         'permanent_address_street' => 'max:254',
//         'permanent_address_purok' => 'max:254',
//         'permanent_address_subdivision_community_village' => 'max:254',
//         'permanent_address_barangay' => 'max:254',
//         'permanent_address_region' => 'max:254',
//         'permanent_address_city_municipality' => 'max:254',
//         'permanent_address_province' => 'max:254',
//         'bd' => 'max:254',
//         'indicate_whether_solo_parent' => 'max:254',
//         'indicate_whether_senior_citizen' => 'max:254',
//         'indicate_whether_pwd' => 'max:254',
//         'type_of_disability' => 'max:254',
//         'indicate_if_indigenous_group' => 'max:254',
//         'active_and_working_email_address' => 'max:254',
//         'former_incumbent' => 'max:254',
//         'mode_of_separation' => 'max:254',
//         'date_vacated' => 'max:254',
//         'remarks_status_of_vacant_position' => 'max:254',
//         'employee_id_no' => 'max:254',
//         'bir_tin_number' => 'max:254',
//         'philhealth_number' => 'max:254',
//         'sss_number' => 'max:254',
//         'pagibig_number' => 'max:254',
//         'gsis_number' => 'max:254',
//         'blood_type' => 'max:254',
//         'highest_level_of_eligibility_1st_and_2nd' => 'max:254',
//         'highest_level_eligibility_1st_and_2nd' => 'max:254',
//         'eligibility_csc_and_other_eligibilities_eligibilities' => 'max:254'
//     ]);


//     if ($validator->fails()) {
//         return response()->json([
//             'status' => 422,
//             'errors' => $validator->errors()
//         ], 422);
//     }

//     $Hr = Hr::find($ID);

//     if (!$Hr) {
//         return response()->json([
//             'status' => 404,
//             'message' => "No Data Found!"
//         ], 404);
//     }

//     try {
//         // Update the record with the request data
//         $Hr->update($request->all());

//         return response()->json([
//             'status' => 200,
//             'message' => 'Hr record updated successfully',
//             'data' => $Hr // Return the updated record
//         ], 200);
//     } catch (\Exception $e) {
//         return response()->json([
//             'status' => 500,
//             'message' => 'Error updating Hr record: ' . $e->getMessage()
//         ], 500);
//     }
//     }

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
    // function hrVersion(){
    //     $Hr = HrVersion::all();
    //     if($Hr->count() > 0){
    //         return response()->json([
    //             'status' => 200,
    //             'Hr' =>  $Hr
    //         ], 200);
    //     }
    //     else{
    //         return response()->json([
    //             'status' => 404,
    //             'Hr' =>  'No Record Found'
    //         ], 404);
    //     }
    // }


        // //FIND SWDA VERSION RECORD THROUGH ITS ID
        // function hrVersionShowID($ID){
        //     $hr = HrVersion::find($ID);
        //     if($hr){
        //         return response()->json([
        //             'status' => 200,
        //             'message' => 'Hr Version History record found!',
        //             'Hr' => $hr
        //         ], 200);
        //     }
        //     else {
        //         return response()->json([
        //             'status' => 404,
        //             'message' => "No Data Found!"
        //         ], 404);
        //     }
        // }


        // //FIND SWDA VERSION RECORD THROUGH ITS SWDA_ID
        // function hrVersionShow($hr_id){
        //     $hr = HrVersion::where('hr_id', $hr_id)->get();
        //     if($hr->isNotEmpty()){
        //         return response()->json([
        //             'status' => 200,
        //             'message' => 'Hr Version History record found!',
        //             'HrEditHistory' => $hr
        //         ], 200);
        //     }
        //     else {
        //         return response()->json([
        //             'status' => 404,
        //             'message' => "No Data Found!"
        //         ], 404);
        //     }
        // }

    // ! NOT YET IMPLEMENTED VERSION CONTROL HR
    // ! NOT YET IMPLEMENTED VERSION CONTROL HR
    // ! NOT YET IMPLEMENTED VERSION CONTROL HR








        // THIS FUNCTIONS ARE USED FOR GETTING DATA FOR SELECTED TABLE COLOUMN SPECIFICALLY USED FOR VISUALIZATION ONLY
        function employmentStatus(){
            return Hr::select('EMPLOYMENT_STATUS')->get();
        }
        function employmentDetails(){
            return Hr::select('FULL_NAME', 'SECTION/UNIT')->get();
        }


}
