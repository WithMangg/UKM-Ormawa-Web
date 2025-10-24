<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-200 leading-tight">
                {{ __('Kelola Berita') }}
            </h2>
        </div>
    </x-slot>

    <div class="max-w-4xl mx-auto py-6 px-4 sm:px-6 lg:px-8 bg-gray-900 rounded-lg shadow-lg">
        <h2 class="text-3xl font-extrabold text-white mb-8">Edit Berita</h2>

        @if ($errors->any())
            <div class="mb-6 rounded bg-red-800 border border-red-700 text-red-300 px-6 py-4">
                <strong class="block mb-2 text-lg">Periksa kembali inputan Anda:</strong>
                <ul class="list-disc pl-6 space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data" class="space-y-8">
            @csrf
            @method('PUT')

            <div>
                <label for="judul" class="block text-sm font-semibold text-gray-300 mb-2">Judul Berita</label>
                <input type="text" name="judul" id="judul"
                    value="{{ old('judul', $berita->judul) }}" required
                    class="w-full rounded-md bg-gray-800 border border-gray-700 text-gray-200 placeholder-gray-400
                           focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 px-4 py-2" />
            </div>

            <div>
                <label for="deskripsi" class="block text-sm font-semibold text-gray-300 mb-2">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" rows="3" required
                    class="w-full rounded-md bg-gray-800 border border-gray-700 text-gray-200 placeholder-gray-400
                           focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 px-4 py-2 resize-none">{{ old('deskripsi', $berita->deskripsi) }}</textarea>
            </div>

            <div>
                <label for="isi_berita" class="block text-sm font-semibold text-gray-300 mb-2">Isi Berita</label>
                <textarea name="isi_berita" id="isi_berita" rows="6" required
                    class="w-full rounded-md bg-gray-800 border border-gray-700 text-gray-200 placeholder-gray-400
                           focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 px-4 py-2 resize-y">{{ old('isi_berita', $berita->isi_berita) }}</textarea>
            </div>

            <div>
                <label for="tanggal_berita" class="block text-sm font-semibold text-gray-300 mb-2">Tanggal Berita</label>
                <input type="date" name="tanggal_berita" id="tanggal_berita"
                    value="{{ old('tanggal_berita', $berita->tanggal_berita) }}" required
                    class="w-full rounded-md bg-gray-800 border border-gray-700 text-gray-200
                           focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 px-4 py-2" />
            </div>

            <div>
                <label for="foto_kegiatan" class="block text-sm font-semibold text-gray-300 mb-2">Gambar Berita</label>
                @if ($berita->foto_kegiatan)
                    <div class="mb-4">
                        <img src="{{ asset('storage/' . $berita->foto_kegiatan) }}" alt="Gambar Berita" class="max-w-xs rounded shadow-lg border border-gray-700">
                    </div>
                @endif
                <input type="file" name="foto_kegiatan" id="foto_kegiatan" accept="image/*"
                    class="w-full text-gray-300
                           file:mr-4 file:py-2 file:px-4
                           file:rounded file:border-0
                           file:bg-indigo-600 file:text-white
                           file:hover:bg-indigo-700
                           focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                <p class="text-xs text-gray-400 mt-1">Kosongkan jika tidak ingin mengganti gambar.</p>
            </div>

            <div class="flex space-x-4">
                <button type="submit"
                    class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 px-6 py-3
                           text-lg font-semibold text-white shadow-md hover:bg-indigo-700 focus:outline-none
                           focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition">
                    Update Berita
                </button>
                <a href="{{ route('berita.index') }}"
                    class="inline-flex justify-center rounded-md border border-gray-600 bg-gray-800 px-6 py-3
                           text-lg font-semibold text-gray-300 shadow-md hover:bg-gray-700 focus:outline-none
                           focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition">
                    Batal
                </a>
            </div>
        </form>
    </div>
</x-app-layout>
