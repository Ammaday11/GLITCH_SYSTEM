<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\{
    User,
    Glitch,
    Guest,
    Staff,
    GlitchType,
};


class GlitchTypeController extends Controller
{
    public function index()
    {
        if(!Auth::user()->can('manage_glitch_types')) {
            return redirect()->route('home')->with('error', 'You are not authorized to view this page.');
        }
        $glitch_types = GlitchType::all();
        return view('glitch_types.index', compact('glitch_types'));
    }

    public function create()
    {
        if(!Auth::user()->can('create_glitch_types')) {
            return redirect()->route('home')->with('error', 'You are not authorized to view this page.');
        }
        return view('glitch_types.create');
    }

    public function store(Request $request)
    {
        if(!Auth::user()->can('create_glitch_types')) {
            return redirect()->route('home')->with('error', 'You are not authorized to create new staff.');
        }
        $validated = $request->validate([
            'type' => 'required|string',
        ]);

        
        $newglitchType = GlitchType::create([
            'type' => $validated['type'],
        ]);


        return redirect()->route('glitches.create')->with('success', 'New glitch type created successfully.');
    }

    // public function edit(string $id)
    // {
    //     if(!Auth::user()->can('manage_glitch_types')) {
    //         return redirect()->route('staff.list')->with('error', 'You are not authorized to modify staff.');
    //     }

    //     $staff = Staff::find($id);
        
    //     return view('Staff.edit', compact('staff'));
    // }

    // public function update(Request $request, string $id)
    // {
    //     if(!Auth::user()->can('manage_glitch_types')) {
    //         return redirect()->route('home')->with('error', 'You are not authorized to modify staff.');
    //     }

    //     $validated = $request->validate([
    //         'name' => 'string',
    //     ]);

    //     $staff = staff::find($id);
    //     $staff->update(array_merge($validated));

    //     return redirect()->route('staff.index')->with('success', 'Staff updated successfully.');
    // }

    public function delete(string $id)
    {
        if(!Auth::user()->can('manage_glitch_types')) {
            return redirect()->route('home')->with('error', 'You are not authorized to delete staff.');
        }
        $glitch_type = GlitchType::find($id);
        
        return view('glitch_types.delete', compact('glitch_type'));
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if(!Auth::user()->can('manage_glitch_types')) {
            return redirect()->route('home')->with('error', 'You are not authorized to delete staff.');
        }

        $glitch_type = GlitchType::find($id);
        $glitch_type->delete();
        return redirect()->route('glitch_type.index')->with('success', 'Glitch type deleted successfully.');
    }
}
