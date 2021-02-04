<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDoctorRequest;
use App\Http\Requests\UpdateDoctorRequest;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;


class DoctorController extends Controller


{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = Doctor::orderBy('stampno', 'asc')->get();
        return view('admin.doctors.index', compact('doctors'));
  }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //dd (Auth::user()->hasRole(Role::ADMIN_ROLE));
        if (!Auth::user()->hasRole(Role::ADMIN_ROLE)) {
            abort(404);
        }

        return view('admin.doctors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDoctorRequest $request)
    {

        //dd($request);
        // if (!Auth::user()->hasRole(Role::ADMIN_ROLE)) {
        //     abort(404);
        // }
        //$user = User::create($request->validated());
       
        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password' => Hash::make($request->password), 
            'role_id'=>2,
        ]);
        
        $doctor = Doctor::create([
            'stampno'=>$request->stampno,
            'cascontract'=>$request->cascontract,
            'user_id'=>$user->id,
        ]);

        return redirect()->route('doctors.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
    
        if (!Auth::user()->hasRole(Role::ADMIN_ROLE)) {
            abort(404);
        }

        return view('admin.doctors.edit', compact('doctor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDoctorRequest $request, Doctor $doctor)
    {
        
        if (!Auth::user()->hasRole(Role::ADMIN_ROLE)) {
            abort(404);
        }
        $doctor->update([
            'stampno'=>$request->stampno,
            'cascontract' => $request->cascontract, 
            //'user_id'=>$user->id,
        ]);
        //dd($doctor->stampno);
        $doctor->user->update([
            'name'=>$request->name,
            'email'=>$request->email,
        ]);
        
        
        return redirect()->route('doctors.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(doctor $doctor)
    {
        if (!Auth::user()->hasRole(Role::ADMIN_ROLE)) {
            abort(404);
        }

        $doctor->delete();
        return redirect()->route('doctors.index');
    }
}
