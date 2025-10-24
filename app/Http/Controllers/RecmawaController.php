<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\recmawa;
use App\Models\rekomawa;
use Illuminate\Http\Request;

class RecMawaController extends Controller
{
     private $mappings = [
        'question1' => ['Ya', 'Tidak'],
        'JK' => ['Laki-Laki', 'Perempuan', 'Laki-Laki dan Perempuan'],
        'question2' => ['Organisasi pengembangan jiwa kepemimpinan', 'Organisasi pengembangan minat bakat ( seni, olahraga, literasi, teknologi)'],
        'question3' => ['Lingkungan yang mendukung dan positif', 'Peluang belajar dan berkembang', 'Kesempatan untuk menunjukkan hasil atau prestasi', 'Ruang untuk mengekspresikan ide'],
        'question4' => ['Kompetisi', 'Kolaborasi Tim', 'Kegiatan Fisik', 'Kreativitas', 'Sosial', 'Pengabdian Masyarakat'],
        'question5' => ['Komitmen Besar', 'Cukup Besar', 'Sedang', 'Kecil'],
        'question6' => ['Sering', 'Cukup', 'Kadang-kadang'],
        'question7' => ['Besar', 'Cukup', 'Biasa saja', 'Tidak tertarik'],
        'question8' => ['Membangun jaringan/relasi', 'Menambah pengalaman', 'Melatih soft skill', 'Meningkatkan CV/portofolio'],
        'question9' => ['Pengembangan diri', 'Belajar hal baru', 'Eksplorasi minat', 'Keseruan dan kebersamaan'],
    ];

    public function index()
    {
        $user = Auth::user();

        $recmawas = recmawa::with('AdminOrmawa')->where('AdminOrmawa_id', $user->id)->first();
        if (!$recmawas) {
            return redirect()->route('ormawa.Riwayat_pendaftaran');
        }

        return view('ormawa.Riwayat_pendaftaran', compact('recmawas'));
    }

    public function show()
    {
        $user = Auth::user();

        $show = rekomawa::with('AdminOrmawa')->where('AdminOrmawa_id', $user->id)->first();
        if (!$show) {
            return redirect()->route('ormawa.recomendation');
        }
        
        $mappings = $this->mappings; // ✅ fix Undefined variable $mappings

        return view('ormawa.show_recomendation', compact('show', 'mappings'));
    }

     public function edit($id)
    {
        $show = rekomawa::findOrFail($id);
        return response()->json($show);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'question1' => 'required|string',
            'JK'        => 'required|string',
            'question2' => 'required|string',
            'question3' => 'required|string',
            'question4' => 'required|string',
            'question5' => 'required|string',
            'question6' => 'required|string',
            'question7' => 'required|string',
            'question8' => 'required|string',
            'question9' => 'required|string',
        ]);

        $rekomawa = rekomawa::findOrFail($id);
        $rekomawa->update($validated);

        return response()->json(['message' => 'Data berhasil diperbarui.']);
    }



    public function riwayat()
    {        
        $user = Auth::user(); // Ambil user yang sedang login

        // Ambil data recruitment hanya untuk UKM yang dimiliki admin yang sedang login
        $recmawas = recmawa::with('AdminOrmawa')->where('AdminOrmawa_id', $user->id)->get();

        return view('ormawa.Riwayat_pendaftaran', compact('recmawas'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'nim' => 'required|integer',
            'email' => 'required|string',
            'phone' => 'nullable|string',
            'study_program' => 'required|string',
            'semester' => 'required|integer',
            'gender' => 'required|in:Male,Female',
            'reason' => 'required|string',
            'photo' => 'nullable|string',
            'AdminOrmawa_id' => 'required|integer|exists:ormawa,AdminOrmawa_id',
        ]);

        // Ambil Adminukm_id dari tabel ukm berdasarkan ukm_id yang dipilih
        $ormawa = \App\Models\ormawa::where('AdminOrmawa_id', $validated['AdminOrmawa_id'])->first();

        if (!$ormawa) {
            return redirect()->back()->with('error', 'ORMAWA tidak ditemukan.');
        }

        // Tambahkan AdminOrmawa_id ke dalam data yang akan disimpan
        $validated['AdminOrmawa_id'] = $ormawa->AdminOrmawa_id;

        recmawa::create($validated);

        return redirect()->route('recruitment')->with('success', 'Berhasil mendaftar.');
    }
}
