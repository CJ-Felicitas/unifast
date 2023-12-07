<?php

namespace App\Http\Controllers;
use App\Models\Osd;
use App\Models\OsdVersion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class OsdController extends Controller
{
    // GET ALL OF THE TABLE COLUMNS IN OSD TABLE
    function osdIndex(){
        $Osd = Osd::all();
        if($Osd->count() > 0){
            return response()->json([
                'status' => 200,
                'Osd' =>  $Osd
            ], 200);
        }
        else{
            return response()->json([
                'status' => 404,
                'Osd' =>  'No Record Found'
            ], 404);
        }
    }


    // STORE INPUT IN ALL OF THE TABLE COLUMNS IN OSD TABLE
      function osdStore(Request $request) {
        $validator = Validator::make($request->all(), [
            'division' => 'max:254',
            'section_unit' => 'max:254',
            'office_location_official_station' => 'max:254',
            'item_number' => 'max:254',
            'date_position_created' => 'max:254',
            'position_title' => 'max:254',
            'parenthetical_title' => 'max:254',
            'position_level' => 'max:254',
            'sg' => 'max:254',
            'salary_step_increment' => 'max:254',
            'monthly_rate' => 'max:254',
            'designation_as_appropriate_based_on_so' => 'max:254',
            'date_of_designation' => 'max:254',
            'special_order_no' => 'max:254',
            'office_bureau_service_program' => 'max:254',
            'fund_source_for_contractual' => 'max:254',
            'employment_status' => 'max:254',
            'status_filled_unfilled' => 'max:254',
            'mode_of_accession_for_appointment_based_positions' => 'max:254',
            'date_filled_up_assumption' => 'max:254',
            'fullname' => 'max:254',
            'lastname' => 'max:254',
            'firstname' => 'max:254',
            'middlename' => 'max:254',
            'ext' => 'max:254',
            'date_of_original_appointment' => 'max:254',
            'date_of_last_promotion' => 'max:254',
            'entry_date_in_dswd' => 'max:254',
            'eligibility_csc_and_other_eligibilities' => 'max:254',
            'eligibility_license_ra_1080' => 'max:254',
            'license_ra_1080_let_rn_rs_etc' => 'max:254',
            'highest_level_of_eligibility' => 'max:254',
            'highest_education_completed' => 'max:254',
            'degree_and_course_1st_vocational' => 'max:254',
            'degree_and_course_2nd_course' => 'max:254',
            'other_courses' => 'max:254',
            'masters_or_doctoral_degree_specify' => 'max:254',
            'gender' => 'max:254',
            'date_of_birth' => 'max:254',
            'age' => 'max:254',
            'civil_status' => 'max:254',
            'residential_address' => 'max:254',
            'permanent_address' => 'max:254',
            'indicate_whether_solo_parent' => 'max:254',
            'indicate_whether_senior_citizen' => 'max:254',
            'indicate_whether_pwd' => 'max:254',
            'type_of_disability' => 'max:254',
            'indicate_whether_member_of_indigenous_group' => 'max:254',
            'indigenous_group' => 'max:254',
            'citizenship' => 'max:254',
            'active_contact_numbers' => 'max:254',
            'active_and_working_email_address' => 'max:254',
            'former_incumbent' => 'max:254',
            'mode_of_separation' => 'max:254',
            'date_vacated' => 'max:254',
            'remarks_status_of_vacant_position' => 'max:254',
            'employee_id_number' => 'max:254',
            'bir_tin_number' => 'max:254',
            'philhealth_number' => 'max:254',
            'sss_number' => 'max:254',
            'pagibig_number' => 'max:254',
            'gsis_number' => 'max:254',
            'blood_type' => 'max:254',
        ]);



        // Check if validation fails
        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->errors()
            ], 422);
        }
           // Create a new OSD record with all validated fields
        else{
            $Osd = Osd::create($request->all());

            return response()->json([
                'status' => 200,
                'message' => 'OSD record created successfully',
                'data' => $Osd
            ], 200);
        }
    }

    //FIND OSD RECORD THROUGH ITS ID
    function osdShow($ID){
        $Osd = Osd::find($ID);
        if($Osd){
            return response()->json([
                'status' => 200,
                'message' => 'Osd record found!',
                'data' => $Osd
            ], 200);
        }
        else {
            return response()->json([
                'status' => 404,
                'message' => "No Data Found!"
            ], 404);
        }
    }

    //GET OSD SPECIFIC ROW BUT USE FOR TESTING FOR PUT METHOD
    function osdEdit($ID){
        $Osd = Osd::find($ID);
        if($Osd){
            return response()->json([
                'status' => 200,
                'message' => 'Osd record found!',
                'Osd' => $Osd
            ], 200);
        }
        else {
            return response()->json([
                'status' => 404,
                'message' => "No Data Found!"
            ], 404);
        }
    }

    // UPDATE OSD SPECICIC ROW
    function osdUpdate(Request $request, int $ID) {
        $validator = Validator::make($request->all(), [
            'division' => 'max:254',
            'section_unit' => 'max:254',
            'office_location_official_station' => 'max:254',
            'item_number' => 'max:254',
            'date_position_created' => 'max:254',
            'position_title' => 'max:254',
            'parenthetical_title' => 'max:254',
            'position_level' => 'max:254',
            'sg' => 'max:254',
            'salary_step_increment' => 'max:254',
            'monthly_rate' => 'max:254',
            'designation_as_appropriate_based_on_so' => 'max:254',
            'date_of_designation' => 'max:254',
            'special_order_no' => 'max:254',
            'office_bureau_service_program' => 'max:254',
            'fund_source_for_contractual' => 'max:254',
            'employment_status' => 'max:254',
            'status_filled_unfilled' => 'max:254',
            'mode_of_accession_for_appointment_based_positions' => 'max:254',
            'date_filled_up_assumption' => 'max:254',
            'fullname' => 'max:254',
            'lastname' => 'max:254',
            'firstname' => 'max:254',
            'middlename' => 'max:254',
            'ext' => 'max:254',
            'date_of_original_appointment' => 'max:254',
            'date_of_last_promotion' => 'max:254',
            'entry_date_in_dswd' => 'max:254',
            'eligibility_csc_and_other_eligibilities' => 'max:254',
            'eligibility_license_ra_1080' => 'max:254',
            'license_ra_1080_let_rn_rs_etc' => 'max:254',
            'highest_level_of_eligibility' => 'max:254',
            'highest_education_completed' => 'max:254',
            'degree_and_course_1st_vocational' => 'max:254',
            'degree_and_course_2nd_course' => 'max:254',
            'other_courses' => 'max:254',
            'masters_or_doctoral_degree_specify' => 'max:254',
            'gender' => 'max:254',
            'date_of_birth' => 'max:254',
            'age' => 'max:254',
            'civil_status' => 'max:254',
            'residential_address' => 'max:254',
            'permanent_address' => 'max:254',
            'indicate_whether_solo_parent' => 'max:254',
            'indicate_whether_senior_citizen' => 'max:254',
            'indicate_whether_pwd' => 'max:254',
            'type_of_disability' => 'max:254',
            'indicate_whether_member_of_indigenous_group' => 'max:254',
            'indigenous_group' => 'max:254',
            'citizenship' => 'max:254',
            'active_contact_numbers' => 'max:254',
            'active_and_working_email_address' => 'max:254',
            'former_incumbent' => 'max:254',
            'mode_of_separation' => 'max:254',
            'date_vacated' => 'max:254',
            'remarks_status_of_vacant_position' => 'max:254',
            'employee_id_number' => 'max:254',
            'bir_tin_number' => 'max:254',
            'philhealth_number' => 'max:254',
            'sss_number' => 'max:254',
            'pagibig_number' => 'max:254',
            'gsis_number' => 'max:254',
            'blood_type' => 'max:254',
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

            $Osd = Osd::find($ID);

            if (!$Osd) {
                return response()->json([
                    'status' => 404,
                    'message' => "No Data Found!"
                ], 404);
            }

            // Store the current version before updating
            $oldOsd = $Osd->toArray();

            // Update the record with the request data
            $Osd->fill($request->all()); // Fill the model attributes
            $Osd->save(); // Save the updated data

            // Store the previous and updated versions in the version control table which is the osd_versions
            OsdVersion::create([
                'osd_id' => $ID,
                'division' => $oldOsd['division'],
                'section_unit' => $oldOsd['section_unit'],
                'office_location_official_station' => $oldOsd['office_location_official_station'],
                'item_number' => $oldOsd['item_number'],
                'date_position_created' => $oldOsd['date_position_created'],
                'position_title' => $oldOsd['position_title'],
                'parenthetical_title' => $oldOsd['parenthetical_title'],
                'position_level' => $oldOsd['position_level'],
                'sg' => $oldOsd['sg'],
                'salary_step_increment' => $oldOsd['salary_step_increment'],
                'monthly_rate' => $oldOsd['monthly_rate'],
                'designation_as_appropriate_based_on_so' => $oldOsd['designation_as_appropriate_based_on_so'],
                'date_of_designation' => $oldOsd['date_of_designation'],
                'special_order_no' => $oldOsd['special_order_no'],
                'office_bureau_service_program' => $oldOsd['office_bureau_service_program'],
                'fund_source_for_contractual' => $oldOsd['fund_source_for_contractual'],
                'employment_status' => $oldOsd['employment_status'],
                'status_filled_unfilled' => $oldOsd['status_filled_unfilled'],
                'mode_of_accession_for_appointment_based_positions' => $oldOsd['mode_of_accession_for_appointment_based_positions'],
                'date_filled_up_assumption' => $oldOsd['date_filled_up_assumption'],
                'fullname' => $oldOsd['fullname'],
                'lastname' => $oldOsd['lastname'],
                'firstname' => $oldOsd['firstname'],
                'middlename' => $oldOsd['middlename'],
                'ext' => $oldOsd['ext'],
                'date_of_original_appointment' => $oldOsd['date_of_original_appointment'],
                'date_of_last_promotion' => $oldOsd['date_of_last_promotion'],
                'entry_date_in_dswd' => $oldOsd['entry_date_in_dswd'],
                'eligibility_csc_and_other_eligibilities' => $oldOsd['eligibility_csc_and_other_eligibilities'],
                'eligibility_license_ra_1080' => $oldOsd['eligibility_license_ra_1080'],
                'license_ra_1080_let_rn_rs_etc' => $oldOsd['license_ra_1080_let_rn_rs_etc'],
                'highest_level_of_eligibility' => $oldOsd['highest_level_of_eligibility'],
                'highest_education_completed' => $oldOsd['highest_education_completed'],
                'degree_and_course_1st_vocational' => $oldOsd['degree_and_course_1st_vocational'],
                'degree_and_course_2nd_course' => $oldOsd['degree_and_course_2nd_course'],
                'other_courses' => $oldOsd['other_courses'],
                'masters_or_doctoral_degree_specify' => $oldOsd['masters_or_doctoral_degree_specify'],
                'gender' => $oldOsd['gender'],
                'date_of_birth' => $oldOsd['date_of_birth'],
                'age' => $oldOsd['age'],
                'civil_status' => $oldOsd['civil_status'],
                'residential_address' => $oldOsd['residential_address'],
                'permanent_address' => $oldOsd['permanent_address'],
                'indicate_whether_solo_parent' => $oldOsd['indicate_whether_solo_parent'],
                'indicate_whether_senior_citizen' => $oldOsd['indicate_whether_senior_citizen'],
                'indicate_whether_pwd' => $oldOsd['indicate_whether_pwd'],
                'type_of_disability' => $oldOsd['type_of_disability'],
                'indicate_whether_member_of_indigenous_group' => $oldOsd['indicate_whether_member_of_indigenous_group'],
                'indigenous_group' => $oldOsd['indigenous_group'],
                'citizenship' => $oldOsd['citizenship'],
                'active_contact_numbers' => $oldOsd['active_contact_numbers'],
                'active_and_working_email_address' => $oldOsd['active_and_working_email_address'],
                'former_incumbent' => $oldOsd['former_incumbent'],
                'mode_of_separation' => $oldOsd['mode_of_separation'],
                'date_vacated' => $oldOsd['date_vacated'],
                'remarks_status_of_vacant_position' => $oldOsd['remarks_status_of_vacant_position'],
                'employee_id_number' => $oldOsd['employee_id_number'],
                'bir_tin_number' => $oldOsd['bir_tin_number'],
                'philhealth_number' => $oldOsd['philhealth_number'],
                'sss_number' => $oldOsd['sss_number'],
                'pagibig_number' => $oldOsd['pagibig_number'],
                'gsis_number' => $oldOsd['gsis_number'],
                'blood_type' => $oldOsd['blood_type'],
                // 'blood_type' field included here

                // Assuming $oldOsd is an associative array and $Osd is an object
                'previous_version' => json_encode($oldOsd),
                'updated_version' => json_encode($Osd->toArray()),
                // Other necessary fields like timestamps, user ID, etc. can be added here.
            ]);


            // Commit the transaction
            DB::commit();

            return response()->json([
                'status' => 200,
                'message' => 'Osd record updated successfully',
                'data' => $Osd // Return the updated record
            ], 200);
        } catch (\Exception $e) {
            // Rollback the transaction in case of an error
            DB::rollback();

            return response()->json([
                'status' => 500,
                'message' => 'Error updating Osd record: ' . $e->getMessage()
            ], 500);
        }
    }

    //ARCHIVE OSD SPECICIC ROW
    function osdArchive($ID) {
        $Osd = Osd::find($ID);

        if ($Osd) {
            $Osd->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Osd record deleted successfully'
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => "No Data Found!"
            ], 404);
        }
        }

   //FIND OSD ARCHIVE RECORD THROUGH ITS ID
   function osdArchiveFind($ID){
    $Osd = Osd::onlyTrashed()->find($ID);
    if($Osd){
        return response()->json([
            'status' => 200,
            'message' => 'Osd archive record found!',
            'data' => $Osd
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
    function osdGetArchived() {
        $onlySoftDeletedRecords = Osd::onlyTrashed()->get(); // Execute the query to retrieve records
        if ($onlySoftDeletedRecords->count() > 0) {
            return response()->json([
                'status' => 200,
                'ArchivedOsd' => $onlySoftDeletedRecords
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'ArchivedOsd' => 'No Record Found'
            ], 404);
        }
    }

        //RESTORE SPECIFIC ARCHIVE DATA
        function osdRestore($ID){
            $Osd = Osd::withTrashed()->find($ID);

            if ($Osd) {
                $Osd->restore(); // This line will restore the specific ID from archived to active data
                return response()->json([
                    'status' => 200,
                    'message' => 'Osd archived restored successfully'
                ], 200);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => "No Data Found! No Data to be Restored!"
                ], 404);
            }
        }




        function osdVersion(){
            $Osd = OsdVersion::all();
            if($Osd->count() > 0){
                return response()->json([
                    'status' => 200,
                    'Osd' =>  $Osd
                ], 200);
            }
            else{
                return response()->json([
                    'status' => 404,
                    'Osd' =>  'No Record Found'
                ], 404);
            }
        }


        function osdVersionShowID($ID){
            $Osd = OsdVersion::find($ID);
            if($Osd){
                return response()->json([
                    'status' => 200,
                    'message' => 'Osd Version History record found!',
                    'Osd' => $Osd
                ], 200);
            }
            else {
                return response()->json([
                    'status' => 404,
                    'message' => "No Data Found!"
                ], 404);
            }
        }



        function osdVersionShow($cbss_id){
            $Osd = OsdVersion::where('osd_id', $cbss_id)->get();
            if($Osd->isNotEmpty()){
                return response()->json([
                    'status' => 200,
                    'message' => 'Osd Version History record found!',
                    'OsdEditHistory' => $Osd
                ], 200);
            }
            else {
                return response()->json([
                    'status' => 404,
                    'message' => "No Data Found!"
                ], 404);
            }
        }






            // THIS FUNCTIONS ARE USED FOR GETTING DATA FOR SELECTED TABLE COLOUMN SPECIFICALLY USED FOR VISUALIZATION ONLY
            // function employmentStatus(){
            //     return Osd::select('employment_status')->get();
            // }
            function employmentDetails(){
                return Osd::select('fullname', 'section_unit')->get();
            }











            function employmentStatus() {
                $Osd = Osd::select('id', 'employment_status')->get();

                if ($Osd->count() > 0) {
                    $grouped = $Osd->groupBy('employment_status')->map->count();

                    return response()->json([
                        'status' => 200,
                        'EmploymentStatus' => $grouped
                    ], 200);
                } else {
                    return response()->json([
                        'status' => 404,
                        'EmploymentStatus' => 'No Record Found'
                    ], 404);
                }
            }







            function employmentType() {
                $Osd = Osd::select('id', 'indicate_whether_member_of_indigenous_group',
                    'indicate_whether_solo_parent',
                    'indicate_whether_pwd',
                    'indicate_whether_senior_citizen')->get();

                if ($Osd->count() > 0) {
                    $employmentTypes = [
                        'IP GROUP' => $Osd->where('indicate_whether_member_of_indigenous_group', 'INDIGENOUS GROUP')->count(),
                        'SOLO PARENT' => $Osd->where('indicate_whether_solo_parent', 'SOLO PARENT')->count(),
                        'PWD' => $Osd->where('indicate_whether_pwd', 'PWD')->count(),
                        'SENIOR CITIZEN' => $Osd->where('indicate_whether_senior_citizen', 'SENIOR CITIZEN')->count(),
                    ];

                    return response()->json([
                        'status' => 200,
                        'EmploymentType' => $employmentTypes
                    ], 200);
                } else {
                    return response()->json([
                        'status' => 404,
                        'EmploymentType' => 'No Record Found'
                    ], 404);
                }
            }



            function divisionCount() {
                $Osd = Osd::select('id', 'division')->get();

                if ($Osd->count() > 0) {
                    $grouped = $Osd->groupBy('division')->map->count();

                    return response()->json([
                        'status' => 200,
                        'DivisionCount' => $grouped
                    ], 200);
                } else {
                    return response()->json([
                        'status' => 404,
                        'DivisionCount' => 'No Record Found'
                    ], 404);
                }
            }


            function statusFilledUnfilled() {
                $Osd = Osd::select('id', 'status_filled_unfilled')->get();

                if ($Osd->count() > 0) {
                    $statusCounts = [
                        'FILLED' => $Osd->where('status_filled_unfilled', 'FILLED')->count(),
                        'UNFILLED' => $Osd->where('status_filled_unfilled', 'UNFILLED')->count(),
                    ];

                    return response()->json([
                        'status' => 200,
                        'Status' => $statusCounts
                    ], 200);
                } else {
                    return response()->json([
                        'status' => 404,
                        'Status' => 'No Record Found'
                    ], 404);
                }
            }





            function genderAndAge() {
                $Osd = Osd::select('id', 'gender', 'age')->get();

                if ($Osd->count() > 0) {
                    $ageRanges = [
                        '22-24', '25-27', '28-30', '31-33', '34-36', '37-39', '40-42',
                        '43-45', '46-48', '49-51', '52-54', '55-57', '58-60', '61-63', '64 & above'
                    ];

                    $genderAndAgeCounts = [
                        'MALE' => [],
                        'FEMALE' => []
                    ];

                    foreach ($ageRanges as $range) {
                        $rangeParts = explode('-', $range);
                        $min = $rangeParts[0];
                        $max = $rangeParts[1] ?? PHP_INT_MAX; // For '64 & above' range

                        foreach (['MALE', 'FEMALE'] as $gender) {
                            $genderAndAgeCounts[$gender][$range] = $Osd
                                ->where('gender', $gender)
                                ->whereBetween('age', [$min, $max])
                                ->count();
                        }
                    }

                    return response()->json([
                        'status' => 200,
                        'GenderAndAge' => $genderAndAgeCounts
                    ], 200);
                } else {
                    return response()->json([
                        'status' => 404,
                        'GenderAndAge' => 'No Record Found'
                    ], 404);
                }
            }


            function cssAndOthers() {
                $Osd = Osd::select('id', 'eligibility_csc_and_other_eligibilities')->get();

                if ($Osd->count() > 0) {
                    $eligibilityCounts = $Osd->groupBy('eligibility_csc_and_other_eligibilities')
                                              ->map(function ($group) {
                                                  return $group->count();
                                              });

                    return response()->json([
                        'status' => 200,
                        'CssAndOthers' => $eligibilityCounts
                    ], 200);
                } else {
                    return response()->json([
                        'status' => 404,
                        'CssAndOthers' => 'No Record Found'
                    ], 404);
                }
            }


            function licensed() {
                $Osd = Osd::select('id', 'license_ra_1080_let_rn_rs_etc')->get();

                if ($Osd->count() > 0) {
                    $licenseCounts = $Osd->groupBy('license_ra_1080_let_rn_rs_etc')
                                         ->map(function ($group) {
                                             return $group->count();
                                         });

                    return response()->json([
                        'status' => 200,
                        'Licensed' => $licenseCounts
                    ], 200);
                } else {
                    return response()->json([
                        'status' => 404,
                        'Licensed' => 'No Record Found'
                    ], 404);
                }
            }



            function highestLevelOfEligibility() {
                $Osd = Osd::select('id', 'highest_level_of_eligibility')->get();

                if ($Osd->count() > 0) {
                    $eligibilityCounts = $Osd->groupBy('highest_level_of_eligibility')
                                         ->map(function ($group) {
                                             return $group->count();
                                         });

                    return response()->json([
                        'status' => 200,
                        'HighestLevelOfEligibility' => $eligibilityCounts
                    ], 200);
                } else {
                    return response()->json([
                        'status' => 404,
                        'HighestLevelOfEligibility' => 'No Record Found'
                    ], 404);
                }
            }

            // USE FOR GETTING DETAILED WITH AND WITHOUT ELIGIBILITY
            // function withWithoutEligibilities() {
            //     $Osd = Osd::select('id', 'eligibility_csc_and_other_eligibilities', 'license_ra_1080_let_rn_rs_etc', 'highest_level_of_eligibility')->get();

            //     if ($Osd->count() > 0) {
            //         $withEligibility = $Osd->filter(function ($record) {
            //             return ($record->eligibility_csc_and_other_eligibilities !== null && $record->eligibility_csc_and_other_eligibilities !== "-") ||
            //                    ($record->license_ra_1080_let_rn_rs_etc !== null && $record->license_ra_1080_let_rn_rs_etc !== "-") ||
            //                    ($record->highest_level_of_eligibility !== null && $record->highest_level_of_eligibility !== "-");
            //         });

            //         $withoutEligibility = $Osd->diff($withEligibility);

            //         return response()->json([
            //             'status' => 200,
            //             'Eligibilities' => [
            //                 'With Eligibility' => $withEligibility,
            //                 'Without Eligibility' => $withoutEligibility
            //             ]
            //         ], 200);
            //     } else {
            //         return response()->json([
            //             'status' => 404,
            //             'Eligibilities' => 'No Record Found'
            //         ], 404);
            //     }
            // }


            // function withWithoutEligibilities() {
            //     $Osd = Osd::select('id', 'eligibility_csc_and_other_eligibilities', 'license_ra_1080_let_rn_rs_etc', 'highest_level_of_eligibility')->get();

            //     if ($Osd->count() > 0) {
            //         $withEligibility = $Osd->filter(function ($record) {
            //             return ($record->eligibility_csc_and_other_eligibilities !== null && $record->eligibility_csc_and_other_eligibilities !== "-") ||
            //                    ($record->license_ra_1080_let_rn_rs_etc !== null && $record->license_ra_1080_let_rn_rs_etc !== "-") ||
            //                    ($record->highest_level_of_eligibility !== null && $record->highest_level_of_eligibility !== "-");
            //         });

            //         $withoutEligibility = $Osd->diff($withEligibility);

            //         return response()->json([
            //             'status' => 200,
            //             'Eligibilities' => [
            //                 'With Eligibility' => $withEligibility,
            //                 'Without Eligibility' => $withoutEligibility
            //             ]
            //         ], 200);
            //     } else {
            //         return response()->json([
            //             'status' => 404,
            //             'Eligibilities' => 'No Record Found'
            //         ], 404);
            //     }
            // }



            function withWithoutEligibilities() {
                $Osd = Osd::select('id', 'eligibility_csc_and_other_eligibilities', 'license_ra_1080_let_rn_rs_etc', 'highest_level_of_eligibility')->get();

                if ($Osd->count() > 0) {
                    $withEligibility = $Osd->filter(function ($record) {
                        return ($record->eligibility_csc_and_other_eligibilities !== null && $record->eligibility_csc_and_other_eligibilities !== "-") ||
                               ($record->license_ra_1080_let_rn_rs_etc !== null && $record->license_ra_1080_let_rn_rs_etc !== "-") ||
                               ($record->highest_level_of_eligibility !== null && $record->highest_level_of_eligibility !== "-");
                    });

                    $withoutEligibility = $Osd->diff($withEligibility);

                    return response()->json([
                        'status' => 200,
                        'Eligibilities' => [
                            'WithELIGIBILITY' => $withEligibility->count(),
                            'WithoutELIGIBILITY' => $withoutEligibility->count()
                        ]
                    ], 200);
                } else {
                    return response()->json([
                        'status' => 404,
                        'Eligibilities' => 'No Record Found'
                    ], 404);
                }
            }
}
