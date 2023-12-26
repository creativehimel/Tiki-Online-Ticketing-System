<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\Location;
use App\Models\Trip;
use Illuminate\Http\Request;

class TripController extends Controller
{
    public function index()
    {
        $trips = Trip::all();
        return view('pages.trips.index', compact('trips'));
    }
    public function create()
    {
        $locations = Location::all();
        $buses = Bus::all();
        return view('pages.trips.create', compact('locations', 'buses'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'departure_date' => 'required|date',
            'location_id' => 'required|exists:locations,id',
            'bus_id' => 'required|exists:buses,id',
        ]);

        Trip::create([
            'from_location' => $request->from_location,
            'to_location' => $request->to_location,
            'location_id' => $request->location_id,
            'bus_id' => $request->bus_id,
            'departure_date' => $request->departure_date,
        ]);
        return redirect()->route('trips.index')->with('success', 'Trip created successfully!');
    }
    public function show(string $id)
    {

    }
    public function edit(string $id)
    {
        $trip = Trip::find($id);
        return view('pages.trip.edit', compact('trip'));
    }
    public function update(Request $request, string $id)
    {
        $request->validate([
            'departure_date' => 'required|date',
            'bus_id' => 'required|exists:buses,id',
            'from_location' => 'required|exists:locations,id',
            'to_location' => 'required|exists:locations,id',
        ]);

        $trip = Trip::where('id', $id)->update([
            'departure_date' => $request->departure_date,
            'bus_id' => $request->bus_id,
            'from_location' => $request->from_location,
            'to_location' => $request->to_location,
        ]);

        if ($trip) {
            return redirect()->route('trips.index')->with('message', 'Trip data updated successfully');
        }
    }
    public function destroy(string $id)
    {
        Trip::destroy($id);
        return redirect()->route('trips.index')->with('message', 'Trip deleted successfully');
    }
}
