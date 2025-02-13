<?php

namespace App\Http\Controllers;
// untuk memanggil class yang diperlukan 
use App\Models\Task;
use App\Models\TaskList;
use Illuminate\Http\Request;

class TaskController extends Controller
{
// function index untuk mengarahkan file utama
    public function index() {
        $data = [
            'title' => 'Home',
            'lists' => TaskList::all(),
            'tasks' => Task::orderBy('created_at', 'desc')->get(),
            'priorities' => Task::PRIORITIES
        ];
// mengarahkan ke folder view
        return view('pages.home', $data);
    }
// function store untuk menyimpan data ke database (required adalah data yang dibutuhkan)
    public function store(Request $request) { 
        $request->validate([
            'name' => 'required|max:100',
            'description' => 'max:255', 
            'priority' => 'required|in:low,medium,high',
            'list_id' => 'required'
        ]);
// task creat berfungsi untuk memasukan data ke database/table
        Task::create([
            'name' => $request->name,
            'description' => $request->deskripsi,
            'priority' => $request->priority,
            'list_id' => $request->list_id
        ]);
//  mengembalikan ke halaman sebelumnya
        return redirect()->back();
    }
// merubah/mengupdate status dari belum selesai menjadi selesai
    public function complete($id) {
        Task::findOrFail($id)->update([
            'is_completed' => true
        ]);

        return redirect()->back();
    }
//  destroy berfungsi untuk menghapus data yang ada di database/kolom
    public function destroy($id) {
        Task::findOrFail($id)->delete();

        return redirect()->route('home');
    }

    public function show($id) {
        $task = Task::findOrFail($id);

        $data = [
            'title' => 'Details',
            'lists' => TaskList::all(),
            'task' => $task,
        ];
// manggil tampilan
        return view('pages.details', $data);

    }

    public function changeList(Request $request, Task $task)
    {
        $request->validate([
            'list_id' => 'required|exists:task_lists,id',
        ]);

        Task::findOrFail($task->id)->update([
            'list_id' => $request->list_id
        ]);

        return redirect()->back()->with('success', 'List berhasil diperbarui!');
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'list_id' => 'required',
            'name' => 'required|max:100',
            'description' => 'max:255',
            'priority' => 'required|in:low,medium,high'
        ]);

        Task::findOrFail($task->id)->update([
            'list_id' => $request->list_id,
            'name' => $request->name,
            'description' => $request->description,
            'priority' => $request->priority
        ]);

        return redirect()->back()->with('success', 'Task berhasil diperbarui!');
    }
}
// kode ini adalah struktur dasar  untuk menampilkan halaman dalam laravell