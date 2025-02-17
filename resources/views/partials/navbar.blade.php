<nav class="navbar navbar-expand-lg bg-secondary navbar-dark fixed-top">
    <div class="container d-flex justify-content-between">
        <form class="d-flex" action="{{ route('search') }}" method="GET" role="search">
            <input id="search-input" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-black" type="submit">Refresh</button>
        </form>
        <a class="navbar-brand fw-bolder" href="#">{{ config('app.name') }}</a>
        <button type="button" class="btn btn-outline-dark flex-shrink-0" style="width: 18rem; height: fit-content;"<nav class="navbar navbar-expand-lg bg-secondary navbar-dark fixed-top">
            <!-- Container untuk elemen-elemen di dalam navbar -->
            <div class="container d-flex justify-content-between">
                
                <!-- Form pencarian -->
                <form class="d-flex" action="{{ route('search') }}" method="GET" role="search">
                    <!-- Input pencarian -->
                    <input id="search-input" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <!-- Tombol untuk mengirimkan pencarian -->
                    <button class="btn btn-outline-black" type="submit">Refresh</button>
                </form>
                
                <!-- Link untuk nama aplikasi, akan mengarah ke halaman utama -->
                <a class="navbar-brand fw-bolder" href="#">{{ config('app.name') }}</a>
                
                <!-- Tombol untuk membuka modal dan menambahkan item baru -->
                <button type="button" class="btn btn-outline-dark flex-shrink-0" style="width: 18rem; height: fit-content;"
                data-bs-toggle="modal" data-bs-target="#addListModal">
                    <!-- Ikon plus dan teks "Tambah" di dalam tombol -->
                    <span class="d-flex align-items-center justify-content-center">
                        <i class="bi bi-plus fs-5"></i>
                        Tambah
                    </span>
                </button>
            </div>
        </nav>
        
        data-bs-toggle="modal" data-bs-target="#addListModal">
        <span class="d-flex align-items-center justify-content-center">
            <i class="bi bi-plus fs-5"></i>
            Tambah
        </span>
    </button>
    </div>
</nav>
