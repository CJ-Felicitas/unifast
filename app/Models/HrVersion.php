<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HrVersion extends Model
{

    use SoftDeletes;
    protected $table = "hr_versions";
    protected $dates = ['deleted_at'];
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'hr_id',
        'request_date',
        'requesting_employee_name',
        'employee_position',
        'employment_status',
        'office_unit'	,
        'request_category',
        'brief_interview',
        'remarks',
        'assistance_provided',
        'quantity_unit',
        'date_received',
    ];

}
