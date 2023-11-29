<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OsdVersion extends Model
{
    use SoftDeletes;
    protected $table = "osd_versions";
    protected $dates = ['deleted_at'];
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'osd_id',
        'division',
        'section_unit',
        'office_location_official_station',
        'item_number',
        'date_position_created',
        'position_title',
        'parenthetical_title',
        'position_level',
        'sg',
        'salary_step_increment',
        'monthly_rate',
        'designation_as_appropriate_based_on_so',
        'date_of_designation',
        'special_order_no',
        'office_bureau_service_program',
        'fund_source_for_contractual',
        'employment_status',
        'status_filled_unfilled',
        'mode_of_accession_for_appointment_based_positions',
        'date_filled_up_assumption',
        'fullname',
        'lastname',
        'firstname',
        'middlename',
        'ext',
        'date_of_original_appointment',
        'date_of_last_promotion',
        'entry_date_in_dswd',
        'eligibility_csc_and_other_eligibilities',
        'eligibility_license_ra_1080',
        'license_ra_1080_let_rn_rs_etc',
        'highest_level_of_eligibility',
        'highest_education_completed',
        'degree_and_course_1st_vocational',
        'degree_and_course_2nd_course',
        'other_courses',
        'masters_or_doctoral_degree_specify',
        'gender',
        'date_of_birth',
        'age',
        'civil_status',
        'residential_address',
        'permanent_address',
        'indicate_whether_solo_parent',
        'indicate_whether_senior_citizen',
        'indicate_whether_pwd',
        'type_of_disability',
        'indicate_whether_member_of_indigenous_group',
        'indigenous_group',
        'citizenship',
        'active_contact_numbers',
        'active_and_working_email_address',
        'former_incumbent',
        'mode_of_separation',
        'date_vacated',
        'remarks_status_of_vacant_position',
        'employee_id_number',
        'bir_tin_number',
        'philhealth_number',
        'sss_number',
        'pagibig_number',
        'gsis_number',
        'blood_type',
    ] ;
}
