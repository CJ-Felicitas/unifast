<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hr;

class HrController extends Controller
{
    function employmentStatus(){
        return Hr::select('EMPLOYMENT_STATUS')->get();
    }

    function employmentDetails(){
        return Hr::select('FULL_NAME', 'SECTION/UNIT')->get();
    }


}
