<?php

namespace App\Http\Controllers;

use App\Models\KategoriZakat;
use App\Models\Satuan;
use Illuminate\Http\Request;

class KategoriZakatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = KategoriZakat::with('satuan')->get();
        return view('pages.kategori.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = Satuan::all();
        return view('pages.kategori.add', compact('data'));
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
            'minimal' => $request->minimal,
            'satuan_id' => $request->satuan,
        ]);

        // if ($request->has('satuan')) {
        //     $data->satuans()->attach($request->satuan);
        // }

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
        $data = KategoriZakat::where('id', $id)->with('satuan')->first();
        $satuan = Satuan::all();
        return view('pages.kategori.edit', compact(['data', 'satuan']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = KategoriZakat::findOrFail($id);
        $data->nama_zakat = $request->nama;
        $data->jenis_zakat = $request->jenis;
        $data->persentase = $request->persen;
        $data->keterangan = $request->keterangan;
        $data->minimal = $request->minimal;
        $data->satuan_id = $request->satuan;
        $data->update();

        // if ($request->has('satuan')) {
        //     $data->satuans()->sync($request->satuan);
        // }

        if ($data) {
            return redirect()->route('zakat.index');
        } else {
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        KategoriZakat::where('id', $id)->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil di hapus!'
        ]);
    }
}
