<nav class="px-5 navbar navbar-expand-lg bg-body-tertiary" style="background-color: #e3f2fd;" data-bs-theme="light">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href={{ route('mahasiswa.index') }}>Mahasiswa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href={{ route('mata-kuliah.index') }}>Mata Kuliah</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href={{ route('dosen.index') }}>Dosen</a>
                </li>
            </ul>
        </div>
    </div>
</nav>