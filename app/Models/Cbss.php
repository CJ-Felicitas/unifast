<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cbss extends Model
{
    use SoftDeletes;
    protected $table = "dswd_cbss";

    protected $primaryKey = 'ID';

    public $timestamps = false;

    protected $fillable = [
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
        'NUMBER_OF_SERVICES_AVAILED'
    ];
}
