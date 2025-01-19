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
};


class GlitchesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $glitches = Glitch::whereDate('created_at', now()->toDateString())->with('user')->get();
        return view('home', compact('glitches'));
    }

    public function all_glitches()
    {
        $glitches = $glitches = Glitch::with('user')->get();
        return view('Glitch.list_glitch', compact('glitches'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(!Auth::user()->can('create_glitch')) {
            return redirect()->route('home')->with('error', 'You are not authorized to create glitches.');
        }
        return view('Glitch.create_glitch');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(!Auth::user()->can('create_glitch')) {
            return redirect()->route('home')->with('error', 'You are not authorized to create glitches.');
        }
        $validated = $request->validate([
            'room_no' => 'required|string',
            'category' => 'required|in:general request,complaint,issue',
            'title' => 'required|string',
            'description' => 'required|string',
        ]);

        $guest = Guest::where('room_No', $validated['room_no'])->first();
        if($guest){
            $guestName = $guest->guest_name;
        }else{
            $guestName = "TBA";
        }
        $newGlitch = Glitch::create([
            'user_id' => Auth::id(),
            'room_no' => $validated['room_no'],
            'guest_name' => $guestName,
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
        if(!Auth::user()->can('view_glitch')) {
            return redirect()->route('home')->with('error', 'You are not authorized to view glitches.');
        }
        $glitch = Glitch::with('user')->find($id);

        return view('Glitch.show_glitch', compact('glitch'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if(!Auth::user()->can('modify_glitch')) {
            return redirect()->route('home')->with('error', 'You are not authorized to modify glitches.');
        }

        $glitch = Glitch::with('user')->find($id);
        
        return view('Glitch.edit_glitch', compact('glitch'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if(!Auth::user()->can('modify_glitch')) {
            return redirect()->route('home')->with('error', 'You are not authorized to modify glitches.');
        }

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

    public function update_status(Request $request, $id)
    {
        if(!Auth::user()->can('modify_glitch')) {
            return redirect()->route('home')->with('error', 'You are not authorized to modify glitches.');
        }
        // Validate the request
        $request->validate([
            'status' => 'required|string|in:Pending,Ongoing,Resolved,Follow-up Pending,Suspended',
        ]);

        // Find the glitch by ID
        $glitch = Glitch::findOrFail($id);

        // Update the status
        $glitch->status = $request->input('status');
        $glitch->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Glitch status updated successfully.');
    }

    public function delete(string $id)
    {
        if(!Auth::user()->can('delete_glitch')) {
            return redirect()->route('home')->with('error', 'You are not authorized to delete glitches.');
        }
        $glitch = Glitch::with('user')->find($id);
        
        return view('Glitch.delete_glitch', compact('glitch'));
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if(!Auth::user()->can('delete_glitch')) {
            return redirect()->route('home')->with('error', 'You are not authorized to delete glitches.');
        }

        $glitch = Glitch::find($id);
        $glitch->delete();
        return redirect()->route('home')->with('success', 'Glitch deleted successfully.');
    }
    public function get_report()
    {
        //$glitches = Glitch::with('user')->get();

        if(!Auth::user()->can('view_reports')) {
            return redirect()->route('home')->with('error', 'You are not authorized to view reports.');
        }

        $glitches = Glitch::whereDate('created_at', now()->toDateString())->with('user')->get();
        return view('Glitch.report_glitch', compact('glitches'));
    }

    public function report(Request $request)
    {
        if(!Auth::user()->can('view_reports')) {
            return redirect()->route('home')->with('error', 'You are not authorized to view reports.');
        }
        $validated = $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'category' => 'nullable|string',
            'status' => 'nullable|string',
        ]);

        $start_date = Carbon::parse($validated['start_date'])->startOfDay();
        $end_date = Carbon::parse($validated['end_date'])->endOfDay();

        $query = Glitch::whereBetween('created_at', [$start_date, $end_date]);

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