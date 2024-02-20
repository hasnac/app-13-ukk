<?php

namespace App\Http\Controllers;

use App\Models\buku;
use App\Models\koleksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $books = buku::findOrFail($id);
        return view('buku.edit', compact('books'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'judul' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahunterbit' => 'required|max:4',
            'gambar' => 'image|mimes:png,jpg,jpeg,svg',
            'deskripsi' => 'required',
            'stok' => 'required|min:0',
            'kategori' => 'required',
            'status' => 'required',
        ]);
        $books = buku::findOrFail($id);

        if($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $gambar->storeAs('public/books', $gambar->hashName());

            Storage::delete('public/books' . $books->gambar);

            $books->update([
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
        }else{
            $books->update([
                'judul' => $request->judul,
                'penulis' => $request->penulis,
                'penerbit' => $request->penerbit,
                'tahunterbit' => $request->tahunterbit,
                'deskripsi' => $request->deskripsi,
                'stok' => $request->stok,
                'kategori' => $request->kategori,
                'status' => $request->status,
            ]);
        }
        return redirect()->to('buku')->with('succes', 'Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $books = buku::findOrFail($id);
        Storage::delete('public/books/'. $books->gambar);
        $books->delete();
        return redirect()->to('buku')->with('succes', 'Berhasil');
    }
    
    public function listbook(Request $request)
    {
        $search = $request->search;
        $books = buku::where('status', 'publish')
        ->when(strlen($search), function ($query) use ($search){
            $query->where('judul','like',"%" . $search . "%")
            ->orWhere('kategori','like',"%" . $search . "%")
            ->orWhere('penulis','like',"%" . $search . "%");
        })
        ->get();
        return view('user.list_book', compact('books'));
    }
    public function detailbook($id)
    {
        $books = buku::with(['rating', 'rating.user'])
        ->where('id_buku', $id)
        ->where('status', 'publish')
        ->withAvg('rating', 'rating')
        ->withCount('rating')
        ->firstOrFail();
        $koleksi = koleksi::where('id_user', Auth::user()->id_user)
        ->where('id_buku', $books->id_buku)
        ->exists();
        return view('user.detail', compact('books', 'koleksi'));
    }
    public function fiksi()
    {
        $books = buku::where('status', 'publish')
        ->where('kategori', 'fiksi')
        ->get();
        return view('user.fiksi', compact('books'));

    }
    public function non()
    {
        $books = buku::where('status', 'publish')
        ->where('kategori', 'non')
        ->get();
        return view('user.non-fiksi', compact('books'));

    }
    public function all_book()
    {
        $book = buku::get();
        return view('report.buku', compact('book'));
    }
}
