<?php

namespace App\Http\Controllers;

use App\Models\Level;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('level')->get();
        return view('user.user', compact('users'));
    }

    public function create()
    {
        $levels = Level::all();
        return view('user.add_user', ['levels' => $levels]);
       
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'level_id' => 'required',
            'phone' => 'required|unique:users',
           
        ]);

       
    $userData = $request->all();
    $userData['password'] = bcrypt('default_password');

    User::create($userData);

        return redirect()->route('user.index')
            ->with('success', 'User created successfully.');
    }

    public function edit(User $user)
{
    $levels = Level::all(); 
    return view('user.edit_user', compact('user', 'levels'));
}

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'level_id' => 'required',
            'phone' => 'required|unique:users,phone,' . $user->id,
            'password' => 'nullable|min:6', // Mengubah aturan validasi untuk password
        ]);
        

        $user->update($request->all());

        return redirect()->route('user.index')
            ->with('success', 'User updated successfully');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('user.index')
            ->with('success', 'User deleted successfully');
    }
}
