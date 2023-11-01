<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Swda extends Model
{
    // use HasFactory;

    protected $table = "swda";

    protected $fillable = [
        'Type',
        'Sector',
        'Cluster',
        'Agency',
        'Address',
        'Former_Name',
        'Contact_Number',
        'Fax',
        'Email',
        'Website',
        'Contact_Person',
        'Position',
        'Mobile_Number',
        'Registered',
        'Licensed',
        'Accredited',
        'Services_Offered',
        'Simplified_Services',
        'Area_of_Operation',
        'Regional_Operation',
        'Specified_Areas_of_Operation',
        'Mode_of_Delivery',
        'Clientele',
        'Registration_ID',
        'Registration_Date',
        'Registration_Expiration',
        'Registration_Status',
        'Licensed_ID',
        'License_Date_Issued',
        'License_Expiration',
        'License_Status',
        'Accreditation_ID',
        'Accreditation_Date_Issued',
        'Accreditation_Expiration',
        'Accreditation_Status',
        'Remarks',
        'License_Days_Left',
        'Licensure_Overdue',
        'Accreditation_Days_Left',
        'Accreditation_Overdue',
    ];

}
