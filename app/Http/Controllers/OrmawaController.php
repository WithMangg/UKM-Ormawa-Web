<?php

namespace App\Http\Controllers;

use App\Models\ormawa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\StoreOrmawaRequest;
use App\Http\Requests\UpdateOrmawaRequest;

class OrmawaController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $ormawa = ormawa::with('AdminOrmawa')->where('AdminOrmawa_id', $user->id)->first();
        if (!$ormawa) {
            return redirect()->route('ormawa.create');
        }
        return view('ormawa.index', compact('ormawa'));
    }

    public function create()
    {
        return view('ormawa.create');
    }

    public function store(StoreOrmawaRequest $request)
    {
        $user = Auth::user();

        // Cek apakah user sudah membuat company
        $ormawa = ormawa::where('AdminOrmawa_id', $user->id)->first();
        if ($ormawa) {
            return redirect()->back()->withErrors(['Ormawa' => 'Failed! Anda sudah membuat Ormawa']);
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
                $validated['AdminOrmawa_id'] = $user->id;

                // Buat data company baru
                ormawa::create($validated);
            });
        } catch (\Exception $e) {
            // Tangani error jika transaksi gagal
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }

        // Redirect ke halaman index setelah berhasil
        return redirect()->route('ormawa.index');
    }

    public function edit(ormawa $ormawa)
    {
        return view('ormawa.edit', compact('ormawa'));
    }

    public function update(UpdateOrmawaRequest $request, ormawa $ormawa)
    {
        try {
            DB::transaction(function () use ($request, $ormawa) {
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
                $ormawa->update($validated);
            });
        } catch (\Exception $e) {
            logger('Error: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }

        return redirect()->route('ormawa.index');
    }

    public function destroy(ormawa $ormawa)
    {
        try {
            DB::transaction(function () use ($ormawa) {
                $ormawa->delete();
            });
        } catch (\Exception $e) {
            logger('Error: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Gagal menghapus data.']);
        }

        return redirect()->route('ormawa.index');
    }
}