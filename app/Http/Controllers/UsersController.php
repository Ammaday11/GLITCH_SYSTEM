<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Session;

class UsersController extends Controller
{

    
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'bwlmNo' => 'required|string|max:255|unique:users,bwlmNo',
            'name' => ['required', 'string', 'max:255'],
            // 'password' => ['required', 'string', 'min:8', 'confirmed'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    public function create()
    {
        return view('User.sign-up');
    }

    public function store(Request $data)
    {
        // dd($data);
        $this->validator($data->all())->validate();

        $user = User::create([
            'bwlmNo' => $data['bwlmNo'],
            'name' => $data['name'],
            'password' => Hash::make($data['password']),
        ]);
        if(!$user){
            return redirect()->route('user.create')->with('error', 'Registration failed, try again!');
        }
        return redirect()->route('user.get_login')->with('success', 'User created successfully!');
    }

    public function sign_up()
    {
        return view('User.sign-up');
    }

    public function get_login()
    {
        return view('User.login');
    }

    public function login(Request $data)
    {
        $data->validate([
            'bwlmNo' => 'required',
            'password' => 'required',
            
        ]);
        $credentials = $data->only('bwlmNo', 'password');
        if(Auth::attempt($credentials)){
            return redirect()->route('home');
        }
        return redirect()->route('user.get_login')->with('error', 'Invalid credentials!');
    }
    
    public function logout(){
        Session::flush();
        Auth::logout();
        return redirect()->route('user.get_login');
    }
}
