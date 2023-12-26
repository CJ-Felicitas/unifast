<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class backgroundModel extends Model
{
    public $table = "backgroundcover";
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'image_path',
    ];
}
