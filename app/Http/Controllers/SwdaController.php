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
        return Swda::select('Agency')->get();
    }



}
