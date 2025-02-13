@extends('layouts.app')

@section('content')
    <div id="content" class="container pb-3">
        <!-- Tombol kembali ke halaman home -->
        <div class="d-flex aligh-items-center justify-content center">
            <a href="{{ route('home') }}" class="btn btn-sm fw-bold fs-4">
                <i class="bi bi-arrow-left-short"></i>
                kembali
            </a>
        </div>

        <!-- Menampilkan pesan sukses jika ada -->
        @session('success')
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endsession

        <div class="row">
            <!-- Kolom untuk detail task -->
            <div class="col-8">
                <div class="card" style="height: 80vh; max-height: 80vh;">
                    {{-- Bagian untuk menampilkan nama task dan daftar tempat task --}}
                    <div class="card-header d-flex align items center justify-content-between overflow-hidden">
                        <h3 class="fw-bold fs-4 text-truncate" style="max-width: 80%;">{{ $task->name }}
                            <span class="fs-6 fw-medium">
                                di {{ $task->list->name }}
                            </span>
                        </h3>
                        <!-- Tombol untuk membuka modal edit task -->
                        <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                        data-bs-target="#editTaskModal">
                        <i class="bi bi-pencil-square"></i>
                    </button>
                    </div>
                    <!-- Deskripsi task -->
                    <div class="card-body">
                        <p>
                            {{ $task->description }}
                        </p>
                    </div>
                    <!-- Form untuk menghapus task -->
                    <div class="card-footer">
                        <form action=" {{ route('tasks.destroy', $task->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger w-100"> 
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Kolom untuk menampilkan detail task (prioritas dan daftar) -->
            <div class="col-4">
                <div class="card" style="height: 80vh;">
                    <div class="card-header d-flex align-items-center justy-content-between overflow-headen">
                        <h3 class="fw-bold fs-4 text-truncate mb-0" style="widht: 80%">Details</h3>
                    </div>
                    <div class="card-body d-flex flex-column gap-2">
                        <!-- Form untuk mengubah daftar task -->
                        <form action="{{ route('tasks.changeList', $task->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <select class="form-select" name="list_id" onchange="this.form.submit()">
                                @foreach ($lists as $list)
                                    <option value="{{ $list->id }}" {{ $list->id == $task->list_id ? 'selected' : '' }}>
                                        {{ $list->name }}
                                    </option>
                                @endforeach
                            </select>
                        </form>
                        <!-- Menampilkan prioritas task -->
                        <h6 class="fs-6">
                            Priotitas:
                            <span class="badge text-bg-{{ $task->priorityClass }} badge-pill" style="width: fit-content">
                                {{ $task->priority }}
                            </span>
                        </h6>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal untuk mengedit task -->
        <div class="modal fade" id="editTaskModal" tabindex="-1" aria-labelledby="editTaskModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="modal-content">
                    @method('PUT')
                    @csrf
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="editTaskModalLabel">Edit Task</h1>
                        <!-- Tombol untuk menutup modal -->
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Menyembunyikan ID list task -->
                        <input type="text" value="{{ $task->list_id }}" name="list_id" hidden>
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <!-- Input untuk nama task -->
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ $task->name }}" placeholder="Masukkan nama task">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <!-- Input untuk deskripsi task -->
                            <textarea class="form-control" name="description" id="description" rows="3" placeholder="Masukkan deskripsi">{{ $task->description }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="priority" class="form-label">Priority</label>
                            <!-- Dropdown untuk memilih prioritas task -->
                            <select class="form-control" name="priority" id="priority">
                                <option value="low" @selected($task->priority == 'low')>Low</option>
                                <option value="medium" @selected($task->priority == 'medium')>Medium</option>
                                <option value="high" @selected($task->priority == 'high')>High</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <!-- Tombol untuk membatalkan perubahan -->
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <!-- Tombol untuk menyimpan perubahan -->
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
