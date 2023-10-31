<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Swda;

class SwdaController extends Controller
{
    //
    function list(){
        return Swda::all();
    }

    function cluster(){
        return Swda::select('Cluster')->get();
    }

    function modeDelivery(){
        return Swda::select('Mode of Delivery', 'Registration Status')->get();
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
        return Swda::select('Agency',  'Registration_Status', 'License_Status', 'Accreditation_Status','Sector', 'Cluster', 'Type', 'Address', 'Contact_Number', 'Email', 'Website', 'Contact_Person', 'Position', 'Mobile_Number', 'Services_Offered', 'Clientele', 'Mode_of_Delivery', 'Specified_Areas_of_Operation', 'Registration_ID', 'Registration_Date', 'Registration_Expiration', 'Remarks', 'Licensed_ID', 'License_Date_Issued', 'License_Expiration', 'Licensure_Overdue', 'Accreditation_ID', 'Accreditation_Date_Issued', 'Accreditation_Expiration',  'Accreditation_Overdue'
        )->get();
    }

//     function getBasicAgencyInfo()
//     {
//         return Swda::select('Agency', 'Sector', 'Cluster', 'Type', 'Address', 'Contact_Number', 'Email', 'Website')
//             ->get();
//     }

//    function getRegistrationInfo()
//     {
//         return Swda::select('Agency', 'Registration_Status', 'Registration_ID', 'Registration_Date', 'Registration_Expiration', 'Remarks')
//             ->get();
//     }

//     function getLicenseInfo()
//     {
//         return Swda::select('Agency', 'License_Status', 'Licensed_ID', 'License_Date_Issued', 'License_Expiration', 'Licensure_Overdue')
//             ->get();
//     }

//     function getAccreditationInfo()
//     {
//         return Swda::select('Agency', 'Accreditation_Status', 'Accreditation_ID', 'Accreditation_Date_Issued', 'Accreditation_Expiration', 'Accreditation_Overdue')
//             ->get();
//     }



}
