<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dosen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <x-navbar />
    <div class="mx-5 my-4">
        <div class="d-flex justify-content-between">
            {{-- <form class="d-flex" role="search" method="GET" action={{ route('dosen.index') }}>
                <input 
                    class="form-control me-2" 
                    type="search"
                    placeholder="Search" 
                    aria-label="Search"
                    name="search"
                    value="{{ old('search', $search) }}"               
                />
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form> --}}
            <a href={{  route('dosen.create') }}>
                <button type="button" class="btn btn-primary">Add Dosen</button>
            </a>
        </div>
        <br>
        <table class="table table-striped table-striped-columns">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">NIP</th>
                <th scope="col">Pendidikan Terakhir</th>
                <th scope="col">Jurusan</th>
                <th scope="col">Action</th>
            </thead>
            <tbody>
                @forelse ($dosens as $dosen)
                    <tr>
                    <td scope="row">{{$dosen['id']}}</td>
                    <td>{{$dosen['nama']}}</td>
                    <td>{{$dosen['nip']}}</td>
                    <td>{{$dosen['pendidikan_terakhir']}}</td>
                    <td>{{$dosen['jurusan']}}</td>
                    <td class="d-flex gap-2">
                        <a href="{{ route('dosen.show', ['id' => $dosen['id']]) }}">
                            <button type="button" class="btn btn-warning">Edit</button>
                        </a>
                        <form method="post" action="{{ route('dosen.destroy', ['id' => $dosen['id']]) }}">
                            @csrf
                            <input type="hidden" name="_method" value="delete" />
                            <input type="submit" value="Delete" class="btn btn-danger" />
                        </form>
                    </td>
                @empty
                    <tr>
                        <td colspan="5">Data tidak ditemukan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <!-- pagination -->
        {{-- {{ $dosens->links() }} --}}
    </div>
</body>
</html>