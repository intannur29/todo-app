<?php

// Mendeklarasikan namespace untuk controller ini, yaitu berada di dalam namespace "App\Http\Controllers"
namespace App\Http\Controllers;

// Mengimpor class Request dari Laravel yang akan digunakan untuk menangani data yang dikirimkan melalui HTTP request
use Illuminate\Http\Request;

// Mendeklarasikan class TodoController yang merupakan turunan dari class Controller
// Controller ini nantinya akan digunakan untuk menangani logika aplikasi terkait data todo
class TodoController extends Controller
{
    // Di sini akan ditambahkan method-method untuk menangani berbagai request terkait Todo
    // Misalnya, method untuk menampilkan, menambah, mengupdate, atau menghapus data todo
    //
    // Contoh method yang bisa ditambahkan nanti:
    // public function index() {
    //     // Logic untuk menampilkan daftar todo
    // }
    //
    // public function store(Request $request) {
    //     // Logic untuk menyimpan todo baru
    // }
}
