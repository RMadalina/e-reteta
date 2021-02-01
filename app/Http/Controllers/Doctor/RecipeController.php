<?php

namespace App\Http\Controllers\Doctor;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

use App\Http\Requests\StoreRecipeRequest;
use App\Http\Requests\UpdateRecipeRequest;
use App\Models\Recipe;
use App\Models\Diagnose;
use App\Models\Desease;
use App\Models\Doctor;
use App\Models\Pacient;
use App\Models\Medicine;
use App\Models\Hospital;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recipes = Recipe::orderBy('id', 'asc')->get();
        return view('doctor.recipes.index', compact('recipes'));
  }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
       
        //dd (Auth::user()->hasRole(Role::ADMIN_ROLE));
        if (!Auth::user()->hasRole(Role::DOCTOR_ROLE)) {
            abort(404);
        }
        $diagnose = Diagnose::findOrFail($request->diagnose_id);
        $medicines = Medicine::orderBy('name', 'asc')->get();
        $hospitals = Hospital::orderBy('name', 'asc')->get();
  
        //dd($diagnose);
        return view('doctor.recipes.create', compact('medicines', 'diagnose', 'hospitals'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRecipeRequest $request)
    {

        //dd($request);
        // if (!Auth::user()->hasRole(Role::ADMIN_ROLE)) {
        //     abort(404);
        // }
        //$user = User::create($request->validated());
       
        $user = Auth::user();
        //$doctor = Doctor::where('user_id',$user->id)->first();
        $doctor =  $user->doctor;
        if (!$doctor){
          abort(404);
        }
        $recipe = Recipe::create([
            'cnp'=>$request->cnp,
            'deseasecode'=>$request->deseasecode,
            'doctor_id'=>$doctor->id,
        ]);
        return redirect()->route('recipes.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function edit(recipe $recipe)
    {
    
        if (!Auth::user()->hasRole(Role::ADMIN_ROLE)) {
            abort(404);
        }

        return view('admin.recipes.edit', compact('recipe'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function update(UpdaterecipeRequest $request, recipe $recipe)
    {
        
        if (!Auth::user()->hasRole(Role::ADMIN_ROLE)) {
            abort(404);
        }
        $recipe->update([
            'age'=>$request->age,
            'insurancetype' => $request->insurancetype, 
            //'user_id'=>$user->id,
        ]);
        //dd($recipe->cnp);
        $recipe->user->update([
            'name'=>$request->name,
            'email'=>$request->email,
        ]);
        
        
        return redirect()->route('recipes.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(recipe $recipe)
    {
        if (!Auth::user()->hasRole(Role::ADMIN_ROLE)) {
            abort(404);
        }

        $recipe->delete();
        return redirect()->route('recipes.index');
    }
}
