<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;

class BeritaController extends Controller
{
    // Menampilkan semua berita
    public function index()
    {
        $beritas = Berita::all();
        return view('berita.index', compact('beritas'));
    }

    public function show()
    {
        $beritas = Berita::all();
        return view('index', compact('beritas'));
    }

    // Menampilkan form untuk membuat berita
    public function create()
    {
        return view('berita.create');
    }

    // Menyimpan berita baru
    public function store(Request $request)
    {
        $request->validate([
            'foto_kegiatan' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'isi_berita' => 'required|string',
            'tanggal_berita' => 'required|date',
        ]);

        $data = $request->only([
            'judul',
            'deskripsi',
            'isi_berita',
            'tanggal_berita'
        ]);

        // Upload gambar secara manual jika ada
        if ($request->hasFile('foto_kegiatan')) {
            $file = $request->file('foto_kegiatan');
            $filename = time() . '_' . $file->getClientOriginalName();
            $destination = public_path('storage/foto_kegiatan');

            // Buat folder jika belum ada
            if (!file_exists($destination)) {
                mkdir($destination, 0755, true);
            }

            $file->move($destination, $filename);

            // Simpan path relatif ke database
            $data['foto_kegiatan'] = 'foto_kegiatan/' . $filename;

        }

        Berita::create($data);

        return redirect()->route('berita.index')->with('success', 'Berita berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $berita = Berita::findOrFail($id);
        return view('berita.edit', compact('berita'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'foto_kegiatan' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'isi_berita' => 'required|string',
            'tanggal_berita' => 'required|date',
        ]);

        $berita = Berita::findOrFail($id);

        $data = $request->only([
            'judul',
            'deskripsi',
            'isi_berita',
            'tanggal_berita'
        ]);

        // Jika gambar baru di-upload
        if ($request->hasFile('foto_kegiatan')) {
            $file = $request->file('foto_kegiatan');
            $filename = time() . '_' . $file->getClientOriginalName();
            $destination = public_path('storage/foto_kegiatan');

            if (!file_exists($destination)) {
                mkdir($destination, 0755, true);
            }

            $file->move($destination, $filename);
            $data['foto_kegiatan'] = 'foto_kegiatan/' . $filename;
        }

        $berita->update($data);

        return redirect()->route('berita.index')->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);

        // Hapus file gambar jika ada
        if ($berita->foto_kegiatan) {
            $gambarPath = public_path('storage/' . $berita->foto_kegiatan);
            if (file_exists($gambarPath)) {
                unlink($gambarPath);
            }
        }

        // Hapus data berita dari database
        $berita->delete();

        return redirect()->route('berita.index')->with('success', 'Berita berhasil dihapus.');
    }

}
