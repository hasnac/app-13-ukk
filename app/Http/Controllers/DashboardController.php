<?php

namespace App\Http\Controllers;

use App\Models\buku;
use App\Models\peminjaman;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $borrow = peminjaman::count();
        $user = User::where('role', 'user')->count();
        $staff = User::where('role', 'staff')->count();
        $books = buku::count();
        return view('dashboard', compact('books', 'borrow', 'user', 'staff'));
    }
}
