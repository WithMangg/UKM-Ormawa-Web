<?php

namespace App\Http\Controllers;
use App\Models\ukm;
use App\Models\ormawa;
use App\Models\Berita;
use App\Models\FotoKegiatan;
use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Controllers\BeritaController;

class FrontController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function about()
    {
        $abouts = About::all();
        return view('pages.about', compact('abouts'));
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function forum()
    {
        return view('pages.forum');
    }

    public function rekomendasi()
    {
        return view('pages.rekomendasi');
    }

    public function recruitment()
    {
    $ukms = ukm::all();
    $ormawas = ormawa::all();
    
        // Kirim data UKM ke view 'pages.recruitment'
        return view('pages.recruitment', compact('ukms', 'ormawas'));
    }
    

    public function padus()
    {
        $abouts = About::where('nama_organisasi', 'UKM Paduan Suara')->firstOrFail();
        return view('pages.detail', compact('abouts'));
    }

    public function detail($id)
    {
        $abouts = About::findOrFail($id); // atau About::where('id', $id)->first();
       $fotos = FotoKegiatan::where('user_id', $abouts->user_id)->get();
        return view('pages.detail', compact('abouts','fotos'));
    }

    public function register()
    {
        return view('register');
    }

    public function ormawa_rekom()
    {
        return view('pages.ormawarekomendasi');
    }

    public function history()
    {
        return view('ukm.Riwayat_pendaftaran');
    }

    public function ormawa_history()
    {
        return view('ormawa.Riwayat_pendaftaran');
    }

    public function opsi()
    {
        return view('pages.opsirekomendasi');
    }

    public function daftar_anggota()
    {
        return view('daftar_anggota');  
    }

    public function news($id)
    {
        $berita = Berita::findOrFail($id);
        return view('pages.berita', compact('berita'));
    }
}
