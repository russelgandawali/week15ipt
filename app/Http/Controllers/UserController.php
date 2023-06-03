<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index(){
        return view('users.home');
    }   


    public function create(){
        return view('users.register');
    }

    public function products2(){
        return view('users.products2');
    }

    public function store(Request $request){
        $formFields = $request->validate([
            'name' => 'required|min:6|alpha_num|unique:users,name',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed'
        ]);

        //encrypt our password
        $formFields['password'] = bcrypt($formFields['password']);

        //save new user
        $user = User::create($formFields);

        //auto login
        auth()->login($user);

        //go back to home page
        return redirect('/')->with('success', 'welcome to the page'. $user->name);
    }

    public function authenticate(Request $request)
    {
        $formFields = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        //authenticate form
        if (auth()->attempt($formFields)) {
            $request->session()->regenerate();
            return redirect('/')->with('It Works!', 'Good Job');
        }

        return back()->withErrors(['email' => 'Invalid Credentials.'])->onlyInput('email');
    }

    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'bye.');
    }

    public function login(){
        return view('users.login');
    }





}
