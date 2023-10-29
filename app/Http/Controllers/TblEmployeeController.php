<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tbl_employee;

class TblEmployeeController extends Controller
{
    function loginCredentials(){
        return tbl_employee::select('empid', 'qr_code')->get();
    }
}
