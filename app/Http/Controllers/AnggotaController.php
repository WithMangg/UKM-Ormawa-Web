<?php

namespace App\Http\Controllers;
use App\Models\Anggota;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AnggotaController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $data_anggota = Anggota::with('anggota_id')->where('anggota_id', $user->id)->get();
        if (!$data_anggota) {
            return redirect()->route('daftar_anggota');
        }
        return view('daftar_anggota', compact('data_anggota'));
    }

    public function show()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $data_anggota = Anggota::where('anggota_id', Auth::user()->id)->get();

        return view('daftar_anggota', compact('data_anggota'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'nim' => 'required|integer',
            'jurusan' => 'required|string',
            'tahun_masuk' => 'required|date',
        ]);

        Anggota::create([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'jurusan' => $request->jurusan,
            'tahun_masuk' => $request->tahun_masuk,
            'anggota_id' => Auth::user()->id
        ]);

        return redirect()->back()->with('success', 'Data berhasil ditambahkan!');
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:daftar_anggota,id',
            'nama' => 'required|string',
            'nim' => 'required|integer',
            'jurusan' => 'required|string',
            'tahun_masuk' => 'required|date',
        ]);

        $data_anggota = Anggota::find($request->id);
        $data_anggota->nama = $request->nama;
        $data_anggota->nim = $request->nim;
        $data_anggota->jurusan = $request->jurusan;
        $data_anggota->tahun_masuk = $request->tahun_masuk;
        $data_anggota->anggota_id = Auth::user()->id;
        $data_anggota->save();

        return redirect()->back()->with('success', 'Data berhasil diubah!');
    }

    public function delete(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:daftar_anggota,id',
        ]);

        $data_anggota = Anggota::find($request->id);

        // Validasi agar hanya pemilik data yang bisa menghapus
        if ($data_anggota && $data_anggota->anggota_id == Auth::user()->id) {
            $data_anggota->delete();
            return redirect()->back()->with('success', 'Data berhasil dihapus!');
        }

        return redirect()->back()->with('error', 'Gagal menghapus data.');
    }

    public function dashboard()
    {
        $anggota = DB::table('daftar_anggota')
            ->join('users', 'daftar_anggota.anggota_id', '=', 'users.id')
            ->select('users.name as nama_anggota', DB::raw('count(*) as total'))
            ->groupBy('users.name')
            ->get();

        $labels = $anggota->pluck('nama_anggota');
        $data = $anggota->pluck('total');

        return view('dashboard', compact('labels', 'data'))->with('success', 'Selamat Datang.');
    }
}