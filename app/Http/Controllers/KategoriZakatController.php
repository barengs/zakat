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
        return view('pages.kategori.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = KategoriZakat::create([
            'nama_zakat' => $request->nama,
            'jenis_zakat' => $request->jenis,
            'persentase' => $request->persen,
            'keterangan' => $request->keterangan,
        ]);

        if ($data) {
            return redirect()->route('zakat.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = KategoriZakat::findOrFail($id);
        return view('pages.kategori.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = new KategoriZakat();
        $data->nama_zakat = $request->nama;
        $data->jenis_zakat = $request->jenis;
        $data->persentase = $request->persentase;
        $data->keterangan = $request->keterangan;
        $data->update();
        if ($data) {
            return redirect()->route('zakat.index');
        } else {
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KategoriZakat $kategoriZakat)
    {
        //
    }
}
