<?php

// Menentukan namespace controller utama aplikasi.
namespace App\Http\Controllers;

// Mengimpor model Post untuk mengelola data postingan di database.
use App\Models\Post;

// Mengimpor Inertia untuk menampilkan halaman menggunakan Inertia.js.
use Inertia\Inertia;

// Mengimpor Request untuk mengambil data dari formulir yang dikirim pengguna.
use Illuminate\Http\Request;

// Mengimpor Redirect untuk mengarahkan pengguna ke halaman tertentu.
use Illuminate\Support\Facades\Redirect;

class PostController extends Controller
{

    // Menampilkan seluruh data postingan.
    public function index()
    {
        // Mengambil semua data postingan dari database berdasarkan data terbaru.
        $posts = Post::latest()->get();

        // Menampilkan halaman Index pada folder Post
        // sekaligus mengirimkan data postingan ke halaman tersebut.
        return Inertia::render('Post/Index', [
            'posts' => $posts
        ]);
    }

    // Menampilkan halaman untuk menambahkan postingan baru.
    public function create()
    {
        // Menampilkan halaman Create pada folder Post.
        return Inertia::render('Post/Create');
    }

    // Memproses dan menyimpan data postingan baru.
    public function store(Request $request)
    {
        // Memvalidasi data judul dan isi postingan sebelum disimpan.
        $request->validate([
            // Judul postingan wajib diisi.
            'title'   => 'required',

            // Isi postingan wajib diisi.
            'content' => 'required',
        ]);

        // Membuat data postingan baru dan menyimpannya ke database.
        $post = Post::create([
            // Mengambil nilai judul dari formulir.
            'title'   => $request->title,

            // Mengambil nilai isi postingan dari formulir.
            'content' => $request->content
        ]);

        // Memeriksa apakah data postingan berhasil dibuat.
        if ($post) {

            // Mengarahkan pengguna ke halaman daftar postingan
            // dan menampilkan pesan bahwa data berhasil disimpan.
            return Redirect::route('posts.index')->with('message', 'Data Berhasil Disimpan!');
        }
    }

    // Menampilkan halaman untuk mengedit postingan berdasarkan data yang dipilih.
    public function edit(Post $post)
    {
        // Menampilkan halaman Edit pada folder Post
        // sekaligus mengirimkan data postingan yang akan diedit.
        return Inertia::render('Post/Edit', [
            'post' => $post
        ]);
    }

    // Memproses perubahan atau pembaruan data postingan.
    public function update(Request $request, Post $post)
    {
        // Memvalidasi judul dan isi postingan yang akan diperbarui.
        $request->validate([
            // Judul postingan wajib diisi.
            'title'   => 'required',

            // Isi postingan wajib diisi.
            'content' => 'required',
        ]);

        // Memperbarui data postingan berdasarkan input dari formulir.
        $post->update([
            // Mengubah judul postingan.
            'title'   => $request->title,

            // Mengubah isi postingan.
            'content' => $request->content
        ]);

        // Memeriksa apakah data postingan berhasil diperbarui.
        if ($post) {

            // Mengarahkan pengguna ke halaman daftar postingan
            // dan menampilkan pesan bahwa data berhasil diperbarui.
            return Redirect::route('posts.index')->with('message', 'Data Berhasil Diupdate!');
        }
    }

    // Menghapus data postingan berdasarkan ID.
    public function destroy($id)
    {

        // Mencari data postingan berdasarkan ID.
        // Jika data tidak ditemukan, Laravel akan menampilkan error 404.
        $post = Post::findOrFail($id);

        // Menghapus data postingan dari database.
        $post->delete();

        // Memeriksa apakah data postingan berhasil dihapus.
        if ($post) {

            // Mengarahkan pengguna ke halaman daftar postingan
            // dan menampilkan pesan bahwa data berhasil dihapus.
            return Redirect::route('posts.index')->with('message', 'Data Berhasil Dihapus!');
        }
    }
}