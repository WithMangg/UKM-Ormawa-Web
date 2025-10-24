<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('INI HALAMAN HISTORY') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-md rounded-xl overflow-hidden p-6">
                <h2 class="text-xl font-bold mb-6 text-gray-800 dark:text-white">Riwayat Pendaftaran UKM</h2>

                <div x-data="{ page: 1 }" class="overflow-x-auto">
                    <table class="min-w-full border border-gray-200 divide-y divide-gray-200 text-sm">
                        <thead class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 uppercase font-semibold">
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
                                <th class="px-4 py-3 text-center">Foto</th>
                                <th class="px-4 py-3 text-center">Tanggal Pendaftaran</th>
                                 <!-- <th class="px-4 py-3 text-left">Kesediaan</th> -->
                                <th class="px-4 py-3 text-left">Admin UKM</th>
                            </tr>
                        </thead>

                       <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        ``@foreach ($recruitments as $index => $recruitment)
                            <tr x-show="page === Math.ceil(({{ $index + 1 }}) / 5)" class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                                <td class="px-4 py-3 text-gray-900 dark:text-gray-200">{{ $index + 1 }}</td>
                                <td class="px-4 py-3 text-gray-900 dark:text-gray-200">{{ $recruitment->name }}</td>
                                <td class="px-4 py-3 text-gray-900 dark:text-gray-200">{{ $recruitment->nim }}</td>
                                <td class="px-4 py-3">
                                    <a href="mailto:{{ $recruitment->email }}" target="_blank"
                                    class="text-blue-600 hover:underline dark:text-blue-400">
                                        {{ $recruitment->email }}
                                    </a>
                                </td>
                                <td class="px-4 py-3 text-gray-900 dark:text-gray-200">{{ $recruitment->phone }}</td>
                                <td class="px-4 py-3 text-gray-900 dark:text-gray-200">{{ $recruitment->study_program }}</td>
                                <td class="px-4 py-3 text-gray-900 dark:text-gray-200">{{ $recruitment->semester }}</td>
                                <td class="px-4 py-3">
                                    <span class="px-2 py-1 inline-flex text-xs font-medium rounded-full 
                                        {{ $recruitment->gender == 'Male' ? 'bg-blue-100 text-blue-800' : 'bg-pink-100 text-pink-800' }}">
                                        {{ $recruitment->gender == 'Male' ? 'Laki-Laki' : 'Perempuan' }}
                                    </span>
                                </td>
                                <td class="px-4 py-3 text-gray-900 dark:text-gray-200">{{ $recruitment->reason }}</td>
                                <td class="px-4 py-3 text-center">
                                    @if ($recruitment->photo)
                                        <img src="{{ asset('uploads/' . $recruitment->photo) }}"
                                            class="w-10 h-10 rounded-full object-cover mx-auto border"
                                            alt="Foto">
                                    @else
                                        <span class="text-xs text-gray-500">Tidak Ada Foto</span>
                                    @endif
                                </td>
                                <td class="px-4 py-3 text-gray-900 dark:text-gray-200">{{ $recruitment->created_at }}</td>
                                <!-- <td class="px-4 py-3 text-gray-900 dark:text-gray-200">{{ $recruitment->bersedia }}</td> -->
                                <td class="px-4 py-3 text-gray-900 dark:text-gray-200">
                                    {{ $recruitment->Adminukm->name ?? 'Tidak Diketahui' }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                    </table>

                    <!-- Navigasi Tombol -->
                    <div class="flex justify-between items-center mt-4">
                        <button @click="if (page > 1) page--"
                                class="bg-gray-200 px-4 py-2 rounded hover:bg-gray-300 transition text-sm">
                            &laquo; Sebelumnya
                        </button>
                        <div class="text-gray-600 dark:text-gray-300 text-sm">
                            Halaman <span x-text="page"></span> dari {{ ceil($recruitments->count() / 5) }}
                        </div>
                        <button @click="if (page < {{ ceil($recruitments->count() / 5) }}) page++"
                                class="bg-gray-200 px-4 py-2 rounded hover:bg-gray-300 transition text-sm">
                            Selanjutnya &raquo;
                        </button>
                    </div>
                </div>  
            </div>
        </div>
    </div>
</x-app-layout>
