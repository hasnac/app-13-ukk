<?php

namespace App\Http\Controllers;

use App\Models\buku;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $books = buku::where('status', 'publish')
        ->when(strlen($search), function ($query) use ($search){
            $query->where('judul','like',"%" . $search . "%")
            ->orWhere('kategori','like',"%" . $search . "%")
            ->orWhere('penulis','like',"%" . $search . "%");
        })
        ->get();
        return view('landing', compact('books'));
        
    }
}
