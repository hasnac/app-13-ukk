<?php

namespace App\Http\Controllers;

use App\Models\buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = buku::orderBy('id_buku', 'asc')
        ->paginate(5);
        return view('buku.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('buku.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahunterbit' => 'required|max:4',
            'gambar' => 'required|image|mimes:png,jpg,jpeg,svg',
            'deskripsi' => 'required',
            'stok' => 'required|min:0',
            'kategori' => 'required',
            'status' => 'required',

        ]);
        $gambar = $request->file('gambar');
        $gambar->storeAs('public/books', $gambar->hashName());
        buku::create([
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'penerbit' => $request->penerbit,
            'tahunterbit' => $request->tahunterbit,
            'gambar' => $gambar->hashName(),
            'deskripsi' => $request->deskripsi,
            'stok' => $request->stok,
            'kategori' => $request->kategori,
            'status' => $request->status,

        ]);
        return redirect()->to('buku')->with('succes', 'Berhasil');
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
        //
    }
    
    public function listbook()
    {
        $books = buku::where('status', 'publish')
        ->get();
        return view('user.list_book', compact('books'));
    }
    public function detailbook($id)
    {
        $books = buku::where('id_buku', $id)
        ->get();
        return view('user.detail', compact('books'));
    }
}
