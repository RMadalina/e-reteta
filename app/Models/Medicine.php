<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;

    protected $primaryKey = 'medicinecode';

    public $incrementing = false; 

    protected $fillable = ['name',
                           'medicinecode',
                           'price',
];

    public function recipes(){

        return $this->belongsTo(Recipe::class);
    }
}
