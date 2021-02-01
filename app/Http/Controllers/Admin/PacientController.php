<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

use App\Http\Requests\StorePacientRequest;
use App\Http\Requests\UpdatePacientRequest;
use App\Models\Pacient;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PacientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pacients = Pacient::orderBy('cnp', 'asc')->get();
        return view('admin.pacients.index', compact('pacients'));
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

        return view('admin.pacients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePacientRequest $request)
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
            'role_id'=>3,
        ]);
        
        $pacient = Pacient::create([
            'cnp'=>$request->cnp,
            'age'=>$request->age,
            'insurancetype' => $request->insurancetype, 
            'user_id'=>$user->id,
        ]);
        return redirect()->route('pacients.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function edit(Pacient $pacient)
    {
    
        if (!Auth::user()->hasRole(Role::ADMIN_ROLE)) {
            abort(404);
        }

        return view('admin.pacients.edit', compact('pacient'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePacientRequest $request, Pacient $pacient)
    {
        
        if (!Auth::user()->hasRole(Role::ADMIN_ROLE)) {
            abort(404);
        }
        $pacient->update([
            'age'=>$request->age,
            'insurancetype' => $request->insurancetype, 
            //'user_id'=>$user->id,
        ]);
        //dd($pacient->cnp);
        $pacient->user->update([
            'name'=>$request->name,
            'email'=>$request->email,
        ]);
        
        
        return redirect()->route('pacients.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pacient $pacient)
    {
        if (!Auth::user()->hasRole(Role::ADMIN_ROLE)) {
            abort(404);
        }

        $pacient->delete();
        return redirect()->route('pacients.index');
    }
}
