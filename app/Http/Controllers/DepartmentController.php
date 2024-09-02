<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\User; // Ensure the correct namespace for the User model
use App\Mail\DepartmentCreated;
use App\Mail\DepartmentCreatedMail;
use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepartmentController extends Controller
{
    public function __construct() {
        $this->middleware(['AlreadyLoggedIn' ,'CheckAdmin']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()

    {
        // dd(session("user")) ;
        // dd(Auth::user());

    $departments = Department::join('users', 'departments.manager_id', '=', 'users.id')
                                ->select('departments.*', 'users.name as manager_name')
                                ->get();
    return view('departments.indexdepartemnt', ['departments' => $departments]);


            // $department = Department::find(1);
            // $employees = $department->employees;


                            }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $managers = User::all();
        return view('departments.createdepartment',compact('managers'));
    }

    /**
     * Store a newly created resource in storage.
     */
 public function store(Request $request)
{
                // Validation des données
                $validatedData = $request->validate([
                    'department_name' => 'required|string|max:255',
                    'manager_id' => 'required|integer',
                ]);
                
                // // Création du département
                $department = Department::create([
                    'department_name' => $validatedData['department_name'],
                    'manager_id' => $validatedData['manager_id'],
                ]);
                // Envoi de l'email
                Mail::to('mohcine@gmail.com')->send(new DepartmentCreated($department));
            
                
                // Redirection vers une autre page ou retour d'une vue
                return redirect()->route('departments.index')->with('success', 'Département créé avec succès!');
}



    /**
     * Display the specified resource.
     */
   public function show($id) { 
            $Department = Department::find($id);
            
            // $manager = $Department->user;
            // dd($manager->name);
    
    
    return view('Departments.showdepartemnt', compact('Department'));
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Department $department)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($department)
    {
        
        
        $departments =Department::find($department) ;
        if($departments) {
            $departments->delete();
            return redirect()->route('departments.index')->with('success', 'Département supprimé avec succès!');
        }
        else {
            return redirect()->route('departments.index')->with('error', 'Département introuvable!');
                    }
    }
}
