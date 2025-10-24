<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Kelola Pengguna') }}
            </h2>
            <a href="{{ route('users.create') }}"
                class="mt-4 sm:mt-0 px-6 py-3 bg-indigo-600 text-white rounded-full font-semibold hover:bg-indigo-700 transition duration-300">
                Tambah User
            </a>
        </div>
    </x-slot>

    <div class="py-8" x-data="{ currentPage: 1, usersPerPage: 5 }">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                @php
                    $totalUsers = count($users);
                    $chunkedUsers = $users->chunk(5);
                @endphp

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-indigo-100">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase">Nama</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase">Username</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase">Roles</th>
                                <th class="px-6 py-3 text-center text-xs font-semibold text-gray-700 uppercase">Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-100">
                            @foreach ($chunkedUsers as $index => $chunk)
                                <tbody x-show="currentPage === {{ $index + 1 }}" class="bg-white divide-y divide-gray-100">
                                    @foreach ($chunk as $user)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-gray-800">{{ $user->name }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-gray-800">{{ $user->email }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-gray-800">
                                                @foreach ($user->roles as $role)
                                                    {{ $role->name }}@if (!$loop->last), @endif
                                                @endforeach
                                            </td>
                                            <td class="px-6 py-4 text-center">
                                                <div class="flex justify-center gap-2">
                                                    <a href="{{ route('users.edit', $user->id) }}"
                                                        class="px-4 py-2 bg-indigo-500 text-white rounded-full hover:bg-indigo-600 transition">
                                                        Edit
                                                    </a>
                                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                                        class="delete-form">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="px-4 py-2 bg-red-500 text-white rounded-full hover:bg-red-600 transition">
                                                            Hapus
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            @endforeach

                        </tbody>
                    </table>
                </div>

                <!-- Navigasi Slide -->
                <div class="flex justify-between items-center p-4">
                    <button @click="if(currentPage > 1) currentPage--"
                        class="px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300"
                        :disabled="currentPage === 1">
                        &larr; Sebelumnya
                    </button>

                    <div class="space-x-2">
                        <template x-for="page in {{ $chunkedUsers->count() }}">
                            <button @click="currentPage = page"
                                :class="{'bg-indigo-600 text-white': currentPage === page, 'bg-gray-200 text-gray-700': currentPage !== page}"
                                class="w-8 h-8 rounded-full font-semibold hover:bg-indigo-500 hover:text-white transition">
                                <span x-text="page"></span>
                            </button>
                        </template>
                    </div>

                    <button @click="if(currentPage < {{ $chunkedUsers->count() }}) currentPage++"
                        class="px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300"
                        :disabled="currentPage === {{ $chunkedUsers->count() }}">
                        Selanjutnya &rarr;
                    </button>
                </div>
            </div>
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
                        title: 'Apakah Anda yakin?',
                        text: "Data ini akan dihapus dan tidak dapat dikembalikan!",
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