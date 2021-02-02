<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'diagnose_id',
        'hospital_id',
       
    ];



    public function recipeMedicines(){

        return $this->hasMany(RecipeMedicine::class);
    }
    public function medicines(){

        return $this->belongsToMany(Medicine::class, 'recipes_medicines', 'recipe_id', 'medicinecode');
    }


}
