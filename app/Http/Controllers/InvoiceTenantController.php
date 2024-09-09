<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class InvoiceTenantController extends Controller
{
    public function index(): View {
        $id = Auth::user()->id;
        $invoices = DB::table('invoice')
        ->join('rent', 'rent.rent_id', '=', 'invoice.rent_id')
        ->join('vehicle', 'vehicle.vehicle_number', '=', 'rent.vehicle_number')
        ->join('tenant', 'tenant.tenant_id', '=', 'rent.tenant_id')
        ->join('users', 'users.id', '=', 'tenant.user_id')
        ->join('receipt', 'receipt.receipt_id', '=', 'rent.receipt_id')
        ->select('invoice.invoice_id', 'receipt.date', 'users.name', 'vehicle.car_name', 'vehicle.brand', 'vehicle.vehicle_number', 'users.id')
        ->where('users.id', '=', $id)
        ->get();
        return view('tenantLevel.invoices.index', compact('invoices'));
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
        return view('tenantLevel.invoices.show', compact('invoice'));
    }
}
