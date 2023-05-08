<?php

namespace App\Http\Controllers;

use App\Models\KategoriZakat;
use Illuminate\Http\Request;

class KategoriZakatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = KategoriZakat::all();
        return view('pages.kategori.index', compact('data'));
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
    public function show(KategoriZakat $kategoriZakat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KategoriZakat $kategoriZakat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KategoriZakat $kategoriZakat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KategoriZakat $kategoriZakat)
    {
        //
    }
}