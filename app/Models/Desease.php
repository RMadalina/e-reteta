<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desease extends Model
{
    use HasFactory;

    protected $primaryKey = 'deseasecode';

    public $incrementing = false; 

    protected $fillable = [
        'name',
        'deseasecode',
    ];


    public function diagnoses(){

        return $this->belongsTo(Diagnose::class, 'deseasecode', 'deseasecode');
    }
}
