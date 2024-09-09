<?php

namespace App\Http\Controllers;

use App\Models\Receipt;
use App\Models\Rent;
use App\Models\Tenant;
use App\Models\Vehicle;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class RentController extends Controller
{
    public function index(): View {
        $rents = DB::table('rent')
        ->join('vehicle', 'vehicle.vehicle_number', '=', 'rent.vehicle_number')
        ->join('tenant', 'tenant.tenant_id', '=', 'rent.tenant_id')
        ->join('receipt', 'receipt.receipt_id', '=', 'rent.receipt_id')
        ->select('vehicle.vehicle_number', 'vehicle.rates', 'tenant.phone', 'tenant.address', 'receipt.date', 'rent.*')
        ->get();
        return view('adminLevel.rents.index', compact('rents'));
     }

    public function create(): View {
        $vehicle = Vehicle::all();
        $receipt = Receipt::all();
        $tenant = DB::table('tenant')
        ->join('users', 'users.id', '=', 'tenant.user_id')
        ->select('users.id', 'users.name', 'tenant.*')
        ->get();
        return view('adminLevel.rents.create', compact('vehicle', 'receipt', 'tenant'));
    }

    public function store(Request $request): RedirectResponse {
        $request->validate([
            'vehicle_number' => 'required|string',
            'receipt_id' => 'required',
            'tenant_id' => 'required',
            'completion_date' => 'required',
            'city' => 'required',
            'number_of_passengers' => 'required',
        ]);

        Rent::create([
            'vehicle_number' => $request->vehicle_number,
            'receipt_id' => $request->receipt_id,
            'tenant_id' => $request->tenant_id,
            'completion_date' => $request->completion_date,
            'city' => $request->city,
            'number_of_passengers' => $request->number_of_passengers,
        ]);
        return redirect()->route('admin.rents.index');
    }

    public function show(string $id): View {
        $rent = DB::table('rent')
        ->join('tenant', 'tenant.tenant_id', '=', 'rent.tenant_id')
        ->join('users', 'users.id', '=', 'tenant.user_id')
        ->join('vehicle', 'vehicle.vehicle_number', '=', 'rent.vehicle_number')
        ->join('receipt', 'receipt.receipt_id', '=', 'rent.receipt_id')
        ->select('users.name', 'tenant.phone', 'tenant.address', 'vehicle.vehicle_number', 'vehicle.rates', 'receipt.date', 'rent.*')
        ->where('rent.rent_id', '=', $id)
        ->first();
        return view('adminLevel.rents.show', compact('rent'));
    }

    public function edit(string $id): View {
        $rent = Rent::findOrFail($id);
        $vehicle = Vehicle::all();
        $receipt = Receipt::all();
        $tenant = DB::table('tenant')
        ->join('users', 'users.id', '=', 'tenant.user_id')
        ->select('users.id', 'users.name', 'tenant.*')
        ->get();
        return view('adminLevel.rents.edit', compact('rent', 'vehicle', 'receipt', 'tenant'));
    }

    public function update(Request $request, $id): RedirectResponse {
        $request->validate([
            'vehicle_number' => 'required|string',
            'receipt_id' => 'required',
            'tenant_id' => 'required',
            'completion_date' => 'required',
            'city' => 'required',
            'number_of_passengers' => 'required',
        ]);

        $rent = Rent::findOrFail($id);
        $rent->update([
            'vehicle_number' => $request->vehicle_number,
            'receipt_id' => $request->receipt_id,
            'tenant_id' => $request->tenant_id,
            'completion_date' => $request->completion_date,
            'city' => $request->city,
            'number_of_passengers' => $request->number_of_passengers,
        ]);
        return redirect()->route('admin.rents.index');
    }

    public function destroy($id): RedirectResponse {
        $rent = Rent::findOrFail($id);
        $rent->delete();
        return redirect()->route('admin.rents.index');
    }
}
