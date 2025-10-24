<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Foto Kegiatan') }}
            </h2>
            <a href="{{ route('kegiatanormawa.create') }}" class="bg-indigo-700 text-white px-4 py-2 rounded-full">
                Tambah Foto
            </a>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                @forelse($fotos as $foto)
                    <div class="bg-white p-4 rounded shadow">
                        <img src="{{ asset('storage/' . $foto->foto_kegiatan) }}" alt="Foto" class="w-full h-48 object-cover rounded mb-3">
                        <div class="flex justify-between">
                            <!-- <a href="{{ route('kegiatanukm.edit', $foto->id) }}" class="text-sm text-white bg-yellow-500 px-3 py-1 rounded">Edit</a> -->
                            <form action="{{ route('kegiatanormawa.destroy', $foto->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus foto ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="text-sm text-white bg-red-600 px-3 py-1 rounded" type="submit">Hapus</button>
                            </form>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-600">Belum ada foto kegiatan.</p>
                @endforelse
            </div>
        </div>
    </div>

       <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if(session('success'))
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: '{{ session("success") }}',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                });
            });
        </script>
    @endif
</x-app-layout>
