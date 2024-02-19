<?php

namespace App\Http\Controllers;

use App\Models\buku;
use App\Models\peminjaman;
use App\Models\User;
use Illuminate\Http\Request;

class PinjamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = peminjaman::with(['user', 'buku'])
        ->orderBy('tanggal_pinjam', 'asc')
        ->paginate(5);
        return view('pinjam.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::orderBy('id_user', 'desc')
        ->where('role', 'user')
        ->get();
        $books = buku::orderBy('id_buku', 'desc')
        ->get();
        return view('pinjam.create', compact('users', 'books'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'judul' => 'required',
            'jumlah' => 'required|min:1',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date',
            'status' => 'required',
        ]);
        peminjaman::create([
            'id_user' => $request->username,
            'id_buku' => $request->judul,
            'jumlah' => $request->jumlah,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_kembali' => $request->tanggal_kembali,
            'status' => $request->status,
        ]);
        return redirect()->to('pinjam')->with('success', 'Berhasil');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $borrowing = peminjaman::with(['user','buku'])
        ->findOrFail($id)
        ->paginate();
        return view('report.one', compact('borrowing'));
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
        $borrowing = peminjaman::findOrFail($id);
        $borrowing->update([
            'status' => 'kembali'
        ]);
        return redirect('/pinjam');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function generate($id)
    {
        $books = peminjaman::where('id_pinjam', $id)
        ->firstOrFail();
        return view('report.index', compact('books'));
    }
}
