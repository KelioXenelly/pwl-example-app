<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    // public function index() {
    //     $mahasiswa = Mahasiswa::all();

    //     return view('mahasiswa.mahasiswa', [
    //         'mahasiswas' => $mahasiswa
    //     ]);
    // }

    public function index(Request $request) {
        $search = $request->input('search'); // ambil nilai dari form GET ?search=...

        $query = Mahasiswa::query();

        if($search) {
            $query->where(function ($q) use ($search) {
                $q->where('NIM', 'like', "%{$search}%")
                    ->orWhere('name', 'like', "%{$search}%")
                    ->orWhere('tempat_lahir', 'like', "%{$search}%")
                    ->orWhere('tanggal_lahir', 'like', "%{$search}%")
                    ->orWhere('jurusan', 'like', "%{$search}%")
                    ->orWhere('angkatan', 'like', "%{$search}%");
            });
        }

        // kalau mau semua data tanpa pagination
        // $mahasiswas = $query->get();

        // kalau mau pagination (disarankan untuk tabel)
        $mahasiswas = $query->paginate(10)->appends($request->only('search'));

        return view('mahasiswa.mahasiswa', [
            'mahasiswas' => $mahasiswas,
            'search' => $search, // supaya bisa ditampilkan di input value
        ]);
    }

    public function create() {
        return view('mahasiswa.createmahasiswa');
    }

    public function store(Request $request) {
        $request->merge([
            'max_sks' => $request->input('max_sks', 24),
        ]);

        $validated = $request->validate([
            'NIM'           => 'required|string|max:255',
            'name'          => 'required|string|max:255',
            'tempat_lahir'  => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jurusan'       => 'required|in:Bisnis Digital,Sistem dan Teknologi Informasi,Kewirausahaan',
            'max_sks'       => 'required|integer',
            'angkatan'      => 'required|integer|min:1500|max:2099',
        ]);

        Mahasiswa::create($validated);

        return redirect()->route('mahasiswa.index')
            ->with('success', 'Data Mahasiswa Berhasil Ditambahkan');
    }

    public function show($id) {
        $mahasiswa = Mahasiswa::with('mata_kuliah')->find($id);

        if(!$mahasiswa) {
            return redirect()->route('mahasiswa.index')
                ->with('error', 'Mahasiswa Tidak Ditemukan');
        }

        $mataKuliah = MataKuliah::all();
        
        if(!$mataKuliah) {
            return redirect()->route('mahasiswa.index')
            ->with('error', 'Mata Kuliah Tidak Ditemukan');
        }
        
        $mataKuliahData = $mahasiswa->mata_kuliah()->paginate(5);
        
        return view('mahasiswa.updatemahasiswa', [
            'mahasiswa' => $mahasiswa,
            'mataKuliahs' => $mataKuliah,
            'mataKuliahDatas' => $mataKuliahData,
        ]);
    }

    public function update(Request $request, $id) {
        $mahasiswa = Mahasiswa::where('id', $id)->first();

        if(!$mahasiswa) {
            return redirect()->route('mahasiswa.index')
                ->with('error', 'Mahasiswa tidak ditemukan');
        }

        $validated = $request->validate([
            'NIM'           => 'required|string|max:255',
            'name'          => 'required|string|max:255',
            'tempat_lahir'  => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jurusan'       => 'required|in:Bisnis Digital,Sistem dan Teknologi Informasi,Kewirausahaan',
            'angkatan'      => 'required|integer|min:1500|max:2099',
        ]);

        $mahasiswa->update($validated);

        return redirect()->route('mahasiswa.index')
            ->with('success', 'Data Mahasiswa Berhasil Diupdate');
    }

    public function delete($id) {
        $mahasiswa = Mahasiswa::where('id', $id)->first();

        if(!$mahasiswa) {
            return redirect()->route('mahasiswa.index')
                ->with('error', 'Mahasiswa tidak ditemukan');
        }

        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index')
            ->with('success', 'Data Mahasiswa Berhasil Dihapus');
    }

    public function syncMataKuliah(Request $request, $mahasiswaId) {
        $mahasiswa = Mahasiswa::with('mata_kuliah')->find($mahasiswaId);

        if(!$mahasiswa) {
            return redirect()->route('mahasiswa.index')
                ->with('error', 'Mahasiswa tidak ditemukan');
        }

        $request->validate([
            'mata_kuliah'   => 'required|string|exists:mata_kuliah,nama_mk',
        ]);

        $mataKuliahName = $request->input('mata_kuliah');
        $mataKuliahId = MataKuliah::where('nama_mk', $mataKuliahName)->pluck('id');

        $mahasiswa->mata_kuliah()->syncWithoutDetaching($mataKuliahId);

        return redirect()->back()->with('success', 'Mata Kuliah Berhasil Ditambahkan');
    }

    public function deleteMataKuliah($mahasiswaId, $mataKuliahId) {
        $mahasiswa = Mahasiswa::findOrFail($mahasiswaId);

        $mahasiswa->mata_kuliah()->detach($mataKuliahId);

        return redirect()->back()->with('success', 'Mata Kuliah Berhasil Dihapus');
    }
}
