<?php

namespace App\Http\Controllers;

use App\Models\Satuan;
use Illuminate\Http\Request;

class SatuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Satuan::all();
        return view('pages.satuan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.satuan.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = Satuan::create([
            'nama' => $request->nama,
            'satuan' => $request->satuan,
        ]);
        if ($data) {
            return redirect()->route('satuan.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Satuan $satuan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Satuan::findOrFail($id);
        return view('pages.satuan.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = Satuan::findOrFail($id);
        $data->nama = $request->nama;
        $data->satuan = $request->satuan;
        $data->update();
        if ($data) {
            return redirect()->route('satuan.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Satuan::where('id', $id)->delete();
        return response()->json([
            'success' => true,
            'message' => 'Data berhasil di hapus!',
        ]);
    }
}
