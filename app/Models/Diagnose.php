<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnose extends Model
{
    use HasFactory;

    protected $fillable = [
        'cnp',
        'deseasecode',
        'doctor_id',

    ];



    public function desease(){

        return $this->hasOne(Desease::class,'deseasecode', 'deseasecode');
    }
    public function pacient(){

        return $this->hasOne(Pacient::class,'cnp', 'cnp');
    }

    public function doctor(){

        return $this->hasOne(Doctor::class,'id', 'doctor_id');
    }
}
