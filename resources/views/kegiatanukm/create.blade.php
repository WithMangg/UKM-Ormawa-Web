<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Foto Kegiatan') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 bg-white p-8 shadow rounded">
            @if ($errors->any())
                <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="text-sm">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('kegiatanukm.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label class="block font-medium text-gray-700">Foto Kegiatan</label>
                    <input type="file" name="foto_kegiatan" required class="mt-1 block w-full">
                </div>

                <div class="flex justify-end space-x-2">
                    <a href="{{ route('kegiatanukm.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Batal</a>
                    <button type="submit" class="bg-indigo-700 text-white px-4 py-2 rounded">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
