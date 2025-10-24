<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('INI HALAMAN HISTORY') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h2 class="text-xl font-semibold mb-4 text-gray-800 dark:text-gray-200">Data Pendaftaran UKM</h2>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-100 dark:bg-gray-700">
                            <tr>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-300 uppercase">No</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-300 uppercase">Nama</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-300 uppercase">NIM</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-300 uppercase">Email</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-300 uppercase">No. HP</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-300 uppercase">Program Studi</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-300 uppercase">Semester</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-300 uppercase">Jenis Kelamin</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-300 uppercase">Alasan</th>
                                <th class="px-4 py-3 text-center text-xs font-medium text-gray-700 dark:text-gray-300 uppercase">Foto</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-300 uppercase">Admin UKM</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach ($recruitments as $index => $recruitment)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                                <td class="px-4 py-3 text-sm text-gray-900 dark:text-gray-200">{{ $index + 1 }}</td>
                                <td class="px-4 py-3 text-sm text-gray-900 dark:text-gray-200">{{ $recruitment->name }}</td>
                                <td class="px-4 py-3 text-sm text-gray-900 dark:text-gray-200">{{ $recruitment->nim }}</td>
                                <td class="px-4 py-3 text-sm text-gray-900 dark:text-gray-200">{{ $recruitment->email }}</td>
                                <td class="px-4 py-3 text-sm text-gray-900 dark:text-gray-200">{{ $recruitment->phone }}</td>
                                <td class="px-4 py-3 text-sm text-gray-900 dark:text-gray-200">{{ $recruitment->study_program }}</td>
                                <td class="px-4 py-3 text-sm text-gray-900 dark:text-gray-200">{{ $recruitment->semester }}</td>
                                <td class="px-4 py-3">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $recruitment->gender == 'Male' ? 'bg-blue-100 text-blue-800' : 'bg-pink-100 text-pink-800' }}">
                                        {{ $recruitment->gender == 'Male' ? 'Laki-Laki' : 'Perempuan' }}
                                    </span>
                                </td>
                                <td class="px-4 py-3 text-sm text-gray-900 dark:text-gray-200">{{ $recruitment->reason }}</td>
                                <td class="px-4 py-3 text-center">
                                    @if($recruitment->photo)
                                        <img src="{{ asset('uploads/' . $recruitment->photo) }}" class="w-10 h-10 rounded-full object-cover mx-auto" alt="Foto">
                                    @else
                                        <span class="text-xs text-gray-500">Tidak Ada Foto</span>
                                    @endif
                                </td>
                                <td class="px-4 py-3 text-sm text-gray-900 dark:text-gray-200">
                                    {{ $recruitment->Adminukm->name ?? 'Tidak Diketahui' }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>  
            </div>
        </div>
    </div>
</x-app-layout>
