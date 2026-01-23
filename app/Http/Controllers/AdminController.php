<?php

namespace App\Http\Controllers;

use App\Models\Slot;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // List availability for a date
    public function index(Request $request)
    {
        return Slot::where('date', $request->date)
            ->orderBy('start_time')
            ->get(['id', 'date', 'start_time', 'end_time', 'is_active', 'is_booked']);
    }

    // Add new slot
    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ]);

        Slot::create([
            'date' => $request->date,
            'start_time' => $request->start_time . ':00',
            'end_time' => $request->end_time . ':00',
            'is_active' => true,
        ]);

        return response()->json(['message' => 'Slot added successfully']);
    }

    public function toggle($id)
    {
        $slot = Slot::findOrFail($id);
        $slot->is_active = !$slot->is_active;
        $slot->save();

        return response()->json(['message' => 'Slot updated']);
    }
}
