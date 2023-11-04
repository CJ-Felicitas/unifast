<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hr extends Model
{
    public $table = "hr";
    protected $primaryKey = 'ID';
    public $timestamps = false;
    protected $fillable = [
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
        'SPECIAL_ORDER_NO',
        'OFFICE_BUREAU_SERVICE_PROGRAM',
        'FUND_SOURCE_FOR_CONTRACTUAL',
        'EMPLOYMENT_STATUS',
        'STATUS_(FILLED/UNFILLED)',
        'MODE_OF_ACCESSION',
        'DATE_FILLED_UP/ASSUMPTION',
        'FULL_NAME',
        'LASTNAME',
        'FIRST_NAME',
        'MIDDLE_NAME',
        'EXT',
        'DATE_OF_ORIGINAL_APPOINTMENT',
        'DATE_OF_LAST_PROMOTION',
        'ENTRY_DATE_IN_DSWD',
        'ELIGIBILITY (CSC_and_other_eligibilities)',
        'ELIGIBILITY (License_RA_1080)',
        'LICENSE',
        'HIGHEST_LEVEL_OF_ELIGIBILITY_(1ST_AND_2ND)',
        'HIGHEST_EDUCATION_COMPLETED',
        'DEGREE_AND_COURSE (1st Course/Vocational)',
        'DEGREE_AND_COURSE (2nd Course)',
        'OTHER_COURSE/S',
        'MASTERS_OR_DOCTORAL_DEGREE(Specify)',
        'GENDER',
        'DATE_OF_BIRTH',
        'AGE',
        'CIVIL_STATUS',
        'STREET_(Current)',
        'PUROK/SUBDIVISION_(Current)',
        'BARANGAY_(Current)',
        'CITY/MUNICIPALITY_(Current)',
        'PROVINCE_(Current)',
        'PERMANENT_ADDRESS',
        'PERMANENT_ADDRESS_(Street)',
        'PERMANENT_ADDRESS(Purok)',
        'PERMANENT_ADDRESS_(Subdivision/Community/Village)',
        'PERMANENT ADDRESS (Barangay)',
        'PERMANENT_ADDRESS_(Region)',
        'PERMANENT_ADDRESS(City/Municipality)',
        'PERMANENT_ADDRESS(Province)',
        'INDICATE_WHETHER_SOLO_PARENT',
        'INDICATE_WHETHER_SENIOR_CITIZEN',
        'INDICATE_WHETHER_PWD',
        'TYPE_OF_DISABILITY',
        'INDICATE_IF_INDIGINOUS_GROUP',
        'ACTIVE_AND_WORKING_EMAIL_ADDRESS',
        'FORMER_INCUMBENT',
        'MODE_OF_SEPARATION',
        'DATE_VACATED',
        'REMARKS/STATUS_OF_VACANT_POSITION',
        'EMPLOYEE_ID_NO',
        'BIR_TIN. NO.',
        'PHILHEALTH_NUMBER',
        'SSS_NUMBER',
        'PAG-IBIG_NUMBER',
        'GSIS_NUMBER',
        'BLOOD_TYPE',
        'HIGHEST_LEVEL_OF_ELIGIBILITY (1ST_AND_2ND)',
        'HIGHEST_LEVEL__ELIGIBILITY_(1ST_AND_2ND)',
        'ELIGIBILITY(CSC_and_other eligibilities)'
    ];



}
