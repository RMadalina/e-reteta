<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecipeMedicine extends Model
{
    use HasFactory;
    protected $table ='recipes_medicines';
    protected $fillable = [
        'recipe_id',
        'medicinecode',
        'quantity',
       
    ];

    public function recipe(){

        return $this->hasOne(Recipe::class, 'recipe_id','id');
    }
    public function medicine(){

        return $this->hasOne(Medicine::class,  'medicinecode','medicinecode');
    }
  
}
