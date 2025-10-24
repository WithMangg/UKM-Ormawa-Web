<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('INI HALAMAN HISTORY') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 dark:bg-gray-900">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-xl sm:rounded-lg p-6">
                <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-6">Data Pendaftaran UKM</h2>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 text-sm text-gray-900 dark:text-gray-100">
                        <thead class="bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-white">
                            <tr>
                                <th class="px-4 py-3 text-left">No</th>
                                <th class="px-4 py-3 text-left">Nama</th>
                                <th class="px-4 py-3 text-left">NIM</th>
                                <th class="px-4 py-3 text-left">Email</th>
                                <th class="px-4 py-3 text-left">No. HP</th>
                                <th class="px-4 py-3 text-left">Program Studi</th>
                                <th class="px-4 py-3 text-left">Semester</th>
                                <th class="px-4 py-3 text-left">Jenis Kelamin</th>
                                <th class="px-4 py-3 text-left">Alasan</th>
                                <th class="px-4 py-3 text-left">Foto</th>
                                <th class="px-4 py-3 text-left">Admin Ormawa</th>
                            </tr>
                        </thead>
                        <tbody x-data="{ page: 1 }" class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach ($recmawas as $index => $recmawa)
                            <tr x-show="page === Math.ceil(({{ $index + 1 }}) / 5)" class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                <td class="px-4 py-2">{{ $index + 1 }}</td>
                                <td class="px-4 py-2">{{ $recmawa->name }}</td>
                                <td class="px-4 py-2">{{ $recmawa->nim }}</td>
                                <td class="px-4 py-2">{{ $recmawa->email }}</td>
                                <td class="px-4 py-2">{{ $recmawa->phone }}</td>
                                <td class="px-4 py-2">{{ $recmawa->study_program }}</td>
                                <td class="px-4 py-2">{{ $recmawa->semester }}</td>
                                <td class="px-4 py-2">
                                    <span class="inline-block px-4 py-1 text-sm font-semibold rounded-full 
                                        {{ $recmawa->gender == 'Male' ? 'bg-blue-600 text-white' : 'bg-pink-500 text-white' }}">
                                        {{ $recmawa->gender == 'Male' ? 'Laki-Laki' : 'Perempuan' }}
                                    </span>
                                </td>
                                <td class="px-4 py-2 text-left">{{ $recmawa->reason }}</td>
                                <td class="px-4 py-2">
                                    @if($recmawa->photo)
                                        <img src="{{ asset('uploads/' . $recmawa->photo) }}" class="rounded-full w-12 h-12 object-cover border" alt="Foto">
                                    @else
                                        <span class="text-gray-400 italic">Tidak Ada Foto</span>
                                    @endif
                                </td>
                                <td class="px-4 py-2">{{ $recmawa->AdminOrmawa->name ?? 'Tidak Diketahui' }}</td>
                            </tr>
                        @endforeach

                        <!-- Navigasi -->
                        <tr>
                            <td colspan="11" class="pt-4">
                                <div class="flex justify-between items-center">
                                    <button @click="if (page > 1) page--"
                                            class="bg-gray-200 px-4 py-2 rounded hover:bg-gray-300 transition text-sm">
                                        &laquo; Sebelumnya
                                    </button>
                                    <div class="text-gray-600 dark:text-gray-300 text-sm">
                                        Halaman <span x-text="page"></span> dari {{ ceil($recmawas->count() / 5) }}
                                    </div>
                                    <button @click="if (page < {{ ceil($recmawas->count() / 5) }}) page++"
                                            class="bg-gray-200 px-4 py-2 rounded hover:bg-gray-300 transition text-sm">
                                        Selanjutnya &raquo;
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                    </table>
                </div>  
            </div>
        </div>
    </div>
</x-app-layout>
