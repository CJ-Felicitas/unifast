<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_Admin extends Model
{
    use HasFactory;
    public $table = "admins";

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        // Add any additional fields you need for admins
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

}
