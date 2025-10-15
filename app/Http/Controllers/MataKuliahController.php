<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\MataKuliah;
use Illuminate\Http\Request;

class MataKuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     $mataKuliah = MataKuliah::all();

    //     return view('matakuliah.matakuliah', [
    //         'mataKuliahs' => $mataKuliah
    //     ]);
    // }

    public function index(Request $request) {
        $search = $request->input('search');

        $query = MataKuliah::with('dosen');

        if($search) {
            $query->where(function ($q) use ($search) {
                $q->where('kode_mk', 'like', "%{$search}%")
                    ->orWhere('nama_mk', 'like', "%{$search}%")
                    ->orWhere('jurusan', 'like', "%{$search}%");
            });
        }

        // kalau mau semua data tanpa pagination
        $mataKuliahs = $query->get();

        // kalau mau pagination (disarankan untuk tabel)
        $mataKuliahs = $query->paginate(10)->appends($request->only('search'));

        return view('matakuliah.matakuliah', [
            'mataKuliahs' => $mataKuliahs,
            'search' => $search, // supaya bisa ditampilkan di input value
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dosen = Dosen::all();

        if(!$dosen) {
            return redirect()->route('mata-kuliah.index')
                ->with('error', 'Dosen Tidak Ditemukan');
        }
        
        return view('matakuliah.creatematakuliah', ['dosens' => $dosen]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_mk'   => 'required|string|max:255',
            'nama_mk'   => 'required|string|max:255',
            'jurusan'   => 'required|in:Bisnis Digital,Sistem dan Teknologi Informasi,Kewirausahaan',
            'sks'       => 'required|integer',
            'dosen_id'  => 'required|integer|exists:dosen,id',
        ]);

        MataKuliah::create($validated);

        return redirect()->route('mata-kuliah.index')
            ->with('success', 'Data Mata Kuliah Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $mataKuliah = MataKuliah::with('dosen')->find($id);

        if(!$mataKuliah) {
            return redirect()->route('mata-kuliah.index')
                ->with('error', 'Mata Kuliah Tidak Ditemukan');
        }

        $dosen = Dosen::all();

        if(!$dosen) {
            return redirect()->route('mata-kuliah.index')
                ->with('error', 'Dosen Tidak Ditemukan');
        }

        return view('matakuliah.updatematakuliah', [
            'mataKuliah' => $mataKuliah,
            'dosens' => $dosen,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MataKuliah $mataKuliah)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $mataKuliah = MataKuliah::find($id);

        if(!$mataKuliah) {
            return redirect()->route('mata-kuliah.index')
                ->with('error', 'Mata Kuliah Tidak Ditemukan');
        }

        $validated = $request->validate([
            'kode_mk'   => 'required|string|max:255',
            'nama_mk'   => 'required|string|max:255',
            'jurusan'   => 'required|in:Bisnis Digital,Sistem dan Teknologi Informasi,Kewirausahaan',
            'sks'       => 'required|integer',
            'dosen_id'  => 'required|integer|exists:dosen,id',
        ]);

        $mataKuliah->update($validated);

        return redirect()->route('mata-kuliah.index')
            ->with('success', 'Data Mata Kuliah Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $mataKuliah = MataKuliah::find($id);

        if(!$mataKuliah) {
            return redirect()->route('mata-kuliah.index')
                ->with('error', 'Mata Kuliah Tidak Ditemukan');
        }

        $mataKuliah->delete();

        return redirect()->route('mata-kuliah.index')
            ->with('success', 'Data Mata Kuliah Berhasil Dihapus');
    }
}
