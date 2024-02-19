<?php

namespace App\Http\Controllers;

use App\Models\buku;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $books = buku::count();
        return view('dashboard', compact('books'));
    }
}
