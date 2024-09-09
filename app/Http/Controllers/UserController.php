<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View {
        $users = User::latest()->paginate(10);
        return view('adminLevel.users.index',compact('users'));
     }

    public function create(): View {
        return view('adminLevel.users.create');
    }

    public function store(Request $request): RedirectResponse {
        $request->validate([
            'name'      => 'required',
            'email'         => 'required|min:5|unique:users,email|email',
            'password'      => 'required|min:5',
            'level'         => 'required'
        ]);

        User::create([
            'name'          => $request->name,
            'email'             => $request->email,
            'password'          => Hash::make($request['password']), 
            'level'             => $request->level,
        ]);
        return redirect()->route('admin.users.index');
    }

    public function show(string $id): View {
        $user = User::findOrFail($id);
        return view('adminLevel.users.show', compact('user'));
    }

    public function edit(string $id): View {
        $user = User::findOrFail($id);
        return view('adminLevel.users.edit', compact('user'));
    }

    public function update(Request $request, $id): RedirectResponse {
        $request->validate([
            'name' => 'required',
            'level' => 'required',
        ]);

        $user = User::findOrFail($id);
        $user->update([
            'name'          => $request->name,
            'level'             => $request->level,
        ]);
        return redirect()->route('admin.users.index');
    }

    public function destroy($id): RedirectResponse {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.users.index');
    }
}
