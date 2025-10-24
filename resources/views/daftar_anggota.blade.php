<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-3xl text-gray-800 dark:text-gray-100 leading-tight">
                {{ __('Daftar Anggota') }}
            </h2>
            <button onclick="openModal('tambahModal')"
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition duration-300">
                + Tambah
            </button>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4">
            <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6 transition duration-300">
                <table class="min-w-full text-left border border-gray-300 dark:border-gray-600">
                    <thead class="bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-100">
                        <tr>
                            <th class="border px-3 py-2">No</th>
                            <th class="border px-3 py-2">Nama</th>
                            <th class="border px-3 py-2">NIM</th>
                            <th class="border px-3 py-2">Jurusan</th>
                            <th class="border px-3 py-2">Tahun Masuk</th>
                            <th class="border px-3 py-2 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-800 dark:text-gray-100" x-data="{ page: 1 }">
                        @foreach($data_anggota as $index => $data)
                            <tr x-show="page === Math.ceil(({{ $index + 1 }}) / 5)"
                                class="hover:bg-gray-50 dark:hover:bg-gray-700 transition duration-300">
                                <td class="border px-3 py-2">{{ $index + 1 }}</td>
                                <td class="border px-3 py-2">{{ $data->nama }}</td>
                                <td class="border px-3 py-2">{{ $data->nim }}</td>
                                <td class="border px-3 py-2">{{ $data->jurusan }}</td>
                                <td class="border px-3 py-2">{{ $data->tahun_masuk }}</td>
                                <td class="border px-3 py-2 text-center space-x-2">
                                    <button onclick="openModal('editModal{{ $data->id }}')"
                                        class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 transition duration-300">
                                        Edit
                                    </button>
                                    <form action="{{ route('hapus_anggota') }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus data ini?');"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="id" value="{{ $data->id }}">
                                        <button type="submit"
                                            class="bg-red-600 hover:bg-red-700 text-white font-semibold py-1 px-3 rounded text-sm transition duration-300">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                        @if($data_anggota->isEmpty())
                            <tr>
                                <td colspan="6" class="text-center text-gray-500 py-4 dark:text-gray-400">Tidak ada data
                                    anggota.</td>
                            </tr>
                        @endif


                    </tbody>


                </table>
                <!-- Navigasi Tombol -->
                <div class="flex justify-between items-center mt-4">
                    <button @click="if (page > 1) page--"
                        class="bg-gray-200 px-4 py-2 rounded hover:bg-gray-300 transition text-sm">
                        &laquo; Sebelumnya
                    </button>
                    <div class="text-gray-600 dark:text-gray-300 text-sm">
                        Halaman <span x-text="page"></span> dari {{ ceil($data_anggota->count() / 5) }}
                    </div>
                    <button @click="if (page < {{ ceil($data_anggota->count() / 5) }}) page++"
                        class="bg-gray-200 px-4 py-2 rounded hover:bg-gray-300 transition text-sm">
                        Selanjutnya &raquo;
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah -->
    <div id="tambahModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg w-full max-w-lg p-6 transition duration-300">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-100">Tambah Data</h2>
                <button onclick="closeModal('tambahModal')"
                    class="text-gray-500 dark:text-gray-300 hover:text-gray-700 dark:hover:text-white">&times;</button>
            </div>

            <form action="{{ route('tambah_anggota') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="block font-medium mb-1">Nama</label>
                    <input type="text" name="nama"
                        class="w-full border rounded px-3 py-2 focus:ring focus:border-blue-300 dark:bg-gray-700 dark:text-white dark:border-gray-600">
                </div>
                <div class="mb-3">
                    <label class="block font-medium mb-1">NIM</label>
                    <input name="nim"
                        class="w-full border rounded px-3 py-2 focus:ring focus:border-blue-300 dark:bg-gray-700 dark:text-white dark:border-gray-600">
                </div>
                <div class="mb-3">
                    <label class="block font-medium mb-1">Jurusan</label>
                    <input name="jurusan"
                        class="w-full border rounded px-3 py-2 focus:ring focus:border-blue-300 dark:bg-gray-700 dark:text-white dark:border-gray-600">
                </div>
                <div class="mb-3">
                    <label class="block font-medium mb-1">Tahun Masuk</label>
                    <input type="date" name="tahun_masuk"
                        class="w-full border rounded px-3 py-2 focus:ring focus:border-blue-300 dark:bg-gray-700 dark:text-white dark:border-gray-600">
                </div>
                <div class="flex justify-end gap-2">
                    <button type="button" onclick="closeModal('tambahModal')"
                        class="bg-gray-300 dark:bg-gray-600 text-black dark:text-white px-4 py-2 rounded hover:bg-gray-400 dark:hover:bg-gray-700 transition duration-300">Batal</button>
                    <button type="submit"
                        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition duration-300">Tambah</button>
                </div>
            </form>
        </div>
    </div>

        <!-- Modal Edit -->
    @foreach($data_anggota as $data)
        <div id="editModal{{ $data->id }}" 
            class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg w-full max-w-lg p-6 transition duration-300">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-100">Edit Data</h2>
                    <button onclick="closeModal('editModal{{ $data->id }}')"
                        class="text-gray-500 dark:text-gray-300 hover:text-gray-700 dark:hover:text-white">&times;</button>
                </div>

                <form action="{{ route('edit_anggota') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" value="{{ $data->id }}">

                    <div class="mb-3">
                        <label class="block font-medium mb-1">Nama</label>
                        <input type="text" name="nama" value="{{ $data->nama }}"
                            class="w-full border rounded px-3 py-2 focus:ring focus:border-blue-300 
                                   dark:bg-gray-700 dark:text-white dark:border-gray-600">
                    </div>
                    <div class="mb-3">
                        <label class="block font-medium mb-1">NIM</label>
                        <input name="nim" value="{{ $data->nim }}"
                            class="w-full border rounded px-3 py-2 focus:ring focus:border-blue-300 
                                   dark:bg-gray-700 dark:text-white dark:border-gray-600">
                    </div>
                    <div class="mb-3">
                        <label class="block font-medium mb-1">Jurusan</label>
                        <input name="jurusan" value="{{ $data->jurusan }}"
                            class="w-full border rounded px-3 py-2 focus:ring focus:border-blue-300 
                                   dark:bg-gray-700 dark:text-white dark:border-gray-600">
                    </div>
                    <div class="mb-3">
                        <label class="block font-medium mb-1">Tahun Masuk</label>
                        <input type="date" name="tahun_masuk" value="{{ $data->tahun_masuk }}"
                            class="w-full border rounded px-3 py-2 focus:ring focus:border-blue-300 
                                   dark:bg-gray-700 dark:text-white dark:border-gray-600">
                    </div>
                    <div class="flex justify-end gap-2">
                        <button type="button" onclick="closeModal('editModal{{ $data->id }}')"
                            class="bg-gray-300 dark:bg-gray-600 text-black dark:text-white px-4 py-2 rounded 
                                   hover:bg-gray-400 dark:hover:bg-gray-700 transition duration-300">
                            Batal
                        </button>
                        <button type="submit"
                            class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 transition duration-300">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @endforeach


    <script>
        function openModal(id) {
            document.getElementById(id).classList.remove('hidden');
        }
        function closeModal(id) {
            document.getElementById(id).classList.add('hidden');
        }
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