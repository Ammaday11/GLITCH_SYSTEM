<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
//use Illuminate\Support\Facades\Auth;
use Auth;
use App\Models\{
    User,
    Glitch,
    Guest,
    Staff,
    GlitchType,
    GuestSatisfaction,
};


class GlitchesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(!Auth::user()->can('view_glitch_list')) {
            return redirect()->route('home')->with('error', 'You are not authorized to view this page.');
        }
        $glitches = Glitch::whereDate('created_at', now()->toDateString())->with('user')->get();
        $staffs = Staff::pluck('name'); // Fetch user names
        $satisfactions = GuestSatisfaction::pluck('guest_satisfaction');
        return view('home', compact('glitches', 'staffs', 'satisfactions'));
    }

    public function all_glitches()
    {
        if(!Auth::user()->can('view_glitch_list')) {
            return redirect()->route('home')->with('error', 'You are not authorized to view this page.');
        }
        $glitches = $glitches = Glitch::with('user')->get();
        $staffs = Staff::pluck('name'); // Fetch user names
        $satisfactions = GuestSatisfaction::pluck('guest_satisfaction');
        return view('Glitch.list_glitch', compact('glitches', 'staffs', 'satisfactions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(!Auth::user()->can('create_glitch')) {
            return redirect()->route('home')->with('error', 'You are not authorized to create new glitches.');
        }
        $glitch_types = GlitchType::pluck('type'); // Fetch user names
        return view('Glitch.create_glitch', compact('glitch_types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(!Auth::user()->can('create_glitch')) {
            return redirect()->route('home')->with('error', 'You are not authorized to create new glitches.');
        }
        $validated = $request->validate([
            'room_no' => 'required|string',
            'category' => 'required|in:General request,Complaint,Issue',
            'glitch_type' => 'required|string',
            'title' => 'required|string',
            'description' => 'nullable|string',
        ]);

        $guest = Guest::where('room_No', $validated['room_no'])->first();
        if($guest){
            $guestName = $guest->guest_name;
            $guestArrDate = $guest->arrival_date;
            $guestDepDate = $guest->departure_date;
        }else{
            $guestName = "TBA";
        }

        
        $newGlitch = Glitch::create([
            'user_id' => Auth::id(),
            'room_no' => $validated['room_no'],
            'guest_name' => $guestName,
            'arrival_date' => $guestArrDate,
            'departure_date' => $guestDepDate,
            'category' => $validated['category'],
            'glitch_type' => $validated['glitch_type'],
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
            'category' => 'required|in:General request,Complaint,Issue',
            'title' => 'required|string',
            'description' => 'string|nullable',
            'comments' => 'string|nullable',
            'status' => 'required|in:Pending,Ongoing,Resolved,Follow-up Pending,Suspended',
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
        $glitch->update(['updated_by' => Auth::id()]);
        $glitch->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Glitch status updated successfully.');
    }

    public function update_follow_up_by(Request $request, $id)
    {
        // if(!Auth::user()->can('modify_glitch')) {
        //     return redirect()->route('home')->with('error', 'You are not authorized to modify glitches.');
        // }
        // Validate the request
        $request->validate([
            'follow_up_by' => 'required|string'
        ]);

        // Find the glitch by ID
        $glitch = Glitch::findOrFail($id);
        

        // Check if `follow_up_by` is being updated
        if ($glitch->follow_up_by !== $request->follow_up_by) {
            $glitch->follow_up_by = $request->follow_up_by;
            $glitch->follow_up_at = now(); // Update `follow_up_at` to the current timestamp
        }
        $glitch->save();

        // Redirect back with a success message
        return redirect()->back();
    }

    public function update_satisfaction(Request $request, $id)
    {
        $request->validate([
            'guest_satisfaction' => 'required|string'
        ]);

        // Find the glitch by ID
        $glitch = Glitch::findOrFail($id);
        

        // Check if `follow_up_by` is being updated
        if ($glitch->guest_satisfaction !== $request->guest_satisfaction) {
            $glitch->guest_satisfaction = $request->guest_satisfaction;
        }
        $glitch->save();
        
        return redirect()->back();
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

//========================================================================= REPORTS =============================================================================================================


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

    public function generateDayEndReport()
    {
        // Define the start and end dates
        $endDate = now();
        $startDate = $endDate->copy()->subDays(15);
    
        // Query the glitches grouped by guest name
        $reportData = DB::table('glitches')
            ->select('room_No', 'guest_name', 'arrival_date', 'departure_date', 'title as glitch_title', 'created_at')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->orderBy('guest_name')
            ->orderBy('created_at')
            ->get();
    
        // Group the glitches by guest and count them manually
        $groupedData = $reportData->groupBy('guest_name')->map(function ($guestData) {
            return [
                'glitches' => $guestData->sortByDesc('created_at'),
                'count' => $guestData->count()
            ];
        });
    
        // Sort by guest with most glitches
        $sortedData = $groupedData->sortByDesc(function ($guestData) {
            return $guestData['count'];
        });
    
        // Pass the report data to the view
        return view('Glitch.day_end_report', compact('sortedData', 'startDate', 'endDate'));
    }
    
}