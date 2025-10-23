<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PetugasController extends Controller
{
    public function index()
    {
        $petugas = Petugas::all();
        return view('petugas.index', compact('petugas'));
    }

    public function create()
    {
        return view('petugas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:petugas',
            'password' => 'required|string|min:6',
        ]);

        Petugas::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('petugas.index')->with('success', 'Petugas berhasil ditambahkan');
    }

    public function edit(Petugas $petuga) // gunakan singular karena route model binding
    {
        return view('petugas.edit', ['petugas' => $petuga]);
    }

    public function update(Request $request, Petugas $petuga)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:petugas,email,' . $petuga->id,
            'password' => 'nullable|string|min:6',
        ]);

        $data = [
            'username' => $request->username,
            'email' => $request->email,
        ];

        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }

        $petuga->update($data);

        return redirect()->route('petugas.index')->with('success', 'Petugas berhasil diupdate');
    }

    public function destroy(Petugas $petuga)
    {
        $petuga->delete();
        return redirect()->route('petugas.index')->with('success', 'Petugas berhasil dihapus');
    }
}
