<?php

namespace App\Http\Controllers;

use App\Models\Hr;
use App\Models\HrVersion;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
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

        //GET ALL OF THE TABLE COLUMNS IN HR VERSION TABLE
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

        //FIND HR VERSION RECORD THROUGH ITS ID
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


        //FIND HR VERSION RECORD THROUGH ITS hr_id
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

        // !NUMBER OF RECORDS PER MONTH START
        // !NUMBER OF RECORDS PER MONTH START
        // !NUMBER OF RECORDS PER MONTH START
        function numberOfRecordsPerMonth() {
            $Hr = Hr::select('id', 'request_date')
                ->get()
                ->groupBy(function($date) {
                    return Carbon::createFromFormat('F j, Y', $date->request_date)->format('M'); // grouping by months
                });

            $hrCount = [
                'Jan' => 0,
                'Feb' => 0,
                'Mar' => 0,
                'Apr' => 0,
                'May' => 0,
                'Jun' => 0,
                'Jul' => 0,
                'Aug' => 0,
                'Sep' => 0,
                'Oct' => 0,
                'Nov' => 0,
                'Dec' => 0,
            ];

            foreach ($Hr as $key => $value) {
                $hrCount[(string)$key] = count($value);
            }

            if(array_sum($hrCount) > 0){
                return response()->json([
                    'status' => 200,
                    'NumberOfRecordsPerMonth' =>  $hrCount
                ], 200);
            }
            else{
                return response()->json([
                    'status' => 404,
                    'NumberOfRecordsPerMonth' =>  'No Record Found'
                ], 404);
            }
        }

        function numberOfRecordsPerMonthYear($year) {
            $Hr = Hr::select('id', 'request_date')
                ->get()
                ->filter(function($record) use ($year) {
                    return Carbon::createFromFormat('F j, Y', $record->request_date)->year == $year;
                })
                ->groupBy(function($date) {
                    return Carbon::createFromFormat('F j, Y', $date->request_date)->format('M'); // grouping by months
                });

            $hrCount = [
                'Jan' => 0,
                'Feb' => 0,
                'Mar' => 0,
                'Apr' => 0,
                'May' => 0,
                'Jun' => 0,
                'Jul' => 0,
                'Aug' => 0,
                'Sep' => 0,
                'Oct' => 0,
                'Nov' => 0,
                'Dec' => 0,
            ];

            foreach ($Hr as $key => $value) {
                $hrCount[(string)$key] = count($value);
            }

            if(array_sum($hrCount) > 0){
                return response()->json([
                    'status' => 200,
                    'NumberOfRecordsPerMonth' =>  $hrCount
                ], 200);
            }
            else{
                return response()->json([
                    'status' => 404,
                    'NumberOfRecordsPerMonth' =>  'No Record Found'
                ], 404);
            }
        }

        function numberOfRecordsPerMonthYearfilter($month, $year) {
            $Hr = Hr::select('id', 'request_date')
                ->get()
                ->filter(function($record) use ($month, $year) {
                    $date = Carbon::createFromFormat('F j, Y', $record->request_date);
                    return $date->year == $year && $date->format('M') == $month;
                })
                ->groupBy(function($date) {
                    return Carbon::createFromFormat('F j, Y', $date->request_date)->format('M'); // grouping by months
                });

            $hrCount = [
                'Jan' => 0,
                'Feb' => 0,
                'Mar' => 0,
                'Apr' => 0,
                'May' => 0,
                'Jun' => 0,
                'Jul' => 0,
                'Aug' => 0,
                'Sep' => 0,
                'Oct' => 0,
                'Nov' => 0,
                'Dec' => 0,
            ];

            foreach ($Hr as $key => $value) {
                $hrCount[(string)$key] = count($value);
            }

            return response()->json([
                'status' => 200,
                'NumberOfRecordsPerMonth' =>  $hrCount
            ], 200);
        }
        // !NUMBER OF RECORDS PER MONTH END
        // !NUMBER OF RECORDS PER MONTH END
        // !NUMBER OF RECORDS PER MONTH END


        // ?TOTAL NUMBER OF CATEGORIES REQUEST START
        // ?TOTAL NUMBER OF CATEGORIES REQUEST START
        // ?TOTAL NUMBER OF CATEGORIES REQUEST START
        function totalNumberOfCategoryRequest() {
            $Hr = Hr::select('id', 'request_category', 'request_date')
                ->get()
                ->groupBy('request_category');

            $hrCount = [];
            foreach ($Hr as $key => $value) {
                $hrCount[(string)$key] = count($value);
            }

            if(count($hrCount) > 0){
                return response()->json([
                    'status' => 200,
                    'TotalNumberOfCategoryRequest' =>  $hrCount
                ], 200);
            }
            else{
                return response()->json([
                    'status' => 404,
                    'TotalNumberOfCategoryRequest' =>  'No Record Found'
                ], 404);
            }
        }

        function numberOfCategoryRequestsPerYear($year) {
            $Hr = Hr::select('id', 'request_category', 'request_date')
                ->get()
                ->filter(function($record) use ($year) {
                    $date = Carbon::createFromFormat('F j, Y', $record->request_date);
                    return $date->year == $year;
                })
                ->groupBy('request_category');

            $categories = Hr::select('request_category')->distinct()->pluck('request_category')->all();
            $hrCount = array_fill_keys($categories, 0);

            foreach ($Hr as $key => $value) {
                $hrCount[(string)$key] = count($value);
            }

            return response()->json([
                'status' => 200,
                'TotalNumberOfCategoryRequest' =>  $hrCount
            ], 200);
        }

        function numberOfCategoryRequestsPerMonthYear($month, $year) {
            $Hr = Hr::select('id', 'request_category', 'request_date')
                ->get()
                ->filter(function($record) use ($month, $year) {
                    $date = Carbon::createFromFormat('F j, Y', $record->request_date);
                    return $date->year == $year && $date->format('M') == $month;
                })
                ->groupBy('request_category');

            $categories = Hr::select('request_category')->distinct()->pluck('request_category')->all();
            $hrCount = array_fill_keys($categories, 0);

            foreach ($Hr as $key => $value) {
                $hrCount[(string)$key] = count($value);
            }

            return response()->json([
                'status' => 200,
                'TotalNumberOfCategoryRequest' =>  $hrCount
            ], 200);
        }
        // ?TOTAL NUMBER OF CATEGORIES REQUEST END
        // ?TOTAL NUMBER OF CATEGORIES REQUEST END
        // ?TOTAL NUMBER OF CATEGORIES REQUEST END


        // *NUMBER OF REQUESTING EMPLOYEE START
        // *NUMBER OF REQUESTING EMPLOYEE START
        // *NUMBER OF REQUESTING EMPLOYEE START



        function percentageOfRequestingEmployee() {
            $Hr = Hr::select('id', 'employment_status', 'request_date')
                ->get()
                ->groupBy('employment_status');

            $hrCount = [];
            foreach ($Hr as $key => $value) {
                $hrCount[(string)$key] = count($value);
            }

            if(count($hrCount) > 0){
                return response()->json([
                    'status' => 200,
                    'CountOfRequestingEmployee' =>  $hrCount
                ], 200);
            }
            else{
                return response()->json([
                    'status' => 404,
                    'CountOfRequestingEmployee' =>  'No Record Found'
                ], 404);
            }
        }

        function percentageOfRequestingEmployeeYear($year) {
            $Hr = Hr::select('id', 'employment_status', 'request_date')
                ->get()
                ->filter(function($record) use ($year) {
                    $date = Carbon::createFromFormat('F j, Y', $record->request_date);
                    return $date->year == $year;
                })
                ->groupBy('employment_status');

            $hrCount = [];
            foreach ($Hr as $key => $value) {
                $hrCount[(string)$key] = count($value);
            }

            if(count($hrCount) > 0){
                return response()->json([
                    'status' => 200,
                    'CountOfRequestingEmployee' =>  $hrCount
                ], 200);
            }
            else{
                return response()->json([
                    'status' => 404,
                    'CountOfRequestingEmployee' =>  'No Record Found'
                ], 404);
            }
        }

        function percentageOfRequestingEmployeeMonthYear($month, $year) {
            $Hr = Hr::select('id', 'employment_status', 'request_date')
                ->get()
                ->filter(function($record) use ($month, $year) {
                    $date = Carbon::createFromFormat('F j, Y', $record->request_date);
                    return $date->year == $year && $date->format('M') == $month;
                })
                ->groupBy('employment_status');

            $hrCount = [];
            foreach ($Hr as $key => $value) {
                $hrCount[(string)$key] = count($value);
            }

            if(count($hrCount) > 0){
                return response()->json([
                    'status' => 200,
                    'CountOfRequestingEmployee' =>  $hrCount
                ], 200);
            }
            else{
                return response()->json([
                    'status' => 404,
                    'CountOfRequestingEmployee' =>  'No Record Found'
                ], 404);
            }
        }

        // *NUMBER OF REQUESTING EMPLOYEE END
        // *NUMBER OF REQUESTING EMPLOYEE END
        // *NUMBER OF REQUESTING EMPLOYEE END


}
