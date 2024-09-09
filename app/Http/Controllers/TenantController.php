<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class TenantController extends Controller
{
    public function index(): View {
        $tenants = DB::table('tenant')
        ->join('users', 'users.id', '=', 'tenant.user_id')
        ->select('users.email', 'users.name', 'tenant.*')
        ->get();
        return view('adminLevel.tenants.index',compact('tenants'));
     }

    public function create(): View {
        $user = User::where('level', 'Tenant')->get();
        return view('adminLevel.tenants.create', compact('user'));
    }

    public function store(Request $request): RedirectResponse {
        $request->validate([
            'user_id'      => 'required',
            'address'         => 'required|max:255',
            'phone'      => 'required|min:11|max:13|'
        ]);

        Tenant::create([
            'user_id'          => $request->user_id,
            'address'             => $request->address,
            'phone'             => $request->phone,
        ]);
        return redirect()->route('admin.tenants.index');
    }

    public function show(string $id): View {
        $tenant = DB::table('tenant')
        ->join('users', 'users.id', '=', 'tenant.user_id')
        ->select('users.email', 'users.name', 'tenant.*')
        ->where('tenant_id', $id)
        ->first();
        return view('adminLevel.tenants.show', compact('tenant'));
    }

    public function edit(string $id): View {
        $tenant = Tenant::findOrFail($id);
        $user = User::where('level', 'Tenant')->get();
        return view('adminLevel.tenants.edit', compact('tenant', 'user'));
    }

    public function update(Request $request, $id): RedirectResponse {
        $request->validate([
            'address' => 'required|max:255',
            'phone' => 'required|min:11|max:13|'
        ]);

        $tenant = Tenant::findOrFail($id);
        $tenant->update([
            'address' => $request->address,
            'phone' => $request->phone,
        ]);
        return redirect()->route('admin.tenants.index');
    }

    public function destroy($id): RedirectResponse {
        $tenant = Tenant::findOrFail($id);
        $tenant->delete();
        return redirect()->route('admin.tenants.index');
    }
}
