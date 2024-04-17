<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Level;

class levelController extends Controller
{
    public function index_level()
    {
        $levels = Level::all();
        return view('users.level', ["list"=>$levels]);
    }

    public function add()
    {
        $levels = Level::select('id', 'role')->get();
        return view('users.add_level');
    }

    public function store(Request $request)
    {
        $request->validate([
            'role' => 'required|unique:levels' 
        ]);

        Level::create($request->all());

        return redirect()->route('levels.index')
            ->with('success', 'Level berhasil ditambahkan.');
    }

   
    public function edit($id)
    {
        $level = Level::findOrFail($id);
        return view('users.edit_level', compact('level'));
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'role' => 'required|unique:levels,role,' . $id 
        ]);

        $level = Level::findOrFail($id);
        $level->update($request->all());

        return redirect()->route('levels.index')
            ->with('success', 'Level berhasil diperbarui.');
    }

    // Menghapus data level
    public function destroy($id)
    {
        $level = Level::findOrFail($id);
        $level->delete();

        return redirect()->route('levels.index')
            ->with('success', 'Level berhasil dihapus.');
    }
}
