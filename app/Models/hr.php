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
    protected $primaryKey = 'ID';
    public $timestamps = false;
    protected $fillable = [
        'division',
        'section_unit',
        'office_location',
        'item_number',
        'date_position',
        'position_title',
        'parenthetical_title',
        'position_level',
        'sg',
        'salary_step_increment',
        'monthly_rate',
        'designation',
        'date_of_designation',
        'special_order_no',
        'office_bureau_service_program',
        'fund_source_for_contractual',
        'employment_status',
        'status_filled_unfilled',
        'mode_of_accession',
        'date_filled_up_assumption',
        'full_name',
        'last_name',
        'first_name',
        'middle_name',
        'ext',
        'date_of_original_appointment',
        'date_of_last_promotion',
        'entry_date_in_dswd',
        'eligibility_csc_and_other_eligibilities',
        'eligibility_license_ra_1080',
        'license',
        'highest_level_of_eligibility_1st_2nd',
        'highest_education_completed',
        'degree_and_course_1st_course_vocational',
        'degree_and_course_2nd_course',
        'other_course',
        'masters_or_doctoral_degree',
        'gender',
        'date_of_birth',
        'age',
        'civil_status',
        'street_current',
        'purok_subdivision_current',
        'barangay_current',
        'city_municipality_current',
        'province_current',
        'permanent_address',
        'permanent_address_street',
        'permanent_address_purok',
        'permanent_address_subdivision_community_village',
        'permanent_address_barangay',
        'permanent_address_region',
        'permanent_address_city_municipality',
        'permanent_address_province',
        'bd',
        'indicate_whether_solo_parent',
        'indicate_whether_senior_citizen',
        'indicate_whether_pwd',
        'type_of_disability',
        'indicate_if_indigenous_group',
        'active_and_working_email_address',
        'former_incumbent',
        'mode_of_separation',
        'date_vacated',
        'remarks_status_of_vacant_position',
        'employee_id_no',
        'bir_tin_number',
        'philhealth_number',
        'sss_number',
        'pagibig_number',
        'gsis_number',
        'blood_type',
        'highest_level_of_eligibility_1st_and_2nd',
        'highest_level_eligibility_1st_and_2nd',
        'eligibility_csc_and_other_eligibilities_eligibilities'
    ];




}
