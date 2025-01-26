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
    GuestSatisfaction,
};

class GuestSatisfactionController extends Controller
{
    public function index()
    {
        if(!Auth::user()->can('manage_guest_satisfactions')) {
            return redirect()->route('home')->with('error', 'You are not authorized to view this page.');
        }
        $satisfactions = GuestSatisfaction::all();
        return view('guest_satisfaction.index', compact('satisfactions'));
    }

    public function create()
    {
        if(!Auth::user()->can('create_guest_satisfactions')) {
            return redirect()->route('home')->with('error', 'You are not authorized to view this page.');
        }
        return view('guest_satisfaction.create');
    }

    public function store(Request $request)
    {
        if(!Auth::user()->can('create_guest_satisfactions')) {
            return redirect()->route('home')->with('error', 'You are not authorized to create new staff.');
        }
        $validated = $request->validate([
            'guest_satisfaction' => 'required|string',
        ]);

        
        $newSatisfaction = GuestSatisfaction::create([
            'guest_satisfaction' => $validated['guest_satisfaction'],
        ]);


        return redirect()->route('home')->with('success', 'New Guest satisfaction created successfully.');
    }
    public function delete(string $id)
    {
        if(!Auth::user()->can('manage_guest_satisfactions')) {
            return redirect()->route('home')->with('error', 'You are not authorized to delete staff.');
        }
        $satisfaction = GuestSatisfaction::find($id);
        
        return view('guest_satisfaction.delete', compact('satisfaction'));
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if(!Auth::user()->can('manage_guest_satisfactions')) {
            return redirect()->route('home')->with('error', 'You are not authorized to delete staff.');
        }

        $satisfaction = GuestSatisfaction::find($id);
        $satisfaction->delete();
        return redirect()->route('guest_satisfaction.index')->with('success', 'Guest satisfactioin deleted successfully.');
    }
}
