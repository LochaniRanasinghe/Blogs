<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    //Show user register form
    public function create()
    {
        return view('users.register');
    }


    
    //Create new user
    
    public function store(Request $request){

        //validate user
        $formFields=$request->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            //It ensures that the value entered in the "password" field matches the value entered in the "password_confirmation" (in the register form)
            'password' => ['required','min:6', 'confirmed'],
    
        ]);

        //hashing the password using bcrypt()
        $formFields['password'] = bcrypt($formFields['password']);

        //create the user
        $user = User::create($formFields);

        //login
        auth()->login($user);

        //return to the home page
        return redirect('/')->with('message', 'User created and logged in successfully');
             
    }
    //Show login form
    public function login()
    {
        return view('users.login');
        
    }

    //Authenticate User
    public function authenticate(Request $request){
        
        //validate user
        $formFields=$request->validate([
            'email' => ['required', 'email'],
            'password' => 'required',
        ]);

        //attempt to authenticate the user
        //attemt method returns true if the authentication was successful
        //auth() helper function is used to access the authentication services and methods provided by Laravel
        if(auth()->attempt($formFields)){
            //generate a new CSRF token 
            //This is done to prevent a malicious website from forcing a user to perform an action without their knowledge
            $request->session()->regenerateToken();

            return redirect('/')->with('message', 'User logged in successfully');
        }else{
            return back()->withErrors([
                'email' => 'Invalid Email.',
                'password' => 'Invalid Password.',
            ])->onlyInput('email');
        }
        
    }

    //User logout
    public function logout(Request $request)
    {
        //remove authentication details from the user's session
        auth()->logout();

        //invalidate the entire session
        $request->session()->invalidate();

        //generate a new CSRF token 
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'User logged out successfully');
    }

}