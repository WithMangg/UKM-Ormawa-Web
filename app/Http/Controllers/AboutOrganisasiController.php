<?php

namespace App\Http\Controllers;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AboutOrganisasiController extends Controller
{    
    // show data about di ukm
    public function index()
    {
        $user = Auth::user();

        $abouts = About::with('user')->where('user_id', $user->id)->first();
        if (!$abouts) {
            return redirect()->route('abouts.create');
        }
        return view('abouts.index', compact('abouts'));
    }

    public function create()
    {
        return view('abouts.create');
    }

    // tambah data about
    public function store(Request $request)
    {
        $request->validate([
            'nama_organisasi' => 'required|string|max:255',
            'logo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'slogan' => 'required|string|max:255',
            'tentang_kami' => 'required|string',
            'email' => 'required|string',
            'nomer_telepon' => 'required|string',
            'lokasi' => 'required|string|max:255',
        ]);

        $data = $request->only([
            'nama_organisasi',
            'logo',
            'slogan',
            'tentang_kami',
            'email',
            'nomer_telepon',
            'lokasi',
        ]);

        // Tambahkan user yang login
        $data['user_id'] = Auth::id();

        // Upload gambar secara manual jika ada
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $destination = public_path('storage/logo');

            // Buat folder jika belum ada
            if (!file_exists($destination)) {
                mkdir($destination, 0755, true);
            }

            $file->move($destination, $filename);

            // Simpan path relatif ke database
            $data['logo'] = 'logo/' . $filename;

        }

        About::create($data);

        return redirect()->route('abouts.index')->with('success', 'Berita berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $abouts = about::findOrFail($id);
        return view('abouts.edit', compact('abouts'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_organisasi' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'slogan' => 'required|string|max:255',
            'tentang_kami' => 'required|string',
            'email' => 'required|string',
            'nomer_telepon' => 'required|string',
            'lokasi' => 'required|string|max:255'
        ]);

        $abouts = about::findOrFail($id);

        $data = $request->only([
            'nama_organisasi',
            'logo',
            'slogan',
            'tentang_kami',
            'email',
            'nomer_telepon',
            'lokasi',
        ]);

        // Jika gambar baru di-upload
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $destination = public_path('storage/logo');

            if (!file_exists($destination)) {
                mkdir($destination, 0755, true);
            }

            $file->move($destination, $filename);
            $data['logo'] = 'logo/' . $filename;
        }

        $abouts->update($data);

        return redirect()->route('abouts.index')->with('success', 'Berita berhasil diperbarui.');
    }
}
