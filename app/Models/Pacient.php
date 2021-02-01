<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pacient extends Model
{
    use HasFactory;
    protected $primaryKey = 'cnp';

    public $incrementing = false; 

    protected $fillable = [
        
        'cnp',
        'age',
        'insurancetype',  
        'user_id',  
    ];

    public function user(){

        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function diagnoses(){

        return $this->hasMany(Diagnose::class, 'cnp', 'cnp');
    }
}
