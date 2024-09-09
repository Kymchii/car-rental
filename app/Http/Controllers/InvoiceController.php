<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Receipt;
use App\Models\Vehicle;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class InvoiceController extends Controller
{
    public function index(): View {
        $invoices = DB::table('invoice')
        ->join('rent', 'rent.rent_id', '=', 'invoice.rent_id')
        ->join('vehicle', 'vehicle.vehicle_number', '=', 'rent.vehicle_number')
        ->join('tenant', 'tenant.tenant_id', '=', 'rent.tenant_id')
        ->join('users', 'users.id', '=', 'tenant.user_id')
        ->join('receipt', 'receipt.receipt_id', '=', 'rent.receipt_id')
        ->select('invoice.invoice_id', 'receipt.date', 'users.name', 'vehicle.car_name', 'vehicle.brand', 'vehicle.vehicle_number')
        ->get();
        return view('adminLevel.invoices.index', compact('invoices'));
     }

    public function create(): View {
        $rents = DB::table('rent')
        ->join('vehicle', 'vehicle.vehicle_number', '=', 'rent.vehicle_number')
        ->join('tenant', 'tenant.tenant_id', '=', 'rent.tenant_id')
        ->join('users', 'users.id', '=', 'tenant.user_id')
        ->join('receipt', 'receipt.receipt_id', '=', 'rent.receipt_id')
        ->select('rent.rent_id', 'receipt.date', 'users.name', 'vehicle.car_name', 'vehicle.brand', 'vehicle.vehicle_number')
        ->get();
        return view('adminLevel.invoices.create', compact('rents'));
    }

    public function store(Request $request): RedirectResponse {
        $request->validate([
            'rent_id' => 'required',
        ]);

        Invoice::create([
            'rent_id' => $request->rent_id,
        ]);
        return redirect()->route('admin.invoices.index');
    }

    public function show(string $id): View {
        $invoice = DB::table('invoice')
        ->join('rent', 'rent.rent_id', '=', 'invoice.rent_id')
        ->join('vehicle', 'vehicle.vehicle_number', '=', 'rent.vehicle_number')
        ->join('tenant', 'tenant.tenant_id', '=', 'rent.tenant_id')
        ->join('users', 'users.id', '=', 'tenant.user_id')
        ->join('receipt', 'receipt.receipt_id', '=', 'rent.receipt_id')
        ->select('invoice.invoice_id', 'receipt.date', 'users.name', 'vehicle.car_name', 'vehicle.brand', 'vehicle.vehicle_number', 'tenant.phone', 'tenant.address')
        ->where('invoice.invoice_id', '=', $id)
        ->first();
        return view('adminLevel.invoices.show', compact('invoice'));
    }

    public function destroy($id): RedirectResponse {
        $invoice = Invoice::findOrFail($id);
        $invoice->delete();
        return redirect()->route('admin.invoices.index');
    }
}
