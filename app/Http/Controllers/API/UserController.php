<?php

namespace App\Http\Controllers\API;

use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users =User::all() ;

        return response()->json($users, 200);
    }

    /**
     * Store a newly created resource in storage.
     */



        public function store(Request $request)
        {
            // dd($request->all())
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed',
                'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $data = $request->all();
            if ($request->hasFile('picture')) {
             $path = $request->file('picture')->store('pictures'); // Specify a directory
                $data['picture'] = $path;
            }

        User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'picture' => $data['picture'] ?? null,
                ]);

        return response()->json(['message' => 'data update '], 201);
        // return response()->json(['message' => $data], 201);
        }




    /**
     * Display the specified resource.
     */
    public function show($user)
    {
            $user = User::find($user);
            if (!$user) {
                return response()->json(['error' => 'User not found'], 404);
            }
            return response()->json($user);
    } 
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$user)
    {
        //
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'nullable|string|min:8|confirmed',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user =User::find($user);
        $user->name = $request->name;
        $user->email = $request->email;

        if($request->filled('password')){
            $user->password = Hash::make($request->password);
        }
        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $path = $file->store('');
            $user->picture = $path;
        }
        $user->save();
        return response()->json(['message' => "user update successfully" ], 201);    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy($user)
    {
        $user =User::find($user);
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }
        $user->delete();
        return response()->json("message : User deleted successfully", 200);
    }
}
