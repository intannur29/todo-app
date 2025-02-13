<?php

namespace App\Http\Controllers;

use App\Models\TaskList;
use Illuminate\Http\Request;

class TaskListController extends Controller
{
    // Fungsi untuk menyimpan TaskList baru
    public function store(Request $request) {
        // Validasi input dari pengguna, memastikan 'name' wajib diisi dan maksimal 100 karakter
        $request->validate([
            'name' => 'required|max:100'
        ]);

        // Menyimpan TaskList baru ke dalam database dengan nilai 'name' yang diberikan
        TaskList::create([
            'name' => $request->name
        ]);

        // Mengarahkan kembali pengguna ke halaman sebelumnya
        return redirect()->back();
    }

    // Fungsi untuk menghapus TaskList berdasarkan ID
    public function destroy($id) {
        // Mencari TaskList berdasarkan ID, jika ditemukan, akan dihapus
        TaskList::findOrFail($id)->delete();

        // Mengarahkan kembali pengguna ke halaman sebelumnya setelah penghapusan
        return redirect()->back();
    }
}
