<?php

namespace App\Http\Controllers;

use App\Models\ukm;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreukmRequest;
use App\Http\Requests\UpdateukmRequest;

class UkmController extends Controller
{
    // Fungsi index untuk menampilkan daftar UKM
    public function index()
    {
        $user = Auth::user();

        $ukm = ukm::with('Adminukm')->where('Adminukm_id', $user->id)->first();
        if (!$ukm) {
            return redirect()->route('ukm.create');
        }
        return view('ukm.index', compact('ukm'));
    }

    // Fungsi untuk menampilkan form pembuatan UKM
    public function create()
    {
        return view('ukm.create');
    }

    // Fungsi untuk menyimpan data UKM baru
    public function store(StoreukmRequest $request)
    {
        $user = Auth::user();

        // Cek apakah user sudah membuat company
        $ukm = ukm::where('Adminukm_id', $user->id)->first();
        if ($ukm) {
            return redirect()->back()->withErrors(['ukm' => 'Failed! Anda sudah membuat ukm']);
        }

        try {
            // Jalankan transaksi untuk memastikan atomicity
            DB::transaction(function () use ($request, $user) {
                // Validasi data dari request
                $validated = $request->validated();

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
                    $validated['logo'] = 'logo/' . $filename;
                }

                // Tambahkan slug dan ID 
                $validated['slug'] = Str::slug($validated['name']);
                $validated['Adminukm_id'] = $user->id;

                // Buat data company baru
                ukm::create($validated);
            });

        } catch (\Exception $e) {
            // Tangani error jika transaksi gagal
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }

        // Redirect ke halaman index setelah berhasil
        return redirect()->route('ukm.index')->with('success', 'User updated successfully.');
    }

    // Fungsi untuk menampilkan form edit UKM
    public function edit(ukm $ukm)
    {
        return view('ukm.edit', compact('ukm'));
    }

    // Fungsi untuk update data UKM
    public function update(UpdateukmRequest $request, ukm $ukm)
    {
        try {
            DB::transaction(function () use ($request, $ukm) {
                $validated = $request->validated();

                if ($request->hasFile('logo')) {
                    $file = $request->file('logo');
                    logger('File upload detected: ' . print_r($file, true));

                    if ($file->isValid()) {
                        $filename = uniqid() . '.' . $file->getClientOriginalExtension();

                        // Simpan file manual jika storeAs gagal
                        $destinationPath = storage_path('app/public/logos/' . date('Y/m/d'));
                        if (!file_exists($destinationPath)) {
                            mkdir($destinationPath, 0777, true);
                        }
                        $file->move($destinationPath, $filename);
                        $logoPath = 'logos/' . date('Y/m/d') . '/' . $filename;

                        $validated['logo'] = $logoPath;
                    } else {
                        throw new \Exception('Uploaded file is not valid.');
                    }
                }

                $validated['slug'] = Str::slug($validated['name']);
                $ukm->update($validated);
            });
        } catch (\Exception $e) {
            logger('Error: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }

        return redirect()->route('ukm.index')->with('success', 'User updated successfully.');
    }

    // Fungsi untuk menghapus UKM
    public function destroy(ukm $ukm)
    {
        try {
            DB::transaction(function () use ($ukm) {
                $ukm->delete();
            });
        } catch (\Exception $e) {
            logger('Error: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Gagal menghapus data.']);
        }

        return redirect()->route('ukm.index');
    }
}
