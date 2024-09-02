<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Hash;


use Illuminate\Http\Request;
use App\Models\User; // Ensure the correct namespace for the User model

class UserController extends Controller
{
    public function __construct() {
        $this->middleware(['AlreadyLoggedIn' ,'CheckAdmin']);
    }

        public function index1() {
            return view('index');
        }

    public function index()
    {
        
            $users = User::all();
            // $user = User::find(2);
            // dd($users);
            // $departments = $user->departments;
            // dd($departments);
            return view('users.indexuser', compact('users'));
    }


    public function create()
        {
                return view('users.createuser');
        }

    public function store(Request $request)
        {
                $request->validate([
                    'name' => 'required|string|max:255',
                    'email' => 'required|string|email|max:255|unique:users',
                    'password' => 'required|string|min:8|confirmed',
                    'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                ]);
            
                $data = $request->all();
                if ($request->hasFile('picture')) {
                    $path = $request->file('picture')->store('');
                    $data['picture'] = $path;
                    // dd($path) ;
                }
            
                User::create([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'password' => Hash::make($data['password']),
                    'picture' => $data['picture'] ?? null,
                ]);
            
                return redirect()->route('users.index')->with('success', 'User created successfully.');
        }


    public function destroy($id) {
                    // Suppression d'un utilisateur
                    $user = User::find($id);
                    if ($user) {
                        $user->delete();
                        return redirect()->route('users.index')->with('success', 'Utilisateur supprimé avec succès!');
                    } else {
                        return redirect()->route('users.index')->with('error', 'Utilisateur introuvable.');
                    }
        }


        public function edit($id) { 
                    // Récupération de l'utilisateur
                    $user = User::find($id);
                    if ($user) {
                        return view('users.updateuser', compact('user'));
                    } else {
                        return redirect()->route('users.index')->with('error', 'Utilisateur introuvable.');
                    }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'nullable|string|min:8|confirmed',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $path = $file->store('');
            $user->picture = $path;
        }

        $user->save();

        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }


    public function show($id) { 
            $user = User::find($id);
            // dd($user);
            // $departments = $user->departments;
            // dd($user);
            
            return view('users.showuser', compact('user'));
        }




}