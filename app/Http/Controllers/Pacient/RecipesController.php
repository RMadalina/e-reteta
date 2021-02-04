<?php

namespace App\Http\Controllers\Pacient;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

use App\Models\Diagnose;
use App\Models\Desease;
use App\Models\Doctor;
use App\Models\Pacient;
use App\Models\Hospital;
use App\Models\Medicine;
use App\Models\RecipeMedicine;
use App\Models\Recipe;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecipesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        $user = Auth::user();
       
        $pacient =  $user->pacient;
        if (!$pacient){
          abort(404);
        }
        //dd($pacient); 
        $diagnoses = Diagnose::where('cnp',$pacient->cnp)->orderBy('id', 'asc')->get();
        return view('pacient.diagnoses.index', compact('diagnoses'));
  }
}