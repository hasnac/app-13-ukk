<?php

namespace App\Http\Controllers;

use App\Models\koleksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KoleksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = koleksi::with(['user','buku'])
        ->where('id_user', Auth::user()->id_user)
        ->orderBy('id_koleksi', 'asc')
        ->paginate(5);
        return view('user.koleksi', compact('data'));
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
        $request->validate([
            'id_user' => 'required|exists:users,id_user',
            'id_buku' => 'required|exists:bukus,id_buku',
        ]);
        $user = auth()->user();
        koleksi::create([
            'id_user' => $user->id_user,
            'id_buku' => $request->id_buku,
        ]);
        return redirect()->to('/koleksi')->with('success', 'Berhasil');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = auth()->user();
        $data = koleksi::where('id_user', $user->id_user)
        ->where('id_buku', $id)
        ->first();
        $data->delete();
        return redirect()->back()->with('succes', 'Berhasil');
    }
}
