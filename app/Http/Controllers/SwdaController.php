<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Swda;

class SwdaController extends Controller
{

    // function swdalist(){
    //     return Swda::all();
    // }

    function index(){
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

    function store (Request $request)
    {
        $validator = Validator::make();
    }







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
