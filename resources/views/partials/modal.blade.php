<!-- Modal untuk menambahkan List -->
<div class="modal fade" id="addListModal" tabindex="-1" aria-labelledby="addListModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <!-- Form untuk menambahkan list -->
        <form action="{{ route('lists.store') }}" method="POST" class="modal-content">
            @method('POST') <!-- Metode POST digunakan untuk mengirim data ke server -->
            @csrf <!-- Token CSRF untuk melindungi dari serangan CSRF -->
            <div class="modal-header">
                <!-- Judul modal -->
                <h1 class="modal-title fs-5" id="addListModalLabel">Tambah List</h1>
                <!-- Tombol untuk menutup modal -->
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Input untuk nama list -->
                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="name" name="name"
                        placeholder="Masukkan nama list">
                </div>
            </div>
            <div class="modal-footer">
                <!-- Tombol untuk membatalkan dan menutup modal -->
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <!-- Tombol untuk mengirimkan form -->
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal untuk menambahkan Task -->
<div class="modal fade" id="addTaskModal" tabindex="-1" aria-labelledby="addTaskModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <!-- Form untuk menambahkan task -->
        <form action="{{ route('tasks.store') }}" method="POST" class="modal-content">
            @method('POST') <!-- Metode POST untuk mengirim data ke server -->
            @csrf <!-- Token CSRF untuk mencegah serangan CSRF -->
            <div class="modal-header">
                <!-- Judul modal -->
                <h1 class="modal-title fs-5" id="addTaskModalLabel">Tambah Task</h1>
                <!-- Tombol untuk menutup modal -->
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Menyembunyikan ID list yang akan digunakan saat menambahkan task -->
                <input type="text" id="taskListId" name="list_id" hidden>
                
                <!-- Input untuk nama task -->
                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="name" name="name"
                        placeholder="Masukkan nama task">
                </div>

                <!-- Input untuk deskripsi task -->
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <input type="text" class="form-control" id="deskripsi" name="deskripsi"
                        placeholder="Masukkan deskripsi task">
                </div>

                <!-- Dropdown untuk memilih prioritas task -->
                <div class="mb-3">
                    <label for="priority" class="form-label">Priority</label>
                    <select name="priority" class="form-select" aria-label="priority" id="priority">
                        <option value="low">Low</option> <!-- Pilihan prioritas rendah -->
                        <option value="medium">Medium</option> <!-- Pilihan prioritas sedang -->
                        <option value="high">High</option> <!-- Pilihan prioritas tinggi -->
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <!-- Tombol untuk membatalkan dan menutup modal -->
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <!-- Tombol untuk mengirimkan form -->
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
        </form>
    </div>
</div>
