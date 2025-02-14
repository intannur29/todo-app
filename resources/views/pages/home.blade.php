{{--  --}}
@extends('layouts.app') <!-- Menggunakan layout 'app' yang umum di aplikasi Laravel -->

@section('content') <!-- Bagian konten utama halaman -->

    <!-- Memulai kontainer untuk daftar tugas -->
    <div id="content" class="overflow-y-hidden overflow-x-hidden">
        
        <!-- Cek apakah daftar tugas kosong -->
        @if ($lists->count() == 0)
            <!-- Menampilkan pesan dan tombol tambah tugas jika tidak ada tugas -->
            <div class="d-flex flex-column align-items-center">
                <p class="fw-bold text-center">Belum ada tugas yang ditambahkan</p>
                <button type="button" class="btn btn-sm d-flex align-items-center gap-2 btn-outline-success"
                    style="width: fit-content;">
                    <i class="bi bi-plus-square fs-3"></i> Tambah
                </button>
            </div>
        @endif

        <!-- Mulai bagian untuk menampilkan daftar tugas dalam bentuk scroll horizontal -->
        <div class="d-flex gap-3 px-3 flex-nowrap overflow-x-scroll overflow-y-hidden" style="height: 100vh;">
            {{-- Pengulangan data untuk setiap list tugas --}}
            @foreach ($lists as $list)
                <div class="card flex-shrink-0 bg-secondary" style="width: 18rem; max-height: 80vh;">
                    
                    <!-- Menampilkan header kartu untuk list tugas -->
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h4 class="card-title">{{ $list->name }}</h4>
                        
                        <!-- Form untuk menghapus list tugas -->
                        <form action="{{ route('lists.destroy', $list->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm p-0">
                                <i class="bi bi-trash fs-5 text-danger"></i>
                            </button>
                        </form>
                    </div>

                    <!-- Menampilkan isi tugas dalam list ini -->
                    <div class="card-body d-flex flex-column gap-2 overflow-x-hidden">
                        @foreach ($tasks as $task)
                            @if ($task->list_id == $list->id)
                                <div class="card">
                                    <div class="card-header">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="d-flex flex-column justify-content-center gap-2">
                                                <!-- Tautan untuk menampilkan detail tugas -->
                                                <a href="{{ route('tasks.show' , $task->id) }}"
                                                    class="fw-bold lh-1 m-0 {{ $task->is_completed ? 'text-decoration-line-through' : '' }}">
                                                    {{ $task->name }}
                                                </a>
                                                <!-- Badge prioritas untuk tugas -->
                                                <span class="badge text-bg-{{ $task->priorityClass }} badge-pill"
                                                    style="width: fit-content">
                                                    {{ $task->priority }}
                                                </span>
                                            </div>

                                            <!-- Form untuk menghapus tugas -->
                                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST"
                                                style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm p-0">
                                                    <i class="bi bi-x-circle text-danger fs-5"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text text-truncate">
                                            {{ $task->description }} 
                                        </p>
                                    </div>

                                    <!-- Menampilkan tombol selesai jika tugas belum selesai -->
                                    @if (!$task->is_completed)
                                        <div class="card-footer">
                                            <form action="{{ route('tasks.complete', $task->id) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-sm btn-secondary w-100">
                                                    <span class="d-flex align-items-center justify-content-center">
                                                        <i class="bi bi-check fs-5"></i>
                                                        Selesai
                                                    </span>
                                                </button>
                                            </form>
                                        </div>
                                    @endif
                                </div>
                            @endif
                        @endforeach
                        
                        <!-- Tombol untuk menambahkan tugas baru ke dalam list ini -->
                        <button type="button" class="btn btn-sm btn-outline-dark" data-bs-toggle="modal"
                            data-bs-target="#addTaskModal" data-list="{{ $list->id }}">
                            <span class="d-flex align-items-center justify-content-center">
                                <i class="bi bi-plus fs-5"></i>
                                Tambah
                            </span>
                        </button>
                    </div>

                    <!-- Footer card, menampilkan jumlah tugas dalam list -->
                    <div class="card-footer d-flex justify-content-between align-items-center">
                        <p class="card-text">{{ $list->tasks->count() }} Tugas</p>
                    </div>
                </div>
            @endforeach

            <!-- Tombol untuk menambahkan list baru -->
            <button type="button" class="btn btn-outline-dark flex-shrink-0" style="width: 18rem; height: fit-content;"
                data-bs-toggle="modal" data-bs-target="#addListModal">
                <span class="d-flex align-items-center justify-content-center">
                    <i class="bi bi-plus fs-5"></i>
                    Tambah
                </span>
            </button>
        </div>
    </div>

    <!-- Script untuk menangani pencarian tugas -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const searchInput = document.getElementById('search-input'); // Input pencarian
            searchInput.addEventListener('input', function () {
                const query = searchInput.value.trim();
    
                if (query.length >= 3) {
                    fetch(`/search?query=${query}`) // Mengirim permintaan pencarian ke server
                        .then(response => response.json())
                        .then(data => {
                            renderSearchResults(data); // Menampilkan hasil pencarian
                        })
                        .catch(error => console.error('Error fetching search results:', error));
                }
            });
    
            function renderSearchResults(data) {
                const container = document.getElementById('content'); // Kontainer untuk tugas
                container.innerHTML = ''; // Menghapus konten lama
    
                if (data.task_lists.length === 0 && data.tasks.length === 0) {
                    container.innerHTML = '<p class="fw-bold text-center">Tidak ada hasil ditemukan</p>';
                    return;
                }
    
                let contentHTML = '<div class="d-flex gap-3 px-3 flex-nowrap overflow-x-scroll overflow-y-hidden" style="height: 80vh;">';
    
                // Menampilkan list tugas yang sesuai dengan hasil pencarian
                data.task_lists.forEach(list => {
                    contentHTML += `
                        <div class="card flex-shrink-0 bg-info" style="width: 18rem; max-height: 80vh;">
                            <div class="card-header d-flex align-items-center justify-content-between">
                                <h4 class="card-title">${list.name}</h4>
                            </div>
                            <div class="card-body d-flex flex-column gap-2 overflow-x-hidden">
                    `;
    
                    const filteredTasks = data.tasks.filter(task => task.list_id === list.id); // Menyaring tugas sesuai dengan list
                    filteredTasks.forEach(task => {
                        contentHTML += `
                            <div class="card">
                                <div class="card-header d-flex align-items-center justify-content-between">
                                    <div class="d-flex flex-column justify-content-center gap-2">
                                        <a href="/tasks/${task.id}" class="fw-bold lh-1 m-0 ${task.is_completed ? 'text-decoration-line-through' : ''}">
                                            ${task.name}
                                        </a>
                                        <span class="badge text-bg-${task.priority}" style="width: fit-content">${task.priority}</span>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <p class="card-text text-truncate">${task.description ?? ''}</p>
                                </div>
                            </div>
                        `;
                    });
    
                    contentHTML += '</div></div>'; // Menutup div list
                });
    
                contentHTML += '</div>'; // Menutup kontainer utama
                container.innerHTML = contentHTML; // Menampilkan konten yang sudah difilter
            }
        });
    </script>
    
@endsection
