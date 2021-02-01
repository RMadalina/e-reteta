<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'stampno',
        'cascontract',
        
    ];

    public function user(){

        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function diagnoses(){

        return $this->hasMany(Diagnose::class, 'id', 'doctor_id');
    }

    
}
