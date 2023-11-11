<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_User extends Model
{
    use HasFactory;
    public $table = "users";


    protected $fillable = [
        'name',
        'email',
        'password',
        // Add any additional fields you need for users
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
