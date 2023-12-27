<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Admin extends Authenticatable
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'gmail',
        'phone',
        'password',
        'role',
        'otp',
        'image',
        'address',
        'age',
        'gender',
        'birth_day',
        'description'
    ];
}
