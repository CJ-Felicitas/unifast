<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CbssVersion extends Model
{
    use SoftDeletes;
    protected $table = "cbss_versions";
    protected $dates = ['deleted_at'];
    protected $primaryKey = 'ID';
    public $timestamps = true;

    protected $fillable = [
        'CBSS_ID',
        'DATE',
        'NAME',
        'AGE',
        'SEX',
        'CASE_CATEGORY',
        'SUB_CATEGORY',
        'MODE_OF_ADMISSION',
        'ADDRESS',
        'NON_MONETARY_SERVICES',
        'Purpose',
        'AMOUNT',
        'REMARKS',
        'REPONSIBLE_PERSON',
        'NUMBER_OF_SERVICES_AVAILED',
        'RESPONSIBLE_ADMIN',
    ] ;
}
