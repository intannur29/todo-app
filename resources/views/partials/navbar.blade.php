<nav class="navbar navbar-expand-lg bg-secondary navbar-dark fixed-top">
    <div class="container d-flex justify-content-between">
        <!-- Form pencarian -->
        <form class="d-flex" action="{{ route('search') }}" method="GET" role="search">
            <input id="search-input" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-black" type="submit">Refresh</button>
        </form>

        <!-- Nama aplikasi -->
        <a class="navbar-brand fw-bolder" href="#">{{ config('app.name') }}</a>

        <!-- Dropdown untuk foto profil -->
        <div class="nav-item dropdown">
            <a href="{{ route('biodata.create') }}" class="nav-link">
                <!-- Gambar profil -->
                <img class="rounded-dark me-lg-2" src="{{ asset('image/fotoijazahintan.jpeg') }}" alt="Foto Profil"
                    style="width: 40px; height: 40px: object-fit: cover;" />
                <!-- Nama pengguna (hanya ditampilkan di layar besar) -->
                <span class="d-none d-lg-inline-flex">Intan Nur Rahmawati</span>
            </a>
        </div>
    </div>
</nav>
