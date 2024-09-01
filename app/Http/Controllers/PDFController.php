<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empolyee;
use Barryvdh\DomPDF\Facade\PDF;


class PDFController extends Controller
{
    public function __construct() {
        $this->middleware('AlreadyLoggedIn');
    }
    /**
     * Display a listing of the resource.
     */
    public function generatepdf($id)
    {
        // Find the employee by ID
        $employee = Empolyee::find($id);

        // Check if the employee exists
        if (!$employee) {
            return response()->json(['error' => 'Employee not found'], 404);
        }

        // Get the departments associated with the employee
        $departments = $employee->departments;

        // Load the view and pass the employee data
        $pdf = PDF::loadView('Empolyees.PDFdetailempolyee', compact('employee', ));

        // Download the generated PDF
        return $pdf->download('funda-product-data.pdf');
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}