<?php

namespace App\Http\Controllers;

use App\Models\Auth;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::all();
        return view('users.index', compact('user'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:50|unique:table_user',
            'password' => 'required|string',
            'foto' => 'required|string',
            'role' => 'required|in:admin,operator,warga',
        ]);

        Auth::create([
            'username' => $request->username,
            'password' => $request->password,
            'foto' => $request->foto,
            'role' => $request->role,
        ]);

        return redirect()->route('users.index')->with('success', 'User created successfully!');
    }

    public function edit($id_user)
    {
        $user = User::findOrFail($id_user);
        return view('users.edit', compact('user'));
    }
    
    public function update(Request $request, $id_user)
    {
        $request->validate([
            'username' => [
                'required',
                'string',
                'max:50',
                Rule::unique('table_user')->ignore($id_user, 'id_user'),
            ],
            'password' => 'required|string',
            'foto' => 'required|string',
            'role' => 'required|in:admin,operator,warga',
        ]);
    
        $user = User::findOrFail($id_user);
        $user->update([
            'username' => $request->username,
            'password' => $request->password,
            'foto' => $request->foto,
            'role' => $request->role,
        ]);
    
        return redirect()->route('users.index')->with('success', 'User updated successfully!');
    }
    public function destroy($id_user)
    {
        $user = Auth::findOrFail($id_user);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully!');
    }
}
