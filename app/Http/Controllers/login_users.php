<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\User; // Ensure the correct namespace for the User model


use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class login_users extends Controller
{



    public function index2() {
        return view('home');
    }

    public function index () {
        return view('login');
    }
    public function login(Request $request)
    {
        session()->put('AlreadyLoggedIn', FALSE);
        session()->put('user', null);

        // Validate the request
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);
    
        if ($validator->fails()) {
            // Redirect back with input and errors
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        // Find the user by email
        $user = User::where('email', $request->email)->first();
    
        if (!$user) {
            return redirect()->back()->withErrors(['email' => 'User not found'])->withInput();
        }
    
        // Verify the password
        if (!Hash::check($request->password, $user->password)) {
            return redirect()->back()->withErrors(['password' => 'Password incorrect'])->withInput();
        }
        
        session()->put('user',$user );
        session()->put('AlreadyLoggedIn', true);
        return redirect("/index") ;
    }


    public function logout() {
        session()->forget('AlreadyLoggedIn');
        session()->forget('user');
        session()->flush();
        
        return redirect('/login');
    }
}
