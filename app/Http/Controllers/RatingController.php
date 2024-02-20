<?php

namespace App\Http\Controllers;

use App\Models\rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $item = rating::where('id_user', $request->input('id_user'))->where('id_buku', $request->input('id_buku'))->first();
        if($item){
            $message = 'Kamu sudah pernah rating';
            return redirect()->back()->with('error', $message);
        }
       
        $request->validate([
            'id_buku' => 'required|exists:bukus,id_buku',
            'ulasan' => 'required',
            'rating' => 'required|integer|between:1,5',
        ]);
        $user = auth()->user();
        if($user->role != 'user'){
            return redirect()->back()->with('user', 'Only User!');
        }
        rating::create([
            'id_user' => $user->id_user,
            'id_buku' =>$request->id_buku,
            'ulasan' => $request->ulasan,
            'rating' => $request->rating,
        ]);
        return redirect()->back()->with('success', 'Berhasil');
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
}
