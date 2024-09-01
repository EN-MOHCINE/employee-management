<?php

namespace App\Http\Controllers;

use App\Models\Empolyee;
use Illuminate\Http\Request;

class EmpolyeeController extends Controller
{
    public function __construct() {
        $this->middleware('AlreadyLoggedIn');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empolyees = Empolyee::all();
        // dd($empolyees);
        return view('Empolyees.indexempolyees', compact('empolyees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($employee)

    {
        
        $employee = Empolyee::find($employee);
        // $employee->departements();
        $departments = $employee->departments;
        // dd($departments) ;


        
        // dd($employees);  // for debugging purpose only, remove in production code.
        return view('empolyees.showempolyees', compact('employee'));
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Empolyee $empolyee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Empolyee $empolyee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Empolyee $empolyee)
    {
        //
    }
}
