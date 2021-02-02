<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

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

    public static function getAllByNameAscOrder()
    {
        return DB::select(DB::raw(
            'SELECT * 
            FROM medicines m 
            LEFT JOIN recipes_medicines rp
            ON m.medicinecode = rp.medicinecode
            LEFT JOIN recipes r
            ON rp.recipe_id = r.id
            ORDER BY m.name ASC
        '));
    }

    public static function insertData($name, $medicinecode, $price)
    {
        return DB::insert(
            'INSERT INTO medicines (name, medicinecode, price) VALUES (:name, :medicinecode, :price)
        ', [
            'name' => $name,
            'medicinecode' => $medicinecode,
            'price' => $price,
        ]);
    }
}
