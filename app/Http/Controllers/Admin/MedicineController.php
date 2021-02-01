<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\StoreMedicineRequest;

use App\Models\Medicine;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicines = Medicine::orderBy('medicinecode', 'asc')->get();
        return view('admin.medicines.index', compact('medicines'));
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

        return view('admin.medicines.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMedicineRequest $request)
    {
        // if (!Auth::user()->hasRole(Role::ADMIN_ROLE)) {
        //     abort(404);
        // }

        $medicine = Medicine::create($request->validated());

        return redirect()->route('medicines.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function edit(Medicine $medicine)
    {
    
        if (!Auth::user()->hasRole(Role::ADMIN_ROLE)) {
            abort(404);
        }

        return view('admin.medicines.edit', compact('medicine'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function update(StoreMedicineRequest $request, Medicine $medicine)
    {
        
        if (!Auth::user()->hasRole(Role::ADMIN_ROLE)) {
            abort(404);
        }

        $medicine->update($request->validated());

        return redirect()->route('medicines.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medicine $medicine)
    {
        if (!Auth::user()->hasRole(Role::ADMIN_ROLE)) {
            abort(404);
        }

        $medicine->delete();
        return redirect()->route('medicines.index');
    }
}
