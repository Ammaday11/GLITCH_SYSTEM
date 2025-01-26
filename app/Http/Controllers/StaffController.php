<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
//use Illuminate\Support\Facades\Auth;
use Auth;
use App\Models\{
    User,
    Glitch,
    Guest,
    Staff,
};

class StaffController extends Controller
{
    public function index()
    {
        if(!Auth::user()->can('manage_staff')) {
            return redirect()->route('home')->with('error', 'You are not authorized to view this page.');
        }
        $staffs = Staff::all();
        return view('staff.index', compact('staffs'));
    }

    public function create()
    {
        if(!Auth::user()->can('manage_staff')) {
            return redirect()->route('home')->with('error', 'You are not authorized to view this page.');
        }
        return view('staff.create');
    }

    public function store(Request $request)
    {
        if(!Auth::user()->can('manage_staff')) {
            return redirect()->route('home')->with('error', 'You are not authorized to create new staff.');
        }
        $validated = $request->validate([
            'name' => 'required|string',
        ]);

        
        $newStaff = Staff::create([
            'name' => $validated['name'],
        ]);


        return redirect()->route('home')->with('success', 'New Staff created successfully.');
    }

    public function edit(string $id)
    {
        if(!Auth::user()->can('manage_staff')) {
            return redirect()->route('staff.list')->with('error', 'You are not authorized to modify staff.');
        }

        $staff = Staff::find($id);
        
        return view('Staff.edit', compact('staff'));
    }

    public function update(Request $request, string $id)
    {
        if(!Auth::user()->can('manage_staff')) {
            return redirect()->route('home')->with('error', 'You are not authorized to modify staff.');
        }

        $validated = $request->validate([
            'name' => 'string',
        ]);

        $staff = staff::find($id);
        $staff->update(array_merge($validated));

        return redirect()->route('staff.index')->with('success', 'Staff updated successfully.');
    }

    public function delete(string $id)
    {
        if(!Auth::user()->can('manage_staff')) {
            return redirect()->route('home')->with('error', 'You are not authorized to delete staff.');
        }
        $staff = Staff::find($id);
        
        return view('staff.delete', compact('staff'));
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if(!Auth::user()->can('manage_staff')) {
            return redirect()->route('home')->with('error', 'You are not authorized to delete staff.');
        }

        $staff = Staff::find($id);
        $staff->delete();
        return redirect()->route('staff.index')->with('success', 'Staff deleted successfully.');
    }
}
