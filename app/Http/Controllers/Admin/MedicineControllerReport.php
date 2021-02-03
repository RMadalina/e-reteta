<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\StoreMedicineRequest;

use App\Models\Medicine;
use App\Models\Recipe;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;


class MedicineControllerReport extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function reportMedicinesPerDoctor()
    {

        $doctors = $this->getAllQuantitiesPerDoctor();
        return view('admin.reports.medicines-per-doctor', compact('doctors'));
    }

  public function reportMedicinesConsumption()
  {

      $medicines = $this->getAllMedicinesConsumption();
      return view('admin.reports.medicines-consumption', compact('medicines'));
    }

        
    /**
     * Display medicine distibution per doctor.
     *
     * @return \Illuminate\Http\Response
     */
    public function reportAllRecipesPerPacient()
    {

        $pacients = $this->getAllRecipesPerPacient();
        return view('admin.reports.recipes-per-pacient', compact('pacients'));
  }


 
  //TODO: De rescris interogarea
  public static function getAllQuantitiesPerDoctor()
  {
      return DB::select(DB::raw(
                // 'SELECT n.id, n.name, SUM(quantity) as medicinesVolume , SUM(quantity * price) as medicinesValue
                //   FROM (
                //    SELECT 
                //   distinct dr.id,
                //   u.name,
                //   d.id AS diagnostic_id,
                //   r.id AS reteta_id, 
                //   m.medicinecode,
                //   r_m.quantity,
                //   m.price
                
                // FROM 
                //   pacients p,
                //   users u,
                //   recipes r, 
                //   diagnoses d,
                //   recipes_medicines r_m,
                //   medicines m,
                //   doctors dr
        
                // WHERE 
                // u.id = dr.user_id
                //   AND dr.id = d.doctor_id
                //   AND d.id = r.diagnose_id 
                //   AND r.id = r_m.recipe_id 
                //   AND r_m.medicinecode = m.medicinecode
        
                // ORDER BY dr.id
                // )n GROUP BY n.id, n.name'

           '  SELECT dr.id, u.name, m.medicinecode, m.name as medicinename, SUM(quantity) as medicinesVolume, SUM(quantity * price) as medicinesValue
           FROM doctors dr 
           INNER JOIN users u
           ON dr.user_id = u.id
           INNER JOIN diagnoses d 
           ON dr.id = d.doctor_id
           INNER JOIN recipes r
           ON d.id= r.diagnose_id
           INNER JOIN recipes_medicines rm
           ON r.id = rm.recipe_id
           INNER JOIN medicines m
           ON rm.medicinecode = m.medicinecode
           
           
           GROUP BY dr.id, u.name, m.medicinecode, m.name
      '));
  }

  
  public static function getAllRecipesPerPacient()
  {
      return DB::select(DB::raw(
                     '   SELECT m.cnp, m.name, COUNT(reteta_id) AS recipesCount
                     FROM (
                       SELECT 
                             distinct p.cnp,
                             u.name,
                             d.id AS diagnostic_id,
                             r.id AS reteta_id 
                           FROM 
                             pacients p,
                             users u,
                             recipes r, 
                             diagnoses d
                   
                           WHERE 
                             u.id = p.user_id
                             AND p.cnp = d.cnp 
                             AND d.id = r.diagnose_id 
                   
                           ORDER BY 
                             p.cnp, 
                             r.id
                         ) m GROUP BY m.cnp, m.name;
      '));
  }

  public static function getAllMedicinesConsumption()
  {
      return DB::select(DB::raw(
                     'SELECT  r.medicinecode, r.name, SUM(r.quantity) as quantity, SUM(r.quantity*r.price) as value
                     FROM (
                           SELECT 
                               m.medicinecode,
                               m.name,
                               m.price,
                               r_m.quantity 
                           FROM 
                             medicines m,
                             recipes_medicines r_m
                           WHERE 
                               m.medicinecode = r_m.medicinecode 
                   
                           ORDER BY 
                                m.medicinecode,
                               m.name
                           ) r 
                           GROUP BY
                            r.medicinecode, 
                            r.name; 
      '));
  }
    
}
