<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Kelola Berita') }}
            </h2>
            <a href="{{ route('berita.create') }}"
                class="mt-4 sm:mt-0 px-6 py-3 bg-indigo-600 text-white rounded-full font-semibold hover:bg-indigo-700 transition duration-300">
                Tambah Berita
            </a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if ($beritas->isEmpty())
                <div class="bg-white p-6 text-center rounded-lg shadow">
                    <p class="text-gray-600">Belum ada berita yang ditambahkan.</p>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($beritas as $data)
                        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition duration-300">
                            <img src="{{ asset('storage/' . $data->foto_kegiatan) }}" alt="Gambar Berita"
                                class="w-full h-48 object-cover">
                            <div class="p-4 space-y-2">
                                <h3 class="text-lg font-bold text-indigo-700">{{ $data->judul }}</h3>
                                <p class="text-sm text-gray-500">{{ $data->tanggal_berita }}</p>
                                <p class="text-gray-700 font-medium">{{ $data->desktipsi }}</p>
                                <p class="text-sm text-gray-600 line-clamp-3">
                                    {{ $data->isi_berita }}
                                </p>
                                <div class="flex justify-between pt-3">
                                    <a href="{{ route('berita.edit', $data->id) }}"
                                        class="px-4 py-2 bg-blue-600 text-white rounded-full text-sm hover:bg-blue-700 transition">Edit</a>
                                    <form action="{{ route('berita.destroy', $data->id) }}" method="POST" class="delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="px-4 py-2 bg-red-600 text-white rounded-full text-sm hover:bg-red-700 transition">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.delete-form').forEach(form => {
                form.addEventListener('submit', function (e) {
                    e.preventDefault();

                    Swal.fire({
                        title: 'Hapus berita ini?',
                        text: "Data tidak bisa dikembalikan!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, hapus!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>
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
