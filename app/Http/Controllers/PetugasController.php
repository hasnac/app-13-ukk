<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::orderBy('id_user', 'asc')
        ->where('role', 'staff')
        ->get();
        return view('petugas.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('petugas.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    
        $this->validate($request, [
            'name' => 'required',
            'username' => 'required',
            'alamat' => 'required',
            'telfon' => 'required',
            'role' => 'required',
        ]);
        $user = User::findOrFail($id);

        $user->update([
            'name' => $request->name,
            'username' => $request->username,
            'alamat' => $request->alamat,
            'telfon' => $request->telfon,
            'role' => $request->role,
            
        ]);
        
        return redirect()->to('/petugas')->with('succes', 'Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        
        $user->delete();
        return redirect()->to('/dashboard')->with('succes', 'Berhasil');
    }
}
