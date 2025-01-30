<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Session;
use App\Models\{
    User,
    Role,
};

class UsersController extends Controller
{

    
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|string|max:255|unique:users,username',
            'name' => ['required', 'string', 'max:255'],
            // 'password' => ['required', 'string', 'min:8', 'confirmed'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    public function index()
    {
        if(!Auth::user()->can('manage_users')) {
            return redirect()->route('home')->with('error', 'You are not authorized to manage users.');
        }

        $users = User::orderBy('username')
                    ->with('roles')
                    ->get();
        return view('User.list_user', compact('users'));
    }

    public function create()
    {
        return view('User.create_user');
    }

    public function store(Request $request)
    {
        if(!Auth::user()->can('manage_users')) {
            return redirect()->route('home')->with('error', 'You are not authorized to create users.');
        }
        $validated = $request->validate([
            'username' => 'required|string|unique:users,username',
            'name' => 'required|string',
            'password' => 'required|string|min:8',
            'roles' => 'required|array|min:1',
        ]);

        
        $user = User::create([
            'username' => $validated['username'],
            'name' => $validated['name'],
            'password' => Hash::make($validated['password']),
        ]);

        $user->roles()->sync($request->roles);


        if(!$user){
            return back()->withInput()->with('error', 'User creation failed. Please try again');
        }
        return redirect()->route('user.list')->with('success', 'User created successfully!');


    }

    public function edit(string $id)
    {
        if (!Auth::user()->can('manage_users')) {
            return redirect()->route('user.list')->with('error', 'You are not authorized to modify users.');
        }

        $user = User::findOrFail($id);
        $allRoles = Role::all()->pluck('name', 'id')->toArray();
        $userRoles = $user->roles->pluck('id')->toArray(); // Get the user's current roles (IDs)

        return view('User.edit_user', compact('user', 'allRoles', 'userRoles'));
    }

    public function update(Request $request, string $id)
{
        if (!Auth::user()->can('manage_users')) {
            return redirect()->route('user.list')->with('error', 'You are not authorized to modify users.');
        }
        
        
        $validated = $request->validate([
            'username' => 'required|string|unique:users,username,' . $id,
            'name' => 'required|string',
            'password' => 'nullable|string|min:8',
            'roles' => 'required|array|min:1',
        ]);
        
        $user = User::findOrFail($id);
        // Check if a new password is provided
        if (!empty($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']); // Hash the password
        } else {
            unset($validated['password']); // Remove password from the validated data
        }
        unset($validated['username']);
        //dd($validated);
        $user->update(array_merge($validated));
        $user->roles()->sync(array_map('intval', $request->roles));
        //$glitch->update($validated);

        return redirect()->route('user.list')->with('success', 'User updated successfully.');
    }



    public function delete(string $id)
    {
        if(!Auth::user()->can('manage_users')) {
            return redirect()->route('user.list')->with('error', 'You are not authorized to modify users.');
        }
        $user = User::findOrFail($id);
        $roles = Role::all()->pluck('name', 'id')->toArray();
        $userRoles = $user->roles->pluck('id')->toArray(); // Get the user's current roles (IDs)
        
        return view('user.delete', compact('user', 'roles', 'userRoles'));
    }


    public function destroy(string $id)
    {
        if(!Auth::user()->can('manage_users')) {
            return redirect()->route('user.list')->with('error', 'You are not authorized to modify users.');
        }

        $user = User::find($id);
        $user->delete();
        return redirect()->route('user.list')->with('success', 'User deleted successfully.');
    }

    // public function sign_up()
    // {
    //     return view('User.sign-up');
    // }

    public function get_login()
    {
        return view('User.login');
    }

    public function login(Request $data)
    {
        $data->validate([
            'username' => 'required',
            'password' => 'required',
            
        ]);
        $credentials = $data->only('username', 'password');
        if(Auth::attempt($credentials)){
            return redirect()->route('home')->with('success', 'Please update the Guest List!');
        }
        return redirect()->route('user.get_login')->with('error', 'Username or Passord is incorrect!');
    }

    public function get_change_password()
    {
        if(!Auth::user()->can('change_password')) {
            return redirect()->route('user.list')->with('error', 'You are not authorized to modify users.');
        }
        $user = Auth::user();
        return view('User.change-password', compact('user'));
    }

    public function change_password(Request $request, string $id)
    {
        if(!Auth::user()->can('change_password')) {
            return redirect()->route('user.list')->with('error', 'You are not authorized to modify users.');
        }
        $validated = $request->validate([
            'current_password' => ['required', 'string', 'min:8'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::find($id);
         // Check if the current password matches

        if (!Hash::check($validated['current_password'], $user->password)) {
            return redirect()->back()->with('error', 'Password is incorrect. Please try again.');
        }

        $user->password = Hash::make($validated['password']);
        $user->save();
        
        return redirect()->route('user.logout')->with('success', 'Password updated successfully. Please login again.');
    }

    public function logout(){
        Session::flush();
        Auth::logout();
        return redirect()->route('user.get_login')->with('success', 'Please login again.');
    }
}
