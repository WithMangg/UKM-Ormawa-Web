<?php

namespace App\Http\Controllers;

use App\Models\recruitment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class RecruitmentController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        

        $recruitments = Recruitment::with('Adminukm')->where('Adminukm_id', $user->id)->first();
        if (!$recruitments) {
            return redirect()->route('ukm.Riwayat_pendaftaran');
        }
        return view('ukm.Riwayat_pendaftaran', compact('recruitments'));
    }
    

    public function index_ormawa()
    {
        $user = Auth::user();

        $recruitments = Recruitment::with('AdminOrmawa')->where('AdminOrmawa_id', $user->id)->first();
        if (!$recruitments) {
            return redirect()->route('ormawa.Riwayat_pendaftaran');
        }
        return view('ormawa.Riwayat_pendaftaran', compact('recruitments'));
    }

    public function riwayat()
    {        
        $user = Auth::user(); // Ambil user yang sedang login

        // Ambil data recruitment hanya untuk UKM yang dimiliki admin yang sedang login
        $recruitments = Recruitment::with('Adminukm')->where('Adminukm_id', $user->id)->get();

        return view('ukm.Riwayat_pendaftaran', compact('recruitments'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'nim' => 'required|string',
            'email' => 'required|string',
            'phone' => 'nullable|string',
            'study_program' => 'required|string',
            'semester' => 'required|integer',
            // 'bersedia' => 'required|string',
            'gender' => 'required|in:Male,Female',
            'reason' => 'required|string',
            'photo' => 'nullable|string',
            'Adminukm_id' => 'required|integer|exists:ukm,Adminukm_id', // Pastikan UKM yang dipilih ada
        ]);

        // Ambil Adminukm_id dari tabel ukm berdasarkan ukm_id yang dipilih
        $ukm = \App\Models\Ukm::where('Adminukm_id', $validated['Adminukm_id'])->first();

        if (!$ukm) {
            return redirect()->back()->with('error', 'UKM tidak ditemukan.');
        }

        // Tambahkan Adminukm_id ke dalam data yang akan disimpan
        $validated['Adminukm_id'] = $ukm->Adminukm_id;

        recruitment::create($validated);

        return redirect()->route('recruitment')->with('success', 'Berhasil mendaftar.');
    }

}
