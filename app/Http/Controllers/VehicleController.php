<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class VehicleController extends Controller
{
    public function index(): View {
        $vehicles = Vehicle::paginate(10);
        return view('adminLevel.vehicles.index', compact('vehicles'));
     }

    public function create(): View {
        return view('adminLevel.vehicles.create');
    }

    public function store(Request $request): RedirectResponse {
        $request->validate([
            'vehicle_number' => 'required|string|unique:vehicle,vehicle_number|max:8',
            'machine_number' => 'required|string|unique:vehicle,machine_number|min:2',
            'car_type' => 'required',
            'car_name' => 'required',
            'brand' => 'required',
            'capacity' => 'required',
            'rates' => 'required',
        ]);

        Vehicle::create([
            'vehicle_number' => strtoupper($request->vehicle_number),
            'machine_number' => strtoupper($request->machine_number),
            'car_type' => $request->car_type,
            'car_name' => $request->car_name,
            'brand' => $request->brand,
            'capacity' => $request->capacity,
            'rates' => $request->rates,
        ]);
        return redirect()->route('admin.vehicles.index');
    }

    public function show(string $id): View {
        $vehicle = Vehicle::findOrFail($id);
        return view('adminLevel.vehicles.show', compact('vehicle'));
    }

    public function edit(string $id): View {
        $vehicle = Vehicle::findOrFail($id);
        return view('adminLevel.vehicles.edit', compact('vehicle'));
    }

    public function update(Request $request, $id): RedirectResponse {
        $request->validate([
            'car_type' => 'required',
            'car_name' => 'required',
            'brand' => 'required',
            'capacity' => 'required',
            'rates' => 'required',
        ]);

        $vehicle = Vehicle::findOrFail($id);
        $vehicle->update([
            'car_type' => $request->car_type,
            'car_name' => $request->car_name,
            'brand' => $request->brand,
            'capacity' => $request->capacity,
            'rates' => $request->rates,
        ]);
        return redirect()->route('admin.vehicles.index');
    }

    public function destroy($id): RedirectResponse {
        $vehicle = Vehicle::findOrFail($id);
        $vehicle->delete();
        return redirect()->route('admin.vehicles.index');
    }
}
