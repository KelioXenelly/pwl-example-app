<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        table td {
            padding-block: 0.5rem;
        }
        table td label {
            width: 10rem;
        }
        .form-check {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
    </style>
</head>
<body class="d-flex justify-content-center align-items-center vh-100 bg-light">
    <div class="container bg-dark text-white p-4 row" style="width: 100%">
        <div class="col-4">
            <div class="d-flex align-items-center gap-3">
                <a href={{ route('mahasiswa.index') }}><i class="fa fa-arrow-left mr-2 text-white fs-5" aria-hidden="true"></i></a>
                <h2>Update Mahasiswa</h2>
            </div>
            <form action="{{ route('mahasiswa.update', ['id' => $mahasiswa['id']]) }}" method="POST" class="mt-3">
                @csrf
                @method('PATCH')
                <table width=100%>
                    <tr>
                        <td><label for="NIM" class="form-label">NIM</label></td>
                        <td>
                            <input type="text" class="form-control" id="NIM" name="NIM"
                            value="{{ old('NIM', $mahasiswa->NIM)}}">
                        </td>
                    </tr>
                    <tr>
                        <td><label for="name" class="form-label">Nama</label></td>
                        <td>
                            <input type="text" class="form-control" id="name" name="name" 
                            value="{{ old('name', $mahasiswa->name) }}">
                        </td>
                    </tr>
                    <tr>
                        <td><label for="tempat_lahir" class="form-label">Tempat Lahir</label></td>
                        <td>
                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" 
                            value="{{ old('tempat_lahir', $mahasiswa->tempat_lahir) }}">
                        </td>
                    </tr>
                    <tr>
                        <td><label for="tanggal_lahir" class="form-label">Tanggal Lahir</label></td>
                        <td>
                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" 
                            value="{{ $mahasiswa['tanggal_lahir']}}">
                        </td>
                    </tr>
                    <tr>
                        <td><label for="jurusan" class="form-label">Jurusan</label></td>
                        <td class="d-flex flex-column">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jurusan" id="bisnis_digital" value="Bisnis Digital"  
                                {{ old('jurusan', $mahasiswa->jurusan) == 'Bisnis Digital' ? 'checked' : ''}}>
                                <label class="form-check-label" for="bisnis_digital">Bisnis Digital</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jurusan" id="kewirausahaan" value="Kewirausahaan"
                                {{ old('jurusan', $mahasiswa->jurusan) == 'Kewirausahaan' ? 'checked' : ''}}>
                                <label class="form-check-label" for="kewirausahaan">Kewirausahaan</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jurusan" id="sistem_teknologi_informasi" 
                                value="Sistem dan Teknologi Informasi"
                                {{ old('jurusan', $mahasiswa->jurusan) == 'Sistem dan Teknologi Informasi' ? 'checked' : ''}}>
                                <label class="form-check-label" for="sistem_teknologi_informasi">Sistem dan Teknologi Informasi</label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="angkatan" class="form-label">Angkatan</label></td>
                        <td><input type="text" class="form-control" id="angkatan" name="angkatan" value="{{ $mahasiswa['angkatan']}}"></td>
                    </tr>
                </table>
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
            @if (session('success'))
                <script>
                    Swal.fire({
                        title: "Berhasil Memperbarui Mahasiswa!",
                        text: "{{ session('success')}}",
                        icon: "success"
                    });
                </script>
            @endif

            @if ($errors->any())
                <script>
                    Swal.fire({
                        title: "Gagal Memperbarui Mahasiswa!",
                        html: `{!! implode('<br>', $errors->all()) !!}`,
                        text: "Terdapat kesalahan pada inputan.",
                        icon: "error",
                        confirmButtonText: "Perbaiki",
                    });
                </script>
            @endif
        </div>
        <div class="col-8 border-start border-4">
            <h2>Sync Mahasiswa</h2>
            <form action={{ route('mahasiswa.syncMataKuliah', ['mahasiswaId' => $mahasiswa->id]) }} method="POST" class="mt-3 d-flex gap-2">
                @csrf
                <select class="form-select" name="mata_kuliah" style="width: 30%">
                    <option selected>Pilih Mata Kuliah</option>
                    @foreach ($mataKuliahs as $mataKuliah)
                        <option value="{{$mataKuliah->nama_mk}}">{{$mataKuliah->nama_mk}}</option>
                    @endforeach
                </select>
                <Button type="submit" class="btn btn-success">Sync</Button>
            </form>
            @if (session('success'))
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: '{{ session('success') }}',
                        confirmButtonColor: '#198754'
                    })
                </script>
            @endif

            @if (session('error'))
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal!',
                        text: '{{ session('error') }}',
                        confirmButtonColor: '#dc3545'
                    })
                </script>
            @endif
            
            <h2 class="mt-4 fs-5">Tabel Mata Kuliah</h2>
            <table class="table table-light">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Mata Kuliah</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($mataKuliahDatas as $index => $mk)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $mk->nama_mk }}</td>
                            <td>
                                <form method="post" action="{{ route('mahasiswa.deleteMataKuliah', [
                                    'mahasiswaId' => $mahasiswa->id,
                                    'mataKuliahId' => $mk->id,
                                ]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="_method" value="delete" />
                                    <input type="submit" value="Delete" class="btn btn-danger" />
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center">Data tidak ditemukan</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <!-- pagination -->
            {{ $mataKuliahDatas->links() }}
        </div>
    </div>

    
</body>
</html>