<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hr extends Model
{
    public $table = "dswd_hr";
    protected $primaryKey = 'ID';
    public $timestamps = false;
    protected $fillable = [
        'NO',
        'DIVISION',
        'SECTION/UNIT',
        'OFFICE_LOCATION',
        'ITEM_NUMBER',
        'DATE_POSITION',
        'POSITION_TITLE',
        'PARENTHETICAL_TITLE',
        'POSITION_LEVEL',
        'SG',
        'SALARY_STEP_INCREMENT',
        'MONTHLY_RATE',
        'DESIGNATION',
        'DATE_OF_DESIGNATION',
        'SPECIAL_ORDER_NO.',
        'OFFICE_BUREAU_SERVICE_PROGRAM',
        'FUND_SOURCE_FOR_CONTRACTUAL',
        'EMPLOYMENT_STATUS',
        'STATUS_FILLED_UNFILLED',
        'MODE_OF_ACCESSION',
        'DATE_FILLED_UP_ASSUMPTION',
        'FULL_NAME',
        'LASTNAME',
        'FIRST_NAME',
        'MIDDLE_NAME',
        'EXT.',
        'DATE_OF_ORIGINAL_APPOINTMENT',
        'DATE_OF_LAST_PROMOTION',
        'ENTRY_DATE_IN_DSWD',
        'ELIGIBILITY_CSC_and_other_eligibilities',
        'ELIGIBILITY_License_RA_1080',
        'LICENSE',
        'HIGHEST_LVL_OF_ELIGIBILITY_1ST_AND_2ND',
        'HIGHEST_EDUCATION_COMPLETED',
        'DEGREE_AND_COURSE_1st_Course_Vocational',
        'DEGREE_AND_COURSE_2nd Course',
        'OTHER_COURSE',
        'MASTERS_OR_DOCTORAL_DEGREE',
        'GENDER',
        'DATE_OF_BIRTH',
        'AGE',
        'CIVIL_STATUS',
        'STREET_Current',
        'PUROK/SUBDIVISION_Current',
        'BARANGAY_Current',
        'CITY/MUNICIPALITY_Current',
        'PROVINCE_Current',
        'PERMANENT_ADDRESS',
        'PERMANENT_ADDRESS_Street',
        'PERMANENT_ADDRESS_Purok',
        'PERMANENT_ADDRESS_Subdivision_Community_Village',
        'PERMANENT_ADDRESS_Barangay',
        'PERMANENT_ADDRESS_Region',
        'PERMANENT_ADDRESS_City_Municipality',
        'PERMANENT_ADDRESS_Province',
        'BD',
        'INDICATE_WHETHER_SOLO_PARENT',
        'INDICATE_WHETHER_SENIOR_CITIZEN',
        'INDICATE_WHETHER_PWD',
        'TYPE_OF_DISABILITY',
        'INDICATE_IF_INDIGINOUS_GROUP',
        'ACTIVE_AND_WORKING_EMAIL_ADDRESS',
        'FORMER_INCUMBENT',
        'MODE_OF_SEPARATION',
        'DATE_VACATED',
        'REMARKS_STATUS_OF_VACANT_POSITION',
        'EMPLOYEE_ID_NO',
        'BIR_TIN.NO.',
        'PHILHEALTH_NUMBER',
        'SSS_NUMBER',
        'PAG-IBIG_NUMBER',
        'GSIS_NUMBER',
        'BLOOD_TYPE',
        'HIGHEST_LEVEL_OF_ELIGIBILITY_1ST_AND_2ND',
        'HIGHEST_LEVEL__ELIGIBILITY_1ST_AND_2ND',
        'ELIGIBILITY_CSC_and_other eligibilities'
    ];



}
