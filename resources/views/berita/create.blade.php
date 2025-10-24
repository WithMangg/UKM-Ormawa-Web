<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Tambah Berita') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow rounded-lg p-8">
                <form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-6">
                        <label for="judul" class="block text-sm font-medium text-gray-700">Judul Berita</label>
                        <input type="text" id="judul" name="judul"
                            class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm sm:text-sm" required
                            value="{{ old('judul') }}" placeholder="Judul Berita">
                        @error('judul_berita')
                            <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                        <input type="text" id="deskripsi" name="deskripsi"
                            class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm sm:text-sm" required
                            value="{{ old('deskripsi') }}" placeholder="Deskripsi singkat">
                        @error('deskripsi')
                            <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="isi_berita" class="block text-sm font-medium text-gray-700">Isi Berita</label>
                        <textarea id="isi_berita" name="isi_berita"
                            class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm sm:text-sm" required
                            placeholder="Isi Berita">{{ old('isi_berita') }}</textarea>
                        @error('isi_berita')
                            <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="tanggal_berita" class="block text-sm font-medium text-gray-700">Tanggal
                            Berita</label>
                        <input type="date" id="tanggal_berita" name="tanggal_berita"
                            class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm sm:text-sm" required
                            value="{{ old('tanggal_berita') }}">
                        @error('tanggal_berita')
                            <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="foto_kegiatan" class="block text-sm font-medium text-gray-700">Gambar Berita</label>
                        <input type="file" id="foto_kegiatan" name="foto_kegiatan"
                            class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm sm:text-sm" required>
                        @error('foto_kegiatan')
                            <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Simpan</button>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>