<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dosen = Dosen::all();

        return view('dosen.dosen', [
            'dosens' => $dosen
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dosen.createdosen');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'                  => 'required|string|max:255',
            'nip'                   => 'required|string|max:255',
            'pendidikan_terakhir'   => 'required|string|max:255',
            'jurusan'               => 'required|in:Bisnis Digital,Sistem dan Teknologi Informasi,Kewirausahaan',
        ]);

        Dosen::create($validated);

        return redirect()->route('dosen.index')
            ->with('success', 'Data Dosen Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $dosen = Dosen::find($id);

        if(!$dosen) {
            return redirect()->route('dosen.index')
                ->with('error', 'Dosen Tidak Ditemukan');
        }

        return view('dosen.updatedosen', [
            'dosen' => $dosen,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dosen $dosen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $dosen = Dosen::find($id);

        if(!$dosen) {
            return redirect()->route('dosen.index')
                ->with('error', 'Dosen Tidak Ditemukan');
        }

        $validated = $request->validate([
            'nama'                  => 'required|string|max:255',
            'nip'                   => 'required|string|max:255',
            'pendidikan_terakhir'   => 'required|string|max:255',
            'jurusan'               => 'required|in:Bisnis Digital,Sistem dan Teknologi Informasi,Kewirausahaan',
        ]);

        $dosen->update($validated);

        return redirect()->route('dosen.index')
            ->with('success', 'Data Dosen Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $dosen = Dosen::find($id);

        if(!$dosen) {
            return redirect()->route('dosen.index')
                ->with('error', 'Dosen Tidak Ditemukan');
        }

        $dosen->delete();

        return redirect()->route('dosen.index')
            ->with('success', 'Data Dosen Berhasil Dihapus');
    }
}
