<?php

namespace App\Http\Controllers;

use App\Models\FotoKegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KegiatanUKMController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $fotos = FotoKegiatan::where('user_id', $user->id)->get();

        return view('kegiatanukm.index', compact('fotos'));
    }

    public function create()
    {
        return view('kegiatanukm.create');
    }

    // Simpan foto kegiatan
    public function store(Request $request)
    {
        $request->validate([
            'foto_kegiatan' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = [];

        // Tambahkan user_id
        $data['user_id'] = Auth::id();

        // Simpan file ke folder publik
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

        FotoKegiatan::create($data);

        return redirect()->route('kegiatanukm.index')->with('success', 'Foto kegiatan berhasil ditambahkan.');
    }

    // Hapus foto
    public function destroy($id)
    {
        $foto = FotoKegiatan::findOrFail($id);

        $filePath = public_path('storage/' . $foto->foto_kegiatan);
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        $foto->delete();

        return redirect()->route('kegiatanukm.index')->with('success', 'Foto kegiatan berhasil dihapus.');
    }
}
