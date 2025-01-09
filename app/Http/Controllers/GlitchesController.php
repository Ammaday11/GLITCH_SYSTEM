<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\{
    User,
    Glitch,
};

class GlitchesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $glitches = Glitch::whereDate('created_at', now()->toDateString())->with('user')->get();

        //$glitches = Glitch::with('user')->get();

        //dd($glitches);
        return view('home', compact('glitches'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Glitch.create_glitch');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'room_no' => 'required|string',
            'guest_name' => 'string',
            'category' => 'required|in:general request,complaint,issue',
            'title' => 'required|string',
            'description' => 'required|string',
        ]);

        $newGlitch = Glitch::create([
            'user_id' => Auth::id(),
            'room_no' => $validated['room_no'],
            'guest_name' => $validated['guest_name'],
            'category' => $validated['category'],
            'title' => $validated['title'],
            'description' => $validated['description'],
            'pending' => 'pending',
            'updated_by' => Auth::id(),
        ]);


        return redirect()->route('home')->with('success', 'Glitch created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $glitch = Glitch::find($id);
        return view('Glitch.show_glitch', compact('glitch'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $glitch = Glitch::find($id);
        
        return view('Glitch.edit_glitch', compact('glitch'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'room_no' => 'required|string',
            'guest_name' => 'string',
            'category' => 'required|in:general request,complaint,issue',
            'title' => 'required|string',
            'description' => 'required|string',
            'status' => 'required|in:pending,ongoing,resolved,follow-up pending,suspended,deleted',
        ]);

        $glitch = Glitch::find($id);
        $glitch->update(array_merge($validated, ['updated_by' => Auth::id()]));
        //$glitch->update($validated);

        return redirect()->route('home')->with('success', 'Glitch updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function get_report()
    {
        //$glitches = Glitch::with('user')->get();
        $glitches = Glitch::whereDate('created_at', now()->toDateString())->with('user')->get();
        return view('Glitch.report_glitch', compact('glitches'));
    }

    public function report(Request $request)
    {
        $validated = $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'category' => 'nullable|string',
            'status' => 'nullable|string',
        ]);

        $query = Glitch::whereBetween('created_at', [$validated['start_date'], $validated['end_date']]);

        if ($request->category) {
            $query->where('category', $validated['category']);
        }

        if ($request->status) {
            $query->where('status', $validated['status']);
        }

        $glitches = $query->with('user')->get();
        return view('Glitch.report_glitch', compact('glitches', 'validated'));
    }
}