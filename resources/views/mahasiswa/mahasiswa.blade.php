<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <x-navbar />
    <div class="mx-5 my-4">
        <div class="d-flex justify-content-between">
            <form class="d-flex" role="search" method="GET" action={{ route('mahasiswa.index') }}>
                <input 
                    class="form-control me-2" 
                    type="search"
                    placeholder="Search" 
                    aria-label="Search"
                    name="search"
                    value="{{ old('search', $search) }}"               
                />
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            <a href={{  route('mahasiswa.create-form') }}>
                <button type="button" class="btn btn-primary">Add Mahasiswa</button>
            </a>
        </div>
        <br>
        <table class="table table-light table-striped-columns">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">NIM</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Tempat Lahir</th>
                    <th scope="col">Tanggal Lahir</th>
                    <th scope="col">Jurusan</th>
                    <th scope="col">Max SKS</th>
                    <th scope="col">Angkatan</th>
                    <th scope="col">Action</th>
            </thead>
            <tbody>
                @forelse ($mahasiswas as $mahasiswa)
                    <tr>
                        <td scope="row">{{$mahasiswa['id']}}</td>
                        <td>{{$mahasiswa['NIM']}}</td>
                        <td>{{$mahasiswa['name']}}</td>
                        <td>{{$mahasiswa['tempat_lahir']}}</td>
                        <td>{{$mahasiswa['tanggal_lahir']}}</td>
                        <td>{{$mahasiswa['jurusan']}}</td>
                        <td>{{$mahasiswa['max_sks']}}</td>
                        <td>{{$mahasiswa['angkatan']}}</td>
                        <td class="d-flex gap-2">
                            <a href="{{ route('mahasiswa.update-form', ['id' => $mahasiswa['id']]) }}">
                                <button type="button" class="btn btn-warning">Edit</button>
                            </a>
                            <form method="post" action="{{ route('mahasiswa.delete', ['id' => $mahasiswa['id']]) }}">
                                @csrf
                                <input type="hidden" name="_method" value="delete" />
                                <input type="submit" value="Delete" class="btn btn-danger" />
                            </form>
                        </td>
                @empty
                    <tr>
                        <td colspan="8">Data tidak ditemukan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <!-- pagination -->
        {{ $mahasiswas->links() }}
    </div>
</body>

</html>