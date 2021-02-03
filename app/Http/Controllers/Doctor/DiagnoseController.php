<?php

namespace App\Http\Controllers\Doctor;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

use App\Http\Requests\StoreDiagnoseRequest;
use App\Http\Requests\UpdateDiagnoseRequest;
use App\Models\Diagnose;
use App\Models\Desease;
use App\Models\Doctor;
use App\Models\Pacient;
use App\Models\Hospital;
use App\Models\Recipe;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiagnoseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $diagnoses = Diagnose::orderBy('id', 'asc')->get();
        return view('doctor.diagnoses.index', compact('diagnoses'));
  }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //dd (Auth::user()->hasRole(Role::ADMIN_ROLE));
        if (!Auth::user()->hasRole(Role::DOCTOR_ROLE)) {
            abort(404);
        }
        $pacients = Pacient::orderBy('cnp', 'asc')->get();
        $deseases = Desease::orderBy('name', 'asc')->get();
        $hospitals = Hospital::orderBy('name', 'asc')->get();
  
        
        return view('doctor.diagnoses.create', compact('pacients', 'deseases', 'hospitals'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDiagnoseRequest $request)
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
        $diagnose = Diagnose::create([
            'cnp'=>$request->cnp,
            'deseasecode'=>$request->deseasecode,
            'doctor_id'=>$doctor->id,
        ]);
       // dd( $diagnose->id);
        // $recipe = Recipe::create([
        //     'diagnose_id'=>$diagnose->id,
        //     'hospital_id'=>$request->hospital_id,
        // ]);
        return redirect()->route('diagnoses.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function edit(Diagnose $diagnose)
    {
        dd($diagnose);
    
        if (!Auth::user()->hasRole(Role::ADMIN_ROLE)) {
            abort(404);
        }

        return view('doctor.diagnoses.edit', compact('diagnose'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function update(StoreDiagnoseRequest $request, Diagnose $diagnose)
    {
        
        if (!Auth::user()->hasRole(Role::DOCTOR_ROLE)) {
            abort(404);
        }
        
        $user = Auth::user();
        //$doctor = Doctor::where('user_id',$user->id)->first();
        $doctor =  $user->doctor;
        // if (!$doctor){
        //   abort(404);
        // }
        $diagnose = Diagnose::update([
            //'cnp'=>$request->cnp,
            'deseasecode'=>$request->deseasecode,
            'doctor_id'=>$doctor->id,
        ]);
       // dd( $diagnose->id);
        $recipe = Recipe::update([
            'diagnose_id'=>$diagnose->id,
            'hospital_id'=>$request->hospital_id,
        ]);
        return redirect()->route('diagnoses.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Diagnose $diagnose)
    {
        if (!Auth::user()->hasRole(Role::DOCTOR_ROLE)) {
            abort(404);
        }
     
        //$diagnose = Diagnose::find(12);
      //  dd($request);
        $result = $diagnose->delete();
        //dd($result);
        return redirect()->route('diagnoses.index');
    }
}
