<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class hr extends Model
{
    use SoftDeletes;
    protected $table = "dswd_hr";
    protected $dates = ['deleted_at'];
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [

        'request_date',
        'requesting_employee_name',
        'employee_position',
        'employment_status',
        'office_unit'	,
        'request_category',
        'brief_interview',
        'remarks',
        'assistance_provided',

    ];




}
