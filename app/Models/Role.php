<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    const ADMIN_ROLE = 'administrator';
    const DOCTOR_ROLE = 'doctor';
    const PACIENT_ROLE = 'pacient';

    protected $fillable = ['name'];
}
